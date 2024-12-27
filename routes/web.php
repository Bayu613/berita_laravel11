<?php
use App\Models\Kategori;


use App\Http\Controllers\Dashboard;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\Konten;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Route;

Route::get('/kategori/{id}', [BerandaController::class, 'showByCategory'])->name('kategori');
Route::resource('' , BerandaController::class);
Route::resource('dashboard' , Dashboard::class);
Route::resource('users' , UsersController::class);
Route::resource('konten' , Konten::class);
Route::resource('kategori' , KategoriController::class);
Route::get('/{slug}', [BerandaController::class, 'show'])->name('show');
