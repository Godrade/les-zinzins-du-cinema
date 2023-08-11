<?php

namespace App\Api;

use GuzzleHttp\Client;

class Tmdb
{
    private Client $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => config('services.tmdb.url')
        ]);
    }

    public function searchMovie(string $name, string $sort): array
    {
        $response = $this->client->get("search/movie", [
            'query' => [
                'api_key' => config('services.tmdb.key'),
                'query' => $name,
            ],
        ]);

        $movies = json_decode($response->getBody()->getContents(), true)['results'];

        usort($movies, function ($a, $b) use ($sort) {
            return $a[$sort] <= $b[$sort];
        });

        return $movies;
    }

    public function getMovie(string $tmdbID): array
    {
        $response = $this->client->get("movie/{$tmdbID}", [
            'query' => [
                'api_key' => config('services.tmdb.key'),
            ],
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }
}
