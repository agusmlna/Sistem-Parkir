<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::Resource('/', LoginController::class);
Route::post('/auth/login', [LoginController::class, 'login']);
// Route::Resource('/dashboard', DashboardController::class);
Route::Resource('/dashboard/report', ReportController::class);
