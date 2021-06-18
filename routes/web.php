<?php

use App\Http\Controllers\DosenController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::middleware(['role:admin'])->group(function (){
    Route::get('/admin', [HomeController::class, 'admin'])->name('admin');
    Route::resource('admin/dosen', DosenController::class);
    Route::resource('admin/mahasiswa', MahasiswaController::class);
    Route::resource('admin/matakuliah', MatakuliahController::class);
    Route::resource('admin/kelas', KelasController::class);
    Route::resource('admin/user', UserController::class);
});

Route::middleware(['role:dosen'])->group(function (){
    Route::get('/dosen', [HomeController::class, 'dosen'])->name('dosen');
    Route::get('dosen/profil/{id}',[DosenController::class, 'profilDosen'])->name('dosen.profil');
    Route::get('dosen/tampilMahasiswa', [DosenController::class, 'tampilMahasiswa'])->name('dosen.mahasiswa');
    Route::get('dosen/profil-mahasiswa/{id}',[DosenController::class, 'show'])->name('dosen.profil-mahasiswa');
    Route::post('dosen/add-nilai/{id}',[DosenController::class, 'AddNilai'])->name('dosen.addnilai');
    
});

Route::middleware(['role:mahasiswa'])->group(function (){
    Route::get('/mahasiswa', [HomeController::class, 'mhs'])->name('mahasiswa');
});