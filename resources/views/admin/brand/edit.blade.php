@extends('admin.main')
<body>

@section('content')

            <!-- Page Sidebar -->

            <!-- Page Content -->

                <!-- Page Breadcrumb -->
                <div class="page-breadcrumbs">
                    <ul class="breadcrumb">
                        <li class="active">控制面板</li>
                    </ul>
                </div>
                <!-- /Page Breadcrumb -->

                <!-- Page Body -->
                <div class="page-body">

                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-xs-12">
                            <div class="widget">
                                <div class="widget-body">
                                   <div class="flip-scroll">
                                       <div id="horizontal-form">
                                            <form class="form-horizontal" role="form" action="/admin/brand/{{$brand['id']}}" method="post" enctype="multipart/form-data">
                                               {{csrf_field()}}
                                             <input type="hidden" name="_method" value="PUT">
                                               <div class="form-group">
                                                   <label for="username" class="col-sm-2 control-label no-padding-right">名称</label>
                                                   <div class="col-sm-6">
                                                       <input class="form-control" placeholder="" name="brand_name"  type="text" value="{{$brand['brand_name']}}">
                                                   </div>
                                                   <p class="help-block col-sm-4 red">* 必填</p>
                                               </div>
                                                <div class="form-group">
                                                    <label for="username" class="col-sm-2 control-label no-padding-right">品牌网址</label>
                                                    <div class="col-sm-6">
                                                        <input class="form-control" placeholder="" name="brand_url"  type="text" value="{{$brand['brand_url']}}">
                                                    </div>
                                                    <p class="help-block col-sm-4 red">* 必填</p>
                                                </div>
                                                <div class="form-group">
                                                    <label for="username" class="col-sm-2 control-label no-padding-right">品牌图片</label>
                                                    <div class="col-sm-6">
                                                        <input type="file" class="form-control" placeholder="" name="brand_img"  type="text">
                                                    </div>
                                                    <p class="help-block col-sm-4 red">* 必填</p>
                                                </div>

                                               <div class="form-group">
                                                   <label for="username" class="col-sm-2 control-label no-padding-right">描述</label>
                                                   <div class="col-sm-6">
                                                       <textarea class="form-control" name="description">{{$brand['description']}} </textarea>
                                                   </div>
                                               </div>
                                                <div class="form-group">
                                                    <label for="username" class="col-sm-2 control-label no-padding-right">品牌状态</label>
                                                    <div class="col-sm-6">
                                                        <div class="radio" style="float:left; padding-right:10px;">
                                                            <label>
                                                                <input name="status" value="1"  class="colored-blue"  type="radio" >
                                                                <span class="text">显示</span>
                                                            </label>
                                                        </div>
                                                        <div class="radio" style="float:left;">
                                                            <label>
                                                                <input name="status" value="0" class="colored-blue" type="radio" >
                                                                <span class="text">隐藏</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                               <div class="form-group">
                                                   <div class="col-sm-offset-2 col-sm-10">
                                                       <button type="submit" class="btn btn-default">保存信息</button>
                                                   </div>
                                               </div>
                                               @if (count($errors) > 0)
                                                                   <div class="alert alert-danger">
                                                                       <ul>
                                                                           @foreach ($errors->all() as $error)
                                                                               <li>{{ $error }}</li>
                                                                           @endforeach
                                                                       </ul>
                                                                   </div>
                                               @endif
                                           
                                           </form>
                                       </div>
                                   </div>
                                    <div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- /Page Body -->

            <!-- /Page Content -->

@endsection
<!--Basic Scripts-->




</body></html>