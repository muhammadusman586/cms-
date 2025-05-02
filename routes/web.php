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

    Route::get('/', [ArticleController::class,'index']);
   
    Route::get('/article',[ArticleController::class,'create']);
    Route::post('/article',[ArticleController::class,'store']);
    Route::get('/article/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
    Route::put('/article/{article}', [ArticleController::class, 'update'])->name('articles.update');
    Route::delete('/article/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy');


    Route::get('/author',function(){
        return view('pages.author.create');
    });
    // Route::get('/author',[AuthorController::class,'index']);
    Route::get('/author/{author}/article',[AuthorController::class,'show']);

    Route::get('/category',function(){
     return view('pages.category.create');
    });
    // Route::get('/category',[CategoryController::class,'index']);
    Route::get('/categories/{category}',[CategoryController::class,'show']);

    Route::get('/article/detail/{id}', [ArticleController::class, 'articleDetail'])->name('articledetail');
    
});



