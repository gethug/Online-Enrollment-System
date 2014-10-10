<?php

	class PayController extends BaseController {

		
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

					$sy=  DB::table('tblschoolyear')
					->where('active', 1)
					->first();

						$pays = PaySched::where('sy_id','=', $sy->sy_id)->get();
					return View::make('server.paysched.index')
					->with('pays', $pays);

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
					return View::make('server.paysched.create');
				}

				/**
				 * Store a newly created resource in storage.
				 *
				 * @return Response
				 */
				public function store()
				{
						$sy = DB::table('tblschoolyear')
					->where('active', 1)
					->first();

					$schoolyear = array(
						'schoolyear' => $sy->sy_id,
						'first' => Input::get('first'),
					'second' => Input::get('second'),
						'third' => Input::get('third'),
					'fourth' => Input::get('fourth'),
						'fifth' => Input::get('fifth'),
					'sixth' => Input::get('sixth'),
						'seventh' => Input::get('seventh'),
					'eight' => Input::get('eight'),
						'ninth' => Input::get('ninth'),
					'tenth' => Input::get('tenth')
					);

					$rules = array(
					'schoolyear' => 'unique:tblpymentsched,sy_id',
					'first' => 'required',
					'second' => 'required',
					'third' => 'required',
					'fourth' => 'required',
					'fifth' => 'required',
					'sixth' => 'required',
					'seventh' => 'required',
					'eight' => 'required',
					'ninth' => 'required',
					'tenth' => 'required'
						);

				$validator = Validator::make($schoolyear, $rules);

				if ($validator->fails()){
					return Redirect::to('PaySched/create')
						->withErrors($validator)
						->withInput();
				} else{
					
					$sched = new PaySched;
					$sched->sy_id = $sy->sy_id;
					$sched->first = Input::get('first');
					$sched->sec = Input::get('second');
					$sched->third = Input::get('third');
					$sched->forth = Input::get('fourth');
					$sched->fifth = Input::get('fifth');
					$sched->sixth = Input::get('sixth');
					$sched->svnth = Input::get('seventh');
					$sched->eyth = Input::get('eight');
					$sched->ninth = Input::get('ninth');
					$sched->tenth = Input::get('tenth');
					$sched->save();


					Session::flash('message','Successfully Saved!');
					return Redirect::to('PaySched');
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
					$scheds = PaySched::find($id);
					return View::make('server.paysched.edit')
					->with('scheds', $scheds);
				}

				/**
				 * Update the specified resource in storage.
				 *
				 * @param  int  $id
				 * @return Response
				 */
				public function update($id)
				{
						$schoolyear = array(
						'first' => Input::get('first'),
					'second' => Input::get('second'),
						'third' => Input::get('third'),
					'fourth' => Input::get('fourth'),
						'fifth' => Input::get('fifth'),
					'sixth' => Input::get('sixth'),
						'seventh' => Input::get('seventh'),
					'eight' => Input::get('eight'),
						'ninth' => Input::get('ninth'),
					'tenth' => Input::get('tenth')
					);

					$rules = array(
					'first' => 'required',
					'second' => 'required',
					'third' => 'required',
					'fourth' => 'required',
					'fifth' => 'required',
					'sixth' => 'required',
					'seventh' => 'required',
					'eight' => 'required',
					'ninth' => 'required',
					'tenth' => 'required'
						);

				$validator = Validator::make($schoolyear, $rules);

				if ($validator->fails()){
					return Redirect::to('PaySched/' . $id . '/edit')
						->withErrors($validator)
						->withInput();
				} else{
					
					$sched = PaySched::find($id);
					$sched->first = Input::get('first');
					$sched->sec = Input::get('second');
					$sched->third = Input::get('third');
					$sched->forth = Input::get('fourth');
					$sched->fifth = Input::get('fifth');
					$sched->sixth = Input::get('sixth');
					$sched->svnth = Input::get('seventh');
					$sched->eyth = Input::get('eight');
					$sched->ninth = Input::get('ninth');
					$sched->tenth = Input::get('tenth');
					$sched->save();


					Session::flash('message','Successfully Saved!');
					return Redirect::to('PaySched');
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
					//
				} 


	}
