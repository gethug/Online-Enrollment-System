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


Route::resource('Grade', 'GradeController');
Route::resource('Student', 'StudentController');
Route::resource('Student/create', 'StudentController@getCreate');
Route::resource('Adviser', 'AdviserController');
Route::resource('Adviser/create', 'AdviserController@getCreate');
Route::resource('Cashier', 'CashierController');
Route::resource('Cashier/create', 'CashierController@getCreate');
Route::resource('SystemUser', 'UserController');
Route::resource('SystemUser/create', 'UserController@getCreate');
Route::resource('Cashiering', 'CashieringController');
Route::resource('Enrolee', 'EnroleeController');
Route::resource('Enrolee/create', 'EnroleeController@getCreate');
Route::resource('Tuition', 'TuitionController');
Route::resource('Tuition/create', 'TuitionController@getCreate');
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
Route::resource('Miscellaneous','MiscController');
Route::resource('Miscellaneous/create','MiscController@getCreate');
Route::resource('Discount', 'DiscountController');
Route::resource('Discount/create', 'DiscountController@getCreate');
Route::resource('ClassStart', 'ClassController');
Route::resource('ClassStart/create', 'ClassController@getCreate');
Route::resource('PaySched', 'PayController');
Route::resource('PaySched/create', 'PayController@getCreate');
Route::resource('Enroll', 'EnrollController');
Route::resource('Enroll/create', 'EnrollController@getCreate');

Route::get('api/dropdownsec','GradeController@getDropsec');
Route::get('api/dropdowngra','GradeController@getDropgra');
Route::get('api/dropdownsubj','GradeController@getDropsubj');
Route::get('api/dropdown','EnrollController@getDrop');
Route::get('api/dropdownhis','EnrollController@getDrophis');
Route::get('api/dropdownname','EnrollController@getDropname');
Route::get('api/dropdowntui','EnrollController@getDroptui');
Route::get('api/dropdownfee','EnrollController@getDropfee');
Route::get('api/dropdownmisc','EnrollController@getDropmisc');
Route::get('api/dropdowndisc','EnrollController@getDropdisc');
Route::get('api/dropdownsec','EnrollController@getDrop2');
Route::get('api/dropdownsched','EnrollController@getDropsched');
Route::get('api/dropdownsec','SchedController@getDrop');
Route::get('api/dropdownsub','SchedController@getDrop2');
Route::resource('Schedule', 'SchedController');
Route::resource('Schedule/create', 'SchedController@getCreate');
Route::get('api/dropdown','CashieringController@getDrop');
Route::get('api/dropdownname','CashieringController@getDropname');
Route::get('api/dropdown2','CashieringController@getDroppay');
Route::get('api/dropdownbro','CashieringController@getDropbro');
