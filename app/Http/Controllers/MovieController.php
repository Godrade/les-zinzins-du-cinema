<?php

namespace App\Http\Controllers;

use App\Api\Tmdb;
use App\Http\Requests\MovieRequest;
use App\Models\Movie;

class MovieController extends Controller
{
    public function index()
    {
        return view('movies.index');
    }

    public function store(MovieRequest $request, Tmdb $tmdb)
    {
        $movie = $tmdb->getMovie($request->tmdb_id);
        $movie = Movie::create([
            'title' => $movie['title'],
            'tmdb_id' => $movie['id'],
            'imdb_id' => $movie['imdb_id'],
            'poster_path' => $movie['poster_path'],
            'backdrop_path' => $movie['backdrop_path'],
            'isViewed' => false,
        ]);

        $movie->listings()->attach($request->listing_id);

        return redirect()->route('listings.index');
    }
}
