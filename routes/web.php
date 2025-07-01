<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::middleware('role:visitante')->group(function () {
        Route::get('/visitor/dashboard', [DashboardController::class, 'visitor'])->name('visitor.dashboard');
        Route::get('/visitor/profile', [ProfileController::class, 'visitorProfile'])->name('visitor.profile');
        route::get('/visitor/edit/profile', [ProfileController::class, 'edit'])->name('visitante.profile.edit');
        Route::put('/visitor/edit/profile', [ProfileController::class, 'update'])->name('visitante.profile.update');
    });
    Route::middleware('role:organizador')->group(function () {
        Route::get('/organizer/dashboard', [DashboardController::class, 'organizer'])->name('organizer.dashboard');
        Route::get('/organizer/profile', [ProfileController::class, 'organizerProfile'])->name('organizer.profile');
    });
    Route::middleware('role:admin')->group(function () {
        Route::get('/admin/dashboard', [DashboardController::class, 'admin'])->name('admin.dashboard');
    });
});

require __DIR__.'/auth.php';
