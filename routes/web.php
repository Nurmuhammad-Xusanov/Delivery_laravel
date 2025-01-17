<?php

use App\Http\Controllers\FoodsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\WorkersController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('admin.dashboard');
    Route::middleware(['auth', 'role:admin'])->group(function () {
        Route::resource('role', RoleController::class);
        Route::resource('workers', WorkersController::class);
    });
    Route::resource('foods', FoodsController::class);
    Route::middleware(['auth'])->group(function () {
        Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});





require __DIR__ . '/auth.php';
