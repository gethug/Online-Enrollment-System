<?php

class Section extends Eloquent{

	protected $table = 'tblsections';
	 protected $primaryKey = 'sec_id';
	 	 
		 public static function sched($id){

	 	$sy=  DB::table('tblschoolyear')
					->where('active', 1)
					->first();

			return Sched::Join('tblsections', 'tblsections.sec_id', '=', 'tblsched.sec_id')
			->join('tblsubject', 'tblsubject.s_id', '=', 'tblsched.s_id')
			->join('tblteacher', 'tblteacher.t_id', '=', 'tblsched.t_id')
			->join('tblrooms', 'tblrooms.r_id', '=', 'tblsched.r_id')
           ->where('tblsched.sec_id', '=', $id)
           ->where('tblsched.sy_id', '=', $sy->sy_id)
           ->get(['tblsubject.*', 'tblsched.*', 'tblteacher.*', 'tblrooms.*']);
		 
	 	          
          }

           public static function sched2($id){

	 	$sy=  DB::table('tblschoolyear')
					->where('active', 1)
					->first();

			return Sched::Join('tblsections', 'tblsections.sec_id', '=', 'tblsched.sec_id')
			->join('tblsubject', 'tblsubject.s_id', '=', 'tblsched.s_id')
           ->where('tblsched.sec_id', '=', $id)
           ->where('tblsched.sy_id', '=', $sy->sy_id)
           ->get(['tblsubject.*', 'tblsched.*']);
		 
	 	          
          }
}