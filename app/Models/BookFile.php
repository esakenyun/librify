<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class BookFile extends Model
{
    use HasFactory;

    protected $table = 'bookfiles';

    protected $fillable = [
        'book_id',
        'name',
        'bookfile'
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
