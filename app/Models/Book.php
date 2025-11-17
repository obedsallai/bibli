<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title',
        'author',
        'genre_id',
        'available_copies',
        'publication_date',
        'status',
    ];
}


