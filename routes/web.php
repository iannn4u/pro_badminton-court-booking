<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CourtController;
use Illuminate\Support\Facades\Route;

Route::get('/admin', [AdminController::class, 'index']);


Route::resource('court', CourtController::class);