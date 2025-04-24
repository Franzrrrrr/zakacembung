<?php

namespace App\Http\Controllers;

use App\Models\Goal;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class GoalController extends Controller
{
    // Menampilkan form modal atau halaman untuk set goal
    public function showModal()
    {
        $books = Book::all();  // Mengambil semua buku dari database
        return view('book.index', compact('books')); // Ganti 'your-view' dengan view yang sesuai
    }

    // Menyimpan goal baru
    // GoalController.php



public function store(Request $request)
{
    $request->validate([
        'target_books' => 'required|integer|min:1',
        'deadline' => 'required|date',
    ]);

    $goal = new Goal();
    $goal->user_id = Auth::id(); // <–– WAJIB ISI INI!
    $goal->target_books = $request->target_books;
    $goal->deadline = $request->deadline;
    $goal->save();

    return redirect()->route('book.index')->with('success', 'Goal berhasil diset!');
}



}
