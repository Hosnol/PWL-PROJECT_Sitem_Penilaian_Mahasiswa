<?php

use App\Http\Controllers\DosenController;
use App\Http\Controllers\HomeController;
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
});

Route::middleware(['role:dosen'])->group(function (){
    Route::get('/dosen', [HomeController::class, 'dosen'])->name('dosen');
});

Route::middleware(['role:mahasiswa'])->group(function (){
    Route::get('/mahasiswa', [HomeController::class, 'mhs'])->name('mahasiswa');
});