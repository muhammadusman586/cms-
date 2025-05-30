<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\TenantController;
use App\Http\Middleware\AuthenticateUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

Route::get('/login', function () {
    return view('pages.auth.login');
});
//contact.submit
// Route::get('/contact-us', function () {
//     return view('contact-us');
// });


Route::get('/contact-us', [ContactUsController::class,'create']);

Route::post('/contact-us', [ContactUsController::class,'sendEmail'])->name("submit");

// Route::get('sendemail',[ContactUsController::class,"sendEmail"]);



Route::get('/auto-login', function (Request $request) {
    if (! $request->hasValidSignature()) {
        abort(403, 'Invalid or expired link.');
    }

    $user = User::where('email', $request->email)->first();

    if (! $user) {
        abort(404);
    }

    Auth::login($user);

    return redirect('/dashboard'); 
})->name('tenant.auto.login');

Route::get('/redirect-to-tenant', [TenantController::class, 'redirectToTenant'])->name('redirect.to.tenant');



// Route::get('/sso-login', function (Request $request) {
//     if (! URL::hasValidSignature($request)) {
//         abort(403, 'Invalid or expired link.');
//     }

//     $user = User::where('email', $request->email)->first();

//     if (! $user) {
//         abort(404, 'User not found.');
//     }

//     Auth::login($user);

//     return redirect('/'); // or any tenant-specific page
// })->name('tenant.sso');

//AuthController

Route::controller(AuthController::class)->group(function () {
    Route::get('/signup', 'showRegisterForm')->name('signup');
    Route::post('/signup', 'register');
    Route::get('/login', 'showLoginForm');
    Route::post('/login', 'login');
    Route::post('/logout', 'logout');
});

Route::middleware([AuthenticateUser::class])->group(function () {

    Route::group(['middleware'=>['role:Super Admin']],function(){
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

   
    Route::get('/tenant',[TenantController::class,'create']);
    Route::post('/tenant',[TenantController::class,'store']);
    Route::get('/tenant/{id}/edit',[TenantController::class,'edit'])->name('tenant.edit');
    Route::post('/tenant/{id}',[TenantController::class,'update'])->name('tenant.update');


    });

   

});
