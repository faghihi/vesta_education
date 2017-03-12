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

Route::post('/testphoto','UserController@UploadPhoto')->name('testphoto');
Route::get('/test/{package}' ,'CourseController@show');
Route::get('/tests/{usecourse}' ,'CourseController@show');
/*
 * activation email
 */
Route::get('test/activation/{token}', 'Auth\LoginController@activateUser')->name('user.activate');


Auth::routes();

Route::get('/home', 'HomeController@index');


/*Categories Routes */

Route::get('categories','CategoryController@index');
Route::get('categories/{category}','CategoryController@show');
/*End Of Categories Routes */

/*Courses Routes*/

Route::get('/courses','CourseController@index');
Route::get('/courses/{usecourse}','CourseController@show');
Route::get('courses/reviews/{usecourse}','CourseController@ShowReviews');

/*END Courses Routes*/


/*Pack Routes*/

Route::get('/packs','PackController@index');
Route::get('/packs/{package}','PackController@show');

/*End Pack Routes*/

/*Google Sign in */

Route::get('login/google', 'GoogleController@redirectToProvider')->name('google.login');
Route::get('login/google/callback', 'GoogleController@handleProviderCallback');

/*End Google Sign in */

/* Social Route*/
Route::get('/test2', function () {
    return view('test2');
});
Route::post('/SaveContact','SocialController@Contact');
Route::post('/Subscribe','SocialController@Subscribe');
Route::get('/Subscribe','SocialController@Subscribe');
/* End Social Route*/

