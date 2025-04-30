<?php

namespace App\Http\Controllers;

use App\Models\Goal;
use Illuminate\Http\Request;
use App\Models\{Book, Genre, Penulis};
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\{StoreBookRequest, UpdateBookRequest};

class BookController extends Controller
{
    public function index(Request $request)
    {
        $goals = Goal::with('books')->get();
        $query = Book::query()->with('genre', 'penulis');

        if ($request->filled('text') && $request->search != '') {
            $query->where('judul', 'like', '%' . $request->search . '%')
            ->orWhere('penulis', 'like', '%'. $request->search . '%' )
            ->orWhere('genre', 'like', '%'. $request->search . '%' );
        }

        if ($request->filled('genre_id')) {
            $query->where('genre_id', $request->genre_id);
        }

        if ($request->filled('posted')) {
            switch ($request->posted) {
                case 'today':
                    $query->whereDate('created_at', now());
                    break;
                case 'week':
                    $query->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]);
                    break;
                case 'month':
                    $query->whereMonth('created_at', now()->month);
                    break;
                case 'year':
                    $query->whereYear('created_at', now()->year);
                    break;
            }
        }

        $books = $query->get(); 
        $goal = Goal::where('user_id', Auth::id())->latest()->first();
        $totalTarget = $goal ? $goal->target_books : 0; 
        $completedBooks = Book::where('status', 'selesai_dibaca')->count();
        $progress = ($totalTarget > 0) ? ($completedBooks / $totalTarget) * 100 : 0;
        $behindSchedule = max(0 , $totalTarget - $completedBooks);

        $arcPath = $this->generateArcPath($progress);

        return view('book.index', [
            'books' => $books,
            'completedBooks' => $completedBooks,
            'behindSchedule' => $behindSchedule,
            'progress' => round($progress, 2),
            'arcPath' => $arcPath,
            'goals' => $goals,
        ]);
    }

    public function generateArcPath($progress)
    {
        $radius = 40;
        $centerX = 50;
        $centerY = 50;

        // Clamp progress to range 0–100
        $progress = max(0, min(100, $progress));

        // Hitung sudut progress dalam derajat (maksimal 180°)
        $angle = ($progress / 100) * 180;
        $radian = deg2rad($angle);

        // Hitung titik akhir dari arc
        $x = $centerX + $radius * cos(M_PI - $radian);
        $y = $centerY - $radius * sin(M_PI - $radian);

        $largeArcFlag = $progress > 50 ? 1 : 0;

        return "M 10 50 A $radius $radius 0 $largeArcFlag 1 $x $y";
    }

    public function updateProgress(Request $request, $bookId)
    {
        $book = Book::findOrFail($bookId);

        $validated = $request->validate([
            'last_read_page' => 'required|numeric|min:0|max:' . $book->total_pages,
        ]);

        $book->last_read_page = $validated['last_read_page'];

        if ($book->last_read_page >= $book->total_pages) {
            $book->status = 'selesai_dibaca';
        }

        $book->save();

        return redirect()->route('book.index')->with('success', 'Progress updated successfully');
    }

    public function complete($bookId)
    {
        $book = Book::findOrFail($bookId);
        $book->last_read_page = $book->total_pages;
        $book->status = 'selesai_dibaca';
        $book->save();

        return redirect()->route('book.index')->with('success', 'Buku telah selesai dibaca!');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $query = Book::query()->with('penulis', 'genre');

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('judul', 'like', '%' . $request->search . '%')
                  ->orWhere('penulis', 'like', '%' . $request->search . '%');
            });
        }
            if ($request->filled('penulis')) {
                    $query->whereHas('penulis', function ($q) use ($request) {
                    $q->where('name', 'like', '%' . $request->penulis . '%');
                });
        }
        




        if ($request->filled('posted')) {
            switch ($request->posted) {
                case 'today':
                    $query->whereDate('created_at', now());
                    break;
                case 'week':
                    $query->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]);
                    break;
                case 'month':
                    $query->whereMonth('created_at', now()->month);
                    break;
                case 'year':
                    $query->whereYear('created_at', now()->year);
                    break;
            }
        }

        $books = $query->get();
        $genres = Genre::all();
        $penulis = Penulis::all();

        return view('tampilan.all', compact('books', 'genres', 'search', 'penulis'));
    }

    public function create()
    {
        $genres = Genre::all();
        $penulis = Penulis::all();
        return view('book.create', compact('genres', 'penulis'));
    }

    public function store(StoreBookRequest $request)
    {
        $validated = $request->validated();

        if ($request->hasFile('cover_path')) {
            $path = $request->file('cover_path')->store('covers', 'public');
            $validated['cover_path'] = $path;
        }

        $penulis = Penulis::firstOrCreate(['name' => $request->penulis_name]);
        $validated['penulis_id'] = $penulis->id;
        Book::create($validated);

        return redirect()->route('book.index')->with('success', 'Buku berhasil ditambahkan!');
    }

    public function show(Book $book, $id)
    {
        $book = Book::findOrFail($id);
        $genre = $book->genre;  // Mengambil genre terkait dengan buku
        $penulis = $book->penulis;  // Mengambil penulis terkait dengan buku

        return view('tampilan.detail', compact('book','genre','penulis'));
    }

    public function edit(Book $book)
    {
        $books = Book::with(['genre', 'penulis'])->get();
        $genres = Genre::all();
        $penulis = Penulis::all();
        return view('book.edit', compact('book', 'genres', 'penulis'));
    }

    public function update(UpdateBookRequest $request, Book $book)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'penulis_id' => 'required|exists:penulis,id',
            'cover_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi' => 'required|string|max:255',
            'genre_id' => 'required|exists:genres,id',
            'status' => 'required|in:belum_dibaca,sedang_dibaca,selesai_dibaca'
        ]);

        if ($request->hasFile('cover_path')) {
            $path = $request->file('cover_path')->store('covers');
            $validated['cover_path'] = $path;
        }

        $book->update($validated);

        return redirect()->route('book.index')->with('success', 'Buku berhasil diperbarui!');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('book.index')->with('success', 'Buku berhasil dihapus!');
    }
}