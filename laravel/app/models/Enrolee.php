<?php

class Enrolee extends Eloquent{

	protected $table = 'tblenrolee';
	 protected $primaryKey = 'en_id';
	

	 public static function studfee($id){

	 	$sy=  DB::table('tblschoolyear')
					->where('active', 1)
					->first();
	 	
	 	$bal =  DB::table('tblstudfee')
					->where('en_id', $id)
					->first();

		


		if ($bal->bal != 0)
		{
			return Studfee::Join('tblenrolee', 'tblenrolee.en_id', '=', 'tblstudfee.en_id')
           ->where('tblstudfee.en_id', '=', $id)
           ->where('tblstudfee.m_id', '=', 3)
           ->where('tblstudfee.sy_id', '=', $sy->sy_id)
           ->get(['tblstudfee.*']);
		}
		else
		{
			return Studfee::Join('tblenrolee', 'tblenrolee.en_id', '=', 'tblstudfee.en_id')
           ->where('tblstudfee.en_id', '=', $id)
           ->where('tblstudfee.bal', '!=', 0)
           ->where('tblstudfee.sy_id', '=', $sy->sy_id)
           ->get(['tblstudfee.*']);
		}

	 		 
	 	          
          }
           public static function enroll($id){
	 	
	 		return DB::table('tblenrolee')
					->where('en_id', $id)
					->first();
	 	          
          }
}