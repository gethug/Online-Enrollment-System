<?php

	class CashierController extends BaseController {

		
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
					$cashiers = Cashier::all();
					return View::make('server.cashier.index')->with('cashiers', $cashiers);

				}



				public function getCreate()
				{

					return View::make('server.cashier.create');
					
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
					'user'	=> 'required|unique:tblcash,user',
					'password' => 'required'
						);

				$validator = Validator::make(Input::all(), $rules);

				if ($validator->fails()){
					return Redirect::to('Cashier/create')
						->withErrors($validator)
						->withInput(Input::except('password'));
				} else{
					
					$cashs = new Cashier;
					$cashs->Fname = Input::get('Firstname');
					$cashs->Mname = Input::get('Mname');
					$cashs->Lname = Input::get('Lastname');
					$cashs->user = Input::get('user');
					$cashs->password = Hash::make(Input::get('password'));
					$cashs->save();


					Session::flash('message','Successfully Saved!');
					return Redirect::to('Cashier');
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
					$cashiers = Cashier::find($id);

					return View::make('server.cashier.edit')
						->with('cashiers', $cashiers);
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
					'user'	=> 'required|unique:tblcash,user,' . $id . ',c_id'
						);

				$validator = Validator::make(Input::all(), $rules);

				if ($validator->fails()){
					return Redirect::to('Cashier/' . $id . '/edit')
						->withErrors($validator)
						->withInput();
				} else{
					
					$cashs = Cashier::find($id);
					$cashs->Fname = Input::get('Firstname');
					$cashs->Mname = Input::get('Mname');
					$cashs->Lname = Input::get('Lastname');
					$cashs->user = Input::get('user');
					$cashs->save();


					Session::flash('message','Successfully Updated!');
					return Redirect::to('Cashier');
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
					$cashs= Cashier::find($id);
					$cashs->delete();
					return Redirect::to('Cashier');
				} 


	}
