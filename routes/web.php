<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::view('/history', 'history')->name('history');
Route::view('/history-of-excellence', 'history-excellence')->name('history-of-excellence');
Route::view('/objectives', 'objective')->name('objectives');
Route::view('/login', 'login')->name('login');
Route::view('/register', 'register')->name('register');
