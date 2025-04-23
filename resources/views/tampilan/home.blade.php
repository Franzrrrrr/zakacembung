<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Document</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <x-font></x-font>
</head>
<body>
  <x-home.nav></x-nav>

  <section class="grid grid-cols-2 items-center h-screen px-20">
    <!-- Kiri -->
    <div>
      <h1 class="text-[50px] font-md font-pattaya mb-4">What Book Are <br>You Looking For?</h1>
      <p class="mb-6 text-gray-600 font-lg text-[18px]">Not Sure What To Read Next? <br>Our solution will cost you 5 minutes to find your next best.</p>
      <a href="{{route('book.index')}}" class="inline-flex items-center border border-yellow-700 text-yellow-700 px-6 py-2 rounded hover:bg-yellow-700 hover:text-white">
        Explore Now
        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path d="M9 5l7 7-7 7" />
        </svg>
      </a>
    </div>
  
    <!-- Kanan -->
    <div class="relative flex justify-center space-x-6">
      <img src="/assets/book1.png" class="transform rotate-6 h-64 shadow-md">
      <img src="/assets/book2.png" class="transform -rotate-3 h-64 shadow-md">
    </div>
  </section>
  

  <!-- Section Warna-Warni Bawah -->
  <section class="w-full h-24 flex">
    <div class="flex-1 bg-[#febe27]"></div>
    <div class="flex-1 bg-[#f87c1e]"></div>
    <div class="flex-1 bg-[#d53d89]"></div>
    <div class="flex-1 bg-[#85269d]"></div>
  </section>

  <section class="px-20 py-10">
    <h2 class="text-xl mb-6 font-semibold">Choose the category for your next trip</h2>
    <div class="grid grid-cols-4 gap-6">
      <div class="bg-yellow-200 p-4">Romance<br><span class="text-sm">45 books reviewed</span></div>
      <div class="bg-yellow-700 text-white p-4">Fiction<br><span class="text-sm">220 books reviewed</span></div>
      <div class="bg-gray-800 text-white p-4">Business<br><span class="text-sm">87 books reviewed</span></div>
      <div class="bg-yellow-300 p-4">Health<br><span class="text-sm">600 books reviewed</span></div>
    </div>
  </section>

  <section class="px-20 py-10 bg-gray-100">
    <h2 class="text-xl mb-6 font-semibold">Readers Favorite Authors</h2>
    <div class="flex space-x-4 overflow-x-auto">
      <div class="flex flex-col items-center w-32">
        <img src="/authors/1.jpg" class="w-20 h-20 rounded-full mb-2">
        <p class="text-sm">Jonathan Rivera</p>
      </div>
      <!-- Tambah penulis lainnya -->
    </div>
  </section>

  <section class="text-center py-20 px-8">
    <img src="/users/avatar.jpg" class="mx-auto w-20 h-20 rounded-full mb-4">
    <p class="italic text-lg max-w-xl mx-auto">
      “Goodreads makes tracking my reading progress and writing reviews incredibly simple and enjoyable.”
    </p>
    <p class="mt-2 font-bold">Emily Hartman</p>
  </section>

  <footer class="bg-yellow-100 py-10 px-20">
    <div class="grid grid-cols-4 gap-10 mb-10">
      <div>
        <h4 class="font-bold mb-2">Our Company</h4>
        <ul class="space-y-1 text-sm">
          <li>About Us</li>
          <li>Careers</li>
          <li>Privacy</li>
        </ul>
      </div>
      <!-- Tambah kolom lainnya -->
      <div class="col-span-1">
        <h4 class="font-bold mb-2">Subscribe to our Newsletter</h4>
        <div class="flex border rounded overflow-hidden">
          <input type="text" placeholder="Email" class="p-2 flex-grow">
          <button class="bg-yellow-700 text-white px-4">→</button>
        </div>
      </div>
    </div>
  
    <div class="text-center mt-10">
      <h4 class="font-bold mb-4">CONTACT US</h4>
      <div class="flex justify-center space-x-4">
        <a href="#" class="bg-white p-2 rounded-full"><img src="/icons/facebook.svg"></a>
        <a href="#" class="bg-white p-2 rounded-full"><img src="/icons/instagram.svg"></a>
        <!-- dan lainnya -->
      </div>
    </div>
  </footer>
  
</body>
</html>
