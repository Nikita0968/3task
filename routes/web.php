<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/reports', [ReportController::class, 'index'])->name('report.index');
    Route::get('/reports/create', [ReportController::class, 'create'])->name('report.create');
    Route::post('/reports', [ReportController::class, 'store'])->name('report.store');
    Route::get('/reports/{report}/edit', [ReportController::class, 'edit'])->name('report.edit');
    Route::put('/reports/{report}', [ReportController::class, 'update'])->name('report.update');
    Route::delete('/reports/{report}', [ReportController::class, 'destroy'])->name('report.destroy');
    Route::get('/reports/{report}', [ReportController::class, 'show'])->name('report.show');
});

require __DIR__.'/auth.php';