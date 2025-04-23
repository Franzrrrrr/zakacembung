<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    protected $model = Book::class;

    public function definition()
    {
        return [
            'judul' => ucfirst($this->faker->unique()->words(3, true)), 
            'penulis' => $this->faker->unique()->name,
            'cover_path' => $this->faker->unique()->imageUrl(640, 480, 'books', true),
            'genre_id' => Genre::inRandomOrder()->first()->id,
            'deskripsi' => $this->faker->unique()->paragraphs(2,\true),
            'status' => $this->faker->randomElement(['belum_dibaca', 'sedang_dibaca', 'selesai_dibaca']),
            'tahun' => $this->faker->unique()->year,
        ];
    }
}
