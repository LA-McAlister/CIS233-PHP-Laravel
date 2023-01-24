<?php

namespace App\Models;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Collection;

class TvMazeAPI {
    public static function fetchEpisodes(){
        $charactersData = Http::get('https://api.tvmaze.com/shows/1/episodes')->json();

        dd($charactersData);

        $charactersCollection = collect($JsonResult);
        
        return $charactersCollection->map(function($charactersData){
            return new Episode($episodes->name);
        });
    }
}