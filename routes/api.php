<?php

use App\Http\Controllers\BarangController;
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

Route::get('/barang', [BarangController::class, 'listBarang']);
Route::get('/barang/{id}', [BarangController::class, 'findBarangByID']);
Route::post('/barang/add', [BarangController::class, 'addBarang']);
Route::put('/barang/edit/{id}', [BarangController::class, 'editBarang']);
