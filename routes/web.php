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
    return view('index');
});
Route::get('/', 'CourseController@index');

/* Socilite google */
Route::get('auth/google', 'AuthController@redirectToGoogle');
Route::get('google/callback', 'AuthController@handleGoogleCallback');
Auth::routes();

Route::get('/home', 'HomeController@index');

Route::post('/testphoto','UserController@UploadPhoto')->name('testphoto');
Route::get('/test/{package}' ,'CourseController@show');
Route::get('/tests/{usecourse}' ,'CourseController@show');

/* End Socilite google */

/* activation email */
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
Route::get('/Search','CourseController@Search');

/*END Courses Routes*/


/*Pack Routes*/

Route::get('/packs','PackController@index');
Route::get('/packs/{package}','PackController@show');

/*End Pack Routes*/

/*Google Sign in */

Route::get('login/google', 'GoogleController@redirectToProvider')->name('google.login');
Route::get('login/google/callback', 'GoogleController@handleProviderCallback');
Route::get('login/github', 'GithubController@redirectToProvider')->name('github.login');
Route::get('login/github/callback', 'GithubController@handleProviderCallback');

/*End Google Sign in */

/* Social Route*/

Route::post('/Subscribe','SocialController@Subscribe');
Route::post('/SaveContact','SocialController@Contact');
Route::get('/getmobile',function(){
    if(Session::has('user_social'))
        return view('mobile');
    else
        return redirect('/home');
});
Route::post('/completesocial','GoogleController@Complete');

/* End Social Route*/


Route::get('emptyuser',function (){
    DB::statement("SET foreign_key_checks=0");
    \App\SocialAccount::truncate();
    \App\User::truncate();
    DB::statement("SET foreign_key_checks=1");
});



