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
					$sy = DB::table('tblschoolyear')
					->where('active', 1)
					->first();

					$subjects= Subject::join('tbllevel', 'tblsubject.lvl_id', '=', 'tbllevel.lvl_id')
					->select('tblsubject.s_id', 'tblsubject.subj_code', 
						'tblsubject.subj_name', 'tblsubject.unit',
						'tblsubject.prerequisite','tbllevel.level')
					->where('tblsubject.sy_id', '=', $sy->sy_id)
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
					$sy = DB::table('tblschoolyear')
					->where('active', 1)
					->first();

					$rules = array(
					'subjectcode' => 'required|unique:tblsubject,subj_code,NULL,id,sy_id,' . $sy->sy_id,
					'subjectname' => 'required|unique:tblsubject,subj_name,NULL,id,sy_id,' . $sy->sy_id,
					'unit' => 'required|numeric'
						);

				$validator = Validator::make(Input::all(), $rules);
				if ($validator->fails()){
					return Redirect::to('Subject/create')
						->withErrors($validator)
						->withInput();
				} else{

					$unit = Input::get('unit');
					if($unit <= 0)
					{
						return Redirect::to('Subject/create')
						->with('error', 'invalid value');
					}

					$subjects = new Subject;
					$subjects->lvl_id = Input::get('level');
					$subjects->subj_code = Input::get('subjectcode');
					$subjects->subj_name = Input::get('subjectname');
					$subjects->unit = Input::get('unit');
					$subjects->prerequisite = Input::get('prerequisite');
					$subjects->sy_id = $sy->sy_id;
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
					$subs = Subject::all();
					$levels = Level::all();
					return View::make('server.subject.edit')
					->with('levels', $levels)
					->with('subject', $subject)
					->with('subs', $subs);
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
						$rules = array(
							'subjectcode' => 'required|unique:tblsubject,subj_code,' . $id . ',s_id,sy_id,' . $sy->sy_id,
							'subjectname' => 'required|unique:tblsubject,subj_name,' . $id . ',s_id,sy_id,' . $sy->sy_id,
							'unit' => 'required|numeric'
								);

						$validator = Validator::make(Input::all(), $rules);

						if ($validator->fails()){
							return Redirect::to('Subject/' . $id . '/edit')
								->withErrors($validator)
								->withInput();
						} else{
							$unit = Input::get('unit');
								if($unit <= 0)
								{
									return Redirect::to('Subject/create')
									->with('error', 'invalid value');
								}
							
							$subjects = Subject::find($id);
							$subjects->lvl_id = Input::get('level');
							$subjects->subj_code = Input::get('subjectcode');
							$subjects->subj_name = Input::get('subjectname');
							$subjects->unit = Input::get('unit');
							$subjects->prerequisite = Input::get('prerequisite');
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
