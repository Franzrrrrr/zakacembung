<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book as ModelsBook;
use Illuminate\Support\Facades\Auth;
use App\Models\{Penulis, Book, Komen};
use App\Http\Requests\StoreKomenRequest;

class KomenController extends Controller
{   
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
       $komens =  Komen::with('user')->get();
        
        return view('tampilan.detail', compact('komens','books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return \view('tampilan.detail');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Book $book)
{
    if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'Kamu harus login untuk memberikan komentar.');
    }

    $request->validate([
        'komenan' => 'required',
    ]);

    $book->komens()->create([
        'komenan' => $request->komenan,
        'user_id' => Auth::id(), 
        'penulis_id' => $book->penulis_id, 
    ]); 

    return back()->with('success', 'Komentar berhasil ditambahkan.');
}



    /**
     * Display the specified resource.
     */
    public function show($id)
{
    $book = Book::with(['komens.user', 'komens.penulis'])->findOrFail($id);
    return view('tampilan.detail', compact('book'));
}   


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Komen $komen)
    {
        return \view('tampilan.detail');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Komen $komen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Komen $komen)
    {
        //
    }
}
