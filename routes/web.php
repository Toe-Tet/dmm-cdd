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
Route::group([
    'middleware' => 'guest'
], function(){
	Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');
	Route::post('/login', 'Auth\LoginController@login')->name('login.post');
});

Route::group([
    'middleware' => 'auth'
], function(){
	Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

	Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');
    Route::get('/cdd', 'CddController@index')->name('cdd.index');
    // Route::post('/', 'Auth\LoginController@postLogin')->name('login.post');
});