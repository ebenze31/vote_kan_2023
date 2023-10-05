<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/get_location_kan/{amphoe}/show_tambon','Vote_kan_data_stationsController@show_tambon');
Route::get('/get_location_kan/{amphoe}/{tambon}/show_polling_station_at','Vote_kan_data_stationsController@show_polling_station_at');
Route::get('/get_data_show_score','Vote_kan_scoresController@get_data_show_score');
Route::get('submit_quantity_person/{quantity_person}/{id_station}', 'Vote_kan_stationsController@submit_quantity_person');

Route::get('change_status/{name_amphoe}/{status}', 'Vote_kan_all_scoresController@change_status');

