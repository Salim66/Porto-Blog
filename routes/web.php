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


Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('dashboard', [App\Http\Controllers\Backend\AdminController::class, 'adminDashboard'])->name('admin.dashboard');

    //Users
    Route::prefix('users')->group(function () {
        Route::resource('/', 'App\Http\Controllers\Backend\UserController');
        Route::post('/admin-add', 'App\Http\Controllers\Backend\UserController@add');
        Route::get('/admin-edit-data/{id}', 'App\Http\Controllers\Backend\UserController@editUser');
        Route::post('/admin-edit-store', 'App\Http\Controllers\Backend\UserController@updateUser');
        Route::post('/admin-status-update', 'App\Http\Controllers\Backend\UserController@updateUserStatus');
        Route::get('/trash-list', 'App\Http\Controllers\Backend\UserController@listUserTrash')->name('users.trash');
        Route::post('/admin-trash-update', 'App\Http\Controllers\Backend\UserController@updateUserTrash');
    });

    // User profile
    Route::prefix('profile')->group(function () {
        Route::get('/view', 'App\Http\Controllers\Backend\UserController@viewProfile')->name('profile.view');
        Route::get('/edit/{id}', 'App\Http\Controllers\Backend\UserController@editProfile')->name('profile.edit');
        Route::post('/update', 'App\Http\Controllers\Backend\UserController@updateProfile')->name('profile.update');
        Route::get('/change-password', 'App\Http\Controllers\Backend\UserController@changePassword')->name('user.change.password');
        Route::post('/update-password', 'App\Http\Controllers\Backend\UserController@updatePassword')->name('user.update.password');
    });

});

