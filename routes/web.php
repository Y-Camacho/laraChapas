<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegistreController;
use App\Http\Controllers\CollectorController;
use App\Http\Controllers\LogingController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/collector/{id?}', [CollectorController::class, 'index'])->name('collector.profile');
Route::get('/collector/{id?}/colection', [CollectorController::class, 'showCollection'])->name('collector.collection');

Route::get('/registro', [RegistreController::class, 'index'])->name('registre.show');
Route::post('/registro', [RegistreController::class, 'create'])->name('registre.create');

Route::get('/login', [LogingController::class, 'index'])->name('login.show');
Route::get('/logout', [LogingController::class, 'logout'])->name('logout');