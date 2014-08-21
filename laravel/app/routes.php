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
Route::resource('admin', 'DashController');


Route::resource('Tuition', 'TuitionController');
Route::resource('Tuition/create', 'TuitionController@getCreate');
Route::resource('Cashier', 'CashierController');
Route::resource('Cashier/create', 'CashierController@getCreate');
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
Route::resource('Teacher', 'TeacherController');
Route::resource('Teacher/create', 'TeacherController@getCreate');

Route::resource('Schedule', 'SchedController');
Route::resource('Schedule/create', 'SchedController@getCreate');