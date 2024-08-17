<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::middleware('guest')->group(function(){
    Route::get('/login')->name('login');
    Route::post('/login');
    Route::get('/register')->name('register');
    Route::post('/register');
});

// auth path
Route::middleware(['auth'])->group(function(){
    Route::get('logout')->name('logout');

    Route::prefix('dashboard')->group(function(){
        Route::get('/')->name('dashboard');
    });
});