<?php

use App\Http\Controllers\CabangController;
use App\Http\Controllers\LaporanTransaksi;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware('auth')->group(function(){
    Route::prefix('/admin')->group(function(){
        Route::resource('cabang', CabangController::class);
        Route::resource('users', UserController::class);
        Route::resource('layanan', LayananController::class);
        Route::resource('laporan', LaporanTransaksi::class);
    });
    Route::resource('transaksi', TransaksiController::class);
});
