<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    //
     public static function getAllDate()
    {

    	 $data = self::find(1)->attr->toArray();
    	dd($data);
    }
    public function attr()
    {
    	return $this->hasMany('App\Attr','type_id','id');
    }
    public function goods()
    {
        return $this->hasMany(Goods::class);
    }

}
