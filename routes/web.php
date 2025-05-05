<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('user.landing_page');
});

Route::get('/register', function () {
    return view('user.register');
});

Route::get('/login', function () {
    return view('user.login');
});

Route::get('/profil', function () {
    return view('user.profil');
});

Route::get('/usaha', function () {
    return view('user.usaha');
});

Route::get('/form_usaha', function () {
    return view('user.form_usaha');
});

Route::get('/kalkulator', function () {
    return view('user.kalkulator');
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

Route::get('/berita', function () {
    return view('user.berita');
});

Route::get('/isi', function () {
    return view('user.isi_berita');
});

Route::get('/admin', function () {
    return view('admin.user');
});

Route::get('/admin/berita', function () {
    return view('admin.berita');
});

Route::get('/admin/tambah', function () {
    return view('admin.tambah_berita');
});

Route::get('/admin/kalkulator', function () {
    return view('admin.kalkulator');
});