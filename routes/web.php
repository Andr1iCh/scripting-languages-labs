<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\MovieTranslationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StatsController;

//cases
use App\Http\Controllers\CountryController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\UserController;
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

// Адміністративні маршрути
Route::middleware('auth')->group(function () {
    Route::get('/blog/admin', [
        BlogController::class, 'admin'
    ])->name('blog.admin');

    Route::get('/blog/{blog}/tags', [
        BlogController::class, 'tags'
    ])->name('blog.tags');

    Route::post('/blog/{blog}/tags', [
        BlogController::class, 'tagsStore'
    ])->name('blog.tags.store');

    Route::resource('blog', BlogController::class)
        ->except(['index', 'show']);

    Route::resource('filters', FilterController::class)
        ->except(['show']);

    Route::get('/users', [
        UserController::class, 'index'
    ])->name('users.index');
});

// Публічні маршрути
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{blog}', [BlogController::class, 'show'])->name('blog.show');

Route::middleware('auth')->group(function () {
    Route::get('/movies/admin', [MovieController::class, 'admin'])->name('movies.admin');
    Route::resource('movies', MovieController::class)->except(['index', 'show']);

    Route::controller(MovieTranslationController::class)
        ->prefix('movies/{movie}/translations/{lang}')
        ->where(['lang' => '[a-z]{2,3}'])
        ->group(function () {
            Route::get('/', 'edit')->name('movies.translations.edit');
            Route::put('/', 'update')->name('movies.translations.update');
        });
});

Route::get('/now-playing', [MovieController::class, 'index'])->name('movies.now-playing');
Route::get('/coming-soon', [MovieController::class, 'index'])->name('movies.coming-soon');
Route::resource('movies', MovieController::class)->only(['index', 'show']);

Route::get('/contact', [SiteController::class, 'contact'])
    ->name('contact.form');

Route::post('/contact', [SiteController::class, 'contactSubmit'])
    ->name('contact.submit');

Route::get('/stats',[StatsController::class, 'pages'])
    ->middleware('auth')->name('stats.pages');

Route::get(
    '/stats/detail',
    [StatsController::class, 'detail']
)->middleware('auth')->name('stats.detail');

Route::get('/stats/movies', [StatsController::class, 'movies'])
    ->middleware('auth')->name('stats.movies');

Route::view('/dashboard', 'dashboard')
    ->middleware('auth')
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
