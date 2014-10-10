<?php

	class EnrollController extends BaseController {

		
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


					$enrolls = Enroll::join('tbllevel', 'tblenroled.lvl_id', '=', 'tbllevel.lvl_id')
					->join('tblenrolee', 'tblenroled.en_id', '=', 'tblenrolee.en_id')
					->join('tblsections', 'tblenroled.sec_id', '=', 'tblsections.sec_id')
					->select('tblenrolee.en_id', 'tblenrolee.fname', 'tblenrolee.mname', 'tblenrolee.lname', 'tbllevel.level', 'tblsections.section')
					->where('tblenroled.sy_id', '=', $sy->sy_id)
					->get();

					return View::make('server.enroll.show')
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
					return View::make('server.enroll.index')
					->with('levels', $levels)
					->with('enrolees', $enrolees)
					->with('discounts', $discounts)
					->with('enrolls', $enrolls);
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
					'ID' => 'required',
					'level' => 'required',
					'section'	=> 'required'
						);

				$validator = Validator::make(Input::all(), $rules);

				if ($validator->fails()){
					return Redirect::to('Enroll')
						->withErrors($validator)
						->withInput();
				} else{
					
					


					$enrolls = new Enroll;
					$enrolls->en_id = Input::get('ID');
					$enrolls->lvl_id = Input::get('level');
					$enrolls->sec_id = Input::get('section');
					$enrolls->d_id = Input::get('discount');
					$enrolls->sy_id = $sy->sy_id;
					$enrolls->save();

					$total = Input::get('total');
					$total = $total / 10;
					
					$breaks = new TBreak;
					$breaks->en_id = Input::get('ID');
					$breaks->first = $total;
					$breaks->second = $total;
					$breaks->third = $total;
					$breaks->fourth = $total;
					$breaks->fifth = $total;
					$breaks->sixth = $total;
					$breaks->seventh = $total;
					$breaks->eight = $total;
					$breaks->ninth = $total;
					$breaks->tenth = $total;
					$breaks->sy_id = $sy->sy_id;
					$breaks->save();

					$lvl = Input::get('level');
					$fees = Misc::where('lvl_id', '=', $lvl)
					->where('mandatory', '=', 0)
					->get();
					
					$tui = Tuition::where('lvl_id', '=', $lvl)->first();

					$studs = new Studfee;
						$studs->en_id = Input::get('ID');
						$studs->m_id = $tui->tu_id;
						$studs->m_name = 'Tuition Fee';
						$studs->bal = $total;
						$studs->sy_id = $sy->sy_id;
						$studs->save();

					foreach($fees as $fee)
					{
						$studs = new Studfee;
						$studs->en_id = Input::get('ID');
						$studs->m_id = $fee->m_id;
						$studs->m_name = $fee->m_name;
						$studs->bal = $fee->m_fee;
						$studs->sy_id = $sy->sy_id;
						$studs->save();
					}

					$sec = Input::get('section');
					$subjects = Sched::where('sec_id', '=', $sec)->get();

					foreach($subjects as $subject)
					{
						$grades = new Grade;
						$grades->en_id = Input::get('ID');
						$grades->lvl_id = Input::get('level');
						$grades->t_id = $subject->t_id;
						$grades->sec_id = Input::get('section');
						$grades->s_id = $subject->s_id;
						$grades->sy_id = $sy->sy_id;
						$grades->save();
					}


					


					Session::flash('message','Successfully Enrolled!');
					return Redirect::to('Enroll');
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

				public function getDrop()
				{
					$input = Input::get('option');
					$enrolee = Enrolee::find($input);
        			$stud = Enrolee::studfee($enrolee->en_id);
        			return Response::json($stud);
				} 

				public function getDropname()
				{
					$input = Input::get('option');
					$enrolee = Enrolee::find($input);
        			$enroll = Enrolee::enroll($enrolee->en_id);
        			return Response::json($enroll);
				} 

				public function getDrophis()
				{
					$input = Input::get('option');
					$enrolee = Enrolee::find($input);
        			$history = Enrolee::history($enrolee->en_id);
        			return Response::json($history);
				} 


					public function getDroptui()
				{
					$input = Input::get('option');
					$level = Level::find($input);
        			$tuition = Level::tuition($level->lvl_id);
        			return Response::json($tuition);
				} 


					public function getDropfee()
				{
					$input = Input::get('option');
					$level = Level::find($input);
        			$others = Level::others($level->lvl_id);
        			return Response::json($others);
				} 

					public function getDropmisc()
				{
					$input = Input::get('option');
					$level = Level::find($input);
        			$misc = Level::misc($level->lvl_id);
        			return Response::json($misc);
				} 

				public function getDropdisc()
				{
					$input = Input::get('option');
					$discount = Discount::find($input);
        			$disc = Discount::disc($discount->d_id);
        			return Response::json($disc);
				} 

				public function getDropsched()
				{
					$input = Input::get('option');
					$section = Section::find($input);
        			$sched = Section::sched($section->sec_id);
        			return Response::json($sched);
				} 


	}
