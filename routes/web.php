<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfileSecurityTwoFactorController;
use App\Http\Controllers\Student\ProjectCreateController;
use App\Http\Controllers\Student\ProjectController;


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


/**
 * Project Create
 */
Route::get('projects', [ProjectController::class, 'index'])->middleware(['auth'])->name('projects.index');

/**
 * Project Team Creation
 */

Route::get('projects/create', [ProjectController::class, 'create'])->middleware(['auth'])->name('projects.create');
Route::post('projects/create', [ProjectController::class, 'store'])->middleware(['auth'])->name('projects.store');


/**
 * Project Upload
 */
Route::get('project/upload', [UploadCodeController::class, 'index'])->middleware(['auth'])->name('upload-code.index');
Route::post('project/upload', [UploadCodeController::class, 'store'])->middleware(['auth'])->name('upload-code.store');
