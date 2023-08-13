<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    protected $fillable = [
        'title',
        'description',
        'color',
    ];

    public function movies()
    {
        return $this->belongsToMany(Movie::class);
    }
}
