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
					$active = 0;
					$schoolyears = new Schoolyear;
					$schoolyears->start = Input::get('schoolyear');
					$schoolyears->end = Input::get('end');
					$schoolyears->Active = $active;
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
					$schoolyear = Schoolyear::find($id);
					$sys = Schoolyear::all();
					$enrolees = Enrolee::all();

					foreach($sys as $sy){

						if ($sy->Active == 1){
							$sy->Active = 0;
							$sy->save();
						}
					}
					$schoolyear->Active = 1;
					$schoolyear->save();

					$sy = DB::table('tblschoolyear')
					->where('active', 1)
					->first();

					$bal = Misc::where('m_id', '=', 3)->first();
					foreach($enrolees as $enrolee)
					{
						$reg = Studfee::where('en_id', '=', $enrolee->en_id)
						->where('sy_id', '=', $sy->sy_id)
						->count();

						if($reg == 0)
						{
							
							$fee = new Studfee;
							$fee->en_id = $enrolee->en_id;
							$fee->m_id = $bal->m_id;
							$fee->m_name = $bal->m_name;
							$fee->bal = $bal->m_fee;
							$fee->sy_id = $sy->sy_id;
							$fee->save();
						}

					}
					return Redirect::to('SY');
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
