<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

// ADMIN
Route::group(['middleware' => 'admin'], function () {
    Route::get('dashboard', 'DashboardController@index');

    // JABATAN/ KONSENTRASI
    Route::resource('position', 'PositionController');
    Route::resource('concentration', 'ConcentrationController');

    // USER/ ANGGOTA
    Route::resource('user', 'UserController');
    Route::get('/user/{nir}/active', 'UserController@active');
    Route::get('/user/{nir}/panding', 'UserController@panding');

    // BENDAHARA
    Route::resource('treasurer', 'TreasurerController');

    // ADMIN
    Route::resource('admin', 'AdminController');

    // Artikel
    Route::resource('article', 'ArticlelController');
    Route::get('/article/{article:slug}/active', 'ArticlelController@active');
    Route::get('/article/{article:slug}/panding', 'ArticlelController@panding');

    // Karya
    Route::resource('creation', 'CreationController');
    Route::get('/creation/{creation:slug}/active', 'CreationController@active');
    Route::get('/creation/{creation:slug}/panding', 'CreationController@panding');

    // Inventaris
    Route::resource('inventory', 'InventoryController');

    // Kegiatan
    Route::resource('activity', 'ActivityController');
});

// Email Verivication
Route::get('/verification/{token}/{id}', 'Auth\RegisterController@verification');

Auth::routes();
