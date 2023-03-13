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
        
        return $episodeCollection->map(function ($input) use ($shownumber) {
            $image = isset($input['image']['medium']) ? $input['image']['medium'] : "";
            return Episode::firstOrCreate(['name' => $input['name'], 'image' => $image, 'season' => $input['season'], 'episode' => $input['number'], 'show_number' => $shownumber, 'summary' => strip_tags($input['summary'])]);
        }, $episodeCollection);
    }
}

//firstOrCreate will try to locate an object that already exists. If it doesnt exist, it will create it.