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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::group([
    'namespace' => 'Admin'
],function (){
    Route::get('/admin/dashboard', 'DashboardController@index');
    Route::get('/admin/user', 'UserController@index');
});


Route::group([
    'namespace' => 'User'
],function (){
    Route::get('/', 'HomeController@index');
    Route::get('/detail', 'HomeController@show');
    Route::get('/profile', 'HomeController@profile');
});
