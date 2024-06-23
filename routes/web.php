<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataMotorController;
use App\Http\Controllers\DataPegawaiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KomplainController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\PDFController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('generate-pdf', [PDFController::class, 'generatePDF']);
Route::Resource('/', LoginController::class);
Route::post('/auth/login', [LoginController::class, 'login']);
Route::Resource('/dashboard', DashboardController::class);
Route::Resource('/report', ReportController::class);
Route::Resource('/datamotor', DataMotorController::class);
Route::post('/datamotor/upload-bukti-bayar/{id}', [DataMotorController::class, 'saveBuktiBayar']);
Route::put('/datamotor/komplain/{id}', [DataMotorController::class, 'komplain']);
Route::Resource('/datapegawai', DataPegawaiController::class);
Route::Resource('/home', HomeController::class); 
Route::get('/struk', [HomeController::class,'struk']);
Route::Resource('/komplain', KomplainController::class);
