<?php

use App\Http\Middleware\checkRoll;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\UsahaController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\KalkulatorController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\FaqAdminController;
use App\Http\Controllers\AnalisisUsahaExportController;

// register
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('user.register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');


// login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::post('/export-analisis-usaha', [AnalisisUsahaExportController::class, 'export'])->name('export.analisis.usaha');

// Redirect sesuai role
Route::middleware(['auth', checkRoll::class . ':admin'])->prefix('admin')->name('admin.')->group(function(){
    
    Route::prefix('user')->name('user')->group(function(){
        Route::get('', [UserController::class, 'admin_tampil'])->name('');
        Route::get('/{id}', [UserController::class, 'admin_show'])->name('.show');
        Route::delete('/{id}', [UserController::class, 'admin_destroy'])->name('.destroy');
        Route::get('', [UserController::class, 'admin_cari'])->name('');
    });

    Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index'); // Rute untuk menampilkan daftar berita
    Route::get('/berita/create', [BeritaController::class, 'create'])->name('berita.create'); // Rute untuk form tambah berita
    Route::post('/berita', [BeritaController::class, 'store'])->name('berita.store'); // Rute untuk menyimpan berita
    Route::delete('/berita/{id}', [BeritaController::class, 'destroy'])->name('berita.destroy'); // Rute untuk menghapus berita
    Route::get('/berita/{id}/edit', [BeritaController::class, 'edit'])->name('berita.edit');
    Route::put('/berita/{id}', [BeritaController::class, 'update'])->name('berita.update');


    Route::resource('faq', FaqAdminController::class)->middleware('auth'); // atau middleware admin

    Route::get('/kalkulator', [DownloadController::class, 'statistikDownload'])->name('kalkulator');
    
    
});

Route::get('/', function () {
        return view('user.landing_page');
    })->name('landing_page');


Route::middleware(['auth', checkRoll::class . ':user'])->prefix('user')->name('user.')->group(function(){
    //profile
    Route::get('/profil', [UserController::class, 'edit'])->name('edit');
    Route::post('/profil', [UserController::class, 'update'])->name('update');

    Route::get('/usaha', [UsahaController::class, 'index'])->name('usaha.index');
    Route::get('/usaha/form/{layanan}', [UsahaController::class, 'show'])->name('usaha.form');

    Route::get('/form_usaha', [UsahaController::class, 'index'])->name('form_usaha');

    Route::get('/riwayat', [RiwayatController::class, 'index'])->name('riwayat');
    Route::post('/usaha/pay', [AnalisisUsahaExportController::class, 'checkout'])->name('usaha.pay');
    Route::get('/download-after-pay', [AnalisisUsahaExportController::class, 'downloadAfterPay'])->name('usaha.downloadAfterPay');
    Route::get('/download/{layanan_id}', [AnalisisUsahaExportController::class, 'download'])->name('usaha.download');
    Route::post('/usaha/export', [AnalisisUsahaExportController::class, 'export'])->name('usaha.export');

    Route::get('/berita', [BeritaController::class, 'user_index'])->name('berita');
    Route::get('/berita', [BeritaController::class, 'cari'])->name('berita');
    Route::get('/berita/{slug}', [BeritaController::class, 'show'])->name('berita.show');

    Route::get('/tanya', [FaqController::class, 'index'])->name('tanya');

    Route::get('/kalkulator', [KalkulatorController::class, 'index'])->name('hitung.index');
    Route::get('/kalkulator/{slug}', [KalkulatorController::class, 'show'])->name('hitung.show');

    
});

Route::middleware(['auth'])->group(function () {


    Route::get('/isi', function () {
        return view('user.isi_berita');
    });

    // Route::get('/admin/kalkulator', function () {
    //     return view('admin.kalkulator');
    // });
    

    
});

//gugel
Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('google.callback');

//tampil user