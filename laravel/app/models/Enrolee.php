<?php

class Enrolee extends Eloquent{

	protected $table = 'tblenrolee';
	 protected $primaryKey = 'en_id';
	

	 public static function studfee($id){
	 	
	 		 return Studfee::Join('tblenrolee', 'tblenrolee.en_id', '=', 'tblstudfee.en_id')
           ->where('tblstudfee.en_id', '=', $id)
           ->get(['tblstudfee.*']);
	 	          
          }
           public static function enroll($id){
	 	
	 		return DB::table('tblenrolee')
					->where('en_id', $id)
					->first();
	 	          
          }
}