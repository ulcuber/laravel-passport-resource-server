<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('welcome');

Route::get('login', 'AuthController@login')->name('login');
Route::get('/auth/callback', 'AuthController@callback')->name('auth.callback');

Route::middleware('auth')->group(function () {
    Route::get('logout', 'AuthController@logout')->name('logout');
});
