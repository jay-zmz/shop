<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Brand;
use Validator;
class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected  $brandObj = '';
    public function __construct(Brand $brandObj)
	{
		$this->brandObj = $brandObj;
	}

	public function index()
    {
        //

		$data['brandRes'] = $this->brandObj::all();
		return view('admin.brand.lst',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

		return view('admin.brand.add');
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
			'brand_name'=>'required',
		]);
		if($validator->fails()){
			return redirect('admin/brand/add')
				->withErrors($validator)
				->withInput();
		}

		$this->brandObj->brand_name = $request->input('brand_name');
		$this->brandObj->brand_url = $request->input('brand_url');
		$this->brandObj->description = $request->input('description');
		$this->brandObj->status = $request->input('status');
		$this->brandObj->brand_name = $request->input('brand_name');
		if($request->file('brand_img')){
			$file = $request->file('brand_img');
			$clientName =$file->getClientOriginalName();
			$mimeType = $file->getClientMimeType(); //jepg/img
            $entension = $file->getClientOriginalExtension(); //jpg
            $newName = md5(date('Y-m-d H:i:s').$clientName).'.'.$entension;
            $url_path = 'upload';
            $uploadRes = $file->move($url_path,$newName);
            if($uploadRes){
                $namePath = $url_path.'/'.$newName;
                $this->brandObj->brand_img = $namePath;
            }
            
            
		}
        $res = $this->brandObj->save();
       
        if($res){
            return redirect('admin/brand')->with(['message'=>'更新成功，即将跳转到后台首页', 'jumpTime'=>3,'status'=>'success']);
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
        
        $data['brand'] = $this->brandObj::find($id);
        return view('admin.brand.edit',$data);
 
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
        $brand = $this->brandObj::find($id);

        $brand->brand_name = $request->input('brand_name');
        $brand->brand_url = $request->input('brand_url');
        $brand->description = $request->input('description');
        $brand->status = $request->input('status');
        $brand->brand_name = $request->input('brand_name');
        if($request->file('brand_img')){
            $file = $request->file('brand_img');
            $clientName =$file->getClientOriginalName();
            $mimeType = $file->getClientMimeType(); //jepg/img
            $entension = $file->getClientOriginalExtension(); //jpg
            $newName = md5(date('Y-m-d H:i:s').$clientName).'.'.$entension;
            $url_path = 'upload';
            $uploadRes = $file->move($url_path,$newName);
            if($uploadRes){
                $namePath = $url_path.'/'.$newName;
                $brand->brand_img = $namePath;
            }
        }
        $res = $brand->save();
       
        if($res){
            return redirect('admin/brand')->with(['message'=>'更新成功，即将跳转到后台首页', 'jumpTime'=>3,'status'=>'success']);
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
        $res = $this->brandObj::destroy($id);
        
        if($res){
            return redirect('admin/brand')->with(['message'=>'shanchu成功，即将跳转到后台首页', 'jumpTime'=>3,'status'=>'success']);
        }

    }
}
