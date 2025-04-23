<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            GenreSeeder::class,
        ]);

        Book::factory(20)->create();
    }
}
