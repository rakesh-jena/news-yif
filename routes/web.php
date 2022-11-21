<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\CategoryController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * ------------------------------------------------------------------------
 * ADMIN URLs
 * ------------------------------------------------------------------------
 * */
Route::middleware(['auth', 'admin'])->group(function () {
    /**Dashboard */
    Route::get('yn-admin', function () {
        return view('admin.dashboard');
    });
    Route::resource('yn-admin/users', UserController::class);
    Route::resource('yn-admin/tags', TagController::class);
    Route::resource('yn-admin/articles', ArticleController::class);
    Route::resource('yn-admin/category', CategoryController::class);
});

/**Authentication */
Route::get('/yn-login', function () {
    return view('admin.login');
});

Route::get('/login', function () {
    return view('frontend.login');
})->name('login');

Route::get('/register', function () {
    return view('frontend.register');
});
Route::post('/user_login', [AuthController::class, 'authenticate']);
Route::post('/user_register', [UserController::class, 'store']);
Route::get('/user_logout', [AuthController::class, 'logout']);
/**
 * ------------------------------------------------------------------------
 * WEBPAGE URLs
 * ------------------------------------------------------------------------
 * */
Route::get('/', function () {
    return view('frontend.home');
})->name('homepage');
Route::get('/news', function(){
    return view('frontend.article.view');
});
Route::get('/article/{slug}/{id}', [ArticleController::class, 'show']);
