<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\LaporanpenjualanController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route Admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin']], function(){
    Route::get('/', function(){
        return 'halaman admin';
    });

    Route::get('profile', function(){
        return 'halaman profile admin';
    });
});

Route::group(['prefix' => 'customer', 'middleware' => ['auth', 'role:customer']], function(){
    Route::get('/', function(){
        return 'halaman customer';
    });

    Route::get('profile', function(){
        return 'halaman profile customer';
    });
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function(){
    Route::get('buku', function(){
        return view('buku.index');
    });

    Route::get('stok', function(){
        return view('stok.index');
    });
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function(){
    Route::get('buku', function(){
        return view('buku.index');
    })->middleware(['role:admin|customer']);

    Route::get('kategori', function(){
        return view('kategori.index');
    })->middleware(['role:admin|customer']);

Route::resource('kategori', KategoriController::class);
Route::resource('buku', BukuController::class);
Route::resource('penjualan', PenjualanController::class);
Route::resource('laporanpenjualan', laporanPenjualanController::class);
});


