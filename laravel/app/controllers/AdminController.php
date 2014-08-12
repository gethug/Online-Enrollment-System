<?php

	class AdminController extends BaseController {

		
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
					$admins = Admin::all();
					return View::make('server.addmin.addmin')->with('admins', $admins);

				}

				/**
				 * Show the form for creating a new resource.
				 *
				 * @return Response
				 */
				public function create()
				{
					return View::make('server.addmin.create');
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

				}

				/**
				 * Show the form for editing the specified resource.
				 *
				 * @param  int  $id
				 * @return Response
				 */
				public function edit($id)
				{
					$admin = Admin::find($id);

					return View::make('server.addmin.edit')
						->with('admin', $admin);
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


	}
