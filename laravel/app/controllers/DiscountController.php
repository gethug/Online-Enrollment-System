<?php

	class DiscountController extends BaseController {

		
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
					$discounts = Discount::all();
					return View::make('server.discount.index')
					->with('discounts', $discounts);

				}




				public function getCreate()
				{
					return View::make('server.discount.create');
					
					
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
					'name' => 'required|unique:tbldiscount,d_name',
					'percentage' => 'required|numeric'
						);

				$validator = Validator::make(Input::all(), $rules);

				if ($validator->fails()){
					return Redirect::to('Discount/create')
						->withErrors($validator)
						->withInput();
				} else{
					
					$discounts = new Discount;
					$discounts->d_name = Input::get('name');
					$discounts->d_per = Input::get('percentage');
					$discounts->save();


					Session::flash('message','Successfully Saved!');
					return Redirect::to('Discount');
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
					$discounts = Discount::find($id);
				 return View::make('server.discount.edit')
				 ->with('discounts', $discounts);
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
					'name' => 'required|unique:tbldiscount,d_name,'. $id . ',d_id',
					'percentage' => 'required|numeric'
						);

				$validator = Validator::make(Input::all(), $rules);

				if ($validator->fails()){
					return Redirect::to('Discount/'. $id . '/edit')
						->withErrors($validator)
						->withInput();
				} else{
					
					$discounts = Discount::find($id);
					$discounts->d_name = Input::get('name');
					$discounts->d_per = Input::get('percentage');
					$discounts->save();


					Session::flash('message','Successfully Saved!');
					return Redirect::to('Discount');
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
					$discounts = Discount::find($id);
					$discounts->delete();

					Session::flash('message','Successfully Deleted!');
					return Redirect::to('Discount');
				} 


	}
