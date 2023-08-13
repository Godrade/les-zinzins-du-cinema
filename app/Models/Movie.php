<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = [
        'title',
        'tmdb_id',
        'imdb_id',
        'poster_path',
        'backdrop_path',
        'isViewed',
    ];

    public function listings()
    {
        return $this->belongsToMany(Listing::class);
    }
}
