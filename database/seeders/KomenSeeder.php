<?php

namespace Database\Seeders;

use App\Models\Komen;
use App\Models\User;
use App\Models\Penulis;
use App\Models\Book;
use Illuminate\Database\Seeder;

class KomenSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil satu user, penulis, book dari database untuk contoh
        $user = User::first();
        $penulis = Penulis::first();
        $book = Book::first();

        // Buat pengecekan, supaya tidak error kalau kosong
        if ($user && $penulis && $book) {
            Komen::create([
                'komenan' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias, rerum consequatur optio nostrum atque, perferendis ea animi corporis aliquam sit molestiae eos voluptates fuga, magnam pariatur ipsa provident et repellat.',
                'user_id' => $user->id,
                'penulis_id' => $penulis->id,
                'book_id' => $book->id,
            ]);
        } else {
            // Kalau tidak ada user/penulis/book, munculkan pesan error
            echo "User / Penulis / Book belum ada. Tidak bisa seeding komen.";
        }
    }
}
