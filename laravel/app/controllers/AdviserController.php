<?php

	class AdviserController extends BaseController {

		
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
					$advisers = Adviser::join('tblsections', 'tblsections.sec_id', '=', 'tbladviser.sec_id')
					->join('tblteacher', 'tblteacher.t_id', '=', 'tbladviser.t_id')
					->select('tblsections.section', 'tblteacher.fname', 'tblteacher.mname', 'tblteacher.lname', 'tbladviser.sec_id')
					->get();
					return View::make('server.adviser.index')
					->with('advisers', $advisers);

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
					$sections = Section::all();
					$teachers = Teacher::all();
					return View::make('server.adviser.create')
					->with('sections', $sections)
					->with('teachers', $teachers);

				}

				/**
				 * Store a newly created resource in storage.
				 *
				 * @return Response
				 */
				public function store()
				{

					$rules = array(
					'section' => 'required|unique:tbladviser,sec_id',
					'teacher' => 'required|unique:tbladviser,t_id'
						);

				$validator = Validator::make(Input::all(), $rules);

				if ($validator->fails()){
					return Redirect::to('Adviser/create')
						->withErrors($validator)
						->withInput();
				} else{
					
					$advisers = new Adviser;
					$advisers->sec_id= Input::get('section');
					$advisers->t_id = Input::get('teacher');
					$advisers->save();


					Session::flash('message','Successfully Saved!');
					return Redirect::to('Adviser');
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
					$advisers = Adviser::find($id);
					$sections = Section::all();
					$teachers = Teacher::all();
					return View::make('server.adviser.edit')
					->with('sections', $sections)
					->with('teachers', $teachers)
					->with('advisers', $advisers);
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
					'section' => 'required|unique:tbladviser,sec_id,' . $id . ',sec_id',
					'teacher' => 'required|unique:tbladviser,t_id, ' . $id . ',sec_id'
						);

				$validator = Validator::make(Input::all(), $rules);

				if ($validator->fails()){
					return Redirect::to('Adviser/' . $id . '/edit')
						->withErrors($validator)
						->withInput();
				} else{
					
					$advisers = Adviser::find($id);
					$advisers->sec_id= Input::get('section');
					$advisers->t_id = Input::get('teacher');
					$advisers->save();


					Session::flash('message','Successfully Saved!');
					return Redirect::to('Adviser');
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
					$advisers = Adviser::find($id);
					$advisers->delete();
					return Redirect::to('Adviser');
				} 


	}
