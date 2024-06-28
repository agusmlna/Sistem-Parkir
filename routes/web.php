<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataMotorController;
use App\Http\Controllers\DataPegawaiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MerekController;
use App\Http\Controllers\KomplainController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MasterMotorController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\PDFController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('generate-pdf/{id}', [PDFController::class, 'generatePDF'])->name('generate-pdf');
Route::Resource('/', LoginController::class);
Route::post('/auth/login', [LoginController::class, 'login']);
Route::Resource('/dashboard', DashboardController::class);
Route::Resource('/report', ReportController::class);
Route::Resource('/datamotor', DataMotorController::class);
Route::get('/datamotor/cash/{id}', [DataMotorController::class, 'cash'])->name('datamotor.cash');
Route::put('/datamotor/transfer/{id}', [DataMotorController::class, 'transfer'])->name('datamotor.transfer');
Route::put('/datamotor/komplain/{id}', [DataMotorController::class, 'komplain']);
Route::Resource('/datapegawai', DataPegawaiController::class);
Route::Resource('/home', HomeController::class);
Route::get('/struk/{id}', [HomeController::class, 'struk'])->name('struk');
Route::Resource('/komplain', KomplainController::class);
Route::Resource('/mastermotor', MasterMotorController::class);
Route::Resource('/merek-motor', MerekController::class);