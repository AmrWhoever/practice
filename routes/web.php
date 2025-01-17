<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomepageController;
use Inertia\Inertia;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/homepage', [HomepageController::class, 'index'])->name('homepage');

Route::get('/home', function () {
    return Inertia::render('Homepage');
});
