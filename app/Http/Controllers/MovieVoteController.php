<?php

namespace App\Http\Controllers;

use App\Models\Movie;

class MovieVoteController extends Controller
{
    public function store(Movie $movie)
    {
        $movie->votes()->create([
            'user_id' => auth()->id(),
            'rating' => request('vote'),
        ]);

        return back()->with('success', 'Votre vote a bien été pris en compte.');
    }
}
