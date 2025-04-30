<nav class="bg-gray-50 border-b border-gray-100 px-6 py-4 shadow-sm">
  <div class="flex items-center justify-between">
      <!-- Logo -->
      <a href="{{ route('book.index') }}" class="flex items-center space-x-1 text-xl">
          <h1 class="font-medium text-[rgba(160,106,48,0.34)]">nyaman</h1>
          <h1 class="font-semibold text-[rgb(160,106,48)]">membaca</h1>
      </a>

      <!-- Search Component -->
      <div class="flex-1 mx-8 max-w-xl">
          <x-home.cari />
      </div>

      <!-- Navigasi & Tombol -->
      <div class="flex items-center space-x-3">
          <a href="{{ route('book.index') }}">
              <button class="text-sm px-4 py-2 rounded-md hover:bg-gray-200 transition">Home</button>
          </a>
          
          <a href="{{ route('tampilan.all') }}">
              <button class="text-sm px-4 py-2 rounded-md hover:bg-gray-200 transition">Semua Buku</button>
          </a>

          @auth
              <a href="{{ route('book.create') }}">
                  <button class="text-sm px-4 py-2 bg-[#8c5732] text-white rounded-md hover:bg-[#734425] transition">Tambah Buku</button>
              </a>

              <a href="{{ route('logout') }}">
                  <button class="text-sm px-4 py-2 border border-red-500 text-red-500 rounded-md hover:bg-red-100 transition">Logout</button>
              </a>
          @else
              <a href="{{ route('login.show') }}">
                  <button class="text-sm px-4 py-2 bg-[#8c5732] text-white rounded-md hover:bg-[#734425] transition">Login</button>
              </a>

              <a href="{{ route('register.show') }}">
                  <button class="text-sm px-4 py-2 border border-[#8c5732] text-[#8c5732] rounded-md hover:bg-[#f5ede7] transition">Register</button>
              </a>
          @endauth
      </div>
  </div>
</nav>
