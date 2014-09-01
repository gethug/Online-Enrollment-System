<?php

class Level extends Eloquent{
	 protected $table = 'tbllevel';
	 protected $primaryKey = 'lvl_id';
	
	 public static function sections($id){
           return Section::Join('tbllevel', 'tbllevel.lvl_id', '=', 'tblsections.lvl_id')
           ->where('tblsections.lvl_id', '=', $id)
           ->get(['tblsections.*']);
          }
}

