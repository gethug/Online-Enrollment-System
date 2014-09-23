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
					$teachers = Teacher::join('tbltype', 'tblteacher.type_id', '=', 'tbltype.type_id')
					->select('tblteacher.t_id', 'tbltype.type','tblteacher.fname', 'tblteacher.mname', 'tblteacher.lname','tblteacher.degree','tblteacher.age','tblteacher.gender','tblteacher.contact','tblteacher.contact', 'tblteacher.email')
					->get();
					return View::make('server.teacher.teacher')->with('teachers', $teachers);

				}


				public function getCreate()
				{
					$users = Usertype::all();
					return View::make('server.teacher.create')
					->with('users', $users);
					
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
					return Redirect::to('Systemuser/create')
						->withErrors($validator)
						->withInput(Input::except('password'));
				} else{

					
					$teachers = new Teacher;
					$teachers->t_id = Input::get('id');
					$teachers->type_id = Input::get('type');
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
					return Redirect::to('Systemuser');
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
					$users = Usertype::all();

					return View::make('server.teacher.edit')
						->with('teachers', $teachers)
						->with('users', $users);
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
					return Redirect::to('Systemuser/' . $id . '/edit')
						->withErrors($validator)
						->withInput();
				} else{
					
					$teachers = Teacher::find($id);
					$teachers->t_id = Input::get('id');
					$teachers->type_id = Input::get('type');
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
					return Redirect::to('Systemuser');
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
					return Redirect::to('Systemuser');
				} 


	}
