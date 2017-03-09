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
    return view('welcome');
});
/*
 * Socilite google
 */
Route::get('auth/google', 'AuthController@redirectToGoogle');
Route::get('google/callback', 'AuthController@handleGoogleCallback');
Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/test','UserController@UploadPhoto')->name('test');
/*
 * activation email
 */
Route::get('test/activation/{token}', 'Auth\LoginController@activateUser')->name('user.activate');


Auth::routes();

Route::get('/home', 'HomeController@index');
