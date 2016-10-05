<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

use App\ScrapeSite;

Route::get('/', ['uses' => 'PageController@home', 'as' => 'home']);
Route::get('/try', ['uses' => 'PageController@try_dyslexia', 'as' => 'try_dyslexia']);
Route::get('/url', 'UrlController@show');
Route::get('/what', ['uses' => 'PageController@what', 'as' => 'what']);
