<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataMotorController;
use App\Http\Controllers\DataPegawaiController;
use App\Http\Controllers\TambahParkiranController;
use App\Http\Controllers\JenisMotorController;
use App\Http\Controllers\MerekController;
use App\Http\Controllers\KomplainController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MotorController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\PDFController;
use Illuminate\Support\Facades\Route;



Route::Resource('/', LoginController::class);

// auth
Route::post('/auth/login', [LoginController::class, 'login']);

// dashboard
Route::Resource('/dashboard', DashboardController::class);

// master
Route::Resource('/motor', MotorController::class);
Route::Resource('/merek-motor', MerekController::class);
Route::Resource('/jenis-motor', JenisMotorController::class);

// report
Route::Resource('/report', ReportController::class);
Route::post('/report/filter', [ReportController::class, 'filterDate'])->name('report.filter');
Route::post('/report/filter/jenis', [ReportController::class, 'filterJenis'])->name('report.filter.jenis');

// data-motor
Route::Resource('/data-motor', DataMotorController::class);
Route::get('/data-motor/cash/{id}', [DataMotorController::class, 'cash'])->name('datamotor.cash');
Route::put('/data-motor/transfer/{id}', [DataMotorController::class, 'transfer'])->name('datamotor.transfer');
Route::put('/data-motor/komplain/{id}', [DataMotorController::class, 'komplain']);

// pegawai
Route::Resource('/datapegawai', DataPegawaiController::class);

// tambah data perkir
Route::Resource('/tambah-data-parkir', TambahParkiranController::class);

// komplain
Route::Resource('/komplain', KomplainController::class);

// struk
Route::get('/struk/{id}', [TambahParkiranController::class, 'struk'])->name('struk');

// pdf
Route::get('generate-pdf/{id}', [PDFController::class, 'generatePDF'])->name('generate-pdf');
