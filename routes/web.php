<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
});

Route::get('/login', function () {
    return view('pages.auth.login');
});

Route::controller(AuthController::class)->group(function(){
    Route::get('/signup','showRegisterForm')->name('signup');
    Route::post('/signup','register');
    Route::get('/login','showLoginForm');
    Route::post('/login','login');
    Route::post('/logout','logout');
});



Route::get('/article',function(){
    return view('pages.articles.create');
});