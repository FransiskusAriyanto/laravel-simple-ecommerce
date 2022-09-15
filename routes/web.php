<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FarmerController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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


Route::get('/', [GuestController::class, 'index']);
Route::get('/detail/{product}', [GuestController::class, 'show'])->name('guest.show');
Route::get('/search', [GuestController::class, 'search'])->name('guest.search');

Auth::routes();

Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/beranda', [TypeController::class, 'user'])->name('user.index');
    Route::get('/produk/{product}', [UserController::class, 'show'])->name('user.show');
    Route::get('/diproses', [UserController::class, 'process'])->name('user.process');
    Route::get('/dikirim', [UserController::class, 'send'])->name('user.send');
    Route::get('/selesai', [UserController::class, 'finish'])->name('user.finish');
    Route::get('/transaksi', [UserController::class, 'transaction'])->name('user.transaction');
    Route::get('/daftar/jadi/petani', [UserController::class, 'reqfarm'])->name('user.req');
    Route::get('/user/search', [UserController::class, 'search'])->name('user.search');
    
    Route::post('/transaksi/store/{product}', [UserController::class, 'store'])->name('user.store');
    Route::patch('/transaksi/update/{transaction}', [UserController::class, 'update'])->name('user.update');
    Route::post('/req/{user}', [AdminController::class, 'req']);
});

Route::middleware(['auth', 'user-access:farmer'])->group(function () {
    Route::get('/petani', [TypeController::class, 'farmer'])->name('farmer.index');
    Route::get('/create', [ProductController::class, 'create'])->name('farmer.create');
    Route::get('/petani/detail/{product}', [FarmerController::class, 'show'])->name('farmer.show');
    Route::get('/petani/edit/{product}', [ProductController::class, 'edit'])->name('edit.product');
    Route::get('/petani/produk', [ProductController::class, 'product'])->name('farmer.product');
    Route::get('/petani/ubah/gambar/{product}', [ProductController::class, 'imgedit'])->name('edit.img');
    Route::get('/pesanan/baru', [TransactionController::class, 'new'])->name('farmer.new');
    Route::get('/pesanan/dikirim', [TransactionController::class, 'onsend'])->name('farmer.onsend');
    Route::get('/pesanan/selesai', [TransactionController::class, 'finish'])->name('farmer.onfinish');
    Route::get('/petani/search', [FarmerController::class, 'search'])->name('farmer.search');
    Route::get('/transaksi/anda', [FarmerController::class, 'transaction'])->name('farmer.transaction.all');
    Route::get('/transaksi/diproses', [FarmerController::class, 'transactioninprocess'])->name('farmer.transaction.inprocess');
    Route::get('/transaksi/dikirim', [FarmerController::class, 'transactionsend'])->name('farmer.transaction.send');
    Route::get('/transaksi/selesai', [FarmerController::class, 'transactionfinish'])->name('farmer.transaction.finish');

    Route::patch('/petani/update/gambar/{product}', [ProductController::class, 'imgupdate'])->name('update.img');
    Route::post('/store', [ProductController::class, 'store'])->name('farmer.store');
    Route::patch('/update/{product}', [ProductController::class, 'update'])->name('farmer.update');
    Route::patch('/send/{transaction}', [FarmerController::class, 'send'])->name('farmer.makesend');
    Route::patch('/finish/{transaction}', [FarmerController::class, 'finish'])->name('farmer.makefinish');
});

Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin', [TypeController::class, 'admin'])->name('admin.index');
    Route::get('/admin/data/petani', [AdminController::class, 'farmerdata'])->name('admin.farmdata');
    Route::get('/admin/data/user', [AdminController::class, 'userdata'])->name('admin.userdata');

    Route::patch('/type/update/{user}', [AdminController::class, 'typeupdate'])->name('admin.typeupdate');
});