<?php

	class CashieringController extends BaseController {

		
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
					$enrolees = Enrolee::all();
					return View::make('server.cashiering.index')
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

				public function getDroppay()
				{
					$input = Input::get('option');
					$Payble = Misc::find($input);
        			$pay = Misc::pay($Payble->m_id);
        			return Response::json($pay);
				} 


	}
