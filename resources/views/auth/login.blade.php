<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body class="grid grid-cols-2 h-screen">

    <!-- FORM LOGIN -->
    <div class="flex justify-center items-center">
        <form action="{{ route('login.store') }}" method="POST" class="w-[55%]">
            @csrf
            <h1 class="text-[36px] font-[600] font-inter text-center">Login</h1>

            <div class="block mt-10">
                <label for="name" class="block text-sm font-medium text-gray-700 text-[14px]">Nama</label>
                <input type="text" name="name" id="name" class="mt-2 block w-full border border-gray-300 rounded-md placeholder:text-gray-300 p-2 text-sm" placeholder="Masukkan nama anda" required>

                <label for="email" class="mt-4 block text-sm font-medium text-gray-700 text-[14px]">Email</label>
                <input type="email" name="email" id="email" class="mt-2 block w-full border border-gray-300 rounded-md placeholder:text-gray-300 p-2 text-sm" placeholder="Masukkan email anda" required>

                <label for="password" class="mt-4 block text-sm font-medium text-gray-700 text-[14px]">Password</label>
                <input type="password" name="password" id="password" class="mt-2 block w-full border border-gray-300 rounded-md placeholder:text-gray-300 p-2 text-sm" placeholder="Masukkan password anda" required>
                
                <button type="submit"
                    class="bg-[rgb(135,92,26)] w-full mt-6 rounded-md border border-[rgb(88,59,15)] shadow-lg text-white font-bold py-2">
                    Login
                </button>
            </div>
        </form>
    </div>

    <!-- SIDE BACKGROUND -->
    <div class="bg-[rgb(243,210,161)] rounded-l-2xl shadow-lg h-screen flex justify-center items-center">
        <img src="{{asset('assets/bookshelf.png')}}" class="w-142 h-92" alt="loginbook">
    </div>
</body>
</html>