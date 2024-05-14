<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataMotorController;
use App\Http\Controllers\DataPegawaiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::Resource('/', LoginController::class);
Route::post('/auth/login', [LoginController::class, 'login']);
Route::Resource('/dashboard', DashboardController::class);
Route::Resource('/report', ReportController::class);
Route::Resource('/datamotor', DataMotorController::class);
Route::Resource('/datapegawai', DataPegawaiController::class);
Route::Resource('/home', HomeController::class);
