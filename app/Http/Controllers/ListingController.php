<?php

namespace App\Http\Controllers;

use App\Http\Requests\ListingRequest;
use App\Models\Listing;

class ListingController extends Controller
{
    public function index()
    {
        $listings = Listing::get();
        return view('listings.index', compact('listings'));
    }

    public function store(ListingRequest $request)
    {
        Listing::create($request->validated());
        return redirect()->route('listings.index');
    }

    public function show(Listing $listing)
    {
        $listing->load(['movies' => function ($q) {
            $q->withAvg('votes', 'rating')->orderByDesc('votes_avg_rating');
        }]);

        return view('listings.show', compact('listing'));
    }

    public function edit()
    {

    }

    public function update()
    {

    }
}
