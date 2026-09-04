<?php

use Src\Core\Routing\Route;
use Src\Http\Controllers\CalendarController;
use Src\Http\Controllers\CompletedController;
use Src\Http\Controllers\HomeController;
use Src\Http\Controllers\LoginController;
use Src\Http\Controllers\ProjectDetailController;
use Src\Http\Controllers\ProjectsController;
use Src\Http\Controllers\SettingsController;
use Src\Http\Controllers\SignupController;
use Src\Http\Controllers\TaskDetailController;
use Src\Http\Controllers\TasksController;

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::prefix('/signup')->group(function () {
    Route::get('/', [SignupController::class, 'index'])->name('signup.index');
    Route::post('/', [SignupController::class, 'store'])->name('signup.store');
});

// ----

Route::get('/calendar', [CalendarController::class, 'index'])->name('calendar.index');
Route::get('/completed', [CompletedController::class, 'index'])->name('completed.index');
Route::get('/projects', [ProjectsController::class, 'index'])->name('projects.index');
Route::get('/project-detail', [ProjectDetailController::class, 'index'])->name('project-detail.index');
Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
Route::get('/task-detail', [TaskDetailController::class, 'index'])->name('task-detail.index');
Route::get('/tasks', [TasksController::class, 'index'])->name('tasks.index');

Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');

Route::post('/logout', [LoginController::class, 'destroy'])->name('login.destroy');
