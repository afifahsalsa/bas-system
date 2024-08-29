<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProdukController;
use App\Models\Produk;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function(){
//     return view('admin.dashboard');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth','type:admin'])->group(function(){
    Route::prefix('kategori')->group(function(){
        Route::get('index', [KategoriController::class, 'index'])->name('kategori.index');
        Route::put('update/{id}', [KategoriController::class, 'update'])->name('kategori.update');
        Route::delete('delete/{id}', [KategoriController::class, 'destroy'])->name('kategori.delete');
        Route::post('create', [KategoriController::class, 'store'])->name('kategori.create');
    });
    Route::prefix('produk')->group(function(){
        Route::get('index', [ProdukController::class, 'index'])->name('produk.index');
        Route::post('create',[ProdukController::class, 'store'])->name('produk.create');
        Route::put('update/{barcode}', [ProdukController::class, 'update'])->name('produk.update');
        Route::delete('delete/{barcode}', [ProdukController::class, 'destroy'])->name('produk.delete');
    });
    Route::prefix('order')->group(function(){
        Route::get('index', [OrderController::class, 'index'])->name('order.index');
        Route::post('create', [OrderController::class, 'store'])->name('order.create');
    });
});
