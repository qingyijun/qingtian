<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Chategory extends Model
{
    //
    protected $table="jy_category";
    public $timestamps=false;
    public static function getCategoryList()
    {
    	$list=self::get()->toArray();
    	// dd($list);die;
    	return $list;
    }
    public static function getCategoryByfid($fid=0)
    {
    	$list=self::where('f_id',$fid)->get()->toArray();
    	// dd($list);
    	return $list;
    }
     public static function getCateInfo($id)
    {
    	return self::where('id',$id)->first();
    }
    public static function doAdd($data){
    	return self::insert($data);
    }
    public static function del($id){
 		return self::where('id',$id)->delete();
    }
    public static function doUpdate($data,$id){
 		return self::where('id',$id)->update($data);
    }
}
