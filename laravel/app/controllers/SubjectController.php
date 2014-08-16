<?php

	class SubjectController extends BaseController {

		
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
					$subjects= Subject::join('tbllevel', 'tblsubject.lvl_id', '=', 'tbllevel.lvl_id')
					->select('tblsubject.s_id', 'tblsubject.subj_code', 
						'tblsubject.subj_name', 'tblsubject.unit',
						'tblsubject.prerequisite','tbllevel.level', 'tblsubject.cost')
					->get();

					return View::make('server.subject.subject')->with('subjects',$subjects);

				}

				public function getCreate()
				{
					$subjects = Subject::all();
					$levels = Level::all();
					return View::make('server.subject.create')
					->with('levels', $levels)
					->with('subjects', $subjects);
					
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
					'id' => 'required|unique:tblsubject,s_id',
					'subjectcode' => 'required|unique:tblsubject,subj_code',
					'subjectname' => 'required|unique:tblsubject,subj_name',
					'unit' => 'required|numeric',
					'cost' => 'required|numeric'
						);

				$validator = Validator::make(Input::all(), $rules);

				if ($validator->fails()){
					return Redirect::to('Subject/create')
						->withErrors($validator)
						->withInput();
				} else{

					
					$subjects = new Subject;
					$subjects->lvl_id = Input::get('level');
					$subjects->s_id = Input::get('id');
					$subjects->subj_code = Input::get('subjectcode');
					$subjects->subj_name = Input::get('subjectname');
					$subjects->unit = Input::get('unit');
					$subjects->prerequisite = Input::get('prerequisite');
					$subjects->cost = Input::get('cost');
					$subjects->save();


					Session::flash('message','Successfully Saved!');
					return Redirect::to('Subject');
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
					$subject = Subject::find($id);
					$subjects = Subject::all();
					$levels = Level::all();
					return View::make('server.subject.edit')
					->with('levels', $levels)
					->with('subject', $subject)
					->with('subjects', $subjects);
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
							'id' => 'required|unique:tblsubject,s_id,' . $id . ',s_id',
							'subjectcode' => 'required|unique:tblsubject,subj_code,' . $id . ',s_id',
							'subjectname' => 'required|unique:tblsubject,subj_name,' . $id . ',s_id',
							'unit' => 'required|numeric',
							'cost' => 'required|numeric'
								);

						$validator = Validator::make(Input::all(), $rules);

						if ($validator->fails()){
							return Redirect::to('Subject/' . $id . '/edit')
								->withErrors($validator)
								->withInput();
						} else{

							
							$subjects = Subject::find($id);
							$subjects->lvl_id = Input::get('level');
							$subjects->s_id = Input::get('id');
							$subjects->subj_code = Input::get('subjectcode');
							$subjects->subj_name = Input::get('subjectname');
							$subjects->unit = Input::get('unit');
							$subjects->prerequisite = Input::get('prerequisite');
							$subjects->cost = Input::get('cost');
							$subjects->save();


							Session::flash('message','Successfully Saved!');
							return Redirect::to('Subject');
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
					$subjects= Subject::find($id);
					$subjects->delete();
					return Redirect::to('Subject');
				} 


	}
