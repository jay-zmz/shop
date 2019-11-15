<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //

    public function goods()
    {
        return $this->belongsTo(Goods::class);
    }
}
