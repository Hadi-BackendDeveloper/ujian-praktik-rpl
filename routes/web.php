<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/registrasi', [UserController::class, 'registrasi']);
Route::post('/register', [UserController::class, 'register'])->name('register');
Route::get('/', [UserController::class, 'index']);
Route::post('/login', [UserController::class, 'login'])->name('login.submit');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/dashboard', function () {
    if (!session('siswa')) {
        return redirect('/')->with('error', 'Silakan login terlebih dahulu!');
    }
    return view('siswa.home');
})->name('dashboard')->middleware('web');