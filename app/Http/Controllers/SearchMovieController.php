<?php

namespace App\Http\Controllers;

use App\Api\Tmdb;

class SearchMovieController extends Controller
{
    public function index(Tmdb $tmdb)
    {
        $movies = $tmdb->searchMovie(request('name'), 'popularity');
        return view('search.index', compact('movies'));
    }

    public function show(Tmdb $tmdb, string $tmdbID)
    {
        $movie = $tmdb->getMovie($tmdbID);
        dd($movie);
        return view('search.show', compact('movie'));
    }
}
