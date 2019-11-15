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
                                        <button type="button" tooltip="添加分类" class="btn btn-sm btn-azure btn-addon" onClick="javascript:window.location.href = '{{url('admin/goods/create')}}'"> <i class="fa fa-plus"></i> Add
                                        </button>
                                        <form action="" method="post">
                                            <table class="table table-bordered table-hover">
                                                <thead class="">
                                                    <tr>
                                                        <th class="text-center" width="4%">ID</th>
                                                        <th>名称</th>
                                                        <th width="10%">编号</th>
                                                        <th width="6%">缩略图</th>
                                                        <th width="6%">市场价</th>
                                                        <th width="6%">本店价</th>
                                                        <th width="4%">上架</th>
                                                        <th width="6%">栏目</th>
                                                        <th width="6%">品牌</th>
                                                        <th width="6%">类型</th>
                                                        <th width="4%">重量</th>
                                                        <th width="4%">单位</th>
                                                        <th width="4%">库存量</th>
                                                        <th class="text-center" width="16%">操作</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach($goodsRes as $goods)
                                                        <tr>
                                                            <td align="center">{{$goods->id}}</td>
                                                            <td>{{$goods->goods_name}}</td>
                                                            <td>{{$goods->goods_code}}</td>
                                                            <td><img src="/{{$goods->sm_thumb}}"></td>
                                                            <td>{{$goods->market_price}}</td>
                                                            <td>{{$goods->shop_price}}</td>
                                                            <td>@if ($goods->on_sale == 1)已上架 @else 未上架 @endif</td>
                                                            <td>{{$goods->cate_name}}</td>
                                                            <td>{{$goods->brand_name}}</td>
                                                            <td>{{$goods->type_name}}</td>


                                                            <td>{{$goods->goods_weight}}</td>
                                                            <td>{{$goods->weight_unit}}</td>

                                                            <td align="center">
                                                                <a href="{{url('/admin/goods/product',array('id'=>$goods->id))}}" class="btn btn-darkorange btn-sm shiny">
                                                                    <i class="fa fa-list"></i> 库存
                                                                </a>
                                                                <a href="/admin/goods/{{$goods->id}}/edit" class="btn btn-primary btn-sm shiny">
                                                                    <i class="fa fa-edit"></i> 编辑
                                                                </a>
                                                                <a href="#" onClick="warning('确实要删除吗', '{:url('del',array('id'=>$goods->id))}')" class="btn btn-danger btn-sm shiny">
                                                                    <i class="fa fa-trash-o"></i> 删除
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>

                                            </table>
                                            {{ $goodsRes->links() }}
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
