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

    public function show()
    {

    }

    public function edit()
    {

    }

    public function update()
    {

    }
}
