<?php

class Misc extends Eloquent{

	protected $table = 'tblmisc';
	 protected $primaryKey = 'm_id';

	 public static function pay($id){
	 	
	 		return DB::table('tblstudfee')
					->where('m_id', $id)
					->first();
	 	          
          }
}