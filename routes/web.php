<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\StatsController;

//cases
use App\Http\Controllers\CountryController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\FilterController;
//-------

Route::get('/', function () {
    return view('welcome');
});

//lab2 cases
Route::get(
    '/say/{message?}',
    [SiteController::class, 'say']
)->name('site.say');

Route::get(
    '/entry',
    [SiteController::class, 'entry']
)->name('entry.form');

Route::post(
    '/entry',
    [SiteController::class, 'entryStore']
)->name('entry.store');

Route::view(
    '/about',
    'site.about'
)->name('site.about');

//-----------------------------------

//lab3 cases
Route::resource(
    'country',
    CountryController::class
);
//------------------------------------

//lab5 cases
Route::get(
    '/blog/admin',
    [BlogController::class, 'admin']
)->name('blog.admin');
Route::resource('blog', BlogController::class);
//------------------------------------

//lab6 cases
Route::resource('filters', FilterController::class)
    ->except(['show']);
//------------------------------------
Route::resource('movies', MovieController::class);
Route::controller(\App\Http\Controllers\MovieTranslationController::class)
    ->prefix('movies/{movie}/translations/{lang}')
    ->where(['lang' => '[a-z]{2,3}'])
    ->group(function () {
        Route::get('/', 'edit')->name('movies.translations.edit');
        Route::put('/', 'update')->name('movies.translations.update');
    });

Route::get('/contact', [SiteController::class, 'contact'])
    ->name('contact.form');

Route::post('/contact', [SiteController::class, 'contactSubmit'])
    ->name('contact.submit');

Route::get('/stats',[StatsController::class, 'pages'])
    ->name('stats.pages');

Route::get(
    '/stats/detail',
    [StatsController::class, 'detail']
)->name('stats.detail');

Route::get('/stats/movies', [StatsController::class, 'movies'])
    ->name('stats.movies');
