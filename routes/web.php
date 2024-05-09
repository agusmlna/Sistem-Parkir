<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::Resource('/', LoginController::class);
Route::post('/auth/login', [LoginController::class, 'login']);
