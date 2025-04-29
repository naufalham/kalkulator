<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
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

Route::get('/landing', function () {
    return view('user.landing_page');
});

Route::get('/usaha', function () {
    return view('user.usaha');
});