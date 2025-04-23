<?php
// database/seeders/GenreSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenreSeeder extends Seeder
{
    public function run(): void
    {
        $genres = [
            'Romance', 'Action', 'Adventure', 'Horror', 'Comedy',
            'Drama', 'Thriller', 'Mystery', 'Documentary', 'Animation',
            'Family', 'Sci-Fi', 'Western', 'Crime', 'Fantasy', 'History', 'Music'
        ];

        foreach ($genres as $genre) {
            Genre::create(['name' => $genre]);
        }
    }
}
