<?php
namespace App\Http\Controllers;

use App\Http\Requests\UpdateBookRequest;

    
    
    use App\Http\Requests\StoreBookRequest;
    use App\Models\Book;
    use App\Models\Genre;
    use Illuminate\Http\Request;

    class BookController extends Controller
    {
        public function complete($bookId)
{
    // Cari buku berdasarkan ID
    $book = Book::findOrFail($bookId);

    // Tandai buku sebagai selesai
    $book->last_read_page = $book->total_pages;  // Set last_read_page ke total halaman
    $book->save();  // Simpan perubahan

    // Kembalikan ke halaman daftar buku dengan notifikasi sukses
    return redirect()->route('book.index')->with('success', 'Buku telah selesai dibaca!');
}


        public function search(Request $request)
{
    $search = $request->input('search');
    $query = Book::query();

if ($request->filled('search')) {
    $query->where(function ($q) use ($request) {
        $q->where('judul', 'like', '%' . $request->search . '%')
          ->orWhere('penulis', 'like', '%' . $request->search . '%');
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

$books = $query->get(); // hanya dipanggil sekali

    $genres = Genre::all();
    return view('tampilan.all', compact('books', 'genres', 'search'));
}
 
        
        public function showBook(Request $request)
        {
            $query = Book::query()->with('genre');

            if  ($request->filled('text') && $request->search != '') {
                $query->where('judul', 'like', '%' . $request->search . '%');
        }           

            

            // Filter genre
            if ($request->filled('genre_id')) {
                $query->where('genre_id', $request->genre_id);
            }

            // Filter posted_at
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

            $totalTarget = 12;
            $completedBooks = Book::where('status', 'selesai_dibaca')->count();
            $progress = ($totalTarget > 0) ? ($completedBooks / $totalTarget) * 100 : 0;
            $behindSchedule = max(0, $totalTarget - $completedBooks);

            $arcPath = $this->generateArcPath($progress);

            return view('book.index', [
                'books' => $books,
                'genres' => $genres,
                'completedBooks' => $completedBooks,
                'behindSchedule' => $behindSchedule,
                'progress' => $progress,
                'arcPath' => $arcPath,
            ]);
        }

        public function generateArcPath($progress)
{
    $radius = 40;
    $centerX = 50;
    $centerY = 50;

    // Hitung sudut (0° - 180°) dari progress (0% - 100%)
    $angle = ($progress / 100) * 180;
    $radian = deg2rad($angle);

    // Posisi titik akhir dari garis lengkung
    $x = $centerX + $radius * cos(M_PI - $radian);
    $y = $centerY - $radius * sin(M_PI - $radian);

    // Gunakan flag arc yang sesuai agar jalur SVG tepat
    $largeArcFlag = $progress > 50 ? 1 : 0;

    return "M 10 50 A $radius $radius 0 $largeArcFlag 1 $x $y";
}

        public function updateProgress(Request $request, $bookId)
{
    \Log::info('Updating progress for book ' . $bookId);

    // Cek apakah ada error pada request
    \Log::info('Request Data: ' . json_encode($request->all()));

    $book = Book::findOrFail($bookId);

    // Validasi
    $validated = $request->validate([
        'last_read_page' => 'required|numeric|min:0|max:' . $book->total_pages,
    ]);

    $book->last_read_page = $validated['last_read_page'];
    $book->save();

    return redirect()->route('book.index')->with('success', 'Progress updated successfully');
}



        public function create()
        {
            $genres = Genre::all();
            return view('book.create', compact('genres'));
        }

        public function store(StoreBookRequest $request)
{
    $validated = $request->validated();

    if ($request->hasFile('cover_path')) {
        $path = $request->file('cover_path')->store('covers', 'public');
        $validated['cover_path'] = $path;
    }

    Book::create($validated);

    return redirect()->route('book.index')->with('success', 'Buku berhasil ditambahkan!');
}


        public function show(Book $book,$id)
        {
            $book = Book::findOrFail($id);
            return view('tampilan.detail', compact('book'));
            
        }

        public function edit(Book $book)
        {
            $genres = Genre::all();
            return view('book.edit', compact('book', 'genres'));
        }


public function update(UpdateBookRequest $request, Book $book)

        {
            $validated = $request->validate([
                'judul' => 'required|string|max:255',
                'penulis' => 'required|string|max:255',
                'cover_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'deskripsi' => 'required|string|max:255',
                'genre_id' => 'required|exists:genres,id',
                'deskripsi' => 'required:max:255', 
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
