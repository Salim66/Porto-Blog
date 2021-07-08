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


// Routes for frontend
Route::get('/', 'App\Http\Controllers\Frontend\FrontendController@index')->name('blog.index');
Route::get('/single-blog/{slug}', 'App\Http\Controllers\Frontend\FrontendController@singleBlog')->name('single.blog.page');



// Route::get('/', function () {
//     return view('welcome');
// });

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
        Route::delete('/delete/{id}', 'App\Http\Controllers\Backend\UserController@destroy')->name('users.destroy');
    });

    // User profile
    Route::prefix('profile')->group(function () {
        Route::get('/view', 'App\Http\Controllers\Backend\UserController@viewProfile')->name('profile.view');
        Route::get('/edit/{id}', 'App\Http\Controllers\Backend\UserController@editProfile')->name('profile.edit');
        Route::post('/update', 'App\Http\Controllers\Backend\UserController@updateProfile')->name('profile.update');
        Route::get('/change-password', 'App\Http\Controllers\Backend\UserController@changePassword')->name('user.change.password');
        Route::post('/update-password', 'App\Http\Controllers\Backend\UserController@updatePassword')->name('user.update.password');
    });

    Route::prefix('categories')->group(function () {
        Route::get('/view', 'App\Http\Controllers\Backend\CategoryController@view')->name('categories.view');
        Route::get('/add', 'App\Http\Controllers\Backend\CategoryController@add')->name('categories.add');
        Route::post('/store', 'App\Http\Controllers\Backend\CategoryController@store')->name('categories.store');
        Route::get('/edit/{id}', 'App\Http\Controllers\Backend\CategoryController@edit')->name('categories.edit');
        Route::post('/update', 'App\Http\Controllers\Backend\CategoryController@update')->name('categories.update');
        Route::post('/status-update', 'App\Http\Controllers\Backend\CategoryController@statusUpdate')->name('categorires.status.update');
        Route::get('/trash', 'App\Http\Controllers\Backend\CategoryController@trashList')->name('categories.trash');
        Route::post('/trash-update', 'App\Http\Controllers\Backend\CategoryController@trashUpdate')->name('categories.trash.update');
        Route::delete('/delete/{id}', 'App\Http\Controllers\Backend\CategoryController@destroy')->name('categories.destroy');
    });

    Route::prefix('tags')->group(function () {
        Route::get('/view', 'App\Http\Controllers\Backend\TagController@view')->name('tags.view');
        Route::get('/add', 'App\Http\Controllers\Backend\TagController@add')->name('tags.add');
        Route::post('/store', 'App\Http\Controllers\Backend\TagController@store')->name('tags.store');
        Route::get('/edit/{id}', 'App\Http\Controllers\Backend\TagController@edit')->name('tags.edit');
        Route::post('/update', 'App\Http\Controllers\Backend\TagController@update')->name('tags.update');
        Route::post('/status-update', 'App\Http\Controllers\Backend\TagController@statusUpdate')->name('tags.status.update');
        Route::get('/trash', 'App\Http\Controllers\Backend\TagController@trashList')->name('tags.trash');
        Route::post('/trash-update', 'App\Http\Controllers\Backend\TagController@trashUpdate')->name('tags.trash.update');
        Route::delete('/delete/{id}', 'App\Http\Controllers\Backend\TagController@destroy')->name('tags.destroy');
    });

    Route::prefix('posts')->group(function () {
        Route::get('/view', 'App\Http\Controllers\Backend\PostController@view')->name('posts.view');
        Route::get('/add', 'App\Http\Controllers\Backend\PostController@add')->name('posts.add');
        Route::post('/store', 'App\Http\Controllers\Backend\PostController@store')->name('posts.store');
        Route::get('/edit/{id}', 'App\Http\Controllers\Backend\PostController@edit')->name('posts.edit');
        Route::post('/update', 'App\Http\Controllers\Backend\PostController@update')->name('posts.update');
        Route::get('/preview/{id}', 'App\Http\Controllers\Backend\PostController@preview')->name('posts.preview');
        Route::post('/status-update', 'App\Http\Controllers\Backend\PostController@statusUpdate')->name('posts.status.update');
        Route::get('/trash', 'App\Http\Controllers\Backend\PostController@trashList')->name('posts.trash');
        Route::post('/trash-update', 'App\Http\Controllers\Backend\PostController@trashUpdate')->name('posts.trash.update');
        Route::delete('/delete/{id}', 'App\Http\Controllers\Backend\PostController@destroy')->name('posts.destroy');
    });



});

