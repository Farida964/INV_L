<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\OutputController;
use App\Http\Controllers\DoneController;
use App\Http\Controllers\LabaController;
use App\Http\Controllers\AuthController;

// Root route redirect ke inventory jika login, atau ke login jika belum
Route::get('/', function() {
    return auth()->check() ? redirect('/inventory') : redirect('/login');
});

// Halaman dashboard redirect ke inventory
Route::get('/dashboard', function() {
    return redirect('/inventory');
})->middleware('auth')->name('dashboard');



// Semua rute berikut hanya bisa diakses jika user sudah login & terverifikasi
Route::middleware(['auth', 'verified'])->group(function () {

    // Resource routes untuk Inventory, Output, Done
    Route::resource('inventory', InventoryController::class);

    Route::get('/inventory/{id}/input', [InventoryController::class, 'input'])
    ->name('inventory.input');

    Route::post('/inventory/{id}/input', [InventoryController::class, 'storeInput'])
    ->name('inventory.storeInput');

    Route::get('/inventory/detail/{id}', function ($id) {
    return \App\Models\Inventory::findOrFail($id);

    Route::get('/inventory/detail/{id}', [InventoryController::class, 'detail']);
});



    Route::resource('output', OutputController::class);
    Route::resource('done', DoneController::class);

    // Profile edit/update/delete
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Move output to done
    Route::patch('/output/{id}/move-to-done', [OutputController::class, 'moveToDone'])
        ->name('output.moveToDone');
    
    // Laba page
    
    Route::get('/laba/download', [LabaController::class, 'download'])
    ->name('laba.download');

    Route::get('/laba', [LabaController::class, 'index'])->name('laba.index');
    Route::get('/laba/download', [LabaController::class, 'downloadReport'])->name('laba.download');



    // logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


});

// Rute bawaan Laravel untuk login, register, lupa password, dll.
require __DIR__.'/auth.php';
