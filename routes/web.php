<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\MovieController;

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

Route::view(
    '/contact',
    'site.contact'
)->name('site.contact');
//-----------------------------------

//lab3 cases
use App\Http\Controllers\CountryController;
Route::resource(
    'country',
    CountryController::class
);
//------------------------------------

//lab4 cases
use App\Http\Middleware\TrackVisit;
Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\StatsController;
Route::get('/stats',[StatsController::class, 'pages'])
    ->name('stats.pages');

Route::get(
    '/stats/detail',
    [StatsController::class, 'detail']
)->name('stats.detail');
//-------------------------------------

Route::resource('movies', MovieController::class);

Route::get('/contact', [SiteController::class, 'contact'])
    ->name('contact.form');

Route::post('/contact', [SiteController::class, 'contactSubmit'])
    ->name('contact.submit');
