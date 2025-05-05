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

//AuthController

Route::controller(AuthController::class)->group(function () {
    Route::get('/signup', 'showRegisterForm')->name('signup');
    Route::post('/signup', 'register');
    Route::get('/login', 'showLoginForm');
    Route::post('/login', 'login');
    Route::post('/logout', 'logout');
});

Route::middleware([AuthenticateUser::class])->group(function () {

    //Article Controller
    Route::get('/', [ArticleController::class, 'index']);
    Route::controller(AuthorController::class)->prefix('article')->group(function () {
        Route::get('/', [ArticleController::class, 'create']);
        Route::post('/', [ArticleController::class, 'store']);
        Route::get('{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
        Route::put('{article}', [ArticleController::class, 'update'])->name('articles.update');
        Route::delete('{article}', [ArticleController::class, 'destroy'])->name('articles.destroy');
        Route::get('/detail/{id}', [ArticleController::class, 'articleDetail'])->name('articledetail');

    });

    // Author Controller Routes
    Route::controller(AuthorController::class)->prefix('author')->group(function () {
        Route::get('/', 'index');
        Route::get('/create', 'create');
        Route::post('/', 'store');
        Route::get('/{author}/edit', 'edit')->name('author.edit');
        Route::put('/{author}', 'update')->name('author.update');
        Route::delete('/{author}', 'destroy')->name('author.destroy');
        Route::get('/{author}/article', 'show');
    });

    //Category Controller
    Route::controller(CategoryController::class)->prefix('category')->group(function () {
       
        Route::get('/', 'index');
        Route::get('/create', 'create');
        Route::post('/', 'store');
        Route::get('/{category}/edit', 'edit')->name('category.edit');
        Route::put('/{category}', 'update')->name('category.update');
        Route::delete('/{category}', 'destroy')->name('category.destroy');
        
        Route::get('/{category}', [CategoryController::class, 'show']);
    });
});
