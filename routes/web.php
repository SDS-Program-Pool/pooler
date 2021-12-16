<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\OpenSourceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectManualReviewController;
use App\Http\Controllers\Staff\DashboardController as StaffDashboardController;
use App\Http\Controllers\Staff\ProjectController as StaffProjectController;
use App\Http\Controllers\Staff\StudentController as StaffStudentController;
use App\Http\Controllers\Student\ProjectController;
use App\Http\Controllers\Student\ProjectMarkController;
use App\Http\Controllers\Student\ProjectMarkReviewController;
use App\Http\Controllers\Student\SettingController;
use App\Http\Controllers\Student\TaskController;
use App\Http\Controllers\UserNoteController;
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
 * Projects.
 */
Route::get('projects', [ProjectController::class, 'index'])->middleware(['auth'])->name('projects.index');
Route::get('projects/staff-review', [ProjectManualReviewController::class, 'index'])->middleware(['auth'])->name('projects_manualreview.index');
Route::get('projects/{id}/staff-review', [ProjectManualReviewController::class, 'create'])->middleware(['auth'])->name('projects_manualreview.create');
Route::post('projects/{id}/staff-review', [ProjectManualReviewController::class, 'store'])->middleware(['auth'])->name('projects_manualreview.store');
Route::get('projects/create', [ProjectController::class, 'create'])->middleware(['auth'])->name('projects.create');
Route::post('projects/create', [ProjectController::class, 'store'])->middleware(['auth'])->name('projects.store');
Route::get('projects/{id}', [ProjectController::class, 'show'])->middleware(['auth'])->name('projects.show');

/**
 * Project Mark.
 */
Route::middleware(['mark'])->group(function () {
    Route::post('projects/{id}/mark', [ProjectMarkController::class, 'store'])->middleware(['auth'])->name('marking.store');
    Route::post('projects/{id}/mark/take', [ProjectMarkController::class, 'acceptOrReject'])->middleware(['auth'])->name('marking.accept_or_reject');
    Route::get('projects/{id}/mark/take', [ProjectMarkController::class, 'show'])->middleware(['auth'])->name('marking.show');
    Route::get('projects/{id}/mark', [ProjectMarkController::class, 'mark'])->middleware(['auth'])->name('marking.mark');
});


/**
 * Project Mark Review.
 */
Route::post('projects/{id}/review', [ProjectMarkReviewController::class, 'store'])->middleware(['auth'])->name('marking_review.store');
Route::get('projects/{id}/review', [ProjectMarkReviewController::class, 'show'])->middleware(['auth'])->name('marking_review.show');

/**
 * Project Download.
 */
Route::get('projects/{id}/download', [DownloadController::class, 'getDownload'])->middleware(['auth'])->name('downloads.index');

/**
 * Tasks.
 */
Route::get('tasks', [TaskController::class, 'index'])->middleware(['auth'])->name('tasks.index');

/**
 * Settings.
 */
Route::get('settings', [SettingController::class, 'index'])->middleware(['auth'])->name('settings.index');

/**
 * Custom User Notes.
 */
Route::post('user/notes', [UserNoteController::class, 'store'])->middleware(['auth'])->name('user_notes.store');

/**
 * Open Source Licences.
 */
Route::get('opensource', [OpenSourceController::class, 'index'])->name('opensource.index');

/**
 * Staff Dashboard.
 */
Route::middleware(['teachingteam'])->group(function () {
    
    Route::get('staff', [StaffDashboardController::class, 'index'])->middleware(['auth'])->name('staff.index');
    Route::get('staff/projects', [StaffProjectController::class, 'index'])->middleware(['auth'])->name('staff_projects.index');
    Route::get('staff/students', [StaffStudentController::class, 'index'])->middleware(['auth'])->name('staff_students.index');
    Route::get('staff/students/{id}', [StaffStudentController::class, 'show'])->middleware(['auth'])->name('staff_students.show');
    
});
