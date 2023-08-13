<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MovieVote extends Model
{
    protected $fillable = [
        'movie_id',
        'user_id',
        'rating',
    ];

    public function movie(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Movie::class);
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
