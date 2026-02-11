<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ForgotPasswordController;

Route::get('/', function () {
    return view('index.index'); 
});

Route::post('/login', [RegisterController::class, 'login'])->name('login');

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
})->name('logout');

Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/forgot-password', function () {
    return view('forgotPassword.forgotPassword'); 
})->name('password.request');

Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetCode'])->name('password.email');

Route::get('/verify-password/{id}', function ($id) {
    return view('auth.verifyPassword', ['id' => $id]);
})->name('password.verify');

Route::post('/reset-password', [ForgotPasswordController::class, 'resetPassword'])->name('password.update');

Route::get('/about', function () { return view('about.aboutUs'); })->name('about');

Route::get('/services', function () { return view('service.services'); })->name('services');