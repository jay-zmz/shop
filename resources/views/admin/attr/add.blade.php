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
                                             <form class="form-horizontal" role="form" action="{{url('admin/attr')}}" method="post">
                                                {{csrf_field()}}
                                                 <div class="form-group">
                                                     <label for="username" class="col-sm-2 control-label no-padding-right">所属类型</label>
                                                     <div class="col-sm-6">
                                                         <select name="type_id">
                                                             <option value="">请选择</option>
                                                             @foreach($type as $v)
                                                             <option value="{{$v['id']}}">{{$v['type_name']}}</option>
                                                             @endforeach
                                                         </select>
                                                     </div>
                                                     <p class="help-block col-sm-4 red">* 必填</p>
                                                 </div>
                                                 <div class="form-group">
                                                     <label for="username" class="col-sm-2 control-label no-padding-right">商品属性名称</label>
                                                     <div class="col-sm-6">
                                                         <input class="form-control" placeholder="" name="attr_name" required="" type="text">
                                                     </div>
                                                     <p class="help-block col-sm-4 red">* 必填</p>
                                                 </div>
                                                 <div class="form-group">
                                                     <label for="username" class="col-sm-2 control-label no-padding-right">商品属性类型</label>
                                                     <div class="col-sm-6">
                                                         <div class="radio" style="float:left; padding-right:10px;">
                                                             <label>
                                                                 <input name="attr_type" value="1" checked="checked" class="colored-blue" type="radio">
                                                                 <span class="text">单选</span>
                                                             </label>
                                                         </div>
                                                         <div class="radio" style="float:left;">
                                                             <label>
                                                                 <input name="attr_type" value="2" class="colored-blue" type="radio">
                                                                 <span class="text">唯一</span>
                                                             </label>
                                                         </div>
                                                     </div>
                                                     <p class="help-block col-sm-4 red">* 必填</p>
                                                 </div>
                                                 <div class="form-group">
                                                     <label for="username" class="col-sm-2 control-label no-padding-right">商品属性值列表</label>
                                                     <div class="col-sm-6">
                                                         <textarea class="form-control" name="attr_value"></textarea>
                                                     </div>
                                                     <p class="help-block col-sm-4 red">* 必填</p>
                                                 </div>
                                                 <div class="form-group">
                                                     <div class="col-sm-offset-2 col-sm-10">
                                                         <button type="submit" class="btn btn-default">保存信息</button>
                                                     </div>
                                                 </div>
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