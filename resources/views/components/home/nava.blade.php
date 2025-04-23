<nav class="bg-gray-50 border border-gray-50 pl-2">
    <div class="p-2.5 pl-16 flex items-center w-full">
      <a href="{{route('book.index')}}" class="flex text-[20px] text-">
        <h1 class="font-medium font-inter space-x-2 text-[rgba(160,106,48,0.34)]">nyaman</h1>
        <h1 class="font-semibold font-inter text-[rgb(160,106,48)] ml-1">membaca</h1>
      </a>
      <div class="ml-12 flex items-center gap-x-2 w-full max-w-4xl">
        <x-home.cari />
        </div>
             <div class="ml-auto">
                {{ $slot}}
             </div>
      </div>
      </div>
    </div>
  </nav>