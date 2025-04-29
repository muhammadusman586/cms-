<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Middleware\AuthenticateUser;
use Illuminate\Support\Facades\Route;


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


Route::middleware([AuthenticateUser::class])->group(function(){

    Route::get('/', function () {
        return view('pages.home');
    });
   
    Route::get('/article',[ArticleController::class,'create']);
    Route::post('/article',[ArticleController::class,'store']);

    Route::get('/author',[AuthorController::class,'index']);
    Route::get('/category',[CategoryController::class,'index']);
});



