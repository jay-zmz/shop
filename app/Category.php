<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = ['cate_name', 'description', 'pid'];
    public function goods()
    {
        return $this->hasMany(Goods::class);
    }

}
