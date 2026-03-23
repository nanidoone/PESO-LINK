<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::view('/history', 'history')->name('history');
Route::view('/objectives', 'objective')->name('objectives');
