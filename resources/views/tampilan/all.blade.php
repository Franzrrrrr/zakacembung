        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Semua Buku</title>
            @vite(['resources/css/app.css', 'resources/js/app.js'])
            <x-font></x-font>
        </head>

        <body class="bg-white text-gray-800 font-outfit">

            <!-- Navbar -->
            <div class="w-full">
                <x-home.nava />
            </div>

            <!-- Sidebar + Main Content -->
            <x-rebuku.sideb  :genres="$genres" :books="$books" :penulis="$penulis" />
        </body>
        </html>
