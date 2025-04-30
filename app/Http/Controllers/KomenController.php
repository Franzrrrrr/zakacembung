<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Penulis, Book, Komen};
use App\Http\Requests\StoreKomenRequest;
use App\Models\Book as ModelsBook;

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
    public function store(StoreKomenRequest $request, $id)
{
    $validated = $request->validated();

    Komen::create([
        'book_id' => $id,
        'user_id' => auth()->id(),
        'penulis_id' => Book::findOrFail($id)->penulis_id, // ini ditambahkan
        'komenan' => $validated['komenan'],
    ]);

    return redirect()->route('komen.show', $id)->with('success', 'Komentar berhasil ditambahkan');
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
