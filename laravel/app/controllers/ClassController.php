<?php

	class ClassController extends BaseController {

		
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
					$sy = DB::table('tblschoolyear')
					->where('active', 1)
					->first();


					$starts = ClassStart::where('sy_id', '=', $sy->sy_id)
					->get();
					return View::make('server.class.index')
					->with('starts', $starts);

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
					$sy = DB::table('tblschoolyear')
					->where('active', 1)
					->first();
					return View::make('server.class.create')
					->with('sy', $sy);
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
						'start' => Input::get('ClassStart'),
					'end' => Input::get('ClassEnd')
					);

					$rules = array(
					'schoolyear' => 'unique:tblclasstart,sy_id',
					'start' => 'required',
					'end' => 'required'
						);

				$validator = Validator::make($schoolyear, $rules);

				if ($validator->fails()){
					return Redirect::to('ClassStart/create')
						->withErrors($validator)
						->withInput();
				} else{
					
					$class = new ClassStart;
					$class->sy_id = $sy->sy_id;
					$class->class_start = Input::get('ClassStart');
					$class->class_end = Input::get('ClassEnd');
					$class->save();


					Session::flash('message','Successfully Saved!');
					return Redirect::to('ClassStart');
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
					$starts = ClassStart::find($id);
					return View::make('server.class.edit')
					->with('starts', $starts);
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
						$sy = DB::table('tblschoolyear')
					->where('active', 1)
					->first();

					$schoolyear = array(
						'start' => Input::get('ClassStart'),
					'end' => Input::get('ClassEnd')
					);

					$rules = array(
					'start' => 'required',
					'end' => 'required'
						);

				$validator = Validator::make($schoolyear, $rules);

				if ($validator->fails()){
					return Redirect::to('ClassStart/' . $id . '/edit')
						->withErrors($validator)
						->withInput();
				} else{
					
					$class = ClassStart::find($id);
					$class->sy_id = $sy->sy_id;
					$class->class_start = Input::get('ClassStart');
					$class->class_end = Input::get('ClassEnd');
					$class->save();


					Session::flash('message','Successfully Saved!');
					return Redirect::to('ClassStart');
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
					$starts = ClassStart::find($id);
					$starts->delete();

					return Redirect::to('ClassStart');
				} 


	}
