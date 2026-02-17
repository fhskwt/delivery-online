<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('/pages/home/index');
});

//Route::get('/menu', function () {
//    return view('pages/menu/index'); // вернет файл resources/views/menu.blade.php
//})->name('menu.index');

Route::view('/menu', 'pages.menu.index')->name('menu');

Route::view('/cart', 'pages.cart.index');

Route::middleware('auth')->group(function () {
    Route::view('/profile', 'pages.profile.index')->name('profile');
});

Route::middleware('guest')->group(function () {
    Route::get('/auth', function () {
        return view('pages.auth.index');
    })->name('auth');
});

