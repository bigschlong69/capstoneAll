<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
// Authentication requests
Route::match(['get', 'post'],'/','Auth\AuthController@postLogin');
Route::get('/logout', 'Auth\AuthController@getLogout');

//Protected routes
Route::group(['middleware' => ['auth','role']], function () {

    Route::get('/dashboard', 'DashboardController@viewControl');
    Route::get('/checkin', 'CheckinsController@checkin');
    //Object Routes
    Route::get('courses', 'CoursesController@index');
    Route::get('admins', 'UsersController@admins');
    Route::get('instructors', 'UsersController@instructors');
    Route::get('students', 'UsersController@students');


    //Resource Routes
    Route::resource('users','UsersController');
    Route::resource('courses','CoursesController');
    Route::resource('rosters','RostersController');
    Route::resource('checkins','CheckinsController');
});






