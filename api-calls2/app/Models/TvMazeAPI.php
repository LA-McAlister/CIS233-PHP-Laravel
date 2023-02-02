<?php

namespace App\Models;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Collection;
use App\Models\Episode;

class TvMazeAPI {
    public static function fetchEpisodes($shownumber){
        $episodeResponse = Http::get("https://api.tvmaze.com/shows/$shownumber/episodes")->json();

        //dd($charactersData);

        $episodeCollection = collect($episodeResponse);
        
        return $episodeCollection->map(function($episode){
            return new Episode($episode['name'], $episode['image']['medium'], $episode['season'], $episode['number'], $episode['summary']);
        });
    }
}