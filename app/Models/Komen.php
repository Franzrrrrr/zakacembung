<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Komen extends Model
{

    protected $table = 'komens';
    protected $primaryKey = 'id';
    protected $guarded = [

    ];


    public function buku(): BelongsTo{
        return $this->belongsTo(Book::class);
    }

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function penulis(): BelongsTo{
        return $this->belongsTo(Penulis::class);
    }
}
