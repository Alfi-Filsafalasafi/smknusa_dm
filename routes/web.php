<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IklanUtamaController;
use App\Http\Controllers\IklanJurusanController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EditProfileController;

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
    return view('auth.login');
});

Route::get('admin/nih/bos', function() {
    return view('auth.login');
});

Auth::routes();
Route::get('/admin', [App\Http\Controllers\DashboardController::class, 'index'])->name('admin.dashboard');

//Iklan Jurusan
Route::get('/iklan-jurusan/admin', [IklanJurusanController::class, 'index'])->name('iklan_jurusan.index');
Route::get('/iklan-jurusan/admin/{iklan_jurusan}/detail', [IklanJurusanController::class, 'detail'])->name('iklan_jurusan.detail');
Route::get('/iklan-jurusan/admin/tambah', [IklanJurusanController::class, 'create'])->name('iklan_jurusan.create');
Route::post('/iklan-jurusan/admin/tambah', [IklanJurusanController::class, 'store'])->name('iklan_jurusan.store');
Route::delete('/iklan-jurusan/admin/{iklan_jurusan}/hapus', [IklanJurusanController::class, 'destroy'])->name('iklan_jurusan.delete');
Route::get('/iklan_jurusan/admin/{iklan_jurusan}/edit', [IklanJurusanController::class, 'edit'])->name('iklan_jurusan.edit');
Route::patch('/iklan_jurusan/admin/{iklan_jurusan}/update', [IklanJurusanController::class, 'update'])->name('iklan_jurusan.update');

//iklan utama
Route::get('/iklan-utama/admin', [IklanUtamaController::class, 'index'])->name('iklan_utama.index');
Route::get('/iklan-utama/admin/{iklan_utama}/detail', [IklanUtamaController::class, 'detail'])->name('iklan_utama.detail');
Route::get('/iklan-utama/admin/tambah', [IklanUtamaController::class, 'create'])->name('iklan_utama.create');
Route::post('/iklan-utama/admin/tambah', [IklanUtamaController::class, 'store'])->name('iklan_utama.store');
Route::delete('/iklan-utama/admin/{iklan_utama}/hapus', [IklanUtamaController::class, 'destroy'])->name('iklan_utama.delete');
Route::get('/iklan_utama/admin/{iklan_utama}/edit', [IklanUtamaController::class, 'edit'])->name('iklan_utama.edit');
Route::patch('/iklan_utama/admin/{iklan_utama}/update', [IklanUtamaController::class, 'update'])->name('iklan_utama.update');

//user
Route::get('/user/admin', [UserController::class, 'index'])->name('user.index');
Route::get('/user/admin/tambah', [UserController::class, 'create'])->name('user.create');
Route::post('/user/admin/tambah', [UserController::class, 'store'])->name('user.store');
Route::delete('/user/admin/{user}/hapus', [UserController::class, 'destroy'])->name('user.delete');
Route::get('/user/admin/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::patch('/user/admin/{user}/update', [UserController::class, 'update'])->name('user.update');

//edit profile
Route::get('/admin/edit-profile/{user}/ini', [EditProfileController::class, 'index'])->name('edit_profile.index');
Route::get('/admin/edit-profile/{user}/edit', [EditProfileController::class, 'edit'])->name('edit_profile.edit');
Route::patch('/admin/edit-profile/{user}/update', [EditProfileController::class, 'update'])->name('edit_profile.update');

//Barang dan Jasa
Route::get('/barang-jasa/admin', [BarangController::class, 'index'])->name('barang_jasa.index');
Route::get('/barang-jasa/admin/{barang_jasa}/detail', [BarangController::class, 'detail'])->name('barang_jasa.detail');
Route::get('/barang-jasa/admin/tambah', [BarangController::class, 'create'])->name('barang_jasa.create');
Route::post('/barang-jasa/admin/tambah', [BarangController::class, 'store'])->name('barang_jasa.store');
Route::delete('/barang-jasa/admin/{barang_jasa}/hapus', [BarangController::class, 'destroy'])->name('barang_jasa.delete');
Route::get('/barang_jasa/admin/{barang_jasa}/edit', [BarangController::class, 'edit'])->name('barang_jasa.edit');
Route::patch('/barang_jasa/admin/{barang_jasa}/update', [BarangController::class, 'update'])->name('barang_jasa.update');
