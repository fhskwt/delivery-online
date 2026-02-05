<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('/pages/home/index');
});

Route::get('/menu', function () {
    return view('pages/menu/index'); // вернет файл resources/views/menu.blade.php
})->name('menu.index');
