<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body class="grid grid-cols-2 font-inter">
  <div class="flex justify-center items-center h-screen">
    @if ($errors->any())
  <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
    <ul>
      @foreach ($errors->all() as $error)
        <li>- {{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif
    <form action="{{ route('register.store') }}" method="POST" class="w-[55%]">
      @csrf
      <h1 class="text-[36px] font-[600] text-center">Daftar Sekarang!</h1>

      <div class="block mt-10">
        <label for="name" class="block text-sm font-medium text-gray-700 text-[14px]">Nama</label>
        <input type="text" name="name" id="name"
          class="mt-2 block border border-gray-300 rounded-md w-full placeholder:text-gray-300 px-3 py-2"
          placeholder="Masukkan nama anda">

        <label for="email" class="mt-4 block text-sm font-medium text-gray-700 text-[14px]">Email</label>
        <input type="email" name="email" id="email"
          class="mt-2 block border border-gray-300 rounded-md w-full placeholder:text-gray-300 px-3 py-2"
          placeholder="Masukkan email anda">

        <label for="password" class="mt-4 block text-sm font-medium text-gray-700 text-[14px]">Password</label>
        <input type="password" name="password" id="password"
          class="mt-2 block border border-gray-300 rounded-md w-full placeholder:text-gray-300 px-3 py-2"
          placeholder="Masukkan password">

        <label for="password_confirmation" class="mt-4 block text-sm font-medium text-gray-700 text-[14px]">Konfirmasi Password</label>
        <input type="password" name="password_confirmation" id="password_confirmation"
          class="mt-2 block border border-gray-300 rounded-md w-full placeholder:text-gray-300 px-3 py-2"
          placeholder="Ulangi password">

        <label class="flex items-center space-x-2 mt-6">
          <input type="checkbox" name="terms" class="form-checkbox text-blue-600" />
          <span class="text-gray-700 text-[12px]">Saya setuju dengan syarat & ketentuan</span>
        </label>

        <button type="submit"
          class="bg-[rgb(135,92,26)] w-full mt-6 rounded-md shadow-lg text-white font-bold py-2 hover:bg-yellow-900 transition">
          Daftar
        </button>
      </div>
    </form>
  </div>

  <div class="bg-[rgb(243,210,161)] rounded-l-2xl shadow-lg h-screen flex justify-center items-center">
    <img src="{{asset('assets/bookshelf.png')}}" class="w-142 h-92" alt="loginbook">
</div>
</body>
</html>
