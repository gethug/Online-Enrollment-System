<?php

	class RoomController extends BaseController {

		
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
					$rooms = Room::all();
					return View::make('server.rooms.rooms')->with('rooms', $rooms);

				}



				public function getCreate()
				{

					return View::make('server.rooms.create');
					
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
					'room' => 'required|unique:tblrooms,room',
						);

				$validator = Validator::make(Input::all(), $rules);

				if ($validator->fails()){
					return Redirect::to('Room/create')
						->withErrors($validator)
						->withInput();
				} else{
					
					$rooms = new Room;
					$rooms->room = Input::get('room');
					$rooms->save();


					Session::flash('message','Successfully Saved!');
					return Redirect::to('Room');
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
					$room= Room::find($id);
					return View::make('server.rooms.edit')
					->with('room', $room);
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
					'room' => 'required|unique:tblrooms,room,' . $id . ',r_id'
						);

				$validator = Validator::make(Input::all(), $rules);

				if ($validator->fails()){
					return Redirect::to('Room/' . $id . '/edit')
						->withErrors($validator)
						->withInput();
				} else{
					

					$rooms = Room::find($id);
					$rooms->room = Input::get('room');
					$rooms->save();


					Session::flash('message','Successfully Updated!');
					return Redirect::to('Room');
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
					$rooms= Room::find($id);
					$rooms->delete();
					return Redirect::to('Room');
				} 


	}
