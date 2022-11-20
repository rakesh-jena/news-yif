<?php

use Illuminate\Support\Facades\Route;

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
    Route::get('/admin', function () {
        return view('admin.dashboard');
    });
});
/**Authentication */
Route::get('/admin/login', function () {
    return view('admin.login');
})->name('login');

Route::get('/login', function () {
    return view('frontend.login');
});

Route::get('/register', function () {
    return view('frontend.register');
});
/**
 * ------------------------------------------------------------------------
 * WEBPAGE URLs
 * ------------------------------------------------------------------------
 * */
Route::get('/', function () {
    return view('frontend.home');
});
Route::get('/news', function(){
    return view('frontend.news');
});
