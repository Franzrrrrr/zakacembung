<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Penulis extends Model
{
    protected $table = 'penulis';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name'
    ];

    public function book(): BelongsTo {
        return $this->BelongsTo(Book::class);
    }
}
