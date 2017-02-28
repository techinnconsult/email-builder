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
    return view('welcome');
});

Route::post('/preview', 'HTMLController@preview');
Auth::routes();
Route::group(['middleware' => 'guest'], function () {
    Route::post('/preview', 'HTMLController@preview');
    Route::post('/add/', 'HTMLController@add');
});
Route::get('/home', 'HomeController@index');
