<?php

	class GradeInquireController extends BaseController {

		
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
					return View::make('server.inquiry.grade')
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
					

				}

				/**
				 * Update the specified resource in storage.
				 *
				 * @param  int  $id
				 * @return Response
				 */
				public function update($id)
				{
				
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
