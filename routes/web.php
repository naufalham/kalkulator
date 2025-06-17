<?php

use App\Models\Faq;
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
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\AnalisisUsahaExportController;

// register
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('user.register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');


// login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::post('/export-analisis-usaha', [AnalisisUsahaExportController::class, 'export'])
    ->name('export.analisis.usaha')
    ->middleware('auth'); // Pastikan pengguna terautentikasi

Route::get('/user/berita', [BeritaController::class, 'user_index'])->name('user.berita');
Route::get('/user/berita', [BeritaController::class, 'cari'])->name('user.berita');
Route::get('/user/berita/{slug}', [BeritaController::class, 'show'])->name('user.berita.show');

// Redirect sesuai role
Route::middleware(['auth', checkRoll::class . ':admin'])->prefix('admin')->name('admin.')->group(function(){
    
    Route::patch('/profile', [UserController::class, 'updateAdminProfile'])->name('profile.update'); // Route baru untuk update profil admin

    Route::prefix('user')->name('user')->group(function(){
        Route::get('', [UserController::class, 'admin_tampil'])->name('');
        Route::get('/{id}', [UserController::class, 'admin_show'])->name('.show');
        Route::patch('/{user}/reset-password', [UserController::class, 'resetPassword'])->name('.resetPassword');
        Route::patch('/toggle-status', [UserController::class, 'toggleUserStatus'])->name('.toggleStatus'); // Asumsi route ini sudah ada atau Anda akan menambahkannya
        Route::resource('user', UserController::class)->except(['show', 'create', 'store', 'edit', 'update', 'destroy']); // Sesuaikan jika perlu
    });

    Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index'); // Rute untuk menampilkan daftar berita
    Route::get('/berita/create', [BeritaController::class, 'create'])->name('berita.create'); // Rute untuk form tambah berita
    Route::post('/berita', [BeritaController::class, 'store'])->name('berita.store'); // Rute untuk menyimpan berita
    Route::delete('/berita/{id}', [BeritaController::class, 'destroy'])->name('berita.destroy'); // Rute untuk menghapus berita
    Route::get('/berita/{id}/edit', [BeritaController::class, 'edit'])->name('berita.edit');
    Route::put('/berita/{id}', [BeritaController::class, 'update'])->name('berita.update');


    Route::resource('faq', FaqAdminController::class)->middleware('auth'); // atau middleware admin

    Route::get('/kalkulator', [DownloadController::class, 'statistikDownload'])->name('kalkulator');
    Route::get('/kalkulator', [DashboardController::class, 'index'])->name('kalkulator');
    Route::post('/kalkulator', [DashboardController::class, 'index'])->name('kalkulator');


    // Admin akses ke fungsionalitas Usaha pengguna
    Route::get('/data-usaha', [UsahaController::class, 'index'])->name('data-usaha.index');
    Route::get('/data-usaha/form/{layanan}', [UsahaController::class, 'show'])->name('data-usaha.form');
    // Route untuk getUsahaForm jika admin juga memerlukannya secara terpisah
    // Route::get('/get-usaha-form/{layanan}', [UsahaController::class, 'getUsahaForm'])->name('get-usaha-form.admin');

    // Admin akses ke fungsionalitas Kalkulator pengguna
    Route::get('/gunakan-kalkulator', [KalkulatorController::class, 'index'])->name('gunakan-kalkulator.index');
    Route::get('/gunakan-kalkulator/{slug}', [KalkulatorController::class, 'show'])->name('gunakan-kalkulator.show');

    
    
});

Route::get('/', function () {
    $faqs = Faq::all();
    return view('user.landing_page', compact('faqs'));
})->name('landing_page');


Route::middleware(['auth'])->prefix('user')->name('user.')->group(function(){
    //profile
    Route::get('/profil', [UserController::class, 'edit'])->name('edit');
    Route::post('/profil', [UserController::class, 'update'])->name('update');

    Route::get('/usaha/form/{layanan}', [UsahaController::class, 'show'])->name('usaha.form');
    Route::get('/get-usaha-form/{layanan}', [UsahaController::class, 'getUsahaForm']);


    Route::get('/form_usaha', [UsahaController::class, 'index'])->name('form_usaha');

    Route::get('/riwayat', [RiwayatController::class, 'index'])->name('riwayat');
    Route::post('/usaha/pay', [AnalisisUsahaExportController::class, 'checkout'])->name('usaha.pay');
    Route::get('/download-after-pay', [AnalisisUsahaExportController::class, 'downloadAfterPay'])->name('usaha.downloadAfterPay');
    Route::get('/download/{layanan_id}', [AnalisisUsahaExportController::class, 'download'])->name('usaha.download');
    Route::post('/usaha/export', [AnalisisUsahaExportController::class, 'export'])->name('usaha.export');

    Route::get('/tanya', [FaqController::class, 'index'])->name('tanya');

    Route::get('/kalkulator/{slug}', [KalkulatorController::class, 'show'])->name('hitung.show');

    
});

    Route::get('/user/usaha', [UsahaController::class, 'index'])->name('user.usaha.index');
    Route::get('/user/kalkulator', [KalkulatorController::class, 'index'])->name('user.hitung.index');

// Route::middleware(['auth'])->group(function () {


//     Route::get('/isi', function () {
//         return view('user.isi_berita');
//     });

//     // Route::get('/admin/kalkulator', function () {
//     //     return view('admin.kalkulator');
//     // });
    

    
// });



//gugel
Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('google.callback');

//tampil user