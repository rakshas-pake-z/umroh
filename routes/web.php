<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\FormUmrohController;
use App\Models\FormUmroh;
use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('post.login');

Route::get('/form', function () {
    return view('form');
})->name('masuk');

Route::resource('paket', PaketController::class);
Route::resource('umroh', FormUmrohController::class);
Route::post('umroh/userform', [FormUmrohController::class, 'submitForm'])->name('form.submit');

Route::get('/form', [FormUmrohController::class, 'index']);
