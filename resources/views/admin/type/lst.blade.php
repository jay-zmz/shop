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
                                        <button type="button" tooltip="添加分类" class="btn btn-sm btn-azure btn-addon" onClick="javascript:window.location.href = '{{url('admin/type/create')}}'"> <i class="fa fa-plus"></i> Add
                                        </button>
                                        <form action="" method="post">
                                            <table class="table table-bordered table-hover">
                                                <thead class="">
                                                <tr>
                                                    <th class="text-center" width="8%">ID</th>
                                                    <th class="text-center">type名称</th>
                                                    <th class="text-center" width="14%">操作</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                @foreach($typeRes as $k => $cate)
                                                    <tr>
                                                        <td align="center">{{$cate['id']}}</td>


                                                        <td align="center">{{$cate['type_name']}}

                                                        </td>
                                                        <td align="center">
                                                            <a href="/admin/attr/{{$cate['id']}}" class="btn btn-primary btn-sm shiny">
                                                                <i class="fa fa-edit"></i> 属性列表
                                                            </a>
                                                            <a href="/admin/type/{{$cate['id']}}/edit" class="btn btn-primary btn-sm shiny">
                                                                <i class="fa fa-edit"></i> 编辑
                                                            </a>
                                                            <a href="/admin/type/{{$cate['id']}}/delete"   class="btn btn-danger btn-sm shiny">
                                                                <i class="fa fa-trash-o"></i> 删除
                                                            </a>
                                                        </td>
                                                        <input type="hidden" name="_method" value="DELETE">
                                                                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                                    </tr>
                                                @endforeach
                                                <tr><td colspan="7" align="right" style="padding-right:16.5%;"><input class="btn btn-primary btn-sm shiny" type="submit" value="提交" /></td></tr>
                                                </tbody>
                                            </table>
                                        </form>
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