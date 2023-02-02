<?php

namespace App\Models;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Collection;

class BreakingBadAPI {
    public static function fetchCharacters(){
        $charactersData = Http::get('https://api.tvmaze.com/shows/1/episodes')->json();

        dd($charactersData);

        $charactersCollection = collect($JsonResult);
        
        return $charactersCollection->map(function($charactersData){
            return new Character($character->name);
        });
    }
}