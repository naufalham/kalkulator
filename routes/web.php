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