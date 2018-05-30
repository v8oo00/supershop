@extends('layouts.admin')

@section('css')
<style >
</style>
@endsection
@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Activity's<small>List</small></h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>


            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <p class="text-muted font-13 m-b-30">
            Show the Activity of users
            <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" style="float:right;">添加活动商品</button>
            </p>
            </p>

            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap homeusers" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>商品名称</th>
                        <th>活动分类</th>
                        <th>活动店铺</th>
                        <th>商品描述</th>
                        <th>商品销量</th>
                        <th>商品点击量</th>
                        <th>商品状态</th>
                        <th>是否移除商品</th>
                    </tr>
                </thead>
                <tbody v-for="item in items">
                    @foreach($act_coms as $actcom)
                        <tr>
                            <td>{{$actcom->id}}</td>
                            <td>{{$actcom->name}}</td>
                            <td>{{$actcom->cate->cate}}</td>
                            <td>{{$actcom->shop->name}}</td>
                            <td>{{$actcom->desc}}</td>
                            <td>{{$actcom->sale}}</td>
                            <td>{{$actcom->click_num}}</td>
                            <td>
                                @if($actcom->status == 1)
                                    正常销售
                                @else
                                    停止销售
                                @endif
                            </td>
                            <td>
                                <input type="checkbox" class="js-switch" checked onchange="fun(this)" />
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">添加活动商品</h4>
            </div>
            <div class="modal-body" style='padding:0px;'>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_content">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card-box table-responsive">
                                            <table id="datatable-keytable" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>ID</th>
                                                        <th>商品名称</th>
                                                        <th>商品商家</th>
                                                        <th>商品分类</th>
                                                        <th>商品销量</th>
                                                        <th>商品点击量</th>
                                                        <th>商品描述</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($commodities as $commodity)
                                                        <tr>
                                                            <td class='commodity_id_check' style="text-align:center;">
                                                                <input type="checkbox" name="commodity_id[]" value="{{$commodity->id}}">
                                                            </td>
                                                            <td>{{$commodity->id}}</td>
                                                            <td>{{$commodity->name}}</td>
                                                            <td>{{$commodity->shop->name}}</td>
                                                            <td>{{$commodity->cate->cate}}</td>
                                                            <td>{{$commodity->sale}}</td>
                                                            <td>{{$commodity->click_num}}</td>
                                                            <td>{{$commodity->desc}}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="border-top:0px;">
                <button type="button" class="btn btn-primary" id='click_get_comid' disabled>添加商品到此活动</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script type="text/javascript">
$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
function fun(obj){
    var id = $(obj).parents('tr').find('td:eq(0)').html();
    var activity_id = {{$act_id}}
    $.ajax({
        url:"{{ action('Admin\ActivityController@com_status') }}",
        data:{id:id,activity_id:activity_id},
        type:'get'
    });
}



var fbi_com_id = [];


$('input[type="checkbox"]').click(function(){
    var txt = parseInt($(this).val());
    // console.log($.inArray(txt,fbi_com_id));
    if($.inArray(txt,fbi_com_id) >= 0 ){
        fbi_com_id = $.grep(fbi_com_id, function(n,i){
            return n != txt;
        });
    }else{

        fbi_com_id.push(txt);
    }
    if(fbi_com_id.length == 0){
        $('#click_get_comid').attr('disabled','disabled');
    }else{
        $('#click_get_comid').removeAttr('disabled');
    }
});

$('#click_get_comid').click(function(){
var activity_id = {{$act_id}}
    $.ajax({
        url:"{{ action('Admin\ActivityController@activity_commodity') }}",
        data:{id:fbi_com_id,activity_id:activity_id},
        type:'post',
        dataType:'text',
        success:function(data){
            layer.msg('添加成功',{time: 1000},function(){
                                window.location.reload();
                            });
        },
        error:function(){
            layer.msg('添加失败',{time: 1000},function(){
                                window.location.reload();
                            });
        }

    });
});

</script>

@endsection
