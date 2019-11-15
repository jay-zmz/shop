<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Utils\Catetree;
use Illuminate\Support\Facades\DB;
use Validator;
class CategoryController extends Controller
{
    //
	protected $cateObj = '';
	protected $cateTree = '';
	public function __construct(Category $cateObj, Catetree $cateTree)
	{
		$this->cateObj = $cateObj;
		$this->cateTree = $cateTree;
	}

	public function index()
	{
		$list = Category::all();

	
		$cateArr = $this->cateTree->tree($list);

		return view('admin.category.lst',['cateArr'=>$cateArr]);
	}

	public function add(Request $request)
	{
		$categoryObj = new Category();
		$list = Category::all();
		if( $request->isMethod('post')){
			$validator = Validator::make($request->all(),[
				'pid' => 'required',
				'cate_name' => 'required'
			]);
			if ($validator->fails()) {
            return redirect('admin/cate/add')
                        ->withErrors($validator)
                        ->withInput();
        	}
        	$insertData = [
        		'cate_name'=>$request->input('cate_name'),
        		'pid'=>$request->input('pid'),
        		'description'=>$request->input('description'),

        	];

			$this->cateObj->cate_name = $request->input('cate_name');
			$this->cateObj->pid = $request->input('pid');
			$this->cateObj->description = $request->input('description');
        	$res = $this->cateObj->save();
        	if($res){
        		redirect('admin/cate');
        	}
		}

		$data['cateArr'] = $this->cateTree->tree($list);

		return view('admin.category.add',$data);
	}

	public function edit(Request $request,$id)
	{

		if($request->isMethod('post')){
			if(intval($id)){
				$cate = Category::find($id);
				$cate->cate_name = $request->input('cate_name');
				$cate->pid = $request->input('pid');

				$cate->description = $request->input('description');
				$res = $cate->save();
				if($res){
					return redirect('admin/cate')->with(['message'=>'更新成功，即将跳转到后台首页', 'jumpTime'=>3,'status'=>'success']);

				}
			}
		}
		$list = Category::all();
		$data['cateArr'] = $this->cateTree->tree($list);
		$data['cateList'] = $this->cateObj->where('id',$id)->first();
		return view('admin.category.edit',$data);

	}
	public function del($id)
	{
		$cate = $this->cateObj::find($id);
		$res = $cate->delete($id);
		if($res){
			return redirect('admin/cate')->with(['message'=>'删除成功，即将跳转到后台首页', 'jumpTime'=>3,'status'=>'success']);
		}
	}
}
