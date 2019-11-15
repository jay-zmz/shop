<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Goods extends Model
{
    //
    protected $table = 'goods';
    public static function getAllDate()
    {


    	$data = DB::table('goods')
    			->leftjoin('brands','brands.id','=','goods.brand_id')
    			->leftjoin('categories','categories.id','=','goods.cate_id')
    			->leftjoin('types','types.id','=','goods.type_id')
    			->select('goods.*', 'types.type_name','brands.brand_name','categories.cate_name')
    			->simplePaginate (15);
    	return ($data) ? $data : false;
    }

    public function category()
    {
        return $this->belongsTo(Category::class,'cate_id');
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function type()
    {
        return $this->belongsTo(Type::class);
    }
    public function product()
    {
        return $this->hasMany(Product::class);
    }
    public function attr()
    {
        return $this->belongsToMany(Attr::class,'goods_attrs');
    }
    public function toEsArray()
    {
        $arr = array_only($this->toArray(),[
            'goods_name',
            'description',
            'goods_code',
            'market_price',
            'on_sale',
            'shop_price',
            'id',
        ]);
        $arr['category'] = $this->category ? explode(' - ', $this->category->cate_name) : '' ;
        $arr['skus'] = $this->product->map(function (Product $sku) {
            return array_only($sku->toArray(), [ 'goods_number', 'sku_price']);
        });
        $arr['properties'] = $this->attr->map(function(Attr $attr){
           return array_only($attr->toArray(),['attr_name','attr_value']);
        });
        return $arr;
    }

}
