<?php

	class StudentController extends BaseController {

		
				public function __construct() {
					
						$this->beforeFilter('auth');

				}

				/**
				 * Display a listing of the resource.
				 *
				 * @return Response
				 */
				public function index()
				{

					$students = Student::join('tblenrolee', 'tblenrolee.en_id', '=', 'tblstudent.en_id')
					->select('tblstudent.user', 'tblstudent.password', 'tblenrolee.en_id', 'tblenrolee.fname', 'tblenrolee.mname', 'tblenrolee.lname')
					->get();
					return View::make('server.student.index')
					->with('students', $students);

				}

				/**
				 * Show the form for creating a new resource.
				 *
				 * @return Response
				 */
				public function create()
				{
					
				}


				public function getCreate()
				{
					$students = Enroll::join('tblenrolee', 'tblenrolee.en_id', '=', 'tblenroled.en_id')
					->select('tblenrolee.en_id', 'tblenrolee.fname', 'tblenrolee.mname', 'tblenrolee.lname')
					->get();

					return View::make('server.student.create')
					->with('students', $students);
				}
				/**
				 * Store a newly created resource in storage.
				 *
				 * @return Response
				 */
				public function store()
				{
					$rules = array(
					'student' => 'required|unique:tblstudent,en_id',
					'user'	=> 'required|unique:tblstudent,user',
					'password' => 'required'
						);

				$validator = Validator::make(Input::all(), $rules);

				if ($validator->fails()){
					return Redirect::to('Student/create')
						->withErrors($validator)
						->withInput(Input::except('password'));
				} else{
					
					$student = new Student;
					$student->en_id = Input::get('student');
					$student->user = Input::get('user');
					$student->password = Hash::make(Input::get('password'));
					$student->save();


					Session::flash('message','Successfully Saved!');
					return Redirect::to('Student');
				}


		
				}

				/**
				 * Display the specified resource.
				 *
				 * @param  int  $id
				 * @return Response
				 */
				public function show($id)
				{
					//
				}

				/**
				 * Show the form for editing the specified resource.
				 *
				 * @param  int  $id
				 * @return Response
				 */
				public function edit($id)
				{
					$students = Student::find($id);
					return View::make('server.student.edit')
					->with('students', $students);
				}

				/**
				 * Update the specified resource in storage.
				 *
				 * @param  int  $id
				 * @return Response
				 */
				public function update($id)
				{
						$rules = array(
					'user'	=> 'required|unique:tblstudent,user,' . $id . ',en_id',
						);

				$validator = Validator::make(Input::all(), $rules);

				if ($validator->fails()){
					return Redirect::to('Student/' . $id . '/edit')
						->withErrors($validator);
				} else{
					
					$students = Student::find($id);
					$students->user = Input::get('user');
					$students->save();


					Session::flash('message','Successfully Saved!');
					return Redirect::to('Student');
				}
				}

				/**
				 * Remove the specified resource from storage.
				 *
				 * @param  int  $id
				 * @return Response
				 */
				public function destroy($id)
				{
					$students = Student::find($id);
					$students->delete();
					return Redirect::to('Student');
				} 


	}
