<?php

namespace App\Models;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Collection;

class TvMazeAPI {
    public static function fetchEpisodes($shownumber){
        $charactersData = Http::get("https://api.tvmaze.com/shows/$shownumber/episodes")->json();

        dd($charactersData);

        $charactersCollection = collect($charactersData);
        
        return $charactersCollection->map(function($charactersData){
            return new Episodes($episode['name'], $episode['image']['medium'], $episode['season'], $episode['$episode'], $episode['summary']) ;
        });
    }
}