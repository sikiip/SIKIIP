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

Route::get('/', function () {
    return view('login');
});
Route::post('/postlogin','LoginController@postlogin');

Route::get('/logout', 'LoginController@logout');

Route::group(['middleware' => ['auth','checkhakakses:1']],function(){
	Route::get('/beranda', 'BerandaController@index');	
});

