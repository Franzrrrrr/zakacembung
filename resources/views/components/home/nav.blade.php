<nav class="bg-gray-50 border border-gray-50 pl-2">
    <div class="p-2.5 pl-16 flex items-center w-full">
      <a href="#" class="flex text-[20px] text-">
        <h1 class="font-medium font-inter space-x-2 text-[rgba(160,106,48,0.34)]">nyaman</h1>
        <h1 class="font-semibold font-inter text-[rgb(160,106,48)] ml-1">membaca</h1>
      </a>
      <div class="ml-12 flex items-center gap-x-2 w-full max-w-4xl">
        <x-home.searching-tool />
        </div>
        <div class="ml-8 flex gap-2">
          <a href="{{ route('login.store') }}" class="font-outfit bg-[rgb(160,106,48)] pl-6 rounded-md text-white font-md px-4 py-2">
            SignIn  
          </a>
        <a href="{{ route('register.store') }}" class="font-outfit bg-[rgb(160,106,48)] pl-6 rounded-md text-white font-md px-4 py-2">
          SignUp
        </a>        
      </div>
      </div>
    </div>
  </nav>