<?php

namespace App\Http\Controllers;

use App\Api\Tmdb;
use App\Models\Listing;
use App\Models\Movie;

class SearchMovieController extends Controller
{
    public function index(Tmdb $tmdb)
    {
        $movies = $tmdb->searchMovie(request('name'), 'popularity');
        return view('search.index', compact('movies'));
    }

    public function show(Tmdb $tmdb, string $tmdbID)
    {
        $result = $tmdb->getMovie($tmdbID);
        $listings = Listing::where('isSelectable', true)->get();

        $movie = Movie::where('tmdb_id', $tmdbID)
            ->with('votes')
            ->first() ?? null;

        return view('search.show', compact('result', 'listings', 'movie'));
    }
}
