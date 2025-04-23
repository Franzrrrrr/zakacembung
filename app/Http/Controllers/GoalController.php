<?php

namespace App\Http\Controllers;

use App\Models\Goal;
use App\Models\Book;
use Illuminate\Http\Request;

class GoalController extends Controller
{
    // Menampilkan form modal atau halaman untuk set goal
    public function showModal()
    {
        $books = Book::all();  // Mengambil semua buku dari database
        return view('your-view', compact('books')); // Ganti 'your-view' dengan view yang sesuai
    }

    // Menyimpan goal baru
    public function store(Request $request)
    {
        // Validasi data dari form
        $validated = $request->validate([
            'target_books' => 'required|integer|min:1',
            'deadline' => 'required|date|after_or_equal:today', // Validasi tanggal agar tidak di masa depan
            'books' => 'required|array|min:1', // Pastikan ada buku yang dipilih
            'books.*' => 'exists:books,id' // Validasi bahwa ID buku yang dipilih ada dalam database
        ]);

        // Menyimpan goal ke dalam tabel goal
        $goal = Goal::create([
            'target_books' => $validated['target_books'],
            'deadline' => $validated['deadline'],
        ]);

        // Mengaitkan buku dengan goal (banyak ke banyak)
        $goal->books()->sync($validated['books']);  // Menggunakan relasi banyak ke banyak

        // Mengarahkan kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Goal berhasil ditambahkan!');
    }
}
