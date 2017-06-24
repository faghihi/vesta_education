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

//Route::get('/', function () {
//    return view('index');
//});
Route::get('/', 'IndexController@index');
/*Route::get('/',function (){
    $redis = app()->make('redis');
    $redis->set("key1","testValue");
    return $redis->get("key1");
});*/

/* Socilite google */
Route::get('auth/google', 'AuthController@redirectToGoogle');
Route::get('google/callback', 'AuthController@handleGoogleCallback');
Auth::routes();
Route::post('logout', 'Auth\LoginController@logout')->name('auth.logout');
Route::get('/home', 'HomeController@index');

Route::post('/testphoto','UserController@UploadPhoto')->name('testphoto');
Route::get('/test/{package}' ,'CourseController@show');
Route::get('/tests/{usecourse}' ,'CourseController@show');

/* End Socilite google */

/* activation email */
Route::get('test/activation/{token}', 'Auth\LoginController@activateUser')->name('user.activate');


Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/contactUs', function (){
    return view('Contact');
});
Route::get('/aboutUs', function (){
    return view('public-pages.about');
});
Route::get('/FAQ', function (){
    return view('public-pages.faq');
});

/*Categories Routes */

Route::get('categories','CategoryController@index');
Route::get('categories/{category}','CategoryController@show');
/*End Of Categories Routes */

/*Courses Routes*/

Route::get('/courses','CourseController@index');
Route::get('/courses/{usecourse}','CourseController@show');
Route::get('courses/reviews/{usecourse}','CourseController@ShowReviews');
Route::get('/courses-grid/Search','CourseController@Search');
Route::get('/courses-grid/category/{id}','CourseController@category');

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
Route::get('/reset',function(){
    return view('auth.passwords.email');
});
Route::post('/completesocial','GoogleController@Complete');

/* End Social Route*/

/* Take Course */

Route::get('/takecourse/{usecourse}','UserController@takecourse');
Route::get('campaign/{campaign}/takecourse/{usecourse}','UserController@takecoursebycampaign');

/* End Take Course */

/* Course Route */
Route::get('/courses-grid', function() {
    return view('courses/courses-list');
});
Route::get('/courses-grid', ['middleware' => 'auth','uses'=>'CourseController@index']);
Route::get('/courses-grid/{usecourse}', ['middleware' => 'auth','uses'=>'CourseController@show']);
Route::get('/course-packages/{usecourse}', ['middleware' => 'auth','uses'=>'CourseController@pack']);
Route::get('/shop-card-course/{id}',['middleware' => 'auth','uses'=>'CourseController@buy']);
Route::post('/send',['middleware' => 'auth','uses'=>'CourseController@send']);
Route::post('/verify',['middleware' => 'auth','uses'=>'CourseController@pay']);
Route::post('/course-review',['middleware' => 'auth','uses'=>'CourseController@review']);
/* End Course Route */

/* Package Route */
Route::get('/packages-grid', function() {
    return view('packages/packages-list');
});
Route::get('/page-our-staff', function() {
    return view('page-our-staff');
});
Route::get('/packages-grid',['middleware' => 'auth','uses'=> 'PackController@index']);
Route::get('/packages-grid/{package}', ['middleware' => 'auth','uses'=>'PackController@show']);
Route::post('/package-review',['middleware' => 'auth','uses'=>'PackController@review']);
Route::get('/shop-card-package/{id}',['middleware' => 'auth','uses'=>'PackController@buy']);
/* End Package Route */

/* Teacher */
Route::get('/teachers','TeacherController@index');
Route::get('/teachers/{teacher}','TeacherController@show');
Route::get('/teachers-Search','TeacherController@Search');
/* End Teacher */

/* profile */
//Route::get('/profile',['middleware' => 'auth','uses'=>'UserController@index']);
Route::get('/profile',['middleware' => 'auth','uses'=>'UserController@index']);
Route::get('/profile-edit',['middleware' => 'auth','uses'=>'UserController@edit']);
Route::get('/profile-update',['middleware' => 'auth','uses'=>'UserController@update']);
Route::post('/incr-credit',['middleware' => 'auth','uses'=>'UserController@incrCredit']);
/* End profile */

//'middleware' => 'auth',

Route::get('emptyuser',function (){
    \App\SocialAccount::truncate();
    \App\User::truncate();
});


Route::get('test12/{id}',function ($id){
   return  \App\User::findorfail($id);
});


Route::get('/discount_course_compute','DiscountController@course_discount');
Route::post('/discount_course_compute','DiscountController@course_discount');


//Route::group(['prefix' => 'admin'], function () {
//    Voyager::routes();
//});

