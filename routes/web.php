<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProfileController;

Route::get('/', [MenuController::class, 'index'])->name('index');
Route::get('/set-cookie', [MenuController::class, 'setCookie'])->name('setCookie');
Route::middleware('isAdmin')->group(function(){
    Route::get('/create-menu', [MenuController::class, 'create'])->name('create');
    Route::post('/store-menu', [MenuController::class, 'store'])->name('store');
    Route::get('/edit-menu/{id}', [MenuController::class, 'edit'])->name('edit');
    Route::patch('/update-menu/{id}', [MenuController::class, 'update'])->name('update');
    Route::delete('/delete-menu/{id}', [MenuController::class, 'delete'])->name('delete');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
