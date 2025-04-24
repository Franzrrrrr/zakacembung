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
<body class="font-outfit">
    <x-home.nava> <a href="{{ url()->previous() }}" class="inline-block px-4 py-2 bg-[#945a33] text-white rounded hover:bg-gray-300">
    ← Kembali
</a></x-home.nava >
    <div class="flex flex-col justify-center items-center p-16">
        {{-- heading --}}
        <div class="bg-green-200 w-full">
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

        {{-- cover --}}

        <div class="bg-sky-500 h-auto mt-[5%] w-full rounded-md flex items-center justify-center">
            <img src="{{'storage/' . $book->cover_path, $book->id}}" alt="{{$book->judul}}">
        </div>
        {{-- <p>{{ $book->penulis }}</p>
        <img src="{{$book->cover_path, $book->id}}" alt="">
        <p class="">{{ $book->genre->name }}</p>
        <p class="">{{ $book->deskripsi }}</p>
        </div> --}}
    </div>
</body>
</html>