<?php

namespace App\Models;
use App\Models\Genre;

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

    protected $casts = [
    'publication_date' => 'date:Y-m-d',     
   
];

    public function genre(){
        return $this->belongsTo(Genre::class);
    }
}


