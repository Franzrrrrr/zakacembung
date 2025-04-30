<?php

namespace App\Http\Controllers;

use App\Models\Goal;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class GoalController extends Controller
{
    public function showModal()
    {
        $books = Book::all();  
        return view('book.index', compact('books')); 
    }





public function store(Request $request)
{
    $request->validate([
        'target_books' => 'required|integer|min:1',
    ]);
    
        Goal::create([
        'user_id' => Auth::id(),
        'target_books' => $request->target_books,
    ]);

    $goal = new Goal();
    $goal->user_id = Auth::id(); 
    $goal->target_books = $request->target_books;
    $goal->save();

    return redirect()->route('book.index')->with('success', 'Goal berhasil diset!');
}



}
