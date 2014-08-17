<?php

	class SyController extends BaseController {

		
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
					$schoolyears = Schoolyear::all();
					return View::make('server.sy.sy')->with('schoolyears', $schoolyears);

				}


				public function getCreate()
				{
					return View::make('server.sy.create');
					
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
					'schoolyear' => 'required|unique:tblschoolyear,start'
						);

				$validator = Validator::make(Input::all(), $rules);

				if ($validator->fails()){
					return Redirect::to('SY/create')
						->withErrors($validator)
						->withInput();
				} else{
					
					$schoolyears = new Schoolyear;
					$schoolyears->start = Input::get('schoolyear');
					$schoolyears->end = Input::get('end');
					$schoolyears->save();


					Session::flash('message','Successfully Saved!');
					return Redirect::to('SY');
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
					$schoolyears = Schoolyear::find($id);
					$schoolyears->delete();
					return Redirect::to('SY');
				} 


	}
