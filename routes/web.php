<?php

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
    return [
      'status' => 'sucesss',
      'name' => config('app.name'),
      'version' => config('app.version'),
      'env' => config('app.env')
    ];
});
