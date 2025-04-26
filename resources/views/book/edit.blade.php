<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Edit Buku</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
  <div class="max-w-md mx-auto mt-20">
    <div class="bg-white p-6 rounded-lg shadow">
      <h3 class="text-xl font-semibold mb-4">Edit Buku</h3>

      @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
          <ul>
            @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form action="{{ route('book.update', $book->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
          <label for="judul" class="block text-sm font-medium text-gray-700">Judul</label>
          <input type="text" name="judul" id="judul" value="{{ old('judul', $book->judul) }}"
            class="w-full border border-gray-300 rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
          <label for="penulis_id" class="block text-sm font-medium text-gray-700">Penulis</label>
          <input type="text" name="penulis_id" id="penulis_id" value="{{ old('penulis_id', $book->penulis->name) }}"
            class="w-full border border-gray-300 rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
          <label for="cover_path" class="block text-sm font-medium text-gray-700">Cover (opsional)</label>
          <input type="file" name="cover_path" id="cover_path" class="w-full">
        </div>

        <div class="mb-4">
          
          
            class="w-full border border-gray-300 rounded px-3 py-2" min="1900" max="{{ date('Y') }}" required>
        </div>

        <div class="mb-4">
          <label for="genre_id" class="block text-sm font-medium text-gray-700">Genre</label>
          <select name="genre_id" id="genre_id" class="w-full border border-gray-300 rounded px-3 py-2" required>
            @foreach ($genres as $genre)
              <option value="{{ $genre->id }}" {{ $book->genre_id == $genre->id ? 'selected' : '' }}>
                {{ $genre->name }}
              </option>
            @endforeach
          </select>
        </div>

        <div class="mb-4">
          <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
          <select name="status" id="status" class="w-full border border-gray-300 rounded px-3 py-2" required>
            <option value="belum_dibaca" {{ $book->status === 'belum_dibaca' ? 'selected' : '' }}>Belum Dibaca</option>
            <option value="sedang_dibaca" {{ $book->status === 'sedang_dibaca' ? 'selected' : '' }}>Sedang Dibaca</option>
            <option value="selesai_dibaca" {{ $book->status === 'sudah_dibaca' ? 'selected' : '' }}>Selesai Dibaca</option>
          </select>
        </div>

        <div class="text-right">
          <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Perbarui</button>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 