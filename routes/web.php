<?php

use App\Http\Controllers\CabangController;
use App\Http\Controllers\LaporanTransaksi;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();
Route::get('/cetak-struk/{id}', [TransaksiController::class, 'cetakStruk'])->name('cetak.struk');
Route::get('/laporan/download', [LaporanTransaksi::class, 'download'])->name('laporan.download');  
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware('auth')->group(function(){
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/change-password', [ProfileController::class, 'changepassword'])->name('profile.change-password');
    Route::put('/profile/password', [ProfileController::class, 'password'])->name('profile.password');
    Route::prefix('/admin')->group(function(){
        Route::resource('cabang', CabangController::class);
        Route::resource('users', UserController::class);
        Route::resource('layanan', LayananController::class);
        Route::resource('laporan', LaporanTransaksi::class);
    });
    Route::resource('transaksi', TransaksiController::class);
});
