<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\OpenSourceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfileSecurityTwoFactorController;
use App\Http\Controllers\Student\ProjectController;
use App\Http\Controllers\Student\ProjectMarkController;
use App\Http\Controllers\Student\ProjectMarkReviewController;
use App\Http\Controllers\Student\SettingController;
use App\Http\Controllers\Student\TaskController;
use App\Http\Controllers\Staff\DashboardController as StaffDashboardController;
use App\Http\Controllers\Staff\ProjectController as StaffProjectController;
use Illuminate\Support\Facades\Route;

/**
 * Dashboard.
 */
Route::get('/', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard.index');

/**
 * Profile.
 */
Route::get('profile', [ProfileController::class, 'index'])->middleware(['auth'])->name('profile.index');

/**
 * Profile 2FA.
 */
Route::get('profile/two-factor', [ProfileSecurityTwoFactorController::class, 'index'])->middleware(['auth'])->name('profile.two-factor.index');

/**
 * Projects.
 */
Route::get('projects', [ProjectController::class, 'index'])->middleware(['auth'])->name('projects.index');
Route::get('project/create', [ProjectController::class, 'create'])->middleware(['auth'])->name('projects.create');
Route::post('project/create', [ProjectController::class, 'store'])->middleware(['auth'])->name('projects.store');
Route::get('project/{id}', [ProjectController::class, 'show'])->middleware(['auth'])->name('projects.show');

/**
 * Project Mark.
 */
Route::post('project/{id}/mark', [ProjectMarkController::class, 'store'])->middleware(['auth'])->name('marking.store');
Route::post('project/{id}/mark/take', [ProjectMarkController::class, 'acceptOrReject'])->middleware(['auth'])->name('marking.accept_or_reject');

Route::get('project/{id}/mark/take', [ProjectMarkController::class, 'show'])->middleware(['auth'])->name('marking.show');
Route::get('project/{id}/mark', [ProjectMarkController::class, 'mark'])->middleware(['auth'])->name('marking.mark');

/**
 * Project Mark Review.
 */
Route::post('project/{id}/review', [ProjectMarkReviewController::class, 'store'])->middleware(['auth'])->name('marking_review.store');
Route::get('project/{id}/review', [ProjectMarkReviewController::class, 'show'])->middleware(['auth'])->name('marking_review.show');

/**
 * Project Download.
 */
Route::get('download/{id}', [DownloadController::class, 'getDownload'])->middleware(['auth'])->name('downloads.index');

/**
 * Tasks.
 */
Route::get('tasks', [TaskController::class, 'index'])->middleware(['auth'])->name('tasks.index');

/**
 * Settings.
 */
Route::get('settings', [SettingController::class, 'index'])->middleware(['auth'])->name('settings.index');

/**
 * Open Source Licences.
 */
Route::get('opensource', [OpenSourceController::class, 'index'])->name('opensource.index');

/**
 * Staff Dashboard
 */

Route::get('staff', [StaffDashboardController::class, 'index'])->name('staff.index');
Route::get('staff/projects', [StaffProjectController::class, 'index'])->name('staff_projects.index');
