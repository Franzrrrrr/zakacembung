<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Notifications\Notifiable;

class Book extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'books';
    protected $primaryKey = 'id';
    protected $guarded = [];
    protected $casts = [
        'status' => 'string',
    ];
    
    // Relasi One-to-Many: Book belongs to one Genre
    public function genre(): BelongsTo
    {
        return $this->belongsTo(Genre::class, 'genre_id');
    }

    public function goal(): BelongsToMany {
        return $this->belongsToMany(Goal::class);
    }

    public function penulis(): BelongsTo {
        return $this->belongsTo(Penulis::class, 'penulis_id');
    }
}
