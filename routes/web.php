<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TareaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'index'])->name('login.index');
Route::post('/login', [AuthController::class, 'login'])->name('login.login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/register', [AuthController::class, 'register'])->name('user.register');

Route::get('/home', [HomeController::class, 'index'])->name('home.index');
Route::get('/registrarse', [AuthController::class, 'registrarse'])->name('login.registrarse');
Route::get('/categorias', [CategoryController::class, 'index'])->name('categoria.index');
Route::get('/tareas', [TareaController::class, 'index'])->name('tareas.index');

Route::post('/categorias', [CategoryController::class, 'store'])->name('categorias.store');
