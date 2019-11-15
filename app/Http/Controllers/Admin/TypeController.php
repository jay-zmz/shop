<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Type;
use Validator;
class TypeController extends Controller
{
    protected  $typeObj = '';
    public function __construct(type $typeObj)
    {
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
        $data['typeRes'] = $this->typeObj::all();
        return view('admin.type.lst',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.type.add');
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
            'type_name'=>'required',
        ]);
        if($validator->fails()){
            return redirect('admin/type/add')
                ->withErrors($validator)
                ->withInput();
        }

        $this->typeObj->type_name = $request->input('type_name');
        $res = $this->typeObj->save();
       
        if($res){
            return redirect('admin/type')->with(['message'=>'更新成功，即将跳转到后台首页', 'jumpTime'=>3,'status'=>'success']);
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
        $data['type'] = $this->typeObj::find($id);
        return view('admin.type.edit',$data);
 
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
            'type_name'=>'required',
        ]);
        if($validator->fails()){
            return redirect('admin/type/add')
                ->withErrors($validator)
                ->withInput();
        }
        $type = $this->typeObj::find($id);
        $type->type_name = $request->input('type_name');
        $res = $type->save();
       
        if($res){
            return redirect('admin/type')->with(['message'=>'更新成功，即将跳转到后台首页', 'jumpTime'=>3,'status'=>'success']);
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
        $res = $this->typeObj::destroy($id);
        
        if($res){
            return redirect('admin/type')->with(['message'=>'shanchu成功，即将跳转到后台首页', 'jumpTime'=>3,'status'=>'success']);
        }
    }
}
