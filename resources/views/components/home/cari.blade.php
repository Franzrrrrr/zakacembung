<div class="relative w-full">
    <form action="{{route('tampilan.all')}}" method="GET" class="flex items-center">
        <div class="relative w-full">
            <input type="text" placeholder="Cari buku..." id="search" name="search" value="{{ request('search') }}"
                class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400 bg-gray-100" />
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" d="M21 21l-4.35-4.35M17 10a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
        </div>
        <button type="submit" class="ml-2 bg-[#a06a30] text-white px-4 py-2 rounded-md">Cari</button>
    </form>
</div>
