<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Buku</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<x-font></x-font>
<body>
    <!-- Form Tambah Buku -->
    <div class="max-w-md mx-auto mt-20">
      <div class="p-6 rounded-lg shadow text-outfit text-white bg-[#9b6d39] focus:text-black active:text-black">
        <h3 class="text-xl font-semibold mb-4">Tambah Buku</h3>

        @if($errors->any())
          <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul>
              @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <form action="{{ route('book.store') }}" method="POST" enctype="multipart/form-data">
          @csrf

          <div class="mb-4 text">
            <label for="judul" class="block text-sm font-medium">Judul</label>
            <input type="text" name="judul" id="judul" class="w-full border border-gray-300 rounded px-3 py-2 text-black" required>
          </div>
          <div class="mb-4">
            <label for="penulis_name" class="block text-sm font-medium">Penulis</label>
            <input type="text" name="penulis_name" id="penulis_name" class="w-full border border-gray-300 rounded px-3 py-2 text-black" required>
        </div>

          <div class="mb-4">
            <label for="penulis_id" class="block text-sm font-medium">Penulis</label>
            <input type="text" name="penulis_id" id="penulis_id" class="w-full border border-gray-300 rounded px-3 py-2 text-black" required>
          </div>
          
          <div class="mb-4">
            <label for="deskripsi" class="block text-sm font-medium">Deskripsi</label>
            <input type="text" name="deskripsi" id="deskripsi" class="w-full border text-black border-gray-300 rounded px-3 py-2" required>
          </div>

          <div class="mb-4">
            <label for="cover_path" class="block text-sm font-medium">Cover</label>
            <input type="file" name="cover_path" id="cover_path" class="w-full" required>
          </div>

          <div class="mb-4">
            <label for="total_pages" class="block text-sm font-medium">Total Halaman</label>
            <input type="number" name="total_pages" id="total_pages" class="w-full border border-gray-300 rounded px-3 py-2 text-black" required>
          </div>

          <div class="mb-4">
            <label for="genre_id" class="block text-sm font-medium">Genre</label>
            <select name="genre_id" id="genre_id" class="w-full border border-gray-300 rounded px-3 py-2 text-black" required>
              @foreach ($genres as $genre)
                <option value="{{ $genre->id }}">{{ $genre->name }}</option>
              @endforeach
            </select>
          </div>


          <div class="text-right">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
          </div>
        </form>
      </div>
    </div>
</body>
</html>
