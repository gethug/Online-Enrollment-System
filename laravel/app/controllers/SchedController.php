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
					$sy = DB::table('tblschoolyear')
					->where('active', 1)
					->first();

					$scheds= Sched::join('tbllevel', 'tbllevel.lvl_id', '=', 'tblsched.lvl_id')
					->join('tblsubject', 'tblsubject.s_id', '=', 'tblsched.s_id')
					->join('tblrooms', 'tblrooms.r_id', '=', 'tblsched.r_id')
					->join('tblsections', 'tblsections.sec_id', '=', 'tblsched.sec_id')
					->join('tblteacher', 'tblteacher.t_id', '=', 'tblsched.t_id')
					->select('tblsubject.subj_code', 'tblsched.sched_id', 'tblsubject.subj_name', 'tblsched.start','tblsched.end', 'tblsched.day', 'tblteacher.fname', 'tblteacher.mname', 'tblteacher.lname', 'tblrooms.room', 'tblsections.section', 'tbllevel.level')
					->where('tblsched.sy_id', '=' , $sy->sy_id)
					->get();

					return View::make('server.Schedule.sched')
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

					$sy = DB::table('tblschoolyear')
					->where('active', 1)
					->first();


					$love = 'false';
					$scheds = DB::table('tblsched')->where('sy_id','=', $sy->sy_id)->get();
					$tid = Input::get('teacher');
					$rid = Input::get('room');
					$sid = Input::get('subject');
					$secid = Input::get('section');
					$start = Input::get('start');
					$end = Input::get('end');

					

					$tex = DB::table('tblteacher')
							->where('t_id','=',$tid)
							->count();

					$rex = DB::table('tblrooms')
							->where('r_id','=',$rid)
							->count();

					$sex = DB::table('tblsubject')
							->where('s_id','=',$sid)
							->count();

					$secex = DB::table('tblsections')
							->where('sec_id','=',$secid)
							->count();

					$exist = DB::table('tblsched')
						->count();

					if($exist == 0){
						$selected = "";
						$days =  Input::get('day');
	                                if(isset($days)){
	                                	 if(is_array($days))
	                							{
							                        foreach($days as $day){
							                                 	if($selected == "")
							                        	{
							                        		$selected = $selected . $day;
							                        	}
							                        	else
							                        	{
							                        		$selected = $selected .',' . $day;
							                        	}
							                                 } 
	                							}
	                                 
	                                }
						$syr = 0;
						$sys = Schoolyear::all();
						foreach($sys as $sy){
							if($sy->Active == 1){
								$syr = $sy->sy_id;
							}
						}
						$scheds = new Sched;
						$scheds->sec_id = Input::get('section');
						$scheds->lvl_id = Input::get('level');
						$scheds->s_id = Input::get('subject');
						$scheds->start = Input::get('start');
						$scheds->end = Input::get('end');
						$scheds->day = $selected;
						$scheds->t_id = Input::get('teacher');
						$scheds->r_id = Input::get('room');
						$scheds->sy_id = $syr;
						$scheds->save();

						Session::flash('message','Successfully Saved!');
						return Redirect::to('Schedule');
					}
					else
					{



					foreach($scheds as $sched)
					{

						$dbdeys = explode(',',$sched->day);
						$deys = Input::get('day');
						$sub = Input::get('subject');
						$sec = Input::get('section');
						foreach($dbdeys as $debs){
							foreach($deys as $dey)
							{
								if($debs == $dey){
									if($sec == $sched->sec_id && $sub == $sched->s_id)
									{
								return Redirect::to('/Schedule/create')->with('derror', 'Schedule Conflict in days')->withInput();

									}
								}
							}

						}
					//Teacher------------------------------------------------------------------------------------------------------
						if($tex != 0)
						{
							if($sched->t_id == $tid)
							{
								if(strtotime($start) < strtotime($sched->start) && strtotime($end) > strtotime($sched->start))
							{
								return Redirect::to('/Schedule/create')->with('terror', 'Teacher is not available!')->withInput();
							}elseif (strtotime($start) < strtotime($sched->end) && strtotime($end) > strtotime($sched->end)) {
								return Redirect::to('/Schedule/create')->with('terror', 'Teacher is not available!')->withInput();
							}elseif (strtotime($start) < strtotime($sched->start) && strtotime($end) > strtotime($sched->end)) {
								return Redirect::to('/Schedule/create')->with('terror', 'Teacher is not available!')->withInput();
							}elseif (strtotime($start) >= strtotime($sched->start) && strtotime($end) <= strtotime($sched->end)) {
								return Redirect::to('/Schedule/create')->with('terror', 'Teacher is not available!')->withInput();
							}
							}
						}

						//Rooms------------------------------------------------------------------------------------------------------
						if($rex != 0)
						{
							if($sched->r_id == $rid)
							{
								if(strtotime($start) < strtotime($sched->start) && strtotime($end) > strtotime($sched->start))
							{
								return Redirect::to('/Schedule/create')->with('rerror', 'Room is not available!')->withInput();
							}elseif (strtotime($start) < strtotime($sched->end) && strtotime($end) > strtotime($sched->end)) {
								return Redirect::to('/Schedule/create')->with('rerror', 'Room is not available!')->withInput();
							}elseif (strtotime($start) < strtotime($sched->start) && strtotime($end) > strtotime($sched->end)) {
								return Redirect::to('/Schedule/create')->with('rerror', 'Room is not available!')->withInput();
							}elseif (strtotime($start) >= strtotime($sched->start) && strtotime($end) <= strtotime($sched->end)) {
								return Redirect::to('/Schedule/create')->with('rerror', 'Room is not available!')->withInput();
									}
							}
						}


						//Subjects------------------------------------------------------------------------------------------------------
						if($sex != 0)
						{
							if($sched->s_id == $sid)
							{
								if(strtotime($start) < strtotime($sched->start) && strtotime($end) > strtotime($sched->start))
							{
								return Redirect::to('/Schedule/create')->with('serror', 'Subject is not available!')->withInput();
							}elseif (strtotime($start) < strtotime($sched->end) && strtotime($end) > strtotime($sched->end)) {
								return Redirect::to('/Schedule/create')->with('serror', 'Subject is not available!')->withInput();
							}elseif (strtotime($start) < strtotime($sched->start) && strtotime($end) > strtotime($sched->end)) {
								return Redirect::to('/Schedule/create')->with('serror', 'Subject is not available!')->withInput();
							}elseif (strtotime($start) >= strtotime($sched->start) && strtotime($end) <= strtotime($sched->end)) {
								return Redirect::to('/Schedule/create')->with('serror', 'Subject is not available!')->withInput();
											}
							}
						}


						//Sections------------------------------------------------------------------------------------------------------
						if($secex != 0)
						{
							if($sched->sec_id == $secid)
							{
								if(strtotime($start) < strtotime($sched->start) && strtotime($end) > strtotime($sched->start))
							{
								return Redirect::to('/Schedule/create')->with('seerror', 'Section is not available!')->withInput();
							}elseif (strtotime($start) < strtotime($sched->end) && strtotime($end) > strtotime($sched->end)) {
								return Redirect::to('/Schedule/create')->with('secerror', 'Section is not available!')->withInput();
							}elseif (strtotime($start) < strtotime($sched->start) && strtotime($end) > strtotime($sched->end)) {
								return Redirect::to('/Schedule/create')->with('secerror', 'Section is not available!')->withInput();
							}elseif (strtotime($start) >= strtotime($sched->start) && strtotime($end) <= strtotime($sched->end)) {
								return Redirect::to('/Schedule/create')->with('secerror', 'Section is not available!')->withInput();
													}
							}
						}

								}
						



						



						
						$love = 'true';
					

					if($love == 'true')
					{				
					$selected = "";
							$days =  Input::get('day');
		                                if(isset($days)){
		                                	 if(is_array($days))
		                							{
								                        foreach($days as $day){
								                                 		if($selected == "")
							                        	{
							                        		$selected = $selected . $day;
							                        	}
							                        	else
							                        	{
							                        		$selected = $selected .',' . $day;
							                        	}
								                                 } 
		                							}
		                                 
		                                }
							$syr = 0;
							$sys = Schoolyear::all();
							foreach($sys as $sy){
								if($sy->Active == 1){
									$syr = $sy->sy_id;
								}
							}
							$scheds = new Sched;
							$scheds->sec_id = Input::get('section');
							$scheds->lvl_id = Input::get('level');
							$scheds->s_id = Input::get('subject');
							$scheds->start = Input::get('start');
							$scheds->end = Input::get('end');
							$scheds->day = $selected;
							$scheds->t_id = Input::get('teacher');
							$scheds->r_id = Input::get('room');
							$scheds->sy_id = $syr;
							$scheds->save();

							Session::flash('message','Successfully Saved!');
							return Redirect::to('Schedule');
					}
				}

				$selected = "";
							$days =  Input::get('day');
		                                if(isset($days)){
		                                	 if(is_array($days))
		                							{
								                        foreach($days as $day){
								                                 		if($selected == "")
							                        	{
							                        		$selected = $selected . $day;
							                        	}
							                        	else
							                        	{
							                        		$selected = $selected .',' . $day;
							                        	}
								                                 } 
		                							}
		                                 
		                                }
							$syr = 0;
							$sys = Schoolyear::all();
							foreach($sys as $sy){
								if($sy->Active == 1){
									$syr = $sy->sy_id;
								}
							}
							$scheds = new Sched;
							$scheds->sec_id = Input::get('section');
							$scheds->lvl_id = Input::get('level');
							$scheds->s_id = Input::get('subject');
							$scheds->start = Input::get('start');
							$scheds->end = Input::get('end');
							$scheds->day = $selected;
							$scheds->t_id = Input::get('teacher');
							$scheds->r_id = Input::get('room');
							$scheds->sy_id = $syr;
							$scheds->save();

							Session::flash('message','Successfully Saved!');
							return Redirect::to('Schedule');
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
					$sy = DB::table('tblschoolyear')
					->where('active', 1)
					->first();


					$scheds= Sched::find($id);
					$levels = Level::all();
					$teachers = Teacher::all();
					$subjects = Subject::where('lvl_id', '=', $scheds->lvl_id)->where('sy_id','=', $sy->sy_id)->get();
					$rooms = Room::all();
					$sections = Section::where('lvl_id', '=', $scheds->lvl_id)->get();
					return View::make('server.Schedule.edit')
					->with('teachers', $teachers)
					->with('levels', $levels)
					->with('rooms', $rooms)
					->with('subjects', $subjects)
					->with('sections', $sections)
					->with('scheds', $scheds);
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


					$love = 'false';
					$scheds = DB::table('tblsched')->where('sy_id','=', $sy->sy_id)->where('sched_id','=',$id)->get();
					$tid = Input::get('teacher');
					$rid = Input::get('room');
					$sid = Input::get('subject');
					$secid = Input::get('section');
					$start = Input::get('start');
					$end = Input::get('end');

					

					$tex = DB::table('tblteacher')
							->where('t_id','=',$tid)
							->count();

					$rex = DB::table('tblrooms')
							->where('r_id','=',$rid)
							->count();

					$sex = DB::table('tblsubject')
							->where('s_id','=',$sid)
							->count();

					$secex = DB::table('tblsections')
							->where('sec_id','=',$secid)
							->count();

					$exist = DB::table('tblsched')
						->count();

						

						





					if($exist == 0){
						$selected = "";
						$days =  Input::get('day');
	                                if(isset($days)){
	                                	 if(is_array($days))
	                							{
							                        foreach($days as $day){
							                                 		if($selected == "")
							                        	{
							                        		$selected = $selected . $day;
							                        	}
							                        	else
							                        	{
							                        		$selected = $selected .',' . $day;
							                        	}
							                                 } 
	                							}
	                                 
	                                }
						$syr = 0;
						$sys = Schoolyear::all();
						foreach($sys as $sy){
							if($sy->Active == 1){
								$syr = $sy->sy_id;
							}
						}
						$scheds = Sched::find($id);
						$scheds->sec_id = Input::get('section');
						$scheds->lvl_id = Input::get('level');
						$scheds->s_id = Input::get('subject');
						$scheds->start = Input::get('start');
						$scheds->end = Input::get('end');
						$scheds->day = $selected;
						$scheds->t_id = Input::get('teacher');
						$scheds->r_id = Input::get('room');
						$scheds->sy_id = $syr;
						$scheds->save();

						Session::flash('message','Successfully Saved!');
						return Redirect::to('Schedule');
					}
					else
					{



					foreach($scheds as $sched)
					{

						
						$dbdeys = explode(',',$sched->day);
						$deys = Input::get('day');
						$sub = Input::get('subject');
						$sec = Input::get('section');
						foreach($dbdeys as $debs){
							foreach($deys as $dey)
							{
								if($debs == $dey){
									if($sec == $sched->sec_id && $sub == $sched->s_id)
									{
								return Redirect::to('/Schedule/' . $id . '/edit')->with('derror', 'Schedule Conflict in days')->withInput();

									}
								}
							}

						}
					//Teacher------------------------------------------------------------------------------------------------------
						if($tex != 0)
						{
							if($sched->t_id == $tid)
							{
								if(strtotime($start) < strtotime($sched->start) && strtotime($end) > strtotime($sched->start))
							{
								return Redirect::to('/Schedule/' . $id . '/edit')->with('terror', 'Teacher is not available!')->withInput();
							}elseif (strtotime($start) < strtotime($sched->end) && strtotime($end) > strtotime($sched->end)) {
								return Redirect::to('/Schedule/' . $id . '/edit')->with('terror', 'Teacher is not available!')->withInput();
							}elseif (strtotime($start) < strtotime($sched->start) && strtotime($end) > strtotime($sched->end)) {
								return Redirect::to('/Schedule/' . $id . '/edit')->with('terror', 'Teacher is not available!')->withInput();
							}elseif (strtotime($start) >= strtotime($sched->start) && strtotime($end) <= strtotime($sched->end)) {
								return Redirect::to('/Schedule/' . $id . '/edit')->with('terror', 'Teacher is not available!')->withInput();
							}
							}
						}

						//Rooms------------------------------------------------------------------------------------------------------
						if($rex != 0)
						{
							if($sched->r_id == $rid)
							{
								if(strtotime($start) < strtotime($sched->start) && strtotime($end) > strtotime($sched->start))
							{
								return Redirect::to('/Schedule/' . $id . '/edit')->with('rerror', 'Room is not available!')->withInput();
							}elseif (strtotime($start) < strtotime($sched->end) && strtotime($end) > strtotime($sched->end)) {
								return Redirect::to('/Schedule/' . $id . '/edit')->with('rerror', 'Room is not available!')->withInput();
							}elseif (strtotime($start) < strtotime($sched->start) && strtotime($end) > strtotime($sched->end)) {
								return Redirect::to('/Schedule/' . $id . '/edit')->with('rerror', 'Room is not available!')->withInput();
							}elseif (strtotime($start) >= strtotime($sched->start) && strtotime($end) <= strtotime($sched->end)) {
								return Redirect::to('/Schedule/' . $id . '/edit')->with('rerror', 'Room is not available!')->withInput();
									}
							}
						}


						//Subjects------------------------------------------------------------------------------------------------------
						if($sex != 0)
						{
							if($sched->s_id == $sid)
							{
								if(strtotime($start) < strtotime($sched->start) && strtotime($end) > strtotime($sched->start))
							{
								return Redirect::to('/Schedule/' . $id . '/edit')->with('serror', 'Subject is not available!')->withInput();
							}elseif (strtotime($start) < strtotime($sched->end) && strtotime($end) > strtotime($sched->end)) {
								return Redirect::to('/Schedule/' . $id . '/edit')->with('serror', 'Subject is not available!')->withInput();
							}elseif (strtotime($start) < strtotime($sched->start) && strtotime($end) > strtotime($sched->end)) {
								return Redirect::to('/Schedule/' . $id . '/edit')->with('serror', 'Subject is not available!')->withInput();
							}elseif (strtotime($start) >= strtotime($sched->start) && strtotime($end) <= strtotime($sched->end)) {
								return Redirect::to('/Schedule/' . $id . '/edit')->with('serror', 'Subject is not available!')->withInput();
											}
							}
						}


						//Sections------------------------------------------------------------------------------------------------------
						if($secex != 0)
						{
							if($sched->sec_id == $secid)
							{
								if(strtotime($start) < strtotime($sched->start) && strtotime($end) > strtotime($sched->start))
							{
								return Redirect::to('/Schedule/' . $id . '/edit')->with('seerror', 'Section is not available!')->withInput();
							}elseif (strtotime($start) < strtotime($sched->end) && strtotime($end) > strtotime($sched->end)) {
								return Redirect::to('/Schedule/' . $id . '/edit')->with('secerror', 'Section is not available!')->withInput();
							}elseif (strtotime($start) < strtotime($sched->start) && strtotime($end) > strtotime($sched->end)) {
								return Redirect::to('/Schedule/' . $id . '/edit')->with('secerror', 'Section is not available!')->withInput();
							}elseif (strtotime($start) >= strtotime($sched->start) && strtotime($end) <= strtotime($sched->end)) {
								return Redirect::to('/Schedule/' . $id . '/edit')->with('secerror', 'Section is not available!')->withInput();
													}
							}
						}

								}
						



						



						
						$love = 'true';
					

					if($love == 'true')
					{				
					$selected = "";
							$days =  Input::get('day');
		                                if(isset($days)){
		                                	 if(is_array($days))
		                							{
								                        foreach($days as $day){
								                                 	  		if($selected == "")
							                        	{
							                        		$selected = $selected . $day;
							                        	}
							                        	else
							                        	{
							                        		$selected = $selected .',' . $day;
							                        	}
								                                 } 
		                							}
		                                 
		                                }
							$syr = 0;
							$sys = Schoolyear::all();
							foreach($sys as $sy){
								if($sy->Active == 1){
									$syr = $sy->sy_id;
								}
							}
							$scheds = Sched::find($id);
							$scheds->sec_id = Input::get('section');
							$scheds->lvl_id = Input::get('level');
							$scheds->s_id = Input::get('subject');
							$scheds->start = Input::get('start');
							$scheds->end = Input::get('end');
							$scheds->day = $selected;
							$scheds->t_id = Input::get('teacher');
							$scheds->r_id = Input::get('room');
							$scheds->sy_id = $syr;
							$scheds->save();

							Session::flash('message','Successfully Saved!');
							return Redirect::to('Schedule');
					}
				}

				$selected = "";
							$days =  Input::get('day');
		                                if(isset($days)){
		                                	 if(is_array($days))
		                							{
								                        foreach($days as $day){
								                                 	  		if($selected == "")
							                        	{
							                        		$selected = $selected . $day;
							                        	}
							                        	else
							                        	{
							                        		$selected = $selected .',' . $day;
							                        	}
								                                 } 
		                							}
		                                 
		                                }
							$syr = 0;
							$sys = Schoolyear::all();
							foreach($sys as $sy){
								if($sy->Active == 1){
									$syr = $sy->sy_id;
								}
							}
							$scheds = Sched::find($id);
							$scheds->sec_id = Input::get('section');
							$scheds->lvl_id = Input::get('level');
							$scheds->s_id = Input::get('subject');
							$scheds->start = Input::get('start');
							$scheds->end = Input::get('end');
							$scheds->day = $selected;
							$scheds->t_id = Input::get('teacher');
							$scheds->r_id = Input::get('room');
							$scheds->sy_id = $syr;
							$scheds->save();

							Session::flash('message','Successfully Saved!');
							return Redirect::to('Schedule');
				}

				/**
				 * Remove the specified resource from storage.
				 *
				 * @param  int  $id
				 * @return Response
				 */
				public function destroy($id)
				{
					$scheds= Sched::find($id);
					$scheds->delete();
					return Redirect::to('Schedule');
				}

				public function getDrop()
				{
					$input = Input::get('option');
					$level = Level::find($input);
        			$sections = Level::sections($level->lvl_id);
        			return Response::json($sections);
				} 
				
				public function getDrop2()
				{
					$input = Input::get('option');
					$level = Level::find($input);
        			$subjects = Level::subjects($level->lvl_id);
        			return Response::json($subjects);
				} 


	}
