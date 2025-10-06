<?php

use App\Http\Controllers\PatientController;
use App\Http\Controllers\StatisticsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('patients.index');
});

Route::resource('patients', PatientController::class);

Route::get('statistics', [StatisticsController::class, 'index'])->name('statistics.index');
