<?php

namespace App\Models;
use App\Models\Bibliophile;
use App\Models\Book;

use Illuminate\Database\Eloquent\Model;

class Borrowing extends Model
{
    protected $fillable = [
        'bibliophile_id',
        'book_id',
        'borrow_date',
        'return_date',
        'returned',
    ];
    public function bibliophile(){
        return $this->belongsTo(Bibliophile::class);
    }
    public function book(){
        return $this->belongsTo(Book::class);
    }
}
