<?php

use Illuminate\Support\Facades\Route;

// This loads your index page
Route::get('/', function () {
    return view('index.index'); 
});

Route::post('/login', function () {
    return "Login logic goes here later.";
})->name('login');

Route::post('/logout', function () {
    return "Logout logic goes here later.";
})->name('logout');

Route::post('/register', function () {
    return "Registration logic goes here later.";
})->name('register');

Route::get('/forgot-password', function () {
    return view('forgotPassword.forgotPassword'); 
})->name('password.request');

Route::get('/about', function () { return view('about.aboutUs'); })->name('about');

Route::get('/services', function () { return view('service.services'); })->name('services');