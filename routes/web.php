<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/vote_kan_login/{user_from}', 'Vote_kan_data_stationsController@vote_kan_login');
// Route::get('/vote_kan_login/login/line/{user_from}', 'Auth\LoginController@redirectToLine_vote_kan_login');

Route::resource('vote_kan_all_scores', 'Vote_kan_all_scoresController');
Route::resource('vote_kan_stations', 'Vote_kan_stationsController');
Route::resource('vote_kan_scores', 'Vote_kan_scoresController');
Route::get('vote_kan_admin/show_score', 'Vote_kan_scoresController@show_score');
Route::resource('vote_kan_data_stations', 'Vote_kan_data_stationsController');
Route::get('vote_kan_stations_not_registered', 'Vote_kan_data_stationsController@not_registered'); // index