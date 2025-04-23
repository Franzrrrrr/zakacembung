<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Buat user dummy
        $faker = Faker::create();

        User::create([
            'name' => $faker->name(),
            'email' => $faker->unique()->safeEmail(),
            'password' => bcrypt('password'),
        ]);

        // Jalankan seeder genre dan book
        $this->call([
            GenreSeeder::class,
            BookSeeder::class,
        ]);
    }
}
