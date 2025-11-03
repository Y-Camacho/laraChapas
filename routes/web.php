<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CollectorController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/collector/{id}', [CollectorController::class, 'index'])->name('collector.profile');
