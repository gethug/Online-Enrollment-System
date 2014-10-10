<?php

	class UserController extends BaseController {

		
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
					$users = SysUser::join('tblteacher', 'tblteacher.t_id', '=', 'tbluser.t_id')
					->select('tbluser.user', 'tbluser.password', 'tbluser.t_id', 'tblteacher.fname', 'tblteacher.mname', 'tblteacher.lname')
					->get();
					return View::make('server.systemuser.index')
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

				public function getCreate()
				{
					$teachers = Teacher::all();
					return View::make('server.systemuser.create')
					->with('teachers', $teachers);
				}

				/**
				 * Store a newly created resource in storage.
				 *
				 * @return Response
				 */
				public function store()
				{

					$rules = array(
					'teacher' => 'required|unique:tbluser,t_id',
					'user'	=> 'required|unique:tbluser,user',
					'password' => 'required'
						);

				$validator = Validator::make(Input::all(), $rules);

				if ($validator->fails()){
					return Redirect::to('SystemUser/create')
						->withErrors($validator)
						->withInput(Input::except('password'));
				} else{
					
					$users = new SysUser;
					$users->t_id = Input::get('teacher');
					$users->user = Input::get('user');
					$users->password = Hash::make(Input::get('password'));
					$users->save();


					Session::flash('message','Successfully Saved!');
					return Redirect::to('SystemUser');
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
			
					$users = SysUser::find($id);
					return View::make('server.systemuser.edit')
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
					'user'	=> 'required|unique:tbluser,user,' . $id . ',t_id',
						);

				$validator = Validator::make(Input::all(), $rules);

				if ($validator->fails()){
					return Redirect::to('SystemUser/' . $id . '/edit')
						->withErrors($validator);
				} else{
					
					$users = SysUser::find($id);
					$users->user = Input::get('user');
					$users->save();


					Session::flash('message','Successfully Saved!');
					return Redirect::to('SystemUser');
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
					$users = SysUser::find($id);
					$users->delete();
					return Redirect::to('SystemUser');
				} 


	}
