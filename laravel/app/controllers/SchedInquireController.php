<?php

	class SchedInquireController extends BaseController {

		
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

					$enrolls = Enroll::where('sy_id','=',$sy->sy_id)->get();
					$levels = Level::all();
					$discounts = Discount::all();
					$enrolees = Enrolee::join('tblstudfee', 'tblenrolee.en_id', '=', 'tblstudfee.en_id')
					->select('tblenrolee.en_id', 'tblenrolee.fname', 'tblenrolee.mname', 'tblenrolee.lname', 'tblstudfee.m_id', 'tblstudfee.bal', 'tblstudfee.sy_id')
					->where('tblstudfee.sy_id', '=', $sy->sy_id)
					->where('tblstudfee.bal', '=', 0)
					->where('tblstudfee.m_id', '=', 3)
					->get();
					return View::make('server.inquiry.sched')
					->with('levels', $levels)
					->with('enrolees', $enrolees)
					->with('discounts', $discounts)
					->with('enrolls', $enrolls);
					

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

				public function getDrop2()
				{
					$input = Input::get('option');
					$level = Level::find($input);
        			$sections = Level::sections($level->lvl_id);
        			return Response::json($sections);
				}

			
				public function getDropsched()
				{
					$input = Input::get('option');
					$section = Section::find($input);
        			$sched = Section::sched($section->sec_id);
        			return Response::json($sched);
				} 


	}
