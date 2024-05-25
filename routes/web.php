<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

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

;

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'processlogin']);
Route::get('/signup', [AuthController::class, 'signup'])->name('signup');
Route::post('/signup', [AuthController::class, 'saveSignup'])->name('daftar');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// landing page
Route::get('/', function () {
    return view('Landing.Pages.home');
});


// admin page
Route::get('/admin', [AdminController::class, 'index'])->name('admin')->middleware('auth:web');
Route::post('/simpan-firebase', [AdminController::class, 'storeFirebase'])->name('simpan.firebase')->middleware('auth:web');
Route::post('/admin', [AdminController::class, 'editWaktu'])->name('edit.waktu')->middleware('auth:web');
Route::get('/admin/peserta', [AdminController::class, 'peserta'])->name('admin.peserta')->middleware('auth:web');
Route::get('/admin/peserta/{pesertaId}/edit', [AdminController::class, 'editpeserta'])->name('admin.peserta.edit')->middleware('auth:web');
Route::post('/admin/peserta/update/{pesertaId}', [AdminController::class, 'updatepeserta'])->name('admin.peserta.update')->middleware('auth:web');



Route::get('/admin/kondisi', [AdminController::class, 'kondisi'])->name('admin.kondisi')->middleware('auth:web');
Route::post('/admin/kondisi', [AdminController::class, 'storewaktu'])->name('tambah.waktu')->middleware('auth:web');
Route::post('/admin/kondisi/simpan-kondisi', [AdminController::class, 'storekondisi'])->name('simpan.kondisi')->middleware('auth:web');
Route::delete('/kondisi/{id}/softdelete', [AdminController::class, 'delete'])->name('kondisi.softdelete')->middleware('auth:web');


Route::get('/admin/nilai', [AdminController::class, 'penilaian'])->name('admin.nilai')->middleware('auth:web');
Route::post('/admin/nilai/simpan-nilai', [AdminController::class, 'storeNilai'])->name('simpan.nilai')->middleware('auth:web');
Route::delete('/admin/nilai/hapus-nilai/{id}', [AdminController::class, 'deleteNilai'])->name('hapus.nilai')->middleware('auth:web');
Route::get('admin/nilai/cetak-pdf', [AdminController::class, 'cetakPDF'])->name('cetak.nilai')->middleware('auth:web');


// userpage
Route::get('/user', [UserController::class, 'index'])->name('user')->middleware('auth:peserta');
Route::get('/user/cetak-pdf', [UserController::class, 'cetakPDF'])->name('user.cetak')->middleware('auth:peserta');
Route::get('/user/profil', [UserController::class, 'profil'])->name('user.profil')->middleware('auth:peserta');
Route::post('/user/profil/update/{nama}', [UserController::class, 'updateUser'])->name('user.profil.update')->middleware('auth:peserta');

Route::fallback(function () {
    // Lakukan apa yang Anda inginkan untuk menampilkan halaman 404 di sini
    return view('errors.404');
});