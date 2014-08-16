<?php

	class TeacherController extends BaseController {

		
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
					$teachers = Teacher::all();
					return View::make('server.teacher.teacher')->with('teachers', $teachers);

				}


				public function getCreate()
				{

					return View::make('server.teacher.create');
					
				}



				/**
				 * Show the form for creating a new resource.
				 *
				 * @return Response
				 */
				public function create()
				{
					
				}

				/**
				 * Store a newly created resource in storage.
				 *
				 * @return Response
				 */
				public function store()
				{

					$rules = array(
					'id' => 'required|unique:tblteacher,t_id',
					'Firstname' => 'required',
					'Lastname' => 'required',
					'degree' => 'required',
					'age' => 'required|numeric',
					'contact' => 'required|numeric|min:11|unique:tblteacher,contact',
					'email'	=> 'required|email|unique:tblteacher,email',
					'password' => 'required|min:7'
						);

				$validator = Validator::make(Input::all(), $rules);

				if ($validator->fails()){
					return Redirect::to('Teacher/create')
						->withErrors($validator)
						->withInput(Input::except('password'));
				} else{

					
					$teachers = new Teacher;
					$teachers->t_id = Input::get('id');
					$teachers->fname = Input::get('Firstname');
					$teachers->mname = Input::get('Mname');
					$teachers->lname = Input::get('Lastname');
					$teachers->degree = Input::get('degree');
					$teachers->age = Input::get('age');
					$teachers->gender = Input::get('gender');
					$teachers->contact = Input::get('contact');
					$teachers->email = Input::get('email');
					$teachers->password = Hash::make(Input::get('password'));
					$teachers->save();


					Session::flash('message','Successfully Saved!');
					return Redirect::to('Teacher');
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
					$teachers = Teacher::find($id);

					return View::make('server.teacher.edit')
						->with('teachers', $teachers);
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
					'id' => 'required|unique:tblteacher,t_id,' . $id . ',t_id',
					'Firstname' => 'required',
					'Lastname' => 'required',
					'degree' => 'required',
					'age' => 'required|numeric',
					'contact' => 'required|numeric|unique:tblteacher,contact,' . $id . ',t_id',
					'email'	=> 'required|email|unique:tblteacher,email,' . $id . ',t_id',
						);

				$validator = Validator::make(Input::all(), $rules);

				if ($validator->fails()){
					return Redirect::to('Teacher/' . $id . '/edit')
						->withErrors($validator)
						->withInput();
				} else{
					
					$teachers = Teacher::find($id);
					$teachers->t_id = Input::get('id');
					$teachers->fname = Input::get('Firstname');
					$teachers->mname = Input::get('Mname');
					$teachers->lname = Input::get('Lastname');
					$teachers->degree = Input::get('degree');
					$teachers->age = Input::get('age');
					$teachers->gender = Input::get('gender');
					$teachers->contact = Input::get('contact');
					$teachers->email = Input::get('email');
					$teachers->save();


					Session::flash('message','Successfully Updated!');
					return Redirect::to('Teacher');
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
					$teachers= Teacher::find($id);
					$teachers->delete();
					return Redirect::to('Teacher');
				} 


	}
