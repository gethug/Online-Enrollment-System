<?php

	class SectionController extends BaseController {

		
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
					$sections= Section::join('tbllevel', 'tblsections.lvl_id', '=', 'tbllevel.lvl_id')
					->select('tblsections.sec_id', 'tblsections.section', 'tbllevel.level', 'tblsections.min', 'tblsections.max')
					->get();

					return View::make('server.section.section')
					->with('sections', $sections);

				}



				public function getCreate()
				{
					$levels = Level::all();
					return View::make('server.section.create')->with('levels', $levels);
					
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
					$id = Input::get('level');
					$rules = array(
					'section' => 'required|unique:tblsections,section,NULL,id,lvl_id,' . $id,
					'minimum' => 'required|numeric',
					'maximum' => 'required|numeric'
						);

				$validator = Validator::make(Input::all(), $rules);

				if ($validator->fails()){
					return Redirect::to('Section/create')
						->withErrors($validator)
						->withInput();
				} else{

					$min = Input::get('minimum');
					$max = Input::get('maximum');
					if ($min > $max)
					{
						return Redirect::to('Section/create')
						->with('error', 'Invalid Value, Maximum students must be greater than Minimum Students');
					}
					
					$sections = new Section;
					$sections->lvl_id = Input::get('level');
					$sections->section = Input::get('section');
					$sections->min = Input::get('minimum');
					$sections->max = Input::get('maximum');
					$sections->save();


					Session::flash('message','Successfully Saved!');
					return Redirect::to('Section');
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

					$section= Section::find($id);

					return View::make('server.section.edit')
					->with('section', $section)
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
					$lvlid = Input::get('level');
					$rules = array(
					'section' => 'required|unique:tblsections,section,' . $id . ',sec_id,lvl_id,' . $lvlid,
					'minimum' => 'required|numeric',
					'maximum' => 'required|numeric'
						);

				$validator = Validator::make(Input::all(), $rules);

				if ($validator->fails()){
					return Redirect::to('Section/' . $id . '/edit')
						->withErrors($validator)
						->withInput();
				} else{
					

					$sections = Section::find($id);
					$sections->lvl_id = Input::get('level');
					$sections->section = Input::get('section');
					$sections->min = Input::get('minimum');
					$sections->max = Input::get('maximum');
					$sections->save();


					Session::flash('message','Successfully Updated!');
					return Redirect::to('Section');
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
					$sections = Section::find($id);
					$sections->delete();
					return Redirect::to('Section');
				} 


	}
