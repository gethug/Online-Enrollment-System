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
					$users = Usertype::all();
					return View::make('server.Usertype.index')->with('users',$users);

				}


				public function getCreate()
				{

					return View::make('server.Usertype.create');
					
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
					'usertype' => 'required'
						);

				$validator = Validator::make(Input::all(), $rules);

				if ($validator->fails()){
					return Redirect::to('Usertype/create')
						->withErrors($validator);
				} else{

					
					$users = new Usertype;
					$users->type = Input::get('usertype');
					$users->save();


					Session::flash('message','Successfully Saved!');
					return Redirect::to('Usertype');
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
					$users = Usertype::find($id);

					return View::make('server.Usertype.edit')
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
					'usertype'	=> 'required|unique:tbltype,type,' . $id . ',type_id',
						);

				$validator = Validator::make(Input::all(), $rules);

				if ($validator->fails()){
					return Redirect::to('Usertype/' . $id . '/edit')
						->withErrors($validator)
						->withInput();
				} else{
					
					$users = Usertype::find($id);
					$users->type = Input::get('usertype');
					$users->save();


					Session::flash('message','Successfully Updated!');
					return Redirect::to('Usertype');
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
					$users= Usertype::find($id);
					$users->delete();
					return Redirect::to('Usertype');
				} 


	}
