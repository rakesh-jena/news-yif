<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController​;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TutController;
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
 * ADMIN DASHBOARD URLs
 * ------------------------------------------------------------------------
 * */
Route::middleware(['auth', 'admin'])->group(function () {
    /**Dashboard */
    Route::get('yn-admin', [DashboardController​::class, 'index']);
    Route::put('yn-admin', [DashboardController​::class, 'update_profile']);
    Route::put('approved', [ArticleController::class, 'update_status_approved']);
    Route::resource('yn-admin/users', UserController::class);
    Route::resource('yn-admin/tags', TagController::class);
    Route::resource('yn-admin/articles', ArticleController::class);
    Route::resource('yn-admin/category', CategoryController::class);
    Route::resource('yn-admin/profiles', ProfileController::class);
    Route::get('yn-admin/design_25under25', [ProfileController::class, 'design']);
    Route::post('yn-admin/section_featured', [TutController::class, 'featured']);
    Route::post('yn-admin/section_one', [TutController::class, 'section_one']);
    Route::post('yn-admin/section_two', [TutController::class, 'section_two']);
    Route::post('yn-admin/section_three', [TutController::class, 'section_three']);
    Route::post('yn-admin/section_four', [TutController::class, 'section_four']);
    Route::post('yn-admin/section_five', [TutController::class, 'section_five']);
    Route::get('yn-admin/subscribers', [SubscriberController::class, 'index']);
    Route::get('yn-admin/all-users', [UserController::class, 'all_users']);
    Route::post('yn-admin/s_featured', [DashboardController​::class, 's_featured']);
    Route::post('yn-admin/s_agenda', [DashboardController​::class, 's_agenda']);
    Route::post('yn-admin/s_scoop', [DashboardController​::class, 's_scoop']);
    Route::post('yn-admin/s_fullscreen', [DashboardController​::class, 's_fullscreen']);
    Route::post('yn-admin/s_g_three', [DashboardController​::class, 's_g_three']);
    Route::post('yn-admin/s_g_five', [DashboardController​::class, 's_g_five']);
    Route::post('yn-admin/s_first', [DashboardController​::class, 's_first']);
    Route::post('yn-admin/s_second', [DashboardController​::class, 's_second']);
    Route::post('yn-admin/s_last', [DashboardController​::class, 's_last']);
    Route::post('check-category', [CategoryController::class, 'check_if_used']);
    Route::post('check-tag', [TagController::class, 'check_if_used']);
});

/**
 * ------------------------------------------------------------------------
 * AUTHOR DASHBOARD URLs
 * ------------------------------------------------------------------------
 * */
Route::middleware(['auth', 'author'])->group(function () {
    Route::get('yn-author', [AuthorController::class, 'index']);
    Route::put('yn-author', [AuthorController::class, 'update_profile']);
    Route::get('yn-author/articles', [AuthorController::class, 'articles']);
    Route::get('yn-author/articles/create', [AuthorController::class, 'add_article']);
    Route::get('yn-author/articles/{id}/edit', [AuthorController::class, 'edit_article']);
    Route::post('yn-author/articles', [AuthorController::class, 'store_article']);
    Route::put('yn-author/articles/{id}', [AuthorController::class, 'update_article']);
    Route::delete('yn-author/articles/{id}', [AuthorController::class, 'delete_article']);
    Route::put('send-for-approval', [ArticleController::class, 'update_status_processing']);
    Route::put('yn-author/change-password', [AuthController::class, 'change_password']);
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
Route::get('/{slug}', [ArticleController::class, 'featured']);
Route::get('/tag/{slug}', [TagController::class, 'show']);
Route::get('/category/{slug}', [CategoryController::class, 'show']);
Route::get('/author/{slug}', [UserController::class, 'show']);
Route::post('/add-subscriber', [SubscriberController::class, 'store']);
Route::post('/search', [ArticleController::class, 'search']);
Route::post('/search/ajax', [ArticleController::class, 'ajax_search']);
Route::post('/ajax-load-more', [ArticleController::class, 'ajax_loadmore']);