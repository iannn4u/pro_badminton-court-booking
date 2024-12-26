<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CourtController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\OperationalController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [IndexController::class, "index"]);

Route::get('/admin/login', [AdminController::class, "pageLogin"]);
Route::post('/admin/login', [AdminController::class, "login"]);

Route::get('admin/dashboard', [AdminController::class, "index"]);
Route::post('admin/operational/edit/{operational}', [OperationalController::class, "update"]);

Route::get('admin/booking', [BookingController::class, "index"]);
Route::get('admin/booking/tambah', [BookingController::class, "create"]);
Route::post('admin/booking/tambah', [BookingController::class, "store"]);
Route::get('admin/booking/edit/{booking}', [BookingController::class, "edit"]);
Route::put('admin/booking/edit/{booking}', [BookingController::class, "update"]);
Route::delete('admin/booking/delete/{booking}', [BookingController::class, "destroy"]);
Route::post('booking/cekSlot', [BookingController::class, "cekSlot"]);

Route::get('admin/lapangan', [CourtController::class, "index"]);
Route::get('admin/lapangan/tambah', [CourtController::class, "create"]);
Route::post('admin/lapangan/tambah', [CourtController::class, "store"]);
Route::get('admin/lapangan/edit/{court}', [CourtController::class, "edit"]);
Route::put('admin/lapangan/edit/{court}', [CourtController::class, "update"]);
Route::delete('admin/lapangan/delete/{court}', [CourtController::class, "destroy"]);
