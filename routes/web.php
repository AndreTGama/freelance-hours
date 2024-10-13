<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProjectsController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'index'])->name('auth.login');
Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
Route::get('/', [ProjectsController::class, 'index'])->name('projects.index');
Route::get('/project/{project}', [ProjectsController::class, 'show'])->name('projects.show');
