<?php

class Misc extends Eloquent{

	protected $table = 'tblmisc';
	 protected $primaryKey = 'm_id';

	 public static function bal($id){
	 	
	 		 return Studfee::Join('tblmisc', 'tblmisc.m_id', '=', 'tblstudfee.m_id')
           ->where('tblstudfee.m_id', '=', $id)
           ->get(['tblstudfee.*']);
	 	          
          }
}