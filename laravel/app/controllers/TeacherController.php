<?php

	class TeacherController extends BaseController {

		
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
					$teachers = Teacher::all();
					$subjects = Subject::all();
					
				/**	$arr = array();
					foreach($teachers as $teacher)
					{
						$converts = (explode(', ',$teacher->specialization));
						$x = "";
						foreach($converts as $convert)
						{
						$s = Subject::where('s_id', '=', $convert)
						->select("subj_name")
						->get();
						$x .= $s[0]->subj_name;
					
						}
						
							array_push($arr, $x, $teacher->t_id, $teacher->fname, $teacher->mname, $teacher->lname, $teacher->age, $teacher->gender, $teacher->contact);
					}
					return $arr;*/
					return View::make('server.teacher.teacher')->with('teachers', $teachers);

				}


				public function getCreate()
				{
					$subjects = Subject::all();
					return View::make('server.teacher.create')
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
					'Firstname' => 'required',
					'Lastname' => 'required',
						);

				$validator = Validator::make(Input::all(), $rules);

				if ($validator->fails()){
					return Redirect::to('Teacher/create')
						->withErrors($validator)
						->withInput();
				} else{

					
	
					$teachers = new Teacher;
					$teachers->fname = Input::get('Firstname');
					$teachers->mname = Input::get('Mname');
					$teachers->lname = Input::get('Lastname');
					$teachers->save();


					Session::flash('message','Successfully Saved!');
					return Redirect::to('Teacher');
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
					$teachers = Teacher::find($id);
					$subjects = Subject::all();
				
					return View::make('server.teacher.edit')
						->with('teachers', $teachers)
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
					'Firstname' => 'required',
					'Lastname' => 'required',
						);

				$validator = Validator::make(Input::all(), $rules);

				if ($validator->fails()){
					return Redirect::to('Teacher/' . $id . '/edit')
						->withErrors($validator)
						->withInput();
				} else{
					
					$teachers = Teacher::find($id);
					$teachers->fname = Input::get('Firstname');
					$teachers->mname = Input::get('Mname');
					$teachers->lname = Input::get('Lastname');
					$teachers->save();


					Session::flash('message','Successfully Updated!');
					return Redirect::to('Teacher');
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
					$teachers= Teacher::find($id);
					$teachers->delete();
					return Redirect::to('Teacher');
				} 


	}
