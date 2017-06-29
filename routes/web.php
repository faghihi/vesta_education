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

Auth::routes();
Route::post('logout', 'Auth\LoginController@logout')->name('auth.logout');


Route::post('/testphoto','UserController@UploadPhoto')->name('testphoto');
Route::get('/test/{package}' ,'CourseController@show');
Route::get('/tests/{usecourse}' ,'CourseController@show');

/* End Socilite google */

/* activation email */
Route::get('test/activation/{token}', 'Auth\LoginController@activateUser')->name('user.activate');


Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/about',function (){
   return view('page-about-us');
});

Route::get('/contactUs', function (){
    return view('Contact');
});

Route::post('/contactUs','SocialController@StoreContact');
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

//Route::get('/takecourse/{usecourse}','UserController@takecourse');
//Route::get('campaign/{campaign}/takecourse/{usecourse}','UserController@takecoursebycampaign');

/* End Take Course */

/* Course Route */
Route::get('/courses-grid', function() {
    return view('courses/courses-list');
});
Route::get('/courses-grid', ['uses'=>'CourseController@index']);
Route::get('/courses-grid/{usecourse}', ['uses'=>'CourseController@show']);
Route::get('/course-packages/{usecourse}', ['uses'=>'CourseController@pack']);
Route::get('/shop-card-course/{id}',['middleware' => 'auth','uses'=>'CourseController@buy']);
Route::post('/buycourse/{id}',['middleware' => 'auth','uses'=>'CourseController@CourseBuy']);
Route::post('/buycoursecredit/{id}',['middleware' => 'auth','uses'=>'CourseController@CourseBuycredit']);
Route::post('/course-review',['middleware' => 'auth','uses'=>'CourseController@review']);
Route::post('/course/verify',['middleware' => 'auth','uses'=>'CourseController@CourseBuyVerify']);
/* End Course Route */

/* Package Route */
Route::get('/packages-grid', function() {
    return view('packages/packages-list');
});
Route::get('/page-our-staff', function() {
    return view('page-our-staff');
});
Route::get('/packages-grid',['uses'=> 'PackController@index']);
Route::get('/packages-grid/{package}', ['uses'=>'PackController@show']);
Route::post('/package-review',['middleware' => 'auth','uses'=>'PackController@review']);
Route::post('/buypackage/{id}',['middleware' => 'auth','uses'=>'PackController@PackageBuy']);
Route::post('/buypackagecredit/{id}',['middleware' => 'auth','uses'=>'PackController@PackageBuycredit']);
Route::post('/package/verify',['middleware' => 'auth','uses'=>'PackController@PackageBuyVerify']);
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
Route::post('/changepass',['middleware' => 'auth','uses'=>'UserController@ChangePass']);
Route::post('/profile-image-change',['middleware' => 'auth','uses'=>'UserOperations@UploadPhoto']);
Route::get('/profile-update',['middleware' => 'auth','uses'=>'UserController@update']);
Route::post('/incr-credit',['middleware' => 'auth','uses'=>'UserController@incrCredit']);
Route::post('/credit/verify',['middleware' => 'auth','uses'=>'UserController@verifycredit']);
/* End profile */

//'middleware' => 'auth',

Route::get('emptyuser',function (){
    \App\SocialAccount::truncate();
    \App\User::truncate();
});


Route::get('test12/{id}',function ($id){
   return  \App\User::findorfail($id);
});


Route::post('/discount_course_compute','DiscountController@course_discount');

/* Search*/
Route::get('/Search','IndexController@search');
/* Search*/



//Route::group(['prefix' => 'admin'], function () {
//    Voyager::routes();
//});

Route::get('/test',function (){
    $id = '';

    for($i = 0; $i < 12; $i++) {
        $id .= mt_rand(0, 9);
    };
    $id=intval($id);
    $message="تراکنش با موفقیت انجام شد، ولی مشکلی به وجود آمده است ، با بخش پشتیبانی تماس بگیرید. | "." کد پیگیری تراکنش :$id ";
    return view('pay-error.pay-error')->with(['message'=>$message]);

});
