@extends('layouts.home')

@section('css')
<link rel="stylesheet" href="/homes/shop/css/magic-input.min.css">
@endsection

@section('content')
<div class="container">
    <div class="row" style='background-color:#fff;'>
        <div class="col-md-6" style='padding-top:10px;border-right:1px solid #ccc;border-bottom:1px solid #ccc;padding-bottom:10px;' id='a_mr'>
            <div class="col-md-2" style='padding-right:0px;padding-left:;'>
                <img src="{{$shop->avatar}}" alt="" class='img-circle img-thumbnail' style='width:80px;height:80px;'>
            </div>
            <div class="col-md-2" style='padding-right:0px;padding-left:0px;'>
                <div class="col-md-12" style='margin-top:20px;padding-left:0px;text-align:right;'>
                    店铺名称 :
                </div>
                <div class="col-md-12" style='padding-left:0px;text-align:right;'>
                    店铺评分 :
                </div>
            </div>
            <div class="col-md-3"style='padding-left:0px;'>
                <div class="col-md-12" style='margin-top:20px;padding-left:0px;'>
                    {{$shop->name}}
                </div>
                <div class="col-md-12" style='padding-left:0px;'>
                    @for($i=0;$i< 5;$i++)
                        @if($i< shop_start($shop->id))
                            <a><i class="fa fa-star"></i></a>
                        @else
                            <a><i class="fa fa-star-o"></i></a>
                        @endif
                    @endfor
                </div>
            </div>
            <div class="col-md-3">
                <div class="col-md-12" style='margin-top:25px'>
                    <a href="javascript:" id='more_info_c' flag='true'>查看更多信息</a>
                </div>
            </div>
            <div style='width:100%;height:240px;position:absolute;background-color:#fff;z-index:1000;left:1px;bottom:-240px;display:none;border-right:1px solid #ccc' id='more_info'>
                <div class="col-md-12" style='margin-top:15px;padding-left:0px;'>
                    <div class="col-md-3" style='text-align:right;padding-left:0px;padding-right:20px;'>
                        店铺联系地址 :
                    </div>
                    <div class="col-md-9">
                        {{$shop->address}}
                    </div>
                </div>
                <div class="col-md-12" style='margin-top:10px;padding-left:0px;'>
                    <div class="col-md-3" style='text-align:right;padding-left:0px;padding-right:20px;'>
                        销售量 :
                    </div>
                    <div class="col-md-9">
                        {{shop_sale($shop->id)}}
                    </div>
                </div>
                <div class="col-md-12" style='margin-top:10px;padding-left:0px;'>
                    <div class="col-md-3" style='text-align:right;padding-left:0px;padding-right:20px;'>
                        收藏量 :
                    </div>
                    <div class="col-md-9">
                        123123124
                    </div>
                </div>
                <div class="col-md-12" style='margin-top:10px;padding-left:0px;'>
                    <div class="col-md-3" style='text-align:right;padding-left:0px;padding-right:20px;'>
                        商品数 :
                    </div>
                    <div class="col-md-9">
                        {{count($shop->commodity)}}
                    </div>
                </div>
                <div class="col-md-12" style='margin-top:10px;padding-left:0px;'>
                    <div class="col-md-3" style='text-align:right;padding-left:0px;padding-right:20px;'>
                        店铺联系电话 :
                    </div>
                    <div class="col-md-9">
                        {{$shop->phone}}
                    </div>
                </div>
                <div class="col-md-12" style='margin-top:10px;padding-left:0px;'>
                    <div class="col-md-3" style='text-align:right;padding-left:0px;padding-right:20px;'>
                        店铺详情描述 :
                    </div>
                    <div class="col-md-9">
                        {{$shop->desc}}
                    </div>
                </div>
                <div class="col-md-12" style='margin-top:10px;padding-left:0px;'>
                    <div class="col-md-3" style='text-align:right;padding-left:0px;padding-right:20px;'>
                        店铺创建时间 :
                    </div>
                    <div class="col-md-9">
                        {{Carbon\Carbon::parse($shop->created_at)->year}} 年
                        {{Carbon\Carbon::parse($shop->created_at)->month}} 月
                        {{Carbon\Carbon::parse($shop->created_at)->day}} 日
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6" style='border-bottom:1px solid #ccc; text-align:center;' id='a_tj'>
            <button type="button" name="button" class='btn btn-warning btn-lg' data-toggle="modal" data-target="#exampleModal" style='margin-top:35px;margin-bottom:35px;'>添加sku</button>
        </div>
        <div class="col-md-12" style='margin-top:50px;'>
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>商品名称</th>
                        <th>sku值</th>
                        <th>售价</th>
                        <th>库存</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($skus as $sku)
                        <tr>
                            <td>{{$sku->id}}</td>
                            <td>{{$sku->commodity->name}}</td>
                            <td>{{$sku->s_value}}</td>
                            <td>{{$sku->price}}</td>
                            <td>{{$sku->stock}}</td>
                            <td>
                                <a href="{{action('ShopController@delsku',$sku->id)}}" class='btn btn-primary btn-xs'>删除</a>
                                <button type="button" class="btn btn-primary btn-xs sku_bbp" data-toggle="modal" data-target="#editModal" >修改</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
</div>
<div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">添加sku</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_content">

                                <!-- start form for validation -->
                                {!! Form::open(['url' => '/shop/catshop/createsku','method' => 'POST','id'=>'form_sku']) !!}
                                <input type="hidden" name="c_id" value="{{$commodity_id}}">
                                    @foreach($tags as $tag)
                                        <label>{{$tag->name}}:</label>
                                        <div class="" style='margin-bottom:5px;'>
                                            @foreach(explode_kvalue($tag->HasOneTagVal->value) as $k=>$v)
                                                <label class="radio-inline">
                                                      <input type="radio" class='mgr' name="{{$tag->name}}" value="{{$v}}" @if($k=0) checked @endif/> {{$v}}
                                                </label>
                                            @endforeach
                                        </div>
                                    @endforeach


                                    <label for="price">价格:</label>
                                    <input type="number" class="form-control" name="price" id='price'>
                                    <label for="stock">库存:</label>
                                    <input type="number" class="form-control" name="stock" >
                                    <div class="ln_solid"></div>
                                    <button type="submit" name="create_sku" class='btn btn-primary btn-block'>添加</button>
                                {!! Form::close()!!}
                                <!-- end form for validations -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade " id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">修改sku</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_content">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">价格<span class="required">*</span>
                                    </label>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <input type="hidden" name="" value="" id='edit_sku_id'>
                                        <input type="number" id="edit_sku_price" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">库存<span class="required">*</span>
                                    </label>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <input type="number" id="edit_sku_stock" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                                    </label>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <button type="button" name="button" class="btn btn-primary btn-block" id='edit_sku_btn'>修改</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
<script type="text/javascript">
$('#more_info_c').click(function(){
    if($(this).attr('flag') == 'true'){
        $('#more_info').show();
        $(this).attr('flag','false');
    }else{
        $('#more_info').hide();
        $(this).attr('flag','true');
    }

});

$('.sku_bbp').each(function(){
    $(this).click(function(){
        $('#edit_sku_id').val($(this).parents('tr').find('td:eq(0)').html());
        $('#edit_sku_price').val($(this).parents('tr').find('td:eq(3)').html());
        $('#edit_sku_stock').val($(this).parents('tr').find('td:eq(4)').html());
    });
})

$('#edit_sku_btn').click(function(){
    var sku_id = $('#edit_sku_id').val();
    var sku_price = $('#edit_sku_price').val();
    var sku_stock = $('#edit_sku_stock').val();

    $.ajax({
        url:"{{ action('ShopController@updatesku') }}",
        data:{id:sku_id,price:sku_price,stock:sku_stock},
        type:'post',
        dataType:'text',
        success:function(){
            layer.msg('修改成功',{time:500},function(){
                window.location.reload();
            });
        },
        error:function(){

        }
    });
});

$('button[name="create_sku"]').click(function(){
    if($(this).parent().children().find('input[type="radio"]:checked').length==2 && $(this).parent().children('#price').val()!='' && $(this).parent().children('input[name="stock"]').val()!=''){
        var str = '';
        $(this).parent().children().find('input[type="radio"]:checked').each(function(){
            str += $(this).val()+',';
        })
        str = str.substring(0,str.length-1)
        // console.log(str);
        var commodity_id = {{$commodity_id}}
        var check = '';
        $.ajax({
            url:"{{ action('ShopController@checksku') }}",
            data:{s_value:str,commodity_id:commodity_id},
            type:'post',
            dataType:'text',
            async:false,
            success:function(data){
                if(data==1){
                    layer.msg('已将添加过此sku',{time: 1000});
                    check='false';
                }else{
                    check='true;'
                }
            },
            error:function(){
                layer.msg('添加失败',{time: 1000});
            }
        });
        // console.log(check);
        if(check == 'false'){
            return false;
        }else{
            $('#form_sku').submit();
        }


    }else{
        layer.msg('请将表单选写完整');
        return false;
    }


})
</script>
@endsection
