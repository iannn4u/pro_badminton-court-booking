<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CourtController;
use App\Http\Controllers\HighlightController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\OperationalController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\UserController;
use App\Models\Pelanggan;
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

Route::middleware('auth')->group(function () {
    Route::get('admin/dashboard', [AdminController::class, "index"]);
    Route::post('admin/operational/edit/{operational}', [OperationalController::class, "update"]);

    Route::resource('admin/booking', BookingController::class);
    Route::post('booking/cekSlot', [BookingController::class, "cekSlot"]);
    Route::get('get/search/booking/{name}', [BookingController::class, "search"]);
    Route::post('get/booking', [BookingController::class, "modalInfo"]);

    Route::resource('admin/lapangan', CourtController::class);
    
    Route::get('admin/pengaturan', [OperationalController::class, "index"]);
    Route::get('admin/pengaturan/edit/account', [OperationalController::class, "editAccount"]);
    Route::put('admin/pengaturan/edit/account/{user}', [OperationalController::class, "updateAccount"]);
    Route::get('admin/pengaturan/edit/biodata', [OperationalController::class, "editBiodata"]);
    Route::put('admin/pengaturan/edit/biodata/{operational}', [OperationalController::class, "updateBiodata"]);
    
    Route::get('/admin/pengaturan/tambah/highlight', [HighlightController::class, 'create']);
    Route::post('/admin/pengaturan/tambah/highlight', [HighlightController::class, 'store']);
    Route::get('/admin/pengaturan/hapus/highlight/{highlight}', [HighlightController::class, 'destroy']);

    Route::resource('pelanggan', PelangganController::class);
    Route::post('/dropdown/pelanggan', [PelangganController::class, 'searchPelanggan']);

    Route::resource('/admin/user', UserController::class);
    
    Route::get('admin/logout', [AdminController::class, "logout"]);
    Route::get('admin', [AdminController::class, "admin"]);
});

Route::get('admin/login', [AdminController::class, "viewLogin"])->middleware('guest');
Route::post('admin/login', [AdminController::class, "login"])->middleware('guest');
