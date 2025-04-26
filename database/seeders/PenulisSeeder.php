<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenulisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $penulis = [
            ['name' => 'Pramoedya Ananta Toer', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Chairil Anwar', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Tere Liye', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Andrea Hirata', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Dewi Lestari', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Habiburrahman El Shirazy', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Sapardi Djoko Damono', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'NH Dini', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Ahmad Tohari', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Goenawan Mohamad', 'created_at' => now(), 'updated_at' => now()],
        ];

        // Masukkan data penulis ke tabel
        DB::table('penulis')->insert($penulis);
    }
}
