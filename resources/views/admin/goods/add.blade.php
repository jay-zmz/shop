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
                                <form class="form-horizontal" role="form" action="{{url('admin/goods')}}" method="post" enctype="multipart/form-data">
                                    <!-- 商品信息开始 -->
                                    {{csrf_field()}}
                                    <div class="widget-body">
                                        <div class="widget-main ">
                                            <div class="tabbable">
                                                <ul class="nav nav-tabs tabs-flat" id="myTab11">
                                                    <li class="active">
                                                        <a data-toggle="tab" href="#baseinfo">
                                                            基本信息
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a data-toggle="tab" href="#goodsdes">
                                                            描述信息
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a data-toggle="tab" href="#mbprice">
                                                            会员价格
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a data-toggle="tab" href="#goodsattr">
                                                            商品属性
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a data-toggle="tab" href="#goodsphoto">
                                                            商品相册
                                                        </a>
                                                    </li>
                                                </ul>
                                                <div class="tab-content tabs-flat">
                                                    <div id="baseinfo" class="tab-pane active">
                                                        <div class="form-group">
                                                            <label for="username" class="col-sm-2 control-label no-padding-right">商品名称</label>
                                                            <div class="col-sm-6">
                                                                <input class="form-control" placeholder="" name="goods_name" required="" type="text">
                                                            </div>
                                                            <p class="help-block col-sm-4 red">* 必填</p>
                                                        </div>
                                                        {{--<div class="form-group">--}}
                                                            {{--<label for="username" class="col-sm-2 control-label no-padding-right">推荐位</label>--}}
                                                            {{--<div class="col-sm-6">--}}
                                                                {{--<div class="checkbox">--}}
                                                                    {{--{volist name="goodsRecposRes" id="recpos"}--}}
                                                                    {{--<label style="margin-right:15px;">--}}
                                                                        {{--<input type="checkbox" name="recpos[]" value="{$recpos.id}" class="colored-blue">--}}
                                                                        {{--<span class="text">{$recpos.rec_name}</span>--}}
                                                                    {{--</label>--}}
                                                                    {{--{/volist}--}}
                                                                {{--</div>--}}
                                                            {{--</div>--}}
                                                        {{--</div>--}}
                                                        <div class="form-group">
                                                            <label for="username" class="col-sm-2 control-label no-padding-right">商品主图</label>
                                                            <div class="col-sm-6">
                                                                <input class="form-control" style="border:none; box-shadow:none;" name="og_thumb" type="file">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="username" class="col-sm-2 control-label no-padding-right">上架</label>
                                                            <div class="col-sm-6">
                                                                <div class="radio">
                                                                    <label>
                                                                        <input checked="checked" name="on_sale" type="radio" class="colored-blue" value="1">
                                                                        <span class="text"> 是</span>
                                                                    </label>
                                                                    <label>
                                                                        <input name="on_sale" type="radio" class="colored-blue" value="0">
                                                                        <span class="text"> 否</span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="username" class="col-sm-2 control-label no-padding-right">所属栏目</label>
                                                            <div class="col-sm-6">
                                                                <select name="cate_id">
                                                                    <option value="">请选择</option>
                                                                    @foreach($cateRes as $cate)
                                                                    <option value="{{$cate['id']}}">@php echo str_repeat('-', $cate['level']*8) @endphp {{$cate['cate_name']}}</option>
                                                                        @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="username" class="col-sm-2 control-label no-padding-right">所属品牌</label>
                                                            <div class="col-sm-6">
                                                                <select name="brand_id">
                                                                    <option value="">请选择</option>
                                                                    @foreach($brandRes as $brand)
                                                                    <option value="{{$brand['id']}}">{{$brand['brand_name']}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="username" class="col-sm-2 control-label no-padding-right">市场价</label>
                                                            <div class="col-sm-6">
                                                                <input class="form-control" placeholder="" name="market_price" required="" type="text">
                                                            </div>
                                                            <p class="help-block col-sm-4 red">* 必填</p>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="username" class="col-sm-2 control-label no-padding-right">本店价</label>
                                                            <div class="col-sm-6">
                                                                <input class="form-control" placeholder="" name="shop_price" required="" type="text">
                                                            </div>
                                                            <p class="help-block col-sm-4 red">* 必填</p>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="username" class="col-sm-2 control-label no-padding-right">重量</label>
                                                            <div class="col-sm-6">
                                                                <input class="form-control" style="width:300px; display:inline-block;" placeholder="" name="goods_weight" required="" type="text">
                                                                <select name="weight_unit">
                                                                    <option value="kg">kg</option>
                                                                    <option value="g">g</option>
                                                                </select>
                                                            </div>
                                                            <p class="help-block col-sm-4 red">* 必填</p>
                                                        </div>
                                                    </div>
                                                    <div id="goodsdes" class="tab-pane">
                                                        <textarea name="description" id="goods_des"></textarea>
                                                    </div>
                                                    <div id="mbprice" class="tab-pane">
                                                        {volist name="mlRes" id="ml"}
                                                        <div class="form-group">
                                                            <label for="username" class="col-sm-2 control-label no-padding-right"></label>
                                                            <div class="col-sm-6">
                                                                <input class="form-control" placeholder="" name="" type="text">
                                                            </div>
                                                        </div>
                                                        {/volist}
                                                    </div>
                                                    <div id="goodsattr" class="tab-pane">
                                                        <div class="form-group">
                                                            <label for="username" class="col-sm-2 control-label no-padding-right">商品类型</label>
                                                            <div class="col-sm-6">
                                                                <select name="type_id" >
                                                                    <option value="0">请选择</option>

                                                                    @foreach($typeRes as $type)
                                                                        <option value="{{$type['id']}}">{{$type['type_name']}}</option>
                                                                       @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div id="attr_list">
                                                            <!-- 属性显示  -->
                                                        </div>
                                                    </div>
                                                    <div id="goodsphoto" class="tab-pane">
                                                        <div class="form-group">
                                                            <label for="username" class="col-sm-2 control-label no-padding-right"></label>
                                                            <div class="col-sm-6">
                                                                <a href="#" onclick="addrow(this);">[+]</a><input class="form-control" style="border:none; box-shadow:none; width:50%; display:inline-block;" name="goods_photo[]" type="file">
                                                            </div>
                                                        </div>
                                                        <div id="goods_photo"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" class="btn btn-default">保存信息</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- 商品信息结束 -->
                                </form>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- /Page Body -->

            <!-- /Page Content -->

@endsection
<!--Basic Scripts-->

@section('jscript')
    <script>
        $('select[name=type_id]').change(function(){
            var type_id = $(this).val();
            $.ajax({
                type:"POST",
                url:"{{url('/admin/attr/getAttrs')}}",
                data:{type_id:type_id, _token:'{{csrf_token()}}'},
                dataType:'json',
                success:function(data){
                    if(data.error == 0){
                        var html = ''

                        $(data.data).each(function(k,v){
                            if(v.attr_type == 1){
                                // 单选处理
                                html+="<div class='form-group'>";
                                html+="<label class='col-sm-2 control-label no-padding-right'>"+v.attr_name+"</label>";
                                var attrValuesArr=v.attr_value.split(",");
                                html+="<div class='col-sm-6'><a class='abtn' onclick='addrow(this);' href='#'>[+]</a>";
                                html+="<select name='goods_attr["+v.id+"][]'>";
                                html+="<option value=''>请选择</option>";
                                for(var i=0; i<attrValuesArr.length; i++){
                                    html+="<option value='"+attrValuesArr[i]+"'>"+attrValuesArr[i]+"</option>";
                                }
                                html+="</select>";
                                html+="<input class='form-control price' placeholder='价格' name='attr_price[]' type='text'>";
                                html+="</div></div>";

                            }else{
                                // 唯一处理
                                if(v.attr_value){
                                    html+="<div class='form-group'>";
                                    html+="<label class='col-sm-2 control-label no-padding-right'>"+v.attr_name+"</label>";
                                    var attrValuesArr=v.attr_value.split(",");
                                    html+="<div class='col-sm-6'>";
                                    html+="<input class='form-control price' name=goods_attr["+v.id+"] type='text'>";
                                    html+="</div></div>";
                                }else{
                                    
                                }
                            }
                        });
                        $("#attr_list").html(html);
                    }
                },
                error:function(err){
                    console.log(1)

                }
            })
        })
        function addrow(o){
            var div=$(o).parent().parent();
            if($(o).html() == '[+]'){
                var newdiv=div.clone();
                newdiv.find('a').html('[-]');
                div.after(newdiv);
            }else{
                div.remove();
            }
        }
    </script>
@endsection



</body></html>