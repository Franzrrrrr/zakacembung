<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-outfit">

    <x-font />

    <x-home.nav>
        <a href="{{ url()->previous() }}" class="inline-block px-6 py-2 bg-[#945a33] text-[12px] text-white rounded hover:bg-gray-300">
            Kembali
        </a>
    </x-home.nav>

    <div class="p-16 space-y-40 justify-items-center">

        <!-- Detail Book -->
        <div class="flex flex-col justify-center items-center h-[400px] w-[1120px]">
            <!-- Heading -->
            <div class="w-full mt-[8%]">
                <h1 class="font-bold text-2xl">{{ $book->judul }}</h1>
                <div class="flex text-[14px] justify-between">
                    <div class="flex space-x-2">
                        <p>@ 4.1</p>
                        <p>54641 Reviews</p>
                    </div>
                    <div class="flex items-end">
                        <p class="text-[14px]">share</p>
                    </div> 
                </div>
            </div>

            <!-- Cover -->
            <div class="bg-gray-100 mt-[3%] w-full rounded-md flex items-center justify-center p-6">
                <img src="{{ asset('storage/' . $book->cover_path) }}" alt="{{ $book->judul }}" class="rounded-md shadow-md shadow-slate-500 drop-shadow-xl max-h-96">
            </div>
        </div>

        <!-- Deskripsi -->
        <!-- Bagian konten utama -->
<div class="block w-[1120px]">
    <h1 class="font-bold text-[30px]">Description</h1>

    <div class="flex flex-row mt-10 gap-8">
        <!-- Kiri: Cover + deskripsi -->
        <div class="w-8/12 space-y-6"   >

            <!-- Deskripsi -->
            <p class="text-[16px]">{{ $book->deskripsi }}</p>

            <!-- Penulis atau Info Tambahan -->
            <div class="flex flex-row space-x-4 text-[18px]">
                @for ($i = 0; $i < 3; $i++)
                    <div class="flex flex-row w-40 rounded-md p-2 place items-center">
                        <img class="h-14 w-14 rounded-full bg-slate-400"></img>
                        <div class="block">
                            <h1 class="font-semibold ml-4 text-gray-500">haha</h1>
                            <p class="ml-4">hehe</p>
                        </div>
                        
                    </div>
                @endfor
            </div>
        </div>

        <!-- Kanan: Box aksi -->
        <div class="w-4/12 p-4 rounded-md shadow-xl border-gray-100 border-2">
            <div class="flex flex-col justify-center gap-y-4 h-full w-full">
                <div class="flex justify-between">
                    <p>haha</p>
                    <p>hehe</p>
                </div>

                <button class="bg-[#8c5732] w-full p-2 text-white rounded-md">
                    Ingin melihat?
                </button>

                <button class="border-[#8c5732] p-2 border-2 rounded-md">
                    Beli sekarang &gt;
                </button>  

                <div class="flex flex-row items-center w-40 p-2">
                    <div class="h-14 w-14 rounded-full bg-slate-400"></div>
                    <h1 class="font-semibold ml-4">haha</h1>
                </div>
            </div>
        </div>
    </div>

    <hr class="mt-16" />

    <!-- Tentang Penulis -->
    <div class="mt-16">
        <h1 class="font-bold text-[30px]">Tentang Penulis</h1>
        <p class="mt-8">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Repellat, sit labore nulla velit quisquam, 
            ducimus aperiam rerum alias, magni quae optio iusto accusamus laudantium exercitationem quos eveniet 
            illum magnam soluta?
        </p>
    </div>
</div>

    </div>

</body>
</html>
