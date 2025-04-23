<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    use HasFactory;

    protected $fillable = ['target_books', 'deadline'];

    // Relasi banyak ke banyak dengan Buku
    public function books()
    {
        return $this->belongsToMany(Book::class);
    }
}
