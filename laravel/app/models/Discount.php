<?php

class Discount extends Eloquent{

	protected $table = 'tbldiscount';
	 protected $primaryKey = 'd_id';


	  public static function disc($id){
	 	
	 		return DB::table('tbldiscount')
					->where('d_id', $id)
					->first();
	 	          
          }
}