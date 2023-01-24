<?php

namespace App\Models;
use Illuminate\Support\Facades\Route;
use App\Models\TvMazeAPI;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

// Route::get('/episodes', function () {

//     $episodes = TvMazeAPI::fetchEpisodes();
//     return view('episodes/index', ['episodes' => $episodes]);
// });

Route::get('/episodes', function () {
    $shownumber = intval(request()->query('shownumber'));
    $shownumber = $shownumber < 1 ? 1 : $shownumber
    $episodes = TvMazeAPI::fetchEpisodes($shownumber);
    return view('episodes', ['episodes' => $episodes]);
});