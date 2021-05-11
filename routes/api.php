<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\MJUController;
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
    Route::get('/search/{filter}/{search}', [ProdukController::class, 'searchProdukByFilter']);
    Route::post('/add', [ProdukController::class, 'addProduk']);
    Route::put('/edit/{id}', [ProdukController::class, 'editProduk']);
});

Route::prefix('merk')->group(function () {
    Route::get('/', [MJUController::class, 'listMerk']);
    Route::get('/{id}', [MJUController::class, 'findMerkByID']);
    Route::get('/search/{filter}/{search}', [MJUController::class, 'searchMerkByFilter']);
    Route::post('/add', [MJUController::class, 'addMerk']);
    Route::put('/edit/{id}', [MJUController::class, 'editMerk']);
});

Route::prefix('jenis')->group(function () {
    Route::get('/', [MJUController::class, 'listJenis']);
    Route::get('/{id}', [MJUController::class, 'findJenisByID']);
    Route::get('/search/{filter}/{search}', [MJUController::class, 'searchJenisByFilter']);
    Route::post('/add', [MJUController::class, 'addJenis']);
    Route::put('/edit/{id}', [MJUController::class, 'editJenis']);
});

Route::prefix('ukuran')->group(function () {
    Route::get('/', [MJUController::class, 'listUkuran']);
    Route::get('/{id}', [MJUController::class, 'findUkuranByID']);
    Route::get('/search/{filter}/{search}', [MJUController::class, 'searchUkuranByFilter']);
    Route::post('/add', [MJUController::class, 'addUkuran']);
    Route::put('/edit/{id}', [MJUController::class, 'editUkuran']);
});