<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\DashboardController;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\MerkController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\UkuranController;
use App\Http\Controllers\KemasanController;
use App\Http\Controllers\WarnaController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!!
|
*/

Route::get('/', function () {
    return redirect('/login');
});

//==================== LOGIN ====================
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'check_login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/change-password', [LoginController::class, 'change_password'])->name('change_password');
Route::post('/change-password', [LoginController::class, 'change_password_update']);

//==================== CONFIG ====================
Route::get('/module/datatable',[ModuleController::class, 'datatable']);
Route::resource('module', ModuleController::class)->names('module');
Route::get('/branch/datatable',[BranchController::class, 'datatable']);
Route::resource('branch', BranchController::class)->names('branch');

//==================== MASTER ====================
//Route::prefix('master')->group(function() {
    Route::get('/product/datatable',[ProductController::class, 'datatable']);
    Route::resource('product', ProductController::class)->names('product');
    Route::get('/merk/datatable',[MerkController::class, 'datatable']);
    Route::resource('merk', MerkController::class)->names('merk');
    Route::get('/jenis/datatable',[JenisController::class, 'datatable']);
    Route::resource('jenis', JenisController::class)->names('jenis')->parameters(["jenis" => "jenis"]);
    Route::get('/ukuran/datatable',[UkuranController::class, 'datatable']);
    Route::resource('ukuran', UkuranController::class)->names('ukuran');
    Route::get('/kemasan/datatable',[KemasanController::class, 'datatable']);
    Route::resource('kemasan', KemasanController::class)->names('kemasan');
    Route::resource('warna', WarnaController::class)->names('warna');
//});

//==================== DASHBOARD ====================
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
