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
Route::get('/', 'HomeController@index')->middleware(RecordVisits::class)->name('home');

// Secondary pages
Route::get('about-this-site', 'HomeController@about')->name('about');
Route::get('monopoly-title-deed-cards', 'HomeController@deeds')->name('deeds');


/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::post('dashboard/refresh', 'DashboardController@refresh')->name('dashboard.refresh');
});
