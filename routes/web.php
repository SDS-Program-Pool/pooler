<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;


/**
 * Dashboard
 */


Route::get('/', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard.index');

/**
 * Profile
 */
Route::get('profile', [DashboardController::class, 'index'])->middleware(['auth'])->name('profile.index');
