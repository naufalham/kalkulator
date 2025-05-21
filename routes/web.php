<?php

use App\Http\Middleware\checkRoll;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\UsahaController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Auth\RegisterController;
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
        Route::get('', [UserController::class, 'tampil'])->name('');
        Route::get('/{id}', [UserController::class, 'show'])->name('.show');
        Route::get('/{id}/edit', [UserController::class, 'edit'])->name('.edit');
        Route::put('/{id}', [UserController::class, 'update'])->name('.update');
        Route::delete('/{id}', [UserController::class, 'destroy'])->name('.destroy');
    });

    Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index'); // Rute untuk menampilkan daftar berita
    Route::get('/berita/create', [BeritaController::class, 'create'])->name('berita.create'); // Rute untuk form tambah berita
    Route::post('/berita', [BeritaController::class, 'store'])->name('berita.store'); // Rute untuk menyimpan berita
    Route::delete('/berita/{id}', [BeritaController::class, 'destroy'])->name('berita.destroy'); // Rute untuk menghapus berita

    Route::prefix('berita')->name('berita.')->group(function(){
        // Route::get('', [BeritaController::class, 'index'])->name('index');
        Route::get('/create', [BeritaController::class, 'create'])->name('create');
        Route::post('', [BeritaController::class, 'store'])->name('store');
        Route::delete('/{id}', [BeritaController::class, 'destroy'])->name('destroy');
    });
    

    
    
});

Route::get('/', function () {
        return view('user.landing_page');
    })->name('landing_page');


Route::middleware(['auth', checkRoll::class . ':user'])->prefix('user')->name('user.')->group(function(){
    //profile
    Route::get('/profil', [UserController::class, 'edit'])->name('edit');
    Route::post('/profil', [UserController::class, 'update'])->name('update');

    Route::get('/usaha', [UsahaController::class, 'index'])->name('usaha.index');

    
});

Route::middleware(['auth'])->group(function () {

    // Route::get('/usaha', function () {
    //     return view('user.usaha');
    // });

    Route::get('/berita', function () {
        return view('user.berita');
    });

    Route::get('/form_usaha', function () {
        return view('user.form_usaha');
    });

    Route::get('/kalkulator', function () {
        return view('user.kalkulator');
    });

    Route::get('/riwayat', function () {
        return view('user.riwayat');
    });

    Route::get('/tanya', function () {
        return view('user.tanya');
    });    

    Route::get('/kalkulator/modal', function () {
        return view('user.hitung.modal');
    });

    Route::get('/kalkulator/bep', function () {
        return view('user.hitung.bep');
    });

    Route::get('/kalkulator/laba', function () {
        return view('user.hitung.laba');
    });

    Route::get('/kalkulator/penjualan', function () {
        return view('user.hitung.penjualan');
    });

    Route::get('/kalkulator/stok', function () {
        return view('user.hitung.stok');
    });

    Route::get('/isi', function () {
        return view('user.isi_berita');
    });
    

    // Route::get('/admin/tambah', function () {
    //     return view('admin.tambah_berita');
    // });

    Route::get('/admin/kalkulator', function () {
        return view('admin.kalkulator');
    });
    

    
});

//gugel
Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('google.callback');

//tampil user