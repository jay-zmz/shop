<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Goods;
use App\Type;
use App\Brand;
use App\Attr;
use App\Product;
use App\GoodsAttrRelaction;
use Illuminate\Support\Facades\Cache;
use Validator;
use DB;
use App\Utils\Catetree;
use Image;
use App\Jobs\SyncOneProductToEs;
use App\Jobs\UpdateProductToEs;
class GoodsController extends Controller
{
    protected  $goodsObj = '';
    protected  $typeObj = '';
    protected  $brandObj = '';
    protected  $attrObj = '';
    protected  $cateObj = '';
    protected  $productObj = '';
    protected $cateTree = '';

    protected  $goodsAttrRelactionObj = '';
    public function __construct(Goods $goodsObj,Type $typeObj,Brand $brandObj,Attr $attrObj,Category $cateObj , GoodsAttrRelaction $goodsAttrRelactionObj,Product $productObj,Catetree $cateTree)
    {
        $this->goodsObj = $goodsObj;
        $this->typeObj = $typeObj;
        $this->brandObj = $brandObj;
        $this->attrObj = $attrObj;
        $this->cateObj = $cateObj;
        $this->productObj = $productObj;
        $this->goodsAttrRelactionObj = $goodsAttrRelactionObj;
        $this->cateTree = $cateTree;
    }


    public function product(Request $request,$id)
    {
        if($request->isMethod('POST')){

            $_data = $this->productObj::where('goods_id',$id)->delete();

            $goodsNum = $request->goods_num;
            $goodsAttr = $request->goods_attr;
            $skuPrice=$request->sku_price;
            $skuNo=$request->sku_no;
            $goodsAttr = $request->goods_attr;

            foreach ($goodsNum as $key => $value) {
                $attrArr = [];
                foreach ($goodsAttr as $k => $v) {
                    $attrArr[] = $v[$key];
                }
                $attrStr = implode(',', $attrArr);

                $this->productObj->sku_no = $skuNo[$key];
                $this->productObj->goods_number = $value;
                $this->productObj->sku_price = $skuPrice[$key];
                $this->productObj->goods_attr = $attrStr;
                $this->productObj->goods_id = $id;

                $res = DB::table('products')->insert([
                    'sku_no'=>$skuNo[$key],
                    'goods_number'=>$value,
                    'sku_price'=>$skuPrice[$key],
                    'goods_attr'=>$attrStr,
                    'goods_id'=>$id,
                ]);
                $this->goodsObj->id = $id;

                $this->dispatch(new UpdateProductToEs($this->goodsObj));
                return redirect('admin/goods')->with(['message'=>'更新成功，即将跳转到后台首页', 'jumpTime'=>3,'status'=>'success']);



            }



        }
        $goods_id = intval($id);
        $attrRes = DB::table('goods_attrs')
                    ->leftjoin('attrs','attrs.id' , '=','goods_attrs.attr_id')
                    ->where(['goods_attrs.goods_id'=>$goods_id,'attrs.attr_type'=>1])
                    ->select('goods_attrs.*','attrs.attr_name')
                    ->get();
        $attrRes = $attrRes->map(function ($value) {return (array)$value;})->toArray();
        $redioArr = [];
        foreach ($attrRes as $k => $v) {
            $redioArr[$v['attr_name']][] =$v;
        }
        $data['goodsProRes'] = $this->productObj->all();

        $data['radioAttrRes'] =   $redioArr;
        return view('admin.goods.product',$data)   ;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$goods = Goods::find(5199998);

//        Goods::query()
//            ->with(['product','category','brand','type','attr'])
//            ->chunkById(100,function ($goods) {
//                foreach ($goods as $good){
//                    $good = $good->toEsArray();
//                    dd($good);
//
//                }
//
//            });

        if(Cache::get('goods')){
            $data = Cache::get('goods');
        }else{
            $goods = $this->goodsObj::getAllDate();
           // dd($goods);
            //$goods = $goods->map(function ($value) {return (array)$value;})->toArray();
            $data['brandRes'] = $this->brandObj->all();
            $data['typeRes'] = $this->typeObj->all();
            $data['attrRes'] = $this->attrObj->all();
            $data['goodsRes'] = $goods;
            Cache::put('goods',$data,5);
        }
        return view('admin.goods.lst',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
		$data['brandRes'] = $this->brandObj->all();
		$data['typeRes'] = $this->typeObj->all();
		$data['attrRes'] = $this->attrObj->all();
		$data['cateRes'] = $this->cateObj->all();
        return view('admin.goods.add',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->goodsObj->goods_name =$request->input('goods_name');
        $this->goodsObj->on_sale =$request->input('on_sale');
        $this->goodsObj->cate_id =$request->input('cate_id');
        $this->goodsObj->brand_id =$request->input('brand_id');
        $this->goodsObj->market_price =$request->input('market_price');
        $this->goodsObj->shop_price =$request->input('shop_price');
        $this->goodsObj->goods_weight =$request->input('goods_weight');
        $this->goodsObj->weight_unit =$request->input('weight_unit');
        $this->goodsObj->description =$request->input('description');
        $this->goodsObj->type_id =$request->input('type_id');
        $this->goodsObj->goods_code=time().rand(111111,999999);//商品编号

		if($request->file('og_thumb')){
			$file = $request->file('og_thumb');

			$clientName =$file->getClientOriginalName();
			$mimeType = $file->getClientMimeType(); //jepg/img
			$entension = $file->getClientOriginalExtension(); //jpg
			$newName = md5(date('Y-m-d H:i:s').$clientName).'.'.$entension;
			$url_path = 'upload';

			$bigThumbPath = $url_path . '/big_'.$newName;
			$midThumbPath = $url_path . '/mid_'.$newName;
            $smThumbPath = $url_path . '/sm_'.$newName;
            $uploadRes = $file->move($url_path,'og_'.$newName);
			// $bigImg = Image::make($file)->resize(300, 300)->save($bigThumbPath);

			// $midImg = Image::make($file)->resize(200, 200)->save($midThumbPath);
			// $smImg = Image::make($file)->resize(80, 80)->save($smThumbPath);

			// if($bigImg && $midImg && $smImg){
			// 	$this->goodsObj->big_thumb = $bigThumbPath;
			// 	$this->goodsObj->mid_thumb = $midThumbPath;
   //              $this->goodsObj->sm_thumb = $smThumbPath;
			// 	$this->goodsObj->og_thumb = $url_path.'/og_'.$newName;
			// }
            $this->goodsObj->og_thumb = $url_path.'/og_'.$newName;
		}

        $res = $this->goodsObj->save();

		$goodsId = $this->goodsObj->id;
        if($goodsId){
            $goods_attr = $request->input('goods_attr');
			$attr_price = $request->input('attr_price');
            $i= 0;
            foreach ($goods_attr as $k => $v) {
                print_r($goods_attr);
                if(is_array($v)){
                    if(!empty($v)){
                        foreach ($v as $k1 => $v1) {
							if(!$v1){
								$i++;
								continue;
							}
							DB::insert('insert into goods_attrs (goods_id, attr_id,attr_price,attr_value) values (?, ?,?,?)', [$goodsId, $k,$attr_price[$i],$v1]);
							$i++;
                        }
                    }
                }else{
                    DB::insert('insert into goods_attrs (goods_id, attr_id,attr_value) values (?, ?,?)', [$goodsId, $k,$v]);
                }
            }
            //将数据同步到es中
            $this->dispatch(new SyncOneProductToEs($this->goodsObj));
            return redirect('admin/goods')->with(['message'=>'更新成功，即将跳转到后台首页', 'jumpTime'=>3,'status'=>'success']);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $map = ['goodss.type_id'=>$id];
        $goods = $this->goodsObj::getAllDate($map);
        $goods = $goods->map(function ($value) {return (array)$value;})->toArray();

        $data['goodsRes'] = $goods;
        return view('admin.goods.lst',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $goods= $this->goodsObj->find($id);
        $data['goods']  = $goods;

        $data['brandRes'] = $this->brandObj->all();
        $data['typeRes'] = $this->typeObj->all();

         // 查询当前商品类型所有属性信息
        $type =Type::find($goods['type_id']);

        $data['attrRes'] = $type->attr;
        //$data['attrRes'] = $data['attrRes']->map(function ($value) {return (array)$value;})->toArray();
        //$data['attrRes'] = $this->goodsAttrRelactionObj::all();
        $list = Category::all();
        $data['cateRes'] = $this->cateTree->tree($list);

         // 查询当前商品拥有的商品属性goods_attr
        $_gattrRes = DB::table('goods_attrs')
                    ->where(['goods_id'=>$id])
                    ->get();
        $_gattrRes = $_gattrRes->map(function ($value) {return (array)$value;})->toArray();
        $gattrRes = [];

        foreach ($_gattrRes as $key => $value) {
            $gattrRes[$value['attr_id']][] = $value;
        }
        $data['gattrRes'] = $gattrRes;
        return view('admin.goods.edit',$data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
      //  dd($request->all());
        $goods = $this->goodsObj::find($id);

        $goods->goods_name =$request->input('goods_name');
        $goods->on_sale =$request->input('on_sale');
        $goods->cate_id =$request->input('cate_id');
        $goods->brand_id =$request->input('brand_id');
        $goods->market_price =$request->input('market_price');
        $goods->shop_price =$request->input('shop_price');
        $goods->goods_weight =$request->input('goods_weight');
        $goods->weight_unit =$request->input('weight_unit');
        $goods->description =$request->input('description');
        $goods->type_id =$request->input('type_id');
        $goods->goods_code=time().rand(111111,999999);//商品编号

        $res = $goods->save();
        if($res){
            $attrArr = $request->input('old_goods_attr');
            $priceArr = $request->input('old_attr_price');
            $priceValArr = array_values($priceArr);
            $attrIds = array_keys($priceArr);
            $i= 0;
            foreach ($attrArr as $k => $v) {

                if(is_array($v)){
                    if(!empty($v)){
                        foreach ($v as $k1 => $v1) {
                            if(!$v1){
                                $i++;
                                continue;
                            }
                            //dd($attrIds[$i]);

                            $res = DB::table('goods_attrs')
                            ->where('id',$attrIds[$i])
                            ->update([
                                'attr_value'=> $v1,
                                'attr_price'=> $priceValArr[$i],
                            ]);
                            $i++;
                        }
                    }
                }else{
                    DB::insert('insert into goods_attrs (goods_id, attr_id,attr_value) values (?, ?,?)', [$goodsId, $k,$v]);
                }
            }




        }


            return redirect('admin/goods')->with(['message'=>'更新成功，即将跳转到后台首页', 'jumpTime'=>3,'status'=>'success']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $res = $this->goodsObj::destroy($id);

        if($res){
            return redirect('admin/goods')->with(['message'=>'shanchu成功，即将跳转到后台首页', 'jumpTime'=>3,'status'=>'success']);
        }
    }
}
