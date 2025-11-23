<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\OutputController;

Route::get('/', function () {
    return view('welcome');
});

// Semua rute berikut hanya bisa diakses jika user sudah login & terverifikasi
Route::middleware(['auth', 'verified'])->group(function () {

    // Resource routes untuk Inventory
    Route::resource('inventory', InventoryController::class);
    Route::resource('output', OutputController::class);

    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Profile edit/update/delete
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rute bawaan Laravel untuk login, register, lupa password, dll.
require __DIR__.'/auth.php';
