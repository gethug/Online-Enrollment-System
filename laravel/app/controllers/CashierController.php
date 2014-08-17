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
					return View::make('server.cashier.index')->with('cashiers',$cashiers);

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
					'id' => 'required|unique:tblcashier,c_id',
					'Firstname' => 'required',
					'Lastname' => 'required',
					'degree' => 'required',
					'age' => 'required|numeric',
					'contact' => 'required|numeric|min:11|unique:tblcashier,contact',
					'email'	=> 'required|email|unique:tblcashier,email',
					'password' => 'required|min:7'
						);

				$validator = Validator::make(Input::all(), $rules);

				if ($validator->fails()){
					return Redirect::to('Cashier/create')
						->withErrors($validator)
						->withInput(Input::except('password'));
				} else{

					
					$cashiers = new Cashier;
					$cashiers->c_id = Input::get('id');
					$cashiers->fname = Input::get('Firstname');
					$cashiers->mname = Input::get('Mname');
					$cashiers->lname = Input::get('Lastname');
					$cashiers->degree = Input::get('degree');
					$cashiers->age = Input::get('age');
					$cashiers->gender = Input::get('gender');
					$cashiers->contact = Input::get('contact');
					$cashiers->email = Input::get('email');
					$cashiers->password = Hash::make(Input::get('password'));
					$cashiers->save();


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
					'id' => 'required|unique:tblcashier,c_id,' . $id . ',c_id',
					'Firstname' => 'required',
					'Lastname' => 'required',
					'degree' => 'required',
					'age' => 'required|numeric',
					'contact' => 'required|numeric|unique:tblcashier,contact,' . $id . ',c_id',
					'email'	=> 'required|email|unique:tblcashier,email,' . $id . ',c_id',
						);

				$validator = Validator::make(Input::all(), $rules);

				if ($validator->fails()){
					return Redirect::to('Cashier/' . $id . '/edit')
						->withErrors($validator)
						->withInput();
				} else{
					
					$cashiers = Cashier::find($id);
					$cashiers->c_id = Input::get('id');
					$cashiers->fname = Input::get('Firstname');
					$cashiers->mname = Input::get('Mname');
					$cashiers->lname = Input::get('Lastname');
					$cashiers->degree = Input::get('degree');
					$cashiers->age = Input::get('age');
					$cashiers->gender = Input::get('gender');
					$cashiers->contact = Input::get('contact');
					$cashiers->email = Input::get('email');
					$cashiers->save();


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
					$cashiers= Cashier::find($id);
					$cashiers->delete();
					return Redirect::to('Cashier');
				} 


	}
