<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Penulis;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            GenreSeeder::class,
            PenulisSeeder::class,
        ]);

        Book::factory(20)->create();
    }
}
