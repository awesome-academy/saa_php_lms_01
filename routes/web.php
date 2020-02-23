<?php

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


Route::group([
    'namespace' => 'User'
],function (){
    Route::get('/login', 'LoginController@showLoginForm');
    // Route::post('/login', 'LoginController');
    Route::get('/', 'HomeController@index');
    Route::get('/detail', 'HomeController@show');
    Route::get('/profile', 'HomeController@profile');
    Route::post('/login', 'LoginController@login')->name('user/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->group(function () {
    Route::get('dashboard', 'Admin\DashboardController@index');
    // Route::get('register', 'DashboardController@create')->name('admin.register');
    // Route::post('register', 'DashboardController@store')->name('admin.register.store');
    Route::get('login', 'Admin\Auth\LoginController@showLoginForm')->name('admin\auth\login');
    Route::post('login', 'Admin\Auth\LoginController@loginAdmin')->name('admin\auth\loginAdmin');
    Route::post('logout', 'Admin\Auth\LoginController@logout')->name('admin\auth\logout');
    
    Route::get('user','Admin\UserController@index')->middleware('auth:admin')->name('admin\user\index');
    Route::get('user/create', 'Admin\UserController@create')->middleware('auth:admin')->name('admin\user\create');
    Route::post('user/create', 'Admin\UserController@store')->middleware('auth:admin')->name('admin\user\store');

    Route::get('user/{id?}/edit', 'Admin\UserController@edit')->middleware('auth:admin')->name('admin\user\edit');
    Route::post('user/{id?}/edit','Admin\UserController@update')->middleware('auth:admin')->name('admin\user\update');

    Route::post('user/{id?}/delete', 'Admin\UserController@delete')->middleware('auth:admin')->name('admin\user\delete');
});