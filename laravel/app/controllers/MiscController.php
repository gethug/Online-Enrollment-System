<?php

	class MiscController extends BaseController {

		
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
					$miscs = Misc::join('tbllevel', 'tblmisc.lvl_id', '=', 'tbllevel.lvl_id')
					->select('tblmisc.m_name', 'tblmisc.m_id','tblmisc.m_fee','tbllevel.level')
					->get();

					return View::make('server.misc.index')
					->with('miscs', $miscs);

				}




				public function getCreate()
				{

					$levels = Level::all();
					return View::make('server.misc.create')
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

					$id = Input::get('level');
					$all = Input::get('lvl');
					$man = Input::get('mandatory');
					$levels = Level::all();
					$rules = array(
					'name' => 'required|unique:tblmisc,m_name,NULL,id,lvl_id,' . $id , 
					'cost' => 'required|numeric'
						);

				$validator = Validator::make(Input::all(), $rules);

				if ($validator->fails()){
					return Redirect::to('Miscellaneous/create')
						->withErrors($validator)
						->withInput();
				} else{
					
					if ($all == 'all'){
						foreach ($levels as $level){
							$miscs = new Misc;
							$miscs->m_name = Input::get('name');
							$miscs->m_fee = Input::get('cost');
							$miscs->lvl_id = $level->lvl_id;
							if($man == 1){
								$miscs->mandatory = Input::get('mandatory');
							}
							else{
									$miscs->mandatory = 0;
							}
							$miscs->save();
						}
					}
					else{
							$miscs = new Misc;
							$miscs->m_name = Input::get('name');
							$miscs->m_fee = Input::get('cost');
							$miscs->lvl_id = Input::get('level');
							if($man == 1){
								$miscs->mandatory = Input::get('mandatory');
							}
							else{
									$miscs->mandatory = 0;
							}
							$miscs->save();
					}
					


					Session::flash('message','Successfully Saved!');
					return Redirect::to('Miscellaneous');
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
					$miscs = Misc::find($id);
					$levels = Level::all();
					return View::make('server.misc.edit')
					->with('miscs', $miscs)
					->with('levels', $levels);


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
					$man = Input::get('mandatory');
					$rules = array(
					'name' => 'required|unique:tblmisc,m_name,' . $id . ',m_id,lvl_id,' . $lvlid, 
					'cost' => 'required|numeric'
						);

				$validator = Validator::make(Input::all(), $rules);

				if ($validator->fails()){
						return Redirect::to('Miscellaneous/' . $id . '/edit')
						->withErrors($validator)
						->withInput();
				} else{
					
					
				
							$miscs = Misc::find($id);
							$miscs->m_name = Input::get('name');
							$miscs->m_fee = Input::get('cost');
							$miscs->lvl_id = Input::get('level');
							if($man == 1){
								$miscs->mandatory = Input::get('mandatory');
							}
							else{
									$miscs->mandatory = 0;
							}
							$miscs->save();
					
					


					Session::flash('message','Successfully Saved!');
					return Redirect::to('Miscellaneous');
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
					$miscs = Misc::find($id);
					$miscs->delete();

					Session::flash('message','Successfully Deleted!');
					return Redirect::to('Miscellaneous');
				} 


	}
