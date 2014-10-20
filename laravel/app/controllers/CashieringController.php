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
					$sy=  DB::table('tblschoolyear')
					->where('active', 1)
					->first();

					$enrolees = Enrolee::all();
					$pays = PaySched::where('sy_id','=', $sy->sy_id)->first();
					return View::make('server.cashiering.index')
					->with('enrolees', $enrolees)
					->with('pays', $pays);

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
					

					$schoolyear = array(
						'ID' => Input::get('ID'),
					'Fee' => Input::get('Fee'),
						'Amount' => Input::get('Amount'),
					);

					$rules = array(
					'ID' => 'required',
					'Fee' => 'required',
					'Amount' => 'required',
						);

				$validator = Validator::make($schoolyear, $rules);

				if ($validator->fails()){
					return Redirect::to('Cashiering')
						->withErrors($validator)
						->withInput();
				} else{

					$bal = 0;
					$id = Input::get('ID');
					$f_id = Input::get('Fee');
					$fee = Input::get('Amount');
					$pays = Studfee::find($f_id);
					if ($pays->m_id == 3 )
					{
						if ($pays->bal > $fee)
					{
						return Redirect::to('Cashiering')->with('error', 'Invalid amount');
					}
					}

					if ($pays->m_id == 3) {
						$history = new Payhistory;
						$history->en_id = $pays->en_id;
						$history->m_name = $pays->m_name;
						$history->paid = $pays->bal;
						$history->sy_id = $sy->sy_id;
						$history->h_day = 0;
						$history->save();

						$bal = $fee - $pays->bal;
						$final = Studfee::find($pays->f_id);
						$final->bal = 0;
						$final->save();

						

						if ($bal > 0)
					{
						

						Session::flash('message','Successfully Paid! Change: ' . $bal);
						return Redirect::to('Cashiering');
					}
					else
					{
						
						Session::flash('message','Successfully Paid!');
						return Redirect::to('Cashiering');
					}

					}


					/**tuition FEE
					*/
					if ($pays->m_name == "Tuition Fee")
					{
						$rbal = $fee;
						$broke = TBreak::where('en_id', '=', $id)->first();
						if($broke->first != 0)
						{
							if($fee > $broke->first)
							{
								$rbal = $rbal - $broke->first;
								$brokes = TBreak::find($broke->b_id);
								$brokes->first = 0;
								$brokes->save();
							}
							elseif($fee <= $broke->first)
							{
								$sbal = $broke->first - $fee; 
								$brokes = TBreak::find($broke->b_id);
								$brokes->first = $sbal;
								$brokes->save();

								if($rbal != 0)
								{
								$upbal = Studfee::find($pays->f_id);
								$upbal->bal = $sbal;
								$upbal->save();
								Session::flash('message','Successfully Paid!');
								return Redirect::to('Cashiering');
								}

								else
								{
								$upbal = Studfee::find($pays->f_id);
								$upbal->bal = $broke->second;
								$upbal->save();
								Session::flash('message','Successfully Paid!');
								return Redirect::to('Cashiering');
								}
								
							}
						}


						if($broke->second != 0)
						{
							if($rbal > $broke->second)
							{
								$rbal = $rbal - $broke->second;
								$brokes = TBreak::find($broke->b_id);
								$brokes->second = 0;
								$brokes->save();
							}
							elseif($rbal <= $broke->second)
							{
								$sbal = $broke->second - $rbal; 
								$brokes = TBreak::find($broke->b_id);
								$brokes->second = $sbal;
								$brokes->save();

								if($sbal != 0)
								{
								$upbal = Studfee::find($pays->f_id);
								$upbal->bal = $sbal;
								$upbal->save();
								Session::flash('message','Successfully Paid!');
								return Redirect::to('Cashiering');
								}

								else
								{
								$upbal = Studfee::find($pays->f_id);
								$upbal->bal = $broke->third;
								$upbal->save();
								Session::flash('message','Successfully Paid!');
								return Redirect::to('Cashiering');
								}
								
							}
						}




						if($broke->third != 0)
						{
							if($rbal > $broke->third)
							{
								$rbal = $rbal - $broke->third;
								$brokes = TBreak::find($broke->b_id);
								$brokes->third = 0;
								$brokes->save();
							}
							elseif($rbal <= $broke->third)
							{
								$sbal = $broke->third - $rbal; 
								$brokes = TBreak::find($broke->b_id);
								$brokes->third = $sbal;
								$brokes->save();

								if($sbal != 0)
								{
								$upbal = Studfee::find($pays->f_id);
								$upbal->bal = $sbal;
								$upbal->save();
								Session::flash('message','Successfully Paid!');
								return Redirect::to('Cashiering');
								}

								else
								{
								$upbal = Studfee::find($pays->f_id);
								$upbal->bal = $broke->fourth;
								$upbal->save();
								Session::flash('message','Successfully Paid!');
								return Redirect::to('Cashiering');
								}
								
							}
						}




						if($broke->fourth != 0)
						{
							if($rbal > $broke->fourth)
							{
								$rbal = $rbal - $broke->fourth;
								$brokes = TBreak::find($broke->b_id);
								$brokes->fourth = 0;
								$brokes->save();
							}
							elseif($rbal <= $broke->fourth)
							{
								$sbal = $broke->fourth - $rbal; 
								$brokes = TBreak::find($broke->b_id);
								$brokes->fourth = $sbal;
								$brokes->save();

								if($sbal != 0)
								{
								$upbal = Studfee::find($pays->f_id);
								$upbal->bal = $sbal;
								$upbal->save();
								Session::flash('message','Successfully Paid!');
								return Redirect::to('Cashiering');
								}

								else
								{
								$upbal = Studfee::find($pays->f_id);
								$upbal->bal = $broke->fifth;
								$upbal->save();
								Session::flash('message','Successfully Paid!');
								return Redirect::to('Cashiering');
								}
								
							}
						}



							if($broke->fifth != 0)
						{
							if($rbal > $broke->fifth)
							{
								$rbal = $rbal - $broke->fifth;
								$brokes = TBreak::find($broke->b_id);
								$brokes->fifth = 0;
								$brokes->save();
							}
							elseif($rbal <= $broke->fifth)
							{
								$sbal = $broke->fifth - $rbal; 
								$brokes = TBreak::find($broke->b_id);
								$brokes->fifth = $sbal;
								$brokes->save();

								if($sbal != 0)
								{
								$upbal = Studfee::find($pays->f_id);
								$upbal->bal = $sbal;
								$upbal->save();
								Session::flash('message','Successfully Paid!');
								return Redirect::to('Cashiering');
								}

								else
								{
								$upbal = Studfee::find($pays->f_id);
								$upbal->bal = $broke->sixth;
								$upbal->save();
								Session::flash('message','Successfully Paid!');
								return Redirect::to('Cashiering');
								}
								
							}
						}



							if($broke->sixth != 0)
						{
							if($rbal > $broke->sixth)
							{
								$rbal = $rbal - $broke->sixth;
								$brokes = TBreak::find($broke->b_id);
								$brokes->sixth = 0;
								$brokes->save();
							}
							elseif($rbal <= $broke->sixth)
							{
								$sbal = $broke->sixth - $rbal; 
								$brokes = TBreak::find($broke->b_id);
								$brokes->sixth = $sbal;
								$brokes->save();

								if($sbal != 0)
								{
								$upbal = Studfee::find($pays->f_id);
								$upbal->bal = $sbal;
								$upbal->save();
								Session::flash('message','Successfully Paid!');
								return Redirect::to('Cashiering');
								}

								else
								{
								$upbal = Studfee::find($pays->f_id);
								$upbal->bal = $broke->seventh;
								$upbal->save();
								Session::flash('message','Successfully Paid!');
								return Redirect::to('Cashiering');
								}
								
							}
						}



							if($broke->seventh != 0)
						{
							if($rbal > $broke->seventh)
							{
								$rbal = $rbal - $broke->seventh;
								$brokes = TBreak::find($broke->b_id);
								$brokes->seventh = 0;
								$brokes->save();
							}
							elseif($rbal <= $broke->seventh)
							{
								$sbal = $broke->seventh - $rbal; 
								$brokes = TBreak::find($broke->b_id);
								$brokes->seventh = $sbal;
								$brokes->save();

								if($sbal != 0)
								{
								$upbal = Studfee::find($pays->f_id);
								$upbal->bal = $sbal;
								$upbal->save();
								Session::flash('message','Successfully Paid!');
								return Redirect::to('Cashiering');
								}

								else
								{
								$upbal = Studfee::find($pays->f_id);
								$upbal->bal = $broke->eight;
								$upbal->save();
								Session::flash('message','Successfully Paid!');
								return Redirect::to('Cashiering');
								}
								
							}
						}


						if($broke->eight != 0)
						{
							if($rbal > $broke->eight)
							{
								$rbal = $rbal - $broke->eight;
								$brokes = TBreak::find($broke->b_id);
								$brokes->eight = 0;
								$brokes->save();
							}
							elseif($rbal <= $broke->eight)
							{
								$sbal = $broke->eight - $rbal; 
								$brokes = TBreak::find($broke->b_id);
								$brokes->eight = $sbal;
								$brokes->save();

								if($sbal != 0)
								{
								$upbal = Studfee::find($pays->f_id);
								$upbal->bal = $sbal;
								$upbal->save();
								Session::flash('message','Successfully Paid!');
								return Redirect::to('Cashiering');
								}

								else
								{
								$upbal = Studfee::find($pays->f_id);
								$upbal->bal = $broke->ninth;
								$upbal->save();
								Session::flash('message','Successfully Paid!');
								return Redirect::to('Cashiering');
								}
								
							}
						}


						if($broke->ninth != 0)
						{
							if($rbal > $broke->ninth)
							{
								$rbal = $rbal - $broke->ninth;
								$brokes = TBreak::find($broke->b_id);
								$brokes->ninth = 0;
								$brokes->save();
							}
							elseif($rbal <= $broke->ninth)
							{
								$sbal = $broke->ninth - $rbal; 
								$brokes = TBreak::find($broke->b_id);
								$brokes->ninth = $sbal;
								$brokes->save();

								if($sbal != 0)
								{
								$upbal = Studfee::find($pays->f_id);
								$upbal->bal = $sbal;
								$upbal->save();
								Session::flash('message','Successfully Paid!');
								return Redirect::to('Cashiering');
								}

								else
								{
								$upbal = Studfee::find($pays->f_id);
								$upbal->bal = $broke->tenth;
								$upbal->save();
								Session::flash('message','Successfully Paid!');
								return Redirect::to('Cashiering');
								}
								
							}
						}




						if($broke->tenth != 0)
						{
							if($rbal > $broke->tenth)
							{
								$upbal = Studfee::find($pays->f_id);
								$upbal->bal = $broke->tenth;
								$upbal->save();
								return Redirect::to('Cashiering')->with('error', 'Invalid amount');
							}
							elseif($rbal <= $broke->tenth)
							{
								$sbal = $broke->tenth - $rbal; 
								$brokes = TBreak::find($broke->b_id);
								$brokes->tenth = $sbal;
								$brokes->save();

								if($sbal != 0)
								{
								$upbal = Studfee::find($pays->f_id);
								$upbal->bal = $sbal;
								$upbal->save();
								Session::flash('message','Successfully Paid!');
								return Redirect::to('Cashiering');
								}

								else
								{
								$upbal = Studfee::find($pays->f_id);
								$upbal->bal = 0;
								$upbal->save();
								Session::flash('message','Successfully Paid!');
								return Redirect::to('Cashiering');
								}
								
							}
						}





					}




					

					if ($fee < 0 or $fee < $pays->bal)
					{
						return Redirect::to('Cashiering')->with('error', 'Invalid amount');
					}
					$fbal = $fee - $pays->bal;
					$final = Studfee::find($pays->f_id);
					$final->bal = 0;
					$final->save();

					$history = new Payhistory;
					$history->en_id = $final->en_id;
					$history->m_name = $final->m_name;
					$history->paid = $fee;
					$history->sy_id = $sy->sy_id;
					$history->h_day = 0;
					$history->save();
					if($fbal > 0)
					{
						Session::flash('message','Successfully Paid! Change:' . $fbal);
						return Redirect::to('Cashiering');
					}
						Session::flash('message','Successfully Paid!');
						return Redirect::to('Cashiering');
					
					
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
					$fee = Studfee::find($input);
        			$pay = Studfee::bal($fee->f_id);
        			return Response::json($pay);
				} 


				public function getDropbro()
				{
					$input = Input::get('option');
					$fee = Enrolee::find($input);
        			$broke = Enrolee::broke($fee->en_id);
        			return Response::json($broke);
				}

	}
