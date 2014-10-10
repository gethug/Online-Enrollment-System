<?php

	class GradeController extends BaseController {

		
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
					$levels = Level::all();
					return View::make('server.grades.index')
					->with('levels', $levels);

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
					$grades = Grade::where('g_id', '=', $id)->first();
					return View::make('server.grades.create')
					->with('grades', $grades);

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
					'first' => 'required',
					'second' => 'required',
					'third' => 'required',
					'fourth' => 'required'
						);

				$validator = Validator::make(Input::all(), $rules);

				if ($validator->fails()){
					return Redirect::to('Grade/' . $id . '/edit')
						->withErrors($validator)
						->withInput();
				} else{
					

					$grades = Grade::find($id);
					$grades->first = Input::get('first');
					$grades->second = Input::get('second');
					$grades->third = Input::get('third');
					$grades->fourth = Input::get('fourth');
					$grades->save();


					Session::flash('message','Successfully Updated!');
					return Redirect::to('Grade');
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

				public function getDropsec()
				{
					$input = Input::get('option');
					$level = Level::find($input);
        			$sections = Level::sections($level->lvl_id);
        			return Response::json($sections);
				}

				public function getDropsubj()
				{
					$input = Input::get('option');
					$sec = Section::find($input);
        			$sched = Section::sched2($sec->sec_id);
        			return Response::json($sched);
				}

				public function getDropgra()
				{
					$input = Input::get('option');
					$sec = Subject::find($input);
        			$stud = Subject::grade($sec->s_id);
        			return Response::json($stud);
				}



	}
