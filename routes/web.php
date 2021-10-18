<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;


/**
 * Dashboard
 */


Route::get('/', [DashboardController::class, 'index'])->middleware(['auth'])->name('dasboard.index');

/**
 * 
 */