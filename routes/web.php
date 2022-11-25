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

/**
 * ------------------------------------------------------------------------
 * ADMIN URLs
 * ------------------------------------------------------------------------
 * */
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('yn-author', [AuthorController::class, 'index']);
    Route::get('yn-author/edit-profile', [AuthorController::class, 'edit_profile']);
    Route::put('yn-author', [AuthorController::class, 'update_profile']);
    Route::get('yn-author/articles', [AuthorController::class, 'articles']);
    Route::get('yn-author/articles/create', [AuthorController::class, 'add_article']);
    Route::get('yn-author/articles/{id}/edit', [AuthorController::class, 'edit_article']);
    Route::post('yn-author/articles', [AuthorController::class, 'store_article']);
    Route::put('yn-author/articles/{id}', [AuthorController::class, 'update_article']);
    Route::delete('yn-author/articles/{id}', [AuthorController::class, 'delete_article']);
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
Route::get('/tag/{slug}', [TagController::class, 'show']);
Route::get('/category/{slug}', [CategoryController::class, 'show']);