<?php

namespace App\Services\TheMovieDB;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class TheMovieDB
{
    private string $apiKey;
    private string $base = 'https://api.themoviedb.org/3';

    public function __construct() {
        $this->apiKey = config('services.tmdb.key');
    }

    public function getTrendingMovies()
    {
        $data = Http::withToken($this->apiKey)
            ->get($this->base . '/trending/movie/day')
            ->json()['results'];

        return $this->filterMovies($data);
    }

    public function findMovie(string $id)
    {
        $data = Http::withToken($this->apiKey)
            ->get($this->base . '/movie/' . $id . '?append_to_response=credits,videos,images')
            ->json();

        return $this->filterMovie($data);
    }

    public function search(string $movie)
    {
        $data = Http::withToken($this->apiKey)
            ->get($this->base . '/search/movie?query=' . $movie)
            ->json()['results'];

        return $this->filterMovies($data);
    }

    /**
     * Filters the movie to a usefull array
     * @param $movies
     * @return array
     */
    private function filterMovies($movies)
    {
        return collect($movies)->take(10)->map(function ($movie) {
            return collect($movie)->merge([
                'poster_path' => $movie['poster_path'] ? 'https://image.tmdb.org/t/p/w500' . $movie['poster_path'] : '',
                'link' => $movie['id'] . '/' . Str::slug($movie['title'])
            ])->only('id', 'title', 'link', 'poster_path');
        });
    }

    /**
     * Filter the movie to a usefull array
     * @param $movie
     * @return array
     */
    private function filterMovie($movie)
    {
        return collect($movie)->merge([
            'poster_path' => $movie['poster_path'] ? 'https://image.tmdb.org/t/p/w500' . $movie['poster_path'] : '',
            'vote_average' => $movie['vote_average'] * 10 .'%',
            'genres' => collect($movie['genres'])->pluck('name')->flatten()->implode(', '),
        ])->only('id', 'title', 'poster_path', 'overview', 'budget', 'release_date', 'videos', 'vote_average', 'genres', 'tagline');
    }
}
