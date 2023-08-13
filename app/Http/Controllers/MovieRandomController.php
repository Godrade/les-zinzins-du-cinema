<?php

namespace App\Http\Controllers;

use App\Models\Listing;

class MovieRandomController extends Controller
{
    public function index(Listing $listing)
    {
        $movie = $listing->movies()->inRandomOrder()->first();
        return redirect()->route('search.show', $movie->tmdb_id);
    }
}
