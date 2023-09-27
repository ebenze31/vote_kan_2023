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

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// show_score_public
Route::get('/', 'Vote_kan_scoresController@show_score_public');
Route::get('/show_score_public', 'Vote_kan_scoresController@show_score_public');

// Line login on WEB
Route::get('login/line', 'Auth\LoginController@redirectToLine')->name('login.line');
Route::get('login/line/callback', 'Auth\LoginController@handleLineCallback');

// Line login by LINE OA
Route::get('/vote_kan_login/{go_to}', 'Vote_kan_data_stationsController@vote_kan_login');
Route::get('/vote_kan_login/login/line/{go_to}', 'Auth\LoginController@redirectToLine_vote_kan_login');

Route::middleware(['auth'])->group(function () {

    Route::get('/vote_kan_index', 'HomeController@vote_kan_index');
    Route::resource('vote_kan_all_scores', 'Vote_kan_all_scoresController');
    Route::resource('vote_kan_stations', 'Vote_kan_stationsController');
    Route::resource('vote_kan_scores', 'Vote_kan_scoresController');
    Route::get('vote_kan_admin/show_score', 'Vote_kan_scoresController@show_score');
    Route::resource('vote_kan_data_stations', 'Vote_kan_data_stationsController');
    Route::get('vote_kan_stations_not_registered', 'Vote_kan_data_stationsController@not_registered'); // index

});