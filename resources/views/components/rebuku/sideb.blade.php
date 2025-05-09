<div class="flex">
    <!-- Sidebar -->
    <aside class="w-64 h-screen p-6 shadow-md bg-gray-100">
        <div class="grid grid-cols-2 items-center justify-between mb-4">
            <h2 class="text-xl font-medium">Menu</h2>
            <a href="#" class="text-sm text-red-600 hover:underline text-right">Reset all</a>
        </div>

        <!-- Section: Posted At -->
        <div class="mb-6">
            <h3 class="bg-[#865015] text-white p-2 rounded-md">Posted At</h3>
            <x-home.radio />
        </div>

        <script type="text/javascript">
            function autoSubmit(){
                document.getElementById("myForm").submit();
            };
        </script>
        

        <!-- Section: Kategori -->
        <div class="mt-2">
            <h3 class="bg-[#865015] text-white p-2 rounded-md">Kategori</h3>
            <ul class="space-y-2 pl-2 pt-2">
                <form action="{{route('tampilan.all')}}" method="GET" class="flex items-center">
                    <div class="flex-col">
                
                <select name="genre_id" id="genre-id" class="rounded-md mt-2">
                        <option value="" class="justify-center">Pilih kategori</option>
                    @foreach ($genres as $genre)
                        <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                        @endforeach
                    </select>
                    
                    {{-- Section: Searching  --}}
        <div class="w-full bg-slate-200 mt-2">
            <form action="{{route('tampilan.all')}}" method="GET"  id="myForm">
            <input type="text" name="penulis" id="penulis" placeholder="Cari Penulis Buku" value="{{request('penulis')}}" class="border p-2 rounded border-[#a57b44] border-1 placeholder:text-gray-600 placeholder:p-2 w-[100%]">
            </form>
        </div>

                </div>
                
            </ul>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-10">
        <h1 class="text-3xl font-bold mb-6">Semua Buku</h1>
        
        <div class="flex flex-wrap gap-6">
            @foreach ($books as $item)
<div class="w-40 border p-3 rounded shadow bg-white">
<a href="{{route('book.show', $item->id)}}">
    <img src="{{ asset('storage/' . $item->cover_path)}}" alt="{{ $item->judul }}">
    <h1 class="font-outfit text-black font-semibold text-base">{{ $item->judul }}</h1>
<p class="mt-2">{{ $item->penulis->name }}</p>
<div class="flex flex-row justify-between mt-2ii">
<p class="text-gray-400">{{ $item->genre->name }}</p>
</div></a>
<p class="text-gray-500">    {{ Str::of($item->status)->replace('_', ' ')->title() }}
</p>
</div>
@endforeach
        </div>
    </main>
</div>