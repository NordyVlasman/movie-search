<?php

namespace App\Http\Controllers;

use App\Services\TheMovieDB\TheMovieDB;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function __invoke()
    {
        $movies = app(TheMovieDB::class)->getTrendingMovies();
        return view('home', compact('movies'));
    }
}
