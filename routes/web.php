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

/*Route::get('/users', 'UserController@index');
Route::post('/users/update/{id}', 'userController@update');
Route::delete('/users/delete/{id}', 'userController@delete');*/

Route::get('/blogs/{id}', 'BlogController@index');
Route::post('/blogs/update/{id}', 'BlogController@update');
Route::delete('/blogs/delete/{id}', 'BlogController@delete');
