<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FlanirController;
use App\Http\Controllers\PembayaranController;

// Rute Publik
Route::get('/', [FlanirController::class, 'landing'])->name('flanir.landing');
Route::get('/login', [FlanirController::class, 'loginPage'])->name('flanir.login');
Route::post('/login/process', [FlanirController::class, 'processLogin'])->name('flanir.login.process');

// Rute yang Membutuhkan Login
Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [FlanirController::class, 'index'])->name('flanir.dashboard');
    Route::get('/akun', [FlanirController::class, 'akun'])->name('flanir.akun');
    Route::get('/layanan', [FlanirController::class, 'layanan'])->name('flanir.layanan');
    Route::get('/konsultasi', [FlanirController::class, 'konsultasi'])->name('flanir.konsultasi');

    // Pembayaran
    Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('flanir.pembayaran');
    Route::post('/proses-bayar/{id}', [PembayaranController::class, 'process'])->name('flanir.proses_bayar');
    Route::get('/pembayaran/success', [PembayaranController::class, 'success'])->name('flanir.success');

    Route::get('/chat/{dokter_id}', [FlanirController::class, 'chatRoom'])->name('flanir.chat');
    Route::get('/video-call/{id}', [FlanirController::class, 'videoCall'])->name('flanir.video_call');
    Route::get('/logout', [FlanirController::class, 'logout'])->name('flanir.logout');
});