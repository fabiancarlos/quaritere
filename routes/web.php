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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'HomeController@index');
Route::get('/logout', 'HomeController@logout');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('/registrar', 'UserController@new');
Route::post('/users', 'UserController@create');
Route::get('/users/edit/{id}', 'UserController@edit');
Route::put('/users_update/{id}', 'UserController@update');
Route::patch('/users_update/{id}', 'UserController@update');

Route::post('/votar', 'VideoVote@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
