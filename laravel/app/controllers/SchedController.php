<?php

	class SchedController extends BaseController {

		
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
					$scheds= Sched::join('tbllevel', 'tbllevel.lvl_id', '=', 'tblsched.lvl_id')
					->join('tblsubject', 'tblsubject.s_id', '=', 'tblsched.s_id')
					->join('tblrooms', 'tblrooms.r_id', '=', 'tblsched.r_id')
					->join('tblsections', 'tblsections.sec_id', '=', 'tblsched.sec_id')
					->join('tblteacher', 'tblteacher.t_id', '=', 'tblsched.t_id')
					->select('tblsubject.subj_code', 'tblsubject.subj_name', 'tblsched.start','tblsched.end', 'tblsched.day', 'tblteacher.fname', 'tblteacher.mname', 'tblteacher.lname', 'tblrooms.room', 'tblsections.section', 'tbllevel.level')
					->get();

					return View::make('server.Schedule.index')
						->with('scheds', $scheds);

				}


				public function getCreate()
				{
					$levels = Level::all();
					$teachers = Teacher::all();
					$subjects = Subject::all();
					$rooms = Room::all();
					$sections = Section::all();
					return View::make('server.Schedule.create')
					->with('teachers', $teachers)
					->with('levels', $levels)
					->with('rooms', $rooms)
					->with('subjects', $subjects)
					->with('sections', $sections);
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
					'section' => 'required|unique:tblsections,section,NULL,id,lvl_id,' . $id
						);

				$validator = Validator::make(Input::all(), $rules);

				if ($validator->fails()){
					return Redirect::to('Section/create')
						->withErrors($validator)
						->withInput();
				} else{
					
					$sections = new Section;
					$sections->lvl_id = Input::get('level');
					$sections->section = Input::get('section');
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
					
					return View::make('server.Schedule.sched');
				}

				/**
				 * Show the form for editing the specified resource.
				 *
				 * @param  int  $id
				 * @return Response
				 */
				public function edit($id)
				{
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
					//
				} 


	}
