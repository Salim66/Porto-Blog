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
Route::get('login', [App\Http\Controllers\Backend\AdminController::class, 'adminRegisterLogin'])->name('admin.login');

//User Register
Route::post('register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('user.register');
//User Login
Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('user.login');

// Dashboard
Route::get('dashboard', [App\Http\Controllers\Backend\AdminController::class, 'adminDashboard'])->name('admin.dashboard');
