<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataPembayaranController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ManajemenData\KelasController;
use App\Http\Controllers\ManajemenData\TahunAkademikController;
use App\Http\Controllers\ManajemenData\PembayaranPerbulanController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\UsersController;
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

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'process_login'])->name('process_login');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [MainController::class, 'dashboard'])->name('dashboard');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::resource('/pembayaran', PembayaranController::class);
    Route::resource('/data-pembayaran', DataPembayaranController::class);
    Route::resource('/users', UsersController::class);
    Route::put('/users/password/{id}', [UsersController::class, 'update_password'])->name('users.update.password');
    Route::prefix('manajemen-data')->group(function () {
        Route::resource('tahun-akademik', TahunAkademikController::class);
        Route::resource('kelas', KelasController::class);
        Route::resource('pembayaran-perbulan', PembayaranPerbulanController::class);
    });
});
