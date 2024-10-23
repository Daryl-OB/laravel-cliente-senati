<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MetodoController;
use App\Http\Controllers\PromocionController;
use App\Http\Controllers\SubscripcionControlller;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('/categoria', [CategoriaController::class, 'index'])->name('categoria.index');
Route::get('/categoria/create', [CategoriaController::class, 'create'])->name('categoria.create');
Route::post('/categoria/store', [CategoriaController::class, 'store'])->name('categoria.store');
Route::get('/categoria/edit/{id}', [CategoriaController::class, 'edit'])->name('categoria.edit');
Route::put('/categoria/update', [CategoriaController::class, 'update'])->name('categoria.update');
Route::delete('/categoria/destroy/{id}', [CategoriaController::class, 'destroy'])->name('categoria.destroy');

Route::get('/promocion', [PromocionController::class, 'index'])->name('promocion.index');
Route::get('/promocion/create', [PromocionController::class, 'create'])->name('promocion.create');
Route::post('/promocion/store', [PromocionController::class, 'store'])->name('promocion.store');
Route::get('/promocion/edit/{id}', [PromocionController::class, 'edit'])->name('promocion.edit');
Route::put('/promocion/update', [PromocionController::class, 'update'])->name('promocion.update');
Route::delete('/promocion/destroy/{id}', [PromocionController::class, 'destroy'])->name('promocion.destroy');

Route::get('/cliente', [ClienteController::class, 'index'])->name('cliente.index');
Route::get('/cliente/create', [ClienteController::class, 'create'])->name('cliente.create');
Route::post('/cliente/store', [ClienteController::class, 'store'])->name('cliente.store');
Route::get('/cliente/edit/{id}', [ClienteController::class, 'edit'])->name('cliente.edit');
Route::put('/cliente/update', [ClienteController::class, 'update'])->name('cliente.update');
Route::delete('/cliente/destroy/{id}', [ClienteController::class, 'destroy'])->name('cliente.destroy');

Route::get('/metodo', [MetodoController::class, 'index'])->name('metodo.index');
Route::get('/metodo/create', [MetodoController::class, 'create'])->name('metodo.create');
Route::post('/metodo/store', [MetodoController::class, 'store'])->name('metodo.store');
Route::get('/metodo/edit/{id}', [MetodoController::class, 'edit'])->name('metodo.edit');
Route::put('/metodo/update', [MetodoController::class, 'update'])->name('metodo.update');
Route::delete('/metodo/destroy/{id}', [MetodoController::class, 'destroy'])->name('metodo.destroy');

Route::get('/subscripcion', [SubscripcionControlller::class, 'index'])->name('subscripcion.index');