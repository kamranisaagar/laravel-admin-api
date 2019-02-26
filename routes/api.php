<?php

use Illuminate\Http\Request;

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

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::get('refresh', 'AuthController@refresh');
    Route::get('user', 'AuthController@user');
});

Route::group([
    'middleware' => 'api'
], function ($router) {
    Route::resource('users', 'UserController');
    Route::resource('pages', 'PageController');
    Route::resource('countries', 'CountryController');
    Route::resource('events', 'EventController');
    Route::get('statistics/customers', 'StatisticsController@getCustomersCountriesStatistics');
});
