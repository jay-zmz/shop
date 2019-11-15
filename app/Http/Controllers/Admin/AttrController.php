<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Attr;
use App\Type;
use Validator;
use DB;
class AttrController extends Controller
{
    protected  $attrObj = '';
    protected  $typeObj = '';
    public function __construct(attr $attrObj ,Type $typeObj)
    {
        $this->attrObj = $attrObj;
        $this->typeObj = $typeObj;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $attr = $this->attrObj::getAllDate(); 
        $attr = $attr->map(function ($value) {return (array)$value;})->toArray();

        $data['attrRes'] = $attr;
        return view('admin.attr.lst',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['type'] = Type::all();
        return view('admin.attr.add',$data);
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
        $validator = Validator::make($request->all(),[
            'attr_name'=>'required',
        ]);
        if($validator->fails()){
            return redirect('admin/attr/add')
                ->withErrors($validator)
                ->withInput();
        }
        $attr_value = str_replace('，', ',', $request->input('attr_value'));
        $this->attrObj->attr_name = $request->input('attr_name');
        $this->attrObj->type_id = $request->input('type_id');
        $this->attrObj->attr_type = $request->input('attr_type');
        $this->attrObj->attr_value = $attr_value;
        $res = $this->attrObj->save();
       
        if($res){
            return redirect('admin/attr')->with(['message'=>'更新成功，即将跳转到后台首页', 'jumpTime'=>3,'status'=>'success']);
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
        $map = ['attrs.type_id'=>$id];
        $attr = $this->attrObj::getAllDate($map); 
        $attr = $attr->map(function ($value) {return (array)$value;})->toArray();

        $data['attrRes'] = $attr;
        return view('admin.attr.lst',$data);
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
        $data['attr'] = $this->attrObj::find($id);
        $data['type'] = Type::all();
       
        return view('admin.attr.edit',$data);
 
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
        $validator = Validator::make($request->all(),[
            'attr_name'=>'required',
        ]);
        $attr = $this->attrObj::find($id);
        if($validator->fails()){
            return redirect('admin/attr/edit')
                ->withErrors($validator)
                ->withInput();
        }
        $attr_value = str_replace('，', ',', $request->input('attr_value'));
        $attr->attr_name = $request->input('attr_name');
        $attr->type_id = $request->input('type_id');
        $attr->attr_type = $request->input('attr_type');
        $attr->attr_value = $attr_value;
        $res = $attr->save();
        
        if($res){
            return redirect('admin/attr')->with(['message'=>'更新成功，即将跳转到后台首页', 'jumpTime'=>3,'status'=>'success']);
        }
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
        $res = $this->attrObj::destroy($id);
        
        if($res){
            return redirect('admin/attr')->with(['message'=>'shanchu成功，即将跳转到后台首页', 'jumpTime'=>3,'status'=>'success']);
        }
    }

    public function getAttrs(Request $request)
	{
		$typeId = $request->input('type_id');
		$attrList = $this->typeObj->find($typeId)->attr;
		$result = [
			'error' => 0 ,
			'msg'  =>'',
			'data' => $attrList
		];
		return response()->json($result);
	}
}
