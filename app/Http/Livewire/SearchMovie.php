<?php

namespace App\Http\Livewire;

use App\Services\TheMovieDB\TheMovieDB;
use Livewire\Component;

/**
 * This component displays the search input and shows the
 * results in a dropdown. It's basically a interative post
 * request that executes when the length of the search string
 * is higher than 4. The search input is given as a query thanks to
 * the `$queryString`.
 */
class SearchMovie extends Component
{
    public string $search = '';

    protected $queryString = ['search'];

    public function render()
    {
        $results = [];
        if (strlen($this->search) > 4) {
            $results = app(TheMovieDB::class)->search($this->search);
        }

        return view('livewire.search-movie', [
            'results' => collect($results)->take(6)
        ]);
    }
}
