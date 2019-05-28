<?php

use AdrianBav\Traffic\Middlewares\RecordVisits;

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

// Home page
Route::get('/', 'HomeController@index')->middleware(RecordVisits::class);

// Secondary pages
Route::get('about', 'HomeController@about');
Route::get('monopoly', 'HomeController@monopoly');

// Dashboard
Route::get('dashboard', 'DashboardController@index');
Route::post('dashboard/refresh', 'DashboardController@refresh');
