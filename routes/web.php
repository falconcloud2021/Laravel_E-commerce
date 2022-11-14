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

Route::get('/', [App\Http\Controllers\ShopHomeController::class, 'indexPage'])->name('index');
// Admin Dashboard routes
Route::get('/main', [\App\Http\Controllers\DashboardMainController::class, 'mainPage'])->name('dashboard');

Route::get('/welcome', function () {return view('welcome');});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

