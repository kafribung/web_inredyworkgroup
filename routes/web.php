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

// ADMIN
Route::group(['middleware' => 'admin'], function () {
    Route::get('dashboard', 'DashboardController@index');

    Route::resource('position', 'PositionController');
    Route::resource('connenction', 'ConnenctionController');

    Route::resource('user', 'UserController');
});

// Email Verivication
Route::get('/verification/{token}/{id}', 'Auth\RegisterController@verification');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
