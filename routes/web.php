<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\ReportController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::resource('equipment', EquipmentController::class);

    Route::get('/reports', [ReportController::class, 'index'])
    ->name('reports.index');

    Route::get('/reports/export/csv', [ReportController::class, 'exportCsv'])
    ->name('reports.export.csv');

    Route::get('/reports/export/pdf', [ReportController::class, 'exportPdf'])
    ->name('reports.export.pdf');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
