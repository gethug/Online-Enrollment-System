<?php

class Studfee extends Eloquent{

	protected $table = 'tblstudfee';
	 protected $primaryKey = 'f_id';

	  public static function bal($id){
	 	
	 		return DB::table('tblstudfee')
					->where('f_id', $id)
					->first();
	 	          
          }
}