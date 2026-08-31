<?php

use Src\Core\Route;

Route::get('/', function () {
    return view('home');
})->name('home.index');
