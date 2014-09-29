<?php

class Level extends Eloquent{
	 protected $table = 'tbllevel';
	 protected $primaryKey = 'lvl_id';
	
	 public static function sections($id){
           return Section::Join('tbllevel', 'tbllevel.lvl_id', '=', 'tblsections.lvl_id')
           ->where('tblsections.lvl_id', '=', $id)
           ->get(['tblsections.*']);
          }

      public static function subjects($id){
        $sy = DB::table('tblschoolyear')
          ->where('active', 1)
          ->first();

           return Subject::Join('tbllevel', 'tbllevel.lvl_id', '=', 'tblsubject.lvl_id')
           ->where('tblsubject.lvl_id', '=', $id)
           ->where('tblsubject.sy_id', '=', $sy->sy_id)
           ->get(['tblsubject.*']);
          }
}

