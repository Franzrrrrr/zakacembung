<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Detail Buku</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-outfit">

    <x-font />

    <x-home.nav>
        <a href="{{ url()->previous() }}" class="inline-block px-6 py-2 bg-[#945a33] text-xs text-white rounded hover:bg-gray-300">
            Kembali
        </a>
    </x-home.nav>

    <div class="p-16 space-y-40 justify-items-center">

        <div class="flex flex-col justify-center items-center h-[400px] w-[1120px]">
            <div class="w-full mt-[8%]">
                <h1 class="font-bold text-2xl">{{ $book->judul }}</h1>
                <div class="flex text-sm justify-between">
                    <div class="flex space-x-2">
                        <p>@ 4.1</p>
                        <p>54641 Reviews</p>
                    </div>
                    <div class="flex items-end">
                        <p class="text-sm">Share</p>
                    </div>
                </div>
            </div>

            <div class="bg-gray-100 mt-6 w-full rounded-md flex items-center justify-center p-6">
                {{-- <img src="{{ asset('storage/' . $book->cover_path) }}" alt="{{ $book->judul }}" class="rounded-md shadow-md shadow-slate-500 drop-shadow-xl max-h-96" /> --}}
                <img src="{{url('https://placehold.co/1120x400')}}" alt="">
            </div>
        </div>

        <div class="block w-[1120px]">
            <h1 class="font-bold text-3xl">Description</h1>
            <div class="flex flex-row mt-10 gap-8">
                <div class="w-8/12 space-y-6">
                    <p class="text-base">{{ $book->deskripsi }}</p>
                    <div class="flex flex-row space-x-10 text-sm">
                        @for ($i = 0; $i < 3; $i++)
                            <div class="flex w-40 rounded-md p-2 items-center space-x-2">
                                <img src="{{url('https://placehold.co/400')}}" alt="{{url('https://placehold.co/400')}}" class="rounded-full w-14 h-14">
                                
                                <div>
                                    <h1 class="font-semibold text-gray-500">Publisher</h1>
                                    <p>Jaka sembung</p>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
                <div class="w-4/12 p-4 rounded-md shadow-xl border border-gray-100">
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

                        <div class="flex items-center w-40 p-2 space-x-4">
                            <div class="h-14 w-14 rounded-full bg-slate-400"></div>
                            <h1 class="font-semibold">haha</h1>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="mt-16" />

            <div class="mt-16">
                <h1 class="font-bold text-3xl">Tentang Penulis</h1>
                <p class="mt-8 text-base text-gray-700">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat, sit labore nulla velit quisquam, 
                    ducimus aperiam rerum alias, magni quae optio iusto accusamus laudantium exercitationem quos eveniet 
                    illum magnam soluta?
                </p>
            </div>
        </div>

        <section class="mt-16 w-[1120px]">
            <h2 class="font-bold text-3xl mb-6">Komentar Pengguna</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @forelse ($book->komens as $komen)
                    <div class="bg-white border border-gray-200 p-6 rounded-xl shadow hover:shadow-md transition duration-300">
                        <div class="flex items-center mb-4 space-x-4">
                            
                            <img src="{{url('https://placehold.co/400')}}" class="rounded-full h-12 w-12" alt="">
                            <div>
                                <h3 class="text-gray-800 font-semibold text-sm">{{ $komen->user->name ?? 'Anonim' }}</h3>
                                <span class="text-xs text-gray-400">{{ $komen->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                        <p class="text-sm text-gray-700 leading-relaxed">
                            {{ $komen->komenan }}
                        </p>
                    </div>
                @empty
                    <p class="text-gray-500">Belum ada komentar.</p>
                @endforelse
            </div>
        </section>

        <div class="mt-16 w-[1120px]">
            <h1 class="font-bold text-3xl mb-4">Tulis Komentar</h1>

            <form action="{{ route('komen.store', $book->id) }}" method="POST" class="mb-10">
                @csrf
                <textarea name="komenan" rows="4" class="w-full p-4 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#8c5732]" placeholder="Tulis komentar...">{{ old('komenan') }}</textarea>
                @error('komenan')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
                <button type="submit" class="mt-4 px-6 py-2 bg-[#8c5732] text-white rounded hover:bg-[#734425]">
                    Kirim Komentar
                </button>
            </form>
        </div>
    </div>

</body>
</html>
