<?php

	class TuitionController extends BaseController {

		
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
					$tuitions = Tuition::join('tbllevel', 'tbltuition.lvl_id', '=', 'tbllevel.lvl_id')
					->select('tbltuition.tu_id', 'tbltuition.tuition', 'tbllevel.level')
					->get();

					return View::make('server.tuition.index')
					->with('tuitions', $tuitions);

				}



				public function getCreate()
				{
					$levels = Level::all();
					return View::make('server.tuition.create')->with('levels', $levels);
					
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
					'level' => 'unique:tbltuition,lvl_id',
					'tuition' => 'required|numeric'
						);

				$validator = Validator::make(Input::all(), $rules);

				if ($validator->fails()){
					return Redirect::to('Tuition/create')
						->withErrors($validator)
						->withInput();
				} else{
					
					$tuitions = new Tuition;
					$tuitions->lvl_id = Input::get('level');
					$tuitions->tuition = Input::get('tuition');
					$tuitions->save();


					Session::flash('message','Successfully Saved!');
					return Redirect::to('Tuition');
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
					$levels = Level::all();

					$tuitions = Tuition::find($id);

					return View::make('server.tuition.edit')
					->with('tuitions', $tuitions)
					->with('levels',$levels);

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
					'level' => 'unique:tbltuition,lvl_id,' . $id . ',tu_id',
					'tuition' => 'required|numeric'
						);

				$validator = Validator::make(Input::all(), $rules);

				if ($validator->fails()){
					return Redirect::to('Tuition/' . $id . '/edit')
						->withErrors($validator)
						->withInput();
				} else{
					

					$tuitions = Tuition::find($id);
					$tuitions->lvl_id = Input::get('level');
					$tuitions->tuition = Input::get('tuition');
					$tuitions->save();


					Session::flash('message','Successfully Updated!');
					return Redirect::to('Tuition');
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
					$tuitions = Tuition::find($id);
					$tuitions->delete();
					return Redirect::to('Tuition');
				} 


	}
