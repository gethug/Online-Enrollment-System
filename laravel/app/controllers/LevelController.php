<?php

	class LevelController extends BaseController {

		
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
					return View::make('server.level.level')->with('levels', $levels);

				}




				public function getCreate()
				{

					return View::make('server.level.create');
					
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
					'level' => 'required|unique:tbllevel,level'
						);

				$validator = Validator::make(Input::all(), $rules);

				if ($validator->fails()){
					return Redirect::to('Level/create')
						->withErrors($validator)
						->withInput();
				} else{
					
					$levels = new Level;
					$levels->level = Input::get('level');
					$levels->save();


					Session::flash('message','Successfully Saved!');
					return Redirect::to('Level');
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
					$level = Level::find($id);
					return View::make('server.level.edit')
					->with('level', $level);

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
					'level' => 'required|unique:tbllevel,level,' . $id . ',lvl_id'
						);

				$validator = Validator::make(Input::all(), $rules);

				if ($validator->fails()){
					return Redirect::to('Level/' . $id . '/edit')
						->withErrors($validator)
						->withInput();
				} else{
					

					$levels = Level::find($id);
					$levels->level = Input::get('level');
					$levels->save();


					Session::flash('message','Successfully Updated!');
					return Redirect::to('Level');
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
					$levels= Level::find($id);
					$levels->delete();
					return Redirect::to('Level');
				} 


	}
