<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $products = [ /* ... array data produk dari home.blade.php ... */ ];
    return view('home', compact('products'));
})->name('home');

// Halaman Login/Sign Up
Route::get('/auth', function () {
    return view('login_signup');
})->name('auth.page');

Route::get('/auth/login', function () {
    return view('login');
})->name('auth.login');

// Halaman Tambah Produk
Route::get('/tambahproduk', function () {
    return view('tambah_produk');
})->name('tambah.produk');
