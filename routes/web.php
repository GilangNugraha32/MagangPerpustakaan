<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BukuuController;
use App\Http\Controllers\KategoriBukuController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('sign.login');
});
Route::get('/login', function () {
    return view('sign.login');
});

Route::get('/register', function () {
    return view('sign.register');
});
Route::get('/utama', function () {
    return view('halaman.utama');
});

Route::get('buku', [BukuuController::class, 'buku'])->name('halaman.buku');
Route::post('buku', [BukuuController::class, 'store'])->name('halaman.buku.store');
Route::get('buku/{id}', [BukuuController::class, 'detail'])->name('halaman.buku.detail');

Route::get('kategoribuku', [KategoriBukuController::class, 'index'])->name('halaman.kategoribuku');
Route::post('kategoribuku', [KategoriBukuController::class, 'store'])->name('halaman.kategoribuku.store');
Route::get('kategoribuku/{id}', [KategoriBukuController::class, 'detail'])->name('halaman.kategoribuku.detail');

Route::get('admin', [AdminController::class, 'admin'])->name('halaman.admin');
Route::post('admin', [AdminController::class, 'store'])->name('halaman.admin.store');