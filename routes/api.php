<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\ProdukController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('barang')->group(function () {
    Route::get('/', [BarangController::class, 'listBarang']);
    Route::get('/{id}', [BarangController::class, 'findBarangByID']);
    Route::post('/add', [BarangController::class, 'addBarang']);
    Route::put('/edit/{id}', [BarangController::class, 'editBarang']);
});

Route::prefix('produk')->group(function () {
    Route::get('/', [ProdukController::class, 'listProduk']);
    Route::get('/{id}', [ProdukController::class, 'findProdukByID']);
    Route::post('/add', [ProdukController::class, 'addProduk']);
    Route::put('/edit/{id}', [ProdukController::class, 'editProduk']);
});