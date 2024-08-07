<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BukuuController;
use App\Http\Controllers\KategoriBukuController;
use App\Http\Controllers\MemberController;
use Illuminate\Support\Facades\Route;

// Route untuk menampilkan form login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// Route untuk menampilkan form register
Route::get('/register', function () {
    return view('sign.register');
})->name('register');

// Route untuk mengirimkan form register
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

// Route untuk logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard routes
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard')->middleware('auth:admin');

Route::get('/member/dashboard', function () {
    return view('member.dashboard');
})->name('member.dashboard')->middleware('auth:member');

// Halaman utama
Route::get('/', function () {
    return view('auth.login');
})->name('home');

// Buku routes
Route::get('/buku', [BukuuController::class, 'buku'])->name('halaman.buku');
Route::get('/addbuku', [BukuuController::class, 'create'])->name('addbuku');
Route::post('/buku', [BukuuController::class, 'store'])->name('halaman.buku.store');
Route::get('/buku/{id}', [BukuuController::class, 'detail'])->name('halaman.buku.detail');
Route::get('/buku/edit/{id}', [BukuuController::class, 'edit'])->name('halaman.buku.edit');
Route::put('/buku/update/{id}', [BukuuController::class, 'update'])->name('halaman.buku.update');
Route::delete('/buku/{id}', [BukuuController::class, 'forcedelete'])->name('buku.forcedelete');

// Kategori Buku routes
Route::get('kategoribuku', [KategoriBukuController::class, 'index'])->name('halaman.kategoribuku');
Route::post('kategoribuku', [KategoriBukuController::class, 'store'])->name('halaman.kategoribuku.store');
Route::get('kategoribuku/{id}', [KategoriBukuController::class, 'detail'])->name('halaman.kategoribuku.detail');

// Admin routes
Route::get('/admin', [AdminController::class, 'admin'])->name('halaman.admin');
Route::get('/add_admin', [AdminController::class, 'create'])->name('add_admin');
Route::post('/admin/store', [AdminController::class, 'store'])->name('admin.store');
Route::get('/admin/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
Route::put('/admin/update/{id}', [AdminController::class, 'update'])->name('admin.update');// Rute untuk menghapus admin secara permanen
Route::delete('/admin/{id}', [AdminController::class, 'forcedelete'])->name('admin_forcedelete');


// Member routes
Route::get('/member', [MemberController::class, 'index'])->name('member');