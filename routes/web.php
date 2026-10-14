<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;

Route::get('/', function () {
    return view('welcome');
});

Route::get(
    '/say/{message?}',
    [SiteController::class, 'say']
)->name('site.say');
