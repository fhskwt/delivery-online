<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Route;

/*Route::get('/', function () {
    return view('/pages/home/index');
});*/

Route::get('/', [HomeController::class, 'index']);

//Route::get('/menu', function () {
//    return view('pages/menu/index'); // вернет файл resources/views/menu.blade.php
//})->name('menu.index');

//Route::view('/menu', 'pages.menu.index')->name('menu');
Route::get('/menu', [MenuController::class, 'index']);

Route::view('/cart', 'pages.cart.index');

Route::get('/menu/{slug}', [MenuController::class, 'category']);

Route::middleware('auth')->group(function () {
    Route::view('/profile', 'pages.profile.index')->name('profile');
});

Route::middleware('guest')->group(function () {
    Route::get('/auth', function () {
        return view('pages.auth.index');
    })->name('auth');
});

