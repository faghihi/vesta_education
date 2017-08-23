<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::group(['middleware' => ['api','cors']], function () {
    Route::post('register', 'APIController@register');
    Route::post('login', 'APIController@login');

    Route::group(['middleware' => 'jwt-auth'], function () {
        Route::get('logout', 'APIController@logout');
        Route::post('get_user_details', 'APIController@get_user_details');
        Route::get('exercises/{id}','APIController@getexercises');

    });
    Route::get('salam',function (){
        return "salam";
    });
    Route::get('courses-list','APIController@listcourse');
    Route::get('categories','APIController@categories');
    Route::get('categories/{id}','APIController@category_courses');
    Route::get('courses/{id}','APIController@course');
    Route::get('news/{id}/{page}','APIController@news');
    Route::get('surveys/{id}','APIController@surveys');
    Route::get('surveys/record/{id}','APIController@survey_record');
});
