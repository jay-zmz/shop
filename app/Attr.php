<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;
use App\Type;

class Attr extends Model
{
    //
    public static function getAllDate($map=[])
    {
    	$data = DB::table('attrs')
    			->leftjoin('types','types.id','=','attrs.type_id')
    			->where($map)
    			->select('attrs.*', 'types.type_name')
    			->get();

    	return ($data) ? $data : false;
    }


    public function type(){

    	return $this->belongsTo('App\Type','type_id','id');
    }

    public function goods()
    {
        return $this->belongsToMany(Goods::class,'goods_attrs');
    }

}
