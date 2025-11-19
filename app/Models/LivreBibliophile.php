<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LivreBibliophile extends Model
{
    protected $table = 'livres_bibliophiles';

    protected $fillable = [
        'bibliophile_id',
        'livre_id',
    ];
}
