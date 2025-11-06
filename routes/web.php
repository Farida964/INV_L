<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Semua rute berikut hanya bisa diakses jika user sudah login & terverifikasi
Route::middleware(['auth', 'verified'])->group(function () {

    // Setelah login, tampilkan home.blade.php
    Route::get('/inventory', function () {
        return view('inventory');
    })->name('home');

    // Resource routes hanya untuk user yang sudah login
    Route::get('/inventory', [HomeController::class, 'index'])->name('home');

    // Dashboard (opsional)
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













// Route::resource('inventory', InventoryController::class);

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';
