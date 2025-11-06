<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegistreController;
use App\Http\Controllers\CollectorController;
use App\Http\Controllers\BottleCapController;
use App\Http\Controllers\LogingController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/collector/{id?}', [CollectorController::class, 'index'])->name('collector.profile');

Route::get('/registro', [RegistreController::class, 'index'])->name('registre.show');
Route::post('/registro', [RegistreController::class, 'create'])->name('registre.create');

Route::get('/login', [LogingController::class, 'index'])->name('login.show');
Route::post('/login', [LogingController::class, 'login'])->name('login');
Route::get('/logout', [LogingController::class, 'logout'])->name('logout');

Route::get('/buscar', [BottleCapController::class, 'findByName'])->name('buscar');

Route::middleware(['auth'])->group(function () {
    Route::get('/collector/{id?}/colection', [CollectorController::class, 'showCollection'])->name('collector.collection');

    Route::post('/caps', [BottleCapController::class, 'newBottleCap'])->name('caps.add');
    Route::put('/caps', [BottleCapController::class, 'updateBottleCap'])->name('caps.update');
    Route::delete('/caps', [BottleCapController::class, 'deleteBottleCap'])->name('caps.delete');
});

Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');

    Route::post('/user', [UserController::class, 'newUser'])->name('user.newUser');
    Route::put('/user', [UserController::class, 'updateUser'])->name('user.updateUser');
    Route::delete('/user', [UserController::class, 'deleteUser'])->name('user.deleteUser');
});