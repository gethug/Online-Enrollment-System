<?php

	class LoginController extends BaseController {

		
				public function __construct() {


				}

				/**
				 * Display a listing of the resource.
				 *
				 * @return Response
				 */
				public function index()
				{

					return View::make('server.admin');

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


					$accounts = array(
						'idnumber' => Input::get('idnumber'),
						'password' => Input::get('password')
					);

					$rules = array(
						'idnumber' => 'required',
						'password' => 'required'
						);

						$validator = Validator::make($accounts, $rules);


						if(!$validator->fails()){
 
							if (Auth::attempt(array('user' => Input::get('idnumber'), 'password' => Input::get('password')))) {

								if(Input::get('route')){
									return Redirect::to(Input::get('route'));
								}
								else{
									return Redirect::to('admin');
								}

							}
							else {

								return Redirect::to('/')->withInput(Input::except('password'))->with('error', 'Invalid ID number or Password');
							}

						}
					else {

						return Redirect::to('/')->withInput(Input::except('password'))->withErrors($validator);
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
					//
				}

				/**
				 * Update the specified resource in storage.
				 *
				 * @param  int  $id
				 * @return Response
				 */
				public function update($id)
				{
					//
				}

				/**
				 * Remove the specified resource from storage.
				 *
				 * @param  int  $id
				 * @return Response
				 */
				public function destroy($id)
				{
					//
				} 


	}
