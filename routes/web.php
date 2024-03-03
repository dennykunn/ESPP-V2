<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataPembayaranController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ManajemenData\KelasController;
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

Route::get('/', [MainController::class, 'dashboard'])->name('dashboard');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'process_login'])->name('process_login');

Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('pembayaran');

Route::get('/data-pembayaran', [DataPembayaranController::class, 'index'])->name('data-pembayaran');

Route::get('/users', [UsersController::class, 'index'])->name('users');

Route::get('/manajemen-data/tahun-akademik', [PembayaranPerbulanController::class, 'index'])->name('tahun-akademik');

Route::get('/manajemen-data/kelas', [KelasController::class, 'index'])->name('kelas');

Route::get('/manajemen-data/pembayaran-perbulan', [PembayaranPerbulanController::class, 'index'])->name('pembayaran-perbulan');
