<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;

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

Route::get('/', [App\Http\Controllers\ShopHomeController::class, 'indexPage'])->name('index');
// Admin Dashboard routes
Route::prefix('admin')->group(function () {
    Route::get('/main', [DashboardController::class, 'mainPage']);
    Route::resource('/products', ProductController::class);
    Route::resource('/categories', CategoryController::class);
});

Route::get('/welcome', function () {return view('welcome');});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

