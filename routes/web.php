<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
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

Route::get('/', [HomeController::class, 'index']);

Route::get('/about', function() {
    return view('about');
});

Route::get('/services', function() {
    return view('services');
});

Route::get('/contact', function() {
    return view('contact');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    // Cateogries
    Route::resource('categories',CategoryController::class);
    
    // Products
    Route::resource('products', ProductController::class);
});


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
