<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TareaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'index'])->name('login.index');

Route::get('/home', [HomeController::class, 'index'])->name('home.index');

Route::get('/categorias', [CategoryController::class, 'index'])->name('categoria.index');

Route::get('/tareas', [TareaController::class, 'index'])->name('tareas.index');
