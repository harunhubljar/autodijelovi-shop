<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AutoPartController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Home stranica - prikaz svih autodijelova
Route::get('/', [HomeController::class, 'index'])->name('home');

// Kupovina dijela
Route::post('/purchase/{id}', [HomeController::class, 'purchase'])->name('purchase');

// Promjena jezika
Route::get('/language/{locale}', [HomeController::class, 'changeLanguage'])->name('language.change');

// Auth rute
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Admin rute za upravljanje dijelovima (samo za admina)
Route::middleware('auth')->prefix('admin')->name('parts.')->group(function () {
    Route::get('/parts', [AutoPartController::class, 'index'])->name('index');
    Route::get('/parts/create', [AutoPartController::class, 'create'])->name('create');
    Route::post('/parts', [AutoPartController::class, 'store'])->name('store');
    Route::get('/parts/{id}/edit', [AutoPartController::class, 'edit'])->name('edit');
    Route::put('/parts/{id}', [AutoPartController::class, 'update'])->name('update');
    Route::delete('/parts/{id}', [AutoPartController::class, 'destroy'])->name('destroy');
});
