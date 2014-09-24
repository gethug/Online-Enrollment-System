<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


Route::resource('/', 'HomeController');
Route::resource('login', 'LoginController');
Route::resource('admin', 'DashboardController');

Route::resource('Enrolee', 'EnroleeController');
Route::resource('Enrolee/create', 'EnroleeController@getCreate');
Route::resource('Tuition', 'TuitionController');
Route::resource('Tuition/create', 'TuitionController@getCreate');
Route::resource('Usertype', 'UserController');
Route::resource('Usertype/create', 'UserController@getCreate');
Route::resource('administrator', 'AdminController');
Route::resource('administrator/create', 'AdminController@getCreate');
Route::resource('Room', 'RoomController');
Route::resource('Room/create', 'RoomController@getCreate');
Route::resource('Section', 'SectionController');
Route::resource('Section/create', 'SectionController@getCreate');
Route::resource('SY', 'SyController');
Route::resource('SY/create', 'SYController@getCreate');
Route::resource('Level', 'LevelController');
Route::resource('Level/create', 'LevelController@getCreate');
Route::resource('Subject', 'SubjectController');
Route::resource('Subject/create', 'SubjectController@getCreate');
Route::resource('Systemuser', 'TeacherController');
Route::resource('Systemuser/create', 'TeacherController@getCreate');
Route::resource('Miscellaneous','MiscController');
Route::resource('Miscellaneous/create','MiscController@getCreate');
Route::resource('Discount', 'DiscountController');
Route::resource('Discount/create', 'DiscountController@getCreate');

Route::get('api/dropdown','SchedController@getDrop');
Route::get('api/dropdownsub','SchedController@getDrop2');
Route::resource('Schedule', 'SchedController');
Route::resource('Schedule/create', 'SchedController@getCreate');
