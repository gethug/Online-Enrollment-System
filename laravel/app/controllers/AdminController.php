<?php

	class AdminController extends BaseController {

		
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
					$admins = Admin::all();
					return View::make('server.addmin.addmin')->with('admins', $admins);

				}



				public function getCreate()
				{

					return View::make('server.addmin.create');
					
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
					'Firstname' => 'required',
					'Lastname' => 'required',
					'user'	=> 'required|unique:tbladmin,user',
					'password' => 'required'
						);

				$validator = Validator::make(Input::all(), $rules);

				if ($validator->fails()){
					return Redirect::to('administrator/create')
						->withErrors($validator)
						->withInput(Input::except('password'));
				} else{
					
					$admins = new Admin;
					$admins->Fname = Input::get('Firstname');
					$admins->Mname = Input::get('Mname');
					$admins->Lname = Input::get('Lastname');
					$admins->user = Input::get('user');
					$admins->password = Hash::make(Input::get('password'));
					$admins->save();


					Session::flash('message','Successfully Saved!');
					return Redirect::to('administrator');
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

				}

				/**
				 * Show the form for editing the specified resource.
				 *
				 * @param  int  $id
				 * @return Response
				 */
				public function edit($id)
				{
					$admin = Admin::find($id);

					return View::make('server.addmin.edit')
						->with('admin', $admin);
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
					'Firstname' => 'required',
					'Lastname' => 'required',
					'user'	=> 'required|unique:tbladmin,user,' . $id . ',a_id'
						);

				$validator = Validator::make(Input::all(), $rules);

				if ($validator->fails()){
					return Redirect::to('administrator/' . $id . '/edit')
						->withErrors($validator)
						->withInput();
				} else{
					
					$admins = Admin::find($id);
					$admins->Fname = Input::get('Firstname');
					$admins->Mname = Input::get('Mname');
					$admins->Lname = Input::get('Lastname');
					$admins->user = Input::get('user');
					$admins->save();


					Session::flash('message','Successfully Updated!');
					return Redirect::to('administrator');
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
					$admins= Admin::find($id);
					$admins->delete();
					return Redirect::to('administrator');
				} 


	}
