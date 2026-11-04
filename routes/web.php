<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SekolahAktifController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\StubController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::put('/sekolah-aktif', [SekolahAktifController::class, 'update'])->name('sekolah-aktif.update');

    // Data sekolah: daftar untuk lingkup Korwil, detail untuk sekolah sendiri.
    Route::middleware('role:admin|operator_korwil|korwilcam')->group(function () {
        Route::get('/sekolah', [SekolahController::class, 'index'])->name('sekolah.index');
    });
    Route::get('/sekolah/{sekolah}', [SekolahController::class, 'show'])->name('sekolah.show');

    // Halaman admin (sebagian masih placeholder, lihat docs/rencana.md).
    Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/pegawai', [StubController::class, 'show'])->name('pegawai')
            ->defaults('judul', 'Master Pegawai & Riwayat Jabatan');
        Route::get('/referensi', [StubController::class, 'show'])->name('referensi')
            ->defaults('judul', 'Data Referensi');
        Route::get('/impor', [StubController::class, 'show'])->name('impor')
            ->defaults('judul', 'Impor Data Pegawai');
        Route::get('/pengguna', [StubController::class, 'show'])->name('pengguna')
            ->defaults('judul', 'Kelola Pengguna & Peran');
    });

    // Halaman operator Korwil.
    Route::middleware('role:operator_korwil')->prefix('korwil')->name('korwil.')->group(function () {
        Route::get('/periode', [StubController::class, 'show'])->name('periode')
            ->defaults('judul', 'Kelola Periode');
        Route::get('/monitoring', [StubController::class, 'show'])->name('monitoring')
            ->defaults('judul', 'Monitoring Setor Laporan');
        Route::get('/validasi', [StubController::class, 'show'])->name('validasi')
            ->defaults('judul', 'Validasi Laporan');
        Route::get('/perubahan-pegawai', [StubController::class, 'show'])->name('perubahan-pegawai')
            ->defaults('judul', 'Ringkasan Perubahan Pegawai');
        Route::get('/apel', [StubController::class, 'show'])->name('apel')
            ->defaults('judul', 'Apel Korwil');
        Route::get('/pegawai', [StubController::class, 'show'])->name('pegawai')
            ->defaults('judul', 'Pegawai Kantor Korwil');
        Route::get('/rekap-mekanisme', [StubController::class, 'show'])->name('rekap-mekanisme')
            ->defaults('judul', 'Rekap Mekanisme');
    });

    // Halaman korwilcam.
    Route::middleware('role:korwilcam')->prefix('korwilcam')->name('korwilcam.')->group(function () {
        Route::get('/rekap-mekanisme', [StubController::class, 'show'])->name('rekap-mekanisme')
            ->defaults('judul', 'Rekap Mekanisme');
        Route::get('/laporan', [StubController::class, 'show'])->name('laporan')
            ->defaults('judul', 'Laporan Sekolah');
    });

    // Halaman operator sekolah.
    Route::middleware('role:operator_sekolah')->prefix('sekolah-saya')->name('sekolah-saya.')->group(function () {
        Route::get('/laporan', [StubController::class, 'show'])->name('laporan')
            ->defaults('judul', 'Laporan Bulanan');
        Route::get('/riwayat', [StubController::class, 'show'])->name('riwayat')
            ->defaults('judul', 'Riwayat & Status Pengiriman');
    });

    // Halaman kepala sekolah.
    Route::middleware('role:kepala_sekolah')->prefix('sekolah-saya')->name('sekolah-saya.')->group(function () {
        Route::get('/laporan-masuk', [StubController::class, 'show'])->name('laporan-masuk')
            ->defaults('judul', 'Laporan Masuk');
        Route::get('/riwayat-persetujuan', [StubController::class, 'show'])->name('riwayat-persetujuan')
            ->defaults('judul', 'Riwayat Persetujuan');
    });
});

require __DIR__.'/auth.php';
