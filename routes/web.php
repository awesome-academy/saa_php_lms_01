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
    // Route::get('/login', 'LoginController@showLoginForm');
    // Route::post('/login', 'LoginController@login');
    Route::get('/', 'HomeController@index');
    // Route::get('/detail', 'HomeController@show');
    Route::get('/profile', 'HomeController@profile');
    // Route::post('/login', 'LoginController@login')->name('user/login');
    Route::post('/book/react','ReactionController@create')->name('user\book\react');
    Route::post('/book/react/remove','ReactionController@remove')->name('user\book\inreact');
    Route::get('/search','BookController@searchBook')->name('user\book\search');
    Route::get('/search/{name?}/author','BookController@searchByAuthor')->name('user\book\search\author');
    Route::get('/search/{name?}/category','BookController@searchByCategory')->name('user\book\search\category');
    Route::get('book/{id?}/detail','BookController@detail')->name('user\book\detail');
    Route::post('book/comment','BookController@comment')->name('user\book\comment');
    Route::post('book/rating','RatingController@rate')->name('user\book\rate');
});
Route::post('/user/logout', 'Auth\LoginController@logout')->name('user\logout');
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
    Route::get('user/search','Admin\UserController@search')->middleware('auth:admin')->name('admin\user\search');
    Route::get('user/export','Admin\UserController@export')->middleware('auth:admin')->name('admin\user\export');
    Route::get('user/create', 'Admin\UserController@create')->middleware('auth:admin')->name('admin\user\create');
    Route::post('user/create', 'Admin\UserController@store')->middleware('auth:admin')->name('admin\user\store');
    Route::get('user/{id?}/edit', 'Admin\UserController@edit')->middleware('auth:admin')->name('admin\user\edit');
    Route::post('user/{id?}/edit','Admin\UserController@update')->middleware('auth:admin')->name('admin\user\update');
    Route::post('user/{id?}/delete', 'Admin\UserController@delete')->middleware('auth:admin')->name('admin\user\delete');

    Route::get('role','Admin\RoleController@index')->middleware('auth:admin')->name('admin\role\index');
    Route::get('role/create', 'Admin\RoleController@create')->middleware('auth:admin')->name('admin\role\create');
    Route::post('role/create', 'Admin\RoleController@store')->middleware('auth:admin')->name('admin\role\store');
    Route::get('role/{id?}/edit', 'Admin\RoleController@edit')->middleware('auth:admin')->name('admin\role\edit');
    Route::post('role/{id?}/edit','Admin\RoleController@update')->middleware('auth:admin')->name('admin\role\update');
    Route::post('role/{id?}/delete', 'Admin\RoleController@delete')->middleware('auth:admin')->name('admin\role\delete');

    Route::get('book','Admin\BookController@index')->middleware('auth:admin')->name('admin\book\index');
    Route::get('book/search','Admin\BookController@search')->middleware('auth:admin')->name('admin\book\search');
    Route::get('book/create', 'Admin\BookController@create')->middleware('auth:admin')->name('admin\book\create');
    Route::post('book/create', 'Admin\BookController@store')->middleware('auth:admin')->name('admin\book\store');
    Route::get('book/{id?}/edit', 'Admin\BookController@edit')->middleware('auth:admin')->name('admin\book\edit');
    Route::post('book/{id?}/edit','Admin\BookController@update')->middleware('auth:admin')->name('admin\book\update');
    Route::post('book/{id?}/delete', 'Admin\BookController@delete')->middleware('auth:admin')->name('admin\book\delete');
});


