<?php

class Subject extends Eloquent{

	protected $table = 'tblsubject';
	 protected $primaryKey = 's_id';
	

	  public static function grade($id){

	 	$sy=  DB::table('tblschoolyear')
					->where('active', 1)
					->first();

			return Grade::Join('tblenrolee', 'tblenrolee.en_id', '=', 'tblgrade.en_id')
			->join('tblsubject', 'tblsubject.s_id', '=', 'tblgrade.s_id')
           ->where('tblgrade.s_id', '=', $id)
           ->where('tblgrade.sy_id', '=', $sy->sy_id)
           ->get(['tblsubject.*', 'tblgrade.*', 'tblenrolee.*']);
		 
	 	          
          }
}