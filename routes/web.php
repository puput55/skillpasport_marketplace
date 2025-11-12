<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GambarProdukController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// =================== HALAMAN UMUM ===================
Route::get('/', function () {
    return view('beranda');
});
Route::get('/beranda', function () {
    return view('beranda');
})->name('beranda');

// =================== LOGIN / LOGOUT ===================
Route::get('/login', [UserController::class, 'loginForm'])->name('login');
Route::post('/login', [UserController::class, 'loginProcess'])->name('login.process');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

// =================== ADMIN ===================
Route::middleware(['checkRole:admin'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/', [AdminController::class, 'index'])->name('home');

    // User
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');

    // Toko
    Route::get('/toko', [TokoController::class, 'index'])->name('toko.index');
    Route::get('/toko/create', [TokoController::class, 'create'])->name('toko.create');
    Route::post('/toko', [TokoController::class, 'store'])->name('toko.store');
    Route::get('/toko/{id}/edit', [TokoController::class, 'edit'])->name('toko.edit');
    Route::put('/toko/{id}', [TokoController::class, 'update'])->name('toko.update');
    Route::delete('/toko/{id}', [TokoController::class, 'destroy'])->name('toko.destroy');

    // Kategori
    Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
    Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
    Route::post('/kategori', [KategoriController::class, 'store'])->name('kategori.store');
    Route::get('/kategori/{id}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
    Route::put('/kategori/{id}', [KategoriController::class, 'update'])->name('kategori.update');
    Route::delete('/kategori/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');

    // Produk
    Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
    Route::get('/produk/create', [ProdukController::class, 'create'])->name('produk.create');
    Route::post('/produk', [ProdukController::class, 'store'])->name('produk.store');
    Route::get('/produk/{id}/edit', [ProdukController::class, 'edit'])->name('produk.edit');
    Route::put('/produk/{id}', [ProdukController::class, 'update'])->name('produk.update');
    Route::delete('/produk/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');

    // Gambar Produk
    Route::get('/gambar', [GambarProdukController::class, 'index'])->name('gambar.index');
    Route::get('/gambar/create', [GambarProdukController::class, 'create'])->name('gambar.create');
    Route::post('/gambar', [GambarProdukController::class, 'store'])->name('gambar.store');
    Route::get('/gambar/{id}/edit', [GambarProdukController::class, 'edit'])->name('gambar.edit');
    Route::put('/gambar/{id}', [GambarProdukController::class, 'update'])->name('gambar.update');
    Route::delete('/gambar/{id}', [GambarProdukController::class, 'destroy'])->name('gambar.destroy');
});

// =================== MEMBER / TOKO ===================
Route::middleware(['checkRole:member'])->prefix('member')->name('member.')->group(function () {
    Route::get('/', function () {
        return view('member-toko');
    })->name('home');
});
