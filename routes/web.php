<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CourtController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', [HomeController::class, 'index']);
Route::post('/get/booking/', [BookingController::class, 'index']);
Route::get('/get/search/booking/{name}', [BookingController::class, 'search']);

Route::view('/login', 'admin.signin');
Route::post('/login', function(Request $request) {
    if($request->username == 'admin' && $request->password == 'password') {
        return redirect('/admin');
    } else {
        return redirect()->back();
    }
});

Route::resource('court', CourtController::class);
Route::resource('booking', BookingController::class);