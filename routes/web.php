<?php

use AdrianBav\Traffic\Middlewares\RecordVisits;

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

// Home page
Route::get('/', 'HomeController@index')->middleware(RecordVisits::class);

// Secondary pages
Route::get('about', 'HomeController@about');
Route::get('monopoly', 'HomeController@monopoly');
