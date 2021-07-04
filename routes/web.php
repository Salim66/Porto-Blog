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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Users login and register page
Route::get('login', [App\Http\Controllers\AdminController::class, 'adminRegisterLogin'])->name('admin.login');

// Dashboard
Route::get('dashboard', [App\Http\Controllers\AdminController::class, 'adminDashboard'])->name('admin.dashboard');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
