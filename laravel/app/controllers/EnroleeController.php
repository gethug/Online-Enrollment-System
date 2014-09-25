<?php

	class EnroleeController extends BaseController {

		
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
					$enrolees= Enrolee::join('tblparent', 'tblenrolee.en_id', '=', 'tblparent.en_id')
					->join('tbllevel', 'tblenrolee.lvl_id', '=', 'tbllevel.lvl_id')
					->select('tblenrolee.en_id','tblenrolee.type', 'tblenrolee.lvl_id', 'tblenrolee.fname', 'tblenrolee.mname', 'tblenrolee.lname', 'tblenrolee.gender', 'tblenrolee.h_addres', 'tblparent.f_name', 'tblparent.m_name', 'tblparent.l_name', 'tblparent.cell_no', 'tbllevel.level')
					->get();

					return View::make('server.Enrolee.enrolee')
					->with('enrolees', $enrolees);

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
					$levels = Level::all();
					return View::make('server.Enrolee.create')
					->with('levels', $levels);
				}

				/**
				 * Store a newly created resource in storage.
				 *
				 * @return Response
				 */
				public function store()
				{

						$rules = array(
					'ID' => 'required',
					'Firstname' => 'required',
					'Lastname' => 'required',
					'HomeAddress' => 'required',
					'CityAddress' => 'required',
					'Birthplace' => 'required',
					'datebirth' => 'required',
					'Nationality' => 'required',
					'Religion' => 'required',
					'PreviousSchool' => 'required',
					'Schoolyear' => 'required',
					'mailaddress' => 'required',
					'ParentFirstname' => 'required',
					'ParentLastname' => 'required',
					'Age' => 'required|numeric',
					'HEA' => 'required',
					'Occupation' => 'required',
					'ParentNationality' => 'required',
					'ParentReligion' => 'required',
					'MobileNumber' => 'required|numeric'
						);

				$validator = Validator::make(Input::all(), $rules);

				if ($validator->fails()){
					return Redirect::to('Enrolee/create')
						->withErrors($validator)
						->withInput();
				} else{
					$id = 3;
					$misc = Misc::find($id);
					$mid = $misc->m_id;
					$fee = $misc->m_fee;

					$studs = new Studfee;
					$studs->en_id = Input::get('ID');
					$studs->m_id = $mid;
					$studs->m_name = $misc->m_name;
					$studs->bal = $fee;
					$studs->save();

					$enrolees = new Enrolee;
					$enrolees->en_id = Input::get('ID');
					$enrolees->fname = Input::get('Firstname');
					$enrolees->mname = Input::get('Mname');
					$enrolees->lname = Input::get('Lastname');
					$enrolees->type = Input::get('type');
					$enrolees->lvl_id = Input::get('level');
					$enrolees->gender = Input::get('gender');
					$enrolees->h_addres = Input::get('HomeAddress');
					$enrolees->c_addres = Input::get('CityAddress');
					$enrolees->b_place = Input::get('Birthplace');
					$enrolees->b_date = Input::get('datebirth');
					$enrolees->nationality = Input::get('Nationality');
					$enrolees->religion = Input::get('Religion');
					$enrolees->prev_school = Input::get('PreviousSchool');
					$enrolees->schoolyear = Input::get('Schoolyear');
					$enrolees->mail_add = Input::get('mailaddress');
					$enrolees->save();

					$parents = new Parentss;
					$parents->f_name = Input::get("ParentFirstname");
					$parents->m_name = Input::get("ParentMname");
					$parents->l_name = Input::get("ParentLastname");
					$parents->en_id = Input::get("ID");
					$parents->age = Input::get("Age");
					$parents->heda = Input::get("HEA");
					$parents->occp = Input::get("Occupation");
					$parents->religion = Input::get("ParentReligion");
					$parents->nationality = Input::get("ParentNationality");
					$parents->cell_no = Input::get("MobileNumber");
					$parents->save();


					Session::flash('message','Successfully Saved!');
					return Redirect::to('Enrolee');
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
					$enrolees = Enrolee::find($id);

					$parents = DB::table('tblparent')
					->where('en_id', $id)
					->first();


					return View::make('server.Enrolee.edit')
						->with('enrolees', $enrolees)
						->with('parents', $parents)
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
					$rules = array(
					'ID' => 'required',
					'Firstname' => 'required',
					'Lastname' => 'required',
					'HomeAddress' => 'required',
					'CityAddress' => 'required',
					'Birthplace' => 'required',
					'datebirth' => 'required',
					'Nationality' => 'required',
					'Religion' => 'required',
					'PreviousSchool' => 'required',
					'Schoolyear' => 'required',
					'mailaddress' => 'required',
					'ParentFirstname' => 'required',
					'ParentLastname' => 'required',
					'Age' => 'required|numeric',
					'HEA' => 'required',
					'Occupation' => 'required',
					'ParentNationality' => 'required',
					'ParentReligion' => 'required',
					'MobileNumber' => 'required|numeric'
						);

				$validator = Validator::make(Input::all(), $rules);

				if ($validator->fails()){
					return Redirect::to('Enrolee/' . $id . '/edit')
						->withErrors($validator)
						->withInput();
				} else{

					
					$enrolees = Enrolee::find($id);
					$enrolees->en_id = Input::get('ID');
					$enrolees->fname = Input::get('Firstname');
					$enrolees->mname = Input::get('Mname');
					$enrolees->lname = Input::get('Lastname');
					$enrolees->type = Input::get('type');
					$enrolees->lvl_id = Input::get('level');
					$enrolees->gender = Input::get('gender');
					$enrolees->h_addres = Input::get('HomeAddress');
					$enrolees->c_addres = Input::get('CityAddress');
					$enrolees->b_place = Input::get('Birthplace');
					$enrolees->b_date = Input::get('datebirth');
					$enrolees->nationality = Input::get('Nationality');
					$enrolees->religion = Input::get('Religion');
					$enrolees->prev_school = Input::get('PreviousSchool');
					$enrolees->schoolyear = Input::get('Schoolyear');
					$enrolees->mail_add = Input::get('mailaddress');
					$enrolees->save();

					$par = DB::table('tblparent')
					->where('en_id', $id)
					->first();

					$parents = Parentss::find($par->p_id);
					$parents->f_name = Input::get("ParentFirstname");
					$parents->m_name = Input::get("ParentMname");
					$parents->l_name = Input::get("ParentLastname");
					$parents->en_id = Input::get("ID");
					$parents->age = Input::get("Age");
					$parents->heda = Input::get("HEA");
					$parents->occp = Input::get("Occupation");
					$parents->religion = Input::get("ParentReligion");
					$parents->nationality = Input::get("ParentNationality");
					$parents->cell_no = Input::get("MobileNumber");
					$parents->save();


					Session::flash('message','Successfully Updated!');
					return Redirect::to('Enrolee');
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
					$enrolees = Enrolee::find($id);
					$enrolees->delete();
					$parents = Parentss::where('en_id','=', $id)->delete();
					$studs = Studfee::where('en_id', '=', $id)->delete();
					return Redirect::to('Enrolee');
				} 


	}
