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
                                             <form class="form-horizontal" role="form" action="" method="post" enctype="multipart/form-data">
                                                {{csrf_field()}}
                                                <div class="form-group">
                                                    <label for="username" class="col-sm-2 control-label no-padding-right">上级分类</label>
                                                    <div class="col-sm-6">
                                                        <select name="pid">
                                                            <option value="0">顶级分类</option>
                                                            @foreach($cateArr as $cate)
                                                            <option value="{{$cate['id']}}"> @php echo str_repeat('--',$cate['level']*5)@endphp {{$cate['cate_name']}} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <p class="help-block col-sm-4 red">* 必填</p>
                                                </div>
                                                <div class="form-group">
                                                    <label for="username" class="col-sm-2 control-label no-padding-right">分类名称</label>
                                                    <div class="col-sm-6">
                                                        <input class="form-control" placeholder="" name="cate_name"  type="text">
                                                    </div>
                                                    <p class="help-block col-sm-4 red">* 必填</p>
                                                </div>
                                                <div class="form-group">
                                                    <label for="username" class="col-sm-2 control-label no-padding-right">描述</label>
                                                    <div class="col-sm-6">
                                                        <textarea class="form-control" name="description"></textarea>
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