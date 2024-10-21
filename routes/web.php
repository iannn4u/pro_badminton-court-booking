<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CourtController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'index');
Route::get('/admin', [AdminController::class, 'index']);


Route::resource('court', CourtController::class);