<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfileSecurityTwoFactorController;
use App\Http\Controllers\Student\ProjectController;
use App\Http\Controllers\Student\ProjectMarkController;
use App\Http\Controllers\Student\SettingController;
use App\Http\Controllers\Student\TaskController;


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
 * Projects
 */
Route::get('projects', [ProjectController::class, 'index'])->middleware(['auth'])->name('projects.index');
Route::get('project/create', [ProjectController::class, 'create'])->middleware(['auth'])->name('projects.create');
Route::post('project/create', [ProjectController::class, 'store'])->middleware(['auth'])->name('projects.store');
Route::get('project/{id}', [ProjectController::class, 'show'])->middleware(['auth'])->name('projects.show');

/** 
 * Project Mark
 */
Route::post('project/{id}/mark', [ProjectMarkController::class, 'store'])->middleware(['auth'])->name('marking.store');
Route::post('project/{id}/mark/take', [ProjectMarkController::class, 'acceptOrReject'])->middleware(['auth'])->name('marking.accept_or_reject');

Route::get('project/{id}/mark/take', [ProjectMarkController::class, 'show'])->middleware(['auth'])->name('marking.show');
Route::get('project/{id}/mark', [ProjectMarkController::class, 'mark'])->middleware(['auth'])->name('marking.mark');

/**
 * Project Download
 */
Route::get('download/{id}', [DownloadController::class, 'getDownload'])->middleware(['auth'])->name('downloads.index');



/**
 * Tasks
 */
Route::get('tasks', [TaskController::class, 'index'])->middleware(['auth'])->name('tasks.index');


/**
 * Settings
 */

Route::get('settings', [SettingController::class, 'index'])->middleware(['auth'])->name('settings.index');