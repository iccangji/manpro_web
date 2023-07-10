<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LapanganController;
use App\Http\Controllers\OrderController;

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

Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/', [IndexController::class, 'index'])->middleware('auth');
// Route::get('/', function () {
//     return view('index');
// });
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/signup', [LoginController::class, 'signup']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/special_signup', [LoginController::class, 'special_signup'])->middleware('admin');
Route::post('/special_signup', [LoginController::class, 'special_signup_create']);
Route::resource('/futsal', LapanganController::class)->middleware('auth');
Route::resource('/badminton', LapanganController::class)->middleware('auth');
Route::get('/lapangan/tambah', [LapanganController::class, 'create'])->middleware('admin');
Route::post('/lapangan/tambah/simpan', [LapanganController::class, 'store'])->middleware('admin');
// Route::get('/tambah/futsal', [LapanganController::class, 'create'])->middleware('auth');
Route::get('/futsal/{id}/{index}', [LapanganController::class, 'show'])->middleware('auth');
Route::get('/edit/{id}', [LapanganController::class, 'edit'])->middleware('auth');
Route::post('/edit/{id}', [LapanganController::class, 'update'])->middleware('auth');
Route::get('/lapangan/edit/{id}', [LapanganController::class, 'edit'])->middleware('admin');
Route::post('/lapangan/edit/{id}', [LapanganController::class, 'update'])->middleware('admin');
Route::resource('/pesanan', OrderController::class)->middleware('auth');
Route::get('/pesanan/{id}/konfirmasi', [OrderController::class, 'konfirmasi'])->middleware('auth');
Route::get('/pesanan/{id}/cek-konfirmasi', [OrderController::class, 'cek_konfirmasi'])->middleware('auth');
Route::post('/pesanan/{id}/cek-konfirmasi', [OrderController::class, 'upload_konfirmasi'])->middleware('auth');
Route::post('/pesan/{id}', [OrderController::class, 'store'])->middleware('auth');
// CREATE DATA
// Route::resource('/badminton/{id}/{index}', LapanganController::class)->middleware('auth');
// Route::resource('/jadwal-badminton/{badminton:id}', JadwalController::class)->middleware('auth');
// Route::resource('/jadwal-futsal/{futsal:id}', JadwalController::class)->middleware('auth');


// Route::get('/jadwal-futsal', function () {
//     return view('futsal', [
//         "title" => "Sportky | Jadwal Lapangan"
//     ]);
// });
// Route::get('/jadwal-badminton', function () {
//     return view('badminton', [
//         "title" => "Sportky | Jadwal Lapangan"
//     ]);
// });
// Route::get('/jadwal-futsal/malona-futsal', function () {
//     return view('view-lapangan', [
//         "title" => "Sportky | View Lapangan"
//     ]);
// });
// Route::get('/jadwal-futsal/malona-futsal/konfirmasi-pembayaran', function () {
//     return view('konfirmasi', [
//         "title" => "Sportky | View Lapangan"
//     ]);
// });
