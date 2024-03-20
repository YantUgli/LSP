<?php

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

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('homepage');

Route::get('blog/{berita:id}', [\App\Http\Controllers\HomeController::class, 'show'])->name('blog.show');

Route::get('blogs', [\App\Http\Controllers\HomeController::class, 'blogs'])->name('blogs.index');


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

Route::resource('users', \App\Http\Controllers\UserController::class)->middleware('auth');


Route::resource('karyawan', \App\Http\Controllers\KaryawanController::class)->middleware('auth');


Route::resource('kategoriwisata', \App\Http\Controllers\KategoriWisataController::class)->middleware('auth');

Route::resource('kategoriberita', \App\Http\Controllers\kategoriberitaController::class)->middleware('auth');

Route::resource('berita', \App\Http\Controllers\beritaController::class)->middleware('auth');

Route::resource('obyekwisata', \App\Http\Controllers\obyekwisataController::class)->middleware('auth');

Route::resource('penginapan', \App\Http\Controllers\PenginapanController::class)->middleware('auth');

Route::resource('pelanggan', \App\Http\Controllers\pelangganController::class)->middleware('auth');

Route::resource('paketwisata', \App\Http\Controllers\paketwisataController::class)->middleware('auth');

Route::resource('reservasi', \App\Http\Controllers\reservasiController::class)->middleware('auth');

Route::resource('generate', \App\Http\Controllers\generate::class)->middleware('auth');



route::get('/cetak','\App\Http\Controllers\ReservasiController@cetak')->name('cetak');
