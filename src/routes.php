<?php

use Src\Core\Route;
use Src\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home.index');
