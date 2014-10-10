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

			return Studfee::Join('tblenrolee', 'tblenrolee.en_id', '=', 'tblstudfee.en_id')
           ->where('tblstudfee.en_id', '=', $id)
           ->where('tblstudfee.bal', '!=', 0)
           ->where('tblstudfee.sy_id', '=', $sy->sy_id)
           ->get(['tblstudfee.*']);
		 
	 	          
          }
           public static function enroll($id){
	 	
	 		return DB::table('tblenrolee')
					->where('en_id', $id)
					->first();
	 	          
          }

           public static function history($id){

	 	$sy=  DB::table('tblschoolyear')
					->where('active', 1)
					->first();

			return Payhistory::Join('tblenrolee', 'tblenrolee.en_id', '=', 'tblhistory.en_id')
           ->where('tblhistory.en_id', '=', $id)
           ->where('tblhistory.sy_id', '=', $sy->sy_id)
           ->get(['tblhistory.*']);
		 
	 	          
          }


          public static function broke($id){

	 	$sy=  DB::table('tblschoolyear')
					->where('active', 1)
					->first();

			return TBreak::Join('tblenrolee', 'tblenrolee.en_id', '=', 'tblbreak.en_id')
           ->where('tblbreak.en_id', '=', $id)
           ->where('tblbreak.sy_id', '=', $sy->sy_id)
           ->get(['tblbreak.*']);
		 
	 	          
          }
}