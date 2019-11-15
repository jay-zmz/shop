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
                                   <form action="" method="post" action="/admin/goods/product">
                                    {{csrf_field()}}
                                   <div class="flip-scroll">
                                       <table class="table table-bordered table-hover">
                                           <thead class="">
                                               <tr>
                                                   
                                                   @foreach($radioAttrRes as $key=> $value)
                                                   <th class="text-center">{{$key}}</th>
                                                   @endforeach
                                                   <th class="text-center" >库存量</th>
                                                   <th class="text-center" >sku_price</th>
                                                   <th class="text-center" >sku_no</th>
                                                   <th class="text-center" width="4%">操作</th>
                                               </tr>
                                           </thead>
                                           <tbody>
                                              
                                              @if (count($goodsProRes)>0)
                                               @foreach($goodsProRes as $k0=>$v0)
                                              <tr>
                                                   @foreach($radioAttrRes as $k=>$v)
                                                  <td align="center">
                                                      <select name="goods_attr[{{$k}}][]">
                                                          <option value="">请选择</option>
                                                         
                                                           @foreach($v as $k1=>$v1)
                                                              @php $arr=explode(',', $v0['goods_attr']);
                                                              if(in_array($v1['id'], $arr)){
                                                                  $select='selected="selected"';
                                                              }else{
                                                                  $select='';
                                                              }
                                                              @endphp
                                                          
                                                          <option {{$select}} value="{{$v1['id']}}">{{$v1['attr_value']}}</option>
                                                          @endforeach
                                                      </select>
                                                  </td>
                                                  @endforeach
                                                  <td align="center"><input type="text" name="sku_no[]" style="text-align:center;" value="{{$v0['sku_no']}}"></td>
                                                  <td align="center"><input type="text" name="goods_num[]" style="text-align:center;" value="{{$v0['goods_number']}}"></td>
                                                  <td align="center"><input type="text" name="sku_price[]" style="text-align:center;" value="{{$v0['sku_price']}}"></td>
                                                  <td align="center"><a onclick="addtr(this);" class="btn btn-sm btn-azure btn-addon" href="javascript:;"><?php if($k0==0){ echo '+'; }else{ echo '-'; }?></a></td>
                                              </tr>
                                               @endforeach
                                              @else
                                              <tr>
                                                   @foreach($radioAttrRes as $k=>$v)
                                                  <td align="center">
                                                      <select name="goods_attr[{{$k}}][]">
                                                          <option value="">请选择</option>
                                                          
                                                          @foreach($v as $k1=>$v1)
                                                          <option value="{{$v1['id']}}">{{$v1['attr_value']}}</option>
                                                          @endforeach
                                                      </select>
                                                  </td>
                                                  @endforeach
                                                  <td align="center"><input type="text" name="sku_no[]" style="text-align:center;" value=""></td>
                                                  <td align="center"><input type="text" name="goods_num[]" style="text-align:center;" value=""></td>
                                                  <td align="center"><input type="text" name="sku_price[]" style="text-align:center;" value=""></td>
                                                  <td align="center"><a onclick="addtr(this);" class="btn btn-sm btn-azure btn-addon" href="javascript:;">+</a></td>
                                              </tr>
                                              @endif
                                           </tbody>
                                       </table>
                                   </div>
                                   <div style="height:40px;">
                                       <div class="form-group">
                                           <div class="col-sm-offset-2 col-sm-10">
                                               <button type="submit" class="btn btn-default">保存信息</button>
                                           </div>
                                       </div>
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

@section('jscript')
   <script type="text/javascript">
        function addtr(o){
            var tr=$(o).parent().parent();
            if($(o).html() == '+'){
                var newtr=tr.clone();    
                newtr.find('a').html('-');
                tr.after(newtr);
            }else{
                tr.remove();
            }
        }
    </script>

@endsection



</body></html>