<?php

declare(strict_types=1);

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Middleware\AuthenticateUser;
use App\Http\Middleware\CheckTenantActive;
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,

])->group(function () {

    Route::get('/login', function () {
       return view('pages.auth.login');
    });
    Route::controller(AuthController::class)->group(function () {
    Route::get('/signup', 'showRegisterForm')->name('signup');
    Route::post('/signup', 'register');
    Route::get('/login', 'showLoginForm');
    Route::post('/login', 'login');
    Route::post('/logout', 'logout');
});

Route::get('/auto-login', [AuthController::class, 'autoLogin'])->name('tenant.auto-login');
Route::middleware([AuthenticateUser::class])->group(function () {

    //Article Controller
    Route::get('/', [ArticleController::class, 'index']);
    Route::get('/article/detail/{id}', [ArticleController::class, 'articleDetail'])->name('articles.detail');

    Route::controller(ArticleController::class)->prefix('article')->group(function () {
        Route::get('/', 'create');
        Route::post('/', 'store');
        Route::get('{article}/edit', 'edit')->name('articles.edit');
        Route::put('{article}', 'update')->name('articles.update');
        Route::delete('{article}', 'destroy')->name('articles.destroy');
        // Route::get('/detail/{id}',  'articleDetail');

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

        Route::get('/{category}/articles', 'show');

        Route::get('/{category}/edit', 'edit')->name('category.edit');
        Route::put('/{category}', 'update')->name('category.update');
        Route::delete('/{category}', 'destroy')->name('category.destroy');
    });

    // Route::get('/', function () {

    //     //  dd(\App\Models\User::all());
    //     return 'This is your multi-tenant application. The id of the current tenant is ' . tenant('id');
    // });
});

});