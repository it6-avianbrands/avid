<?php

use App\Http\Controllers\UserController;
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

Route::get('/{any}', function () {
    return view('app');
})->where('any', '.*');

Route::name('auth.')->group(function () {
    Route::prefix('auth')->group(function () {
        Route::post('/login', [UserController::class, 'login'])->name('login');
        Route::post('/register', [UserController::class, 'register'])->name('register');
        Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    });
});
