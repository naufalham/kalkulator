<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Middleware\checkRoll;

// register
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('user.register');
Route::post('/register', [RegisterController::class, 'register']);


// login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Redirect sesuai role
Route::middleware(['auth', checkRoll::class . ':admin'])->prefix('admin')->name('admin.')->group(function(){
    
    Route::prefix('user')->name('user')->group(function(){
        Route::get('', [UserController::class, 'tampil'])->name('');
        Route::get('/{id}', [UserController::class, 'show'])->name('.show');
        Route::get('/{id}/edit', [UserController::class, 'edit'])->name('.edit');
        Route::put('/{id}', [UserController::class, 'update'])->name('.update');
        Route::delete('/{id}', [UserController::class, 'destroy'])->name('.destroy');
    });
    

    
});

Route::get('/', function () {
        return view('user.landing_page');
    })->name('landing_page');


Route::middleware(['auth', checkRoll::class . ':user'])->prefix('user')->name('user.')->group(function(){
    //profile
        Route::get('/profil', [UserController::class, 'edit'])->name('edit');
        Route::post('/profil', [UserController::class, 'update'])->name('update');
   
});

Route::middleware(['auth'])->group(function () {
    Route::get('/profil', function () {
        return view('user.profil');
    });

    Route::get('/usaha', function () {
        return view('user.usaha');
    });

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

    // Route::get('/admin', function () {
    //     return view('admin.user');
    // });

    Route::get('/admin/berita', function () {
        return view('admin.berita');
    });

    Route::get('/admin/tambah', function () {
        return view('admin.tambah_berita');
    });

    Route::get('/admin/kalkulator', function () {
        return view('admin.kalkulator');
    });

    
});

//gugel
Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('google.callback');

//tampil user