<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfileSecurityTwoFactorController;


/**
 * Dashboard
 */


Route::get('/', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard.index');

/**
 * Profile
 */
Route::get('profile', [ProfileController::class, 'index'])->middleware(['auth'])->name('profile.index');


/**
 * Profile 2FA
 */
Route::get('profile/two-factor', [ProfileSecurityTwoFactorController::class, 'index'])->middleware(['auth'])->name('profile.two-factor.index');

