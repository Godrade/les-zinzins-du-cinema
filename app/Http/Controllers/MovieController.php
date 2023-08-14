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
        if (Movie::where('tmdb_id', $request->tmdb_id)->exists()) {
            return redirect()->route('search.show', $request->tmdb_id)->withErrors("Le film est déjà dans une liste.");
        }

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

        return redirect()->route('search.show', $movie->tmdb_id)->with('success', 'Le film a bien été ajouté à la liste.');
    }

    public function update(MovieRequest $request, Movie $movie)
    {
        if ($movie->listings()->where('listing_id', 1)->exists()) {

            $movie->update([
                'isViewed' => true,
            ]);

            $movie->listings()->detach();
            $movie->listings()->attach(2);

            return back()->with('success', 'Le film a bien été marqué comme vu.');
        }

        if ($request->listing_id == 2) {
            return back()->withErrors("Vous ne pouvez pas marquer un film comme vu s'il n'est pas dans la liste 'À voir'.");
        }

        $movie->listings()->detach();
        $movie->listings()->attach($request->listing_id);

        return back()->with('success', 'Le film a bien été déplacé.');
    }

    public function destroy(Movie $movie)
    {
        $movie->listings()->detach();
        $movie->delete();

        return back()->with('success', 'Le film a bien été supprimé.');
    }
}
