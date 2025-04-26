    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <x-font></x-font>
    <x-home.nav></x-nav>
    <body class="h h-screen font-outfit">
        <section class="p-10">
            
            <h1 class="text-[32px] font-bold">Continue</h1> 
            <div class="grid grid-cols-5 h-[60vh] bg-[rgb(255,242,221)] rounded-md overflow-hidden shadow-lg mt-4 p-2">
                <x-book.summaries></x-book.summaries>
            
                <!-- Kolom kanan untuk daftar buku -->
                <div class="col-span-3 p-4 overflow-x-auto">
                    <div class="flex space-x-6 h-full items-center"> <!-- Container flex horizontal -->
                        @foreach ($books as $item)
        <div class="flex-shrink-0 w-40 text-center"> <!-- Block buku -->
            <!-- Cover -->
            <div class="h-48 bg-gray-100 mb-2 flex items-center justify-center overflow-hidden">
                @if($item->cover_path)
                    <a href="{{ route('book.show', $item->id) }}">
                        <img src="{{ asset('storage/' . $item->cover_path) }}" alt="{{ $item->judul }}" class="h-full object-cover">
                    </a>
                @else
                    <span class="text-gray-500">No Cover</span>
                @endif
            </div>

            <!-- Informasi buku -->
            <div>
                <h3 class="font-bold text-sm truncate">{{ $item->judul }}</h3>
                <p class="text-xs text-gray-600">{{ $item->penulis->name }}</p>
            </div>

            <!-- Progress bar -->
            @if($item->total_pages > 0)
        @php
            $progress = ($item->last_read_page / $item->total_pages) * 100;
        @endphp
        <div class="w-full bg-gray-200 rounded-full h-1 mt-2">
            <div class="bg-yellow-700 h-1 rounded-full" style="width: {{ $progress }}%"></div>
        </div>
        <p class="text-[10px] text-gray-500 mt-1">{{ round($progress) }}% ({{ $item->last_read_page }}/{{ $item->total_pages }})</p>
    @endif

            <!-- Form update progress -->
            <form action="{{ route('books.updateProgress', $item->id) }}" method="POST" class="mt-1">
                @csrf
                @method('PATCH')
                <input type="number" name="last_read_page" value="{{ $item->last_read_page }}"
                    min="0" max="{{ $item->total_pages }}"
                    class="w-full text-xs border border-gray-300 rounded px-1 py-0.5">
                <button type="submit"
                        class="w-full bg-yellow-700 hover:bg-yellow-800 text-white text-[10px] py-0.5 mt-1 rounded">
                    Update
                </button>
                
            </form>
            <form action="{{ route('book.complete', $item->id) }}" method="POST">
    @csrf
    @method('PATCH')

    <button type="submit"
                        class="w-full bg-yellow-700 hover:bg-yellow-800 text-white text-[12px] py-0.5 mt-1 rounded">
                    selesaikan
                </button>
</form>

            
        </div>
    @endforeach

                    </div>
                </div>
            </div>    
        </section>
        <section class="p-10">
        <h1 class="text-[32px] font-bold">Tujuan bacaan</h1> 

        
        <p>Membaca setiap hari, lihat lonjakan statistik dan selesaikan lebih banyak buku!</p>
    
        <section class="p-10 bg-slate-300 rounded-md h-[50vh] text-center">
            {{-- <div class="bg-gray-100 p-6 rounded-lg w-full max-w-md mx-auto text-center"> --}}
                
            
                <!-- Lingkaran progress (statis) -->
                <!-- Lingkaran progress dinamis -->
    <div class="flex justify-center items-center my-1">
        <div class="relative">
        <svg class="w-40 h-20" viewBox="0 0 100 50">
            <path d="M 10 50 A 40 40 0 0 1 90 50" fill="none" stroke="#cbd5e1" stroke-width="8" />
    <!-- Progress -->
    <path 
        d="{{ $arcPath }}" 
        fill="none" 
        stroke="#99622e" 
        stroke-width="8"
        class="transition-all duration-700 ease-in-out"
    />
        

        </svg>
    
        <!-- Teks di tengah -->
        <div class="inset-0 flex flex-col items-center justify-center pt-6">
            <p class="text-sm font-semibold">{{ $completedBooks }} books completed</p>
            <p class="text-xs text-gray-500 mt-2">{{ $behindSchedule }} behind schedule</p>
        </div>
        </div>
    </div>  
    <button data-modal-target="goalModal" data-modal-toggle="goalModal"
    class="bg-yellow-700 hover:bg-yellow-800 text-white font-semibold mt-2 py-2 px-4 rounded">
    Set a New Goal
    </button>
    @if($goals->isNotEmpty())
            <div class="mb-6">
                <h2 class="text-xl font-bold mb-2">🎯 Goals Bacaan:</h2>
                @foreach($goals as $goal)
                    <div class="mb-4 border p-4 rounded">
                        <p class="font-semibold">🎯 Target: {{ $goal->target_books }} buku sampai {{ $goal->deadline->format('d M Y') }}</p>
                        <ul class="list-disc list-inside text-gray-700">
                            @foreach($goal->books as $book)
                                <li>{{ $book->judul }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        @endif


            {{-- </div> --}}
        </section>
        <section class="mt-[4%] h-[50vh] font-outfit">
        <h1 class="text-[32px] font-bold mb-4">Rekomendasi Buku</h1>
        <p class="text-gray-700 mb-6 -mt-4">Berdasarkan minat dan genre favoritmu, berikut beberapa buku yang mungkin kamu suka:</p>
        <div class="bg-[#c76d4350] rounded-md grid grid-cols-3 p-12 h-[50vh] place place-items-center">
            <div class="bg-[#855a23]   col-span-1 h-[85%] w-[85%] block p-4 rounded-sm">
                <h1 class="font-semibold text-white text-[24px]">Berdasarkan lemari</h1>
                <p class="text-start text-[16px] text-white">Rekomendasi buku berdasarkan minat dan genre yang kamu pilih.</p>
            </div>
            <div class="bg-[#3d2d1f] col-span-1 h-[85%] w-[85%] block p-4 rounded-sm">
                <h1 class="font-semibold text-white text-[24px]">Berdasarkan lemari</h1>
                <p class="text-start text-[16px] text-white">Rekomendasi buku berdasarkan minat dan genre yang kamu pilih.</p>
            </div>
            <div class="bg-[#855a23] col-span-1 h-[85%] w-[85%] block p-4 rounded-sm">
                <h1 class="font-semibold text-white text-[24px]">Berdasarkan lemari</h1>
                <p class="text-start text-[16px] text-white">Rekomendasi buku berdasarkan minat dan genre yang kamu pilih.</p>
            </div>
        </div>
    </section>
        </div>
        <x-font></x-font>
        <div id="goalModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
            <div class="relative w-full max-w-md h-full md:h-auto">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Close Button -->
                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="goalModal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
        
                    <!-- Modal Content -->
                    <div class="p-6 space-y-4">
                        <h3 class="text-xl font-medium text-gray-900 dark:text-white">🎯 Set New Reading Goal</h3>
                        <form action="{{ route('goal.store') }}" method="POST" class="space-y-4">
                            @csrf
                        
                            <!-- Input for Target Books -->
                            <div>
                                <label for="target_books" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Jumlah Buku</label>
                                <input type="number" name="target_books" id="target_books" min="1" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-purple-500 focus:border-purple-500 sm:text-sm">
                                @error('target_books')
                                    <p class="text-red-500 text-xs">{{ $message }}</p>
                                @enderror
                            </div>
                        
                            <!-- Input for Deadline -->
                            <div>
                                <label for="deadline" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Tanggal Target</label>
                                <input type="date" name="deadline" id="deadline" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-purple-500 focus:border-purple-500 sm:text-sm">
                                @error('deadline')
                                    <p class="text-red-500 text-xs">{{ $message }}</p>
                                @enderror
                            </div>
                        
                            
                        
                            <!-- Submit Button -->
                            <button type="submit" class="w-full py-2 px-4 bg-purple-600 hover:bg-purple-700 text-white font-semibold rounded-md focus:ring-2 focus:ring-purple-500 focus:ring-opacity-50">
                                Set Goal
                            </button>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
        
    </body>
    </html> 