@extends('layouts.admin')

@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2> Commodities<small>Lists</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <p class="text-muted font-13 m-b-30">
                Show the Commodities for users
                </p>

                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap homeusers" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>商品名称</th>
                            <th>商品分类</th>
                            <th>商品店铺</th>
                            <th>商品简介</th>
                            <th>所属公司</th>
                            <th>商品销量</th>
                            <th>商品点击量</th>
                            <th>商品详情</th>
                            <th>商品状态</th>
                            <th>商品活动</th>
                            <th>商品操作</th>
                        </tr>
                    </thead>
                    <tbody v-for="item in items">
                        @foreach($commodities as $commodity)
                            <tr>
                                <td>{{$commodity->id}}</td>
                                <td>{{$commodity->name}}</td>
                                <td>{{$commodity->cate->cate}}</td>
                                <td>{{$commodity->shop->name}}</td>
                                <td>{{$commodity->desc}}</td>
                                <td>{{$commodity->company}}</td>
                                <td>{{$commodity->sale}}</td>
                                <td>{{$commodity->click_num}}</td>
                                <td>{{$commodity->detail}}</td>
                                <td><input type="checkbox" class="js-switch" @if($commodity->status==1) checked @endif onchange="fun(this)" /></td>
                                <td>
                                    @if($commodity->activity_id == 0)
                                        商品暂无参与活动
                                    @else
                                        {{$commodity->activity->name}}
                                    @endif
                                </td>
                                <td>

                                    <button type="button" class="btn btn-primary btn-xs gltags" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">管理标签</button>
                                    <a class="btn btn-primary btn-xs" href='{{action("Admin\CommodityController@com_pic",$commodity->id)}}'>管理商品图片</a>

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
                <h4 class="modal-title" id="exampleModalLabel">商品标签及其值</h4>
            </div>
            <div class="modal-body">


                <table class="table table-striped" id="vforList">
                 <tr id="tag_val_tou">
                     <th>标签</th>
                     <th>标签值</th>
                     <th>操作</th>
                 </tr>

                 <tr id="tag_val" style="display:none;">
                     <td>尺寸</td>
                     <td>S,M,L,XL,XXL,XXXL</td>
                     <td>删除</td>
                 </tr>

                 <tr id="message" style="display:none;">
                     <td colspan="3" style="text-align:center"></td>
                 </tr>

                 <div id="tvborder" class="" style="height:0px;overflow:hidden;">

                     <div class="form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Input Tag <span class="required">*</span>
                       </label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <input id="name" class="form-control col-md-7 col-xs-12" name="cate" placeholder="Fill in the Tag name" required="required" type="text">
                       </div>
                     </div>

                     <div class="clearfix"></div>
                     <br>

                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Input Vals</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="tags_1" type="text" name="vals" class="tags form-control" />
                          <div id="suggestions-container" style="position: relative; float: left; width: 250px; margin: 10px;"></div>
                        </div>
                     </div>

                     <div class="clearfix"></div>

                     <div class="form-group">
                         <label class="control-label col-md-6 col-sm-6 col-xs-12"></label>
                         <div class="col-md-4 col-sm-4 col-xs-12">
                             <button type="button" id="bc" class="btn btn-success">保存</button>
                             <button type="button" id="qx" class="btn btn-info" style="margin-left:5px;">取消</button>
                         </div>
                     </div>
                 </div>

                 <div class="clearfix"></div>
                 <br>


                 <tr>
                     <td colspan="3">
                     <button type="button" id="out" out="false" class='btn btn-info btn-block addtag'><i class='glyphicon glyphicon-plus'></i></button>
                     </td>
                 </tr>
                </table>


            </div>

        </div>
    </div>
</div>
@endsection

@section('js')
<script type="text/javascript">


$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

//点击加号添加标签的框出来
$('#out').click(function(){
    if($(this).attr('out') == 'false'){
        $('#tvborder').css({'height':'220px','transition':'all 0.2s'});
        $(this).find('i').attr('class','glyphicon glyphicon-minus');
        $(this).attr('out','true');
    }else{
        $('#tvborder').css({'height':'0px','transition':'all 0.2s'});
        $(this).find('i').attr('class','glyphicon glyphicon-plus');
        $(this).attr('out','false');
    }
});

//当点击管理标签时触发
$('.gltags').click(function(){
    var id = $(this).parents('tr').find('td:eq(0)').html();
    $.ajax({
        url:"{{ action('Admin\CommodityController@tags')}}",
        data:{id:id},
        type:'get',
        success:function(mes){
            //如果有存在数据进行插入
            if(mes != 'no'){
                deal(mes);
                del();
            }else{
                var message = $('#message').clone().show().addClass('tag_val');
                message.find('td').html('<h4>此商品暂未添加标签及标签值！</h4>');
                $('#tag_val_tou').after(message);
            }

        }
    });

    //当点击保存按钮时
    $('#bc').click(function(){

        if($('#tags_1').val() != '' && $('#name').val() != ''){
            var tags = $('#name').val();
            var vals = $('#tags_1').val();

            $.ajax({
                url:"{{action('Admin\CommodityController@storetv')}}",
                data:{id:id,tag:tags,value:vals},
                type:'post',
                success:function(mes){
                    if(mes == 'ok'){
                        $('#name').val('');
                        removeTag1();
                        $('#tvborder').css({'height':'0px','transition':'all 0.2s'});
                        $('#out').find('i').attr('class','glyphicon glyphicon-plus');
                        $('#out').attr('out','false');
                        //删除数据
                        $('.tag_val').remove();

                        //重新发送ajax
                        $.ajax({
                            url:"{{ action('Admin\CommodityController@tags')}}",
                            data:{id:id},
                            type:'get',
                            success:function(mes){
                                deal(mes);
                                del();
                            }
                        });

                        layer.msg('添加标签和标签值成功',{icon: 1});
                    }else{
                        layer.msg('添加标签和标签值失败',{icon: 2});
                    }
                }
            });
        }else{
            layer.msg('标签或标签值不能为空');
        }
    });

    //当点击取消按钮时
    $('#qx').click(function(){
        $('#name').val('');
        removeTag1();
        $('#tvborder').css({'height':'0px','transition':'all 0.2s'});
        $('#out').find('i').attr('class','glyphicon glyphicon-plus');
        $('#out').attr('out','false');
    });
});


//当关闭模态框时
$('#exampleModal').on('hidden.bs.modal',function(){
    $('.tag_val').remove();
    removeTag1();
    $('#tvborder').css({'height':'0px','transition':'all 0.2s'});
    $('#out').find('i').attr('class','glyphicon glyphicon-plus');
    $('#out').attr('out','false');
});

//删除标签值
function removeTag1(){
    var tagval = $('#tags_1').val().split(',');
    for(var o=0;o < tagval.length;o++){
        $('#tags_1').removeTag(escape(tagval[o]));
    }
}

//插入标签和标签值
function deal(mes){
    for(var i in mes){
        var list = $('#tag_val').clone().show().removeAttr('id').addClass('tag_val');
        list.find('td:eq(0)').html(i);
        list.find('td:eq(1)').html(mes[i]['value']);
        list.find('td:eq(2)').html('<a href="javascript:" v_id='+mes[i]['id']+' t_id='+mes[i]['t_id']+' class="btn btn-danger btn-xs delete"><i class="fa fa-trash-o"></i> Delete </a>');
        $('#tag_val_tou').after(list);
    }
}

//删除标签和标签值
function del(){
    $('.delete').click(function(){
        var t_id = $(this).attr('t_id');
        var v_id = $(this).attr('v_id');
        var _this = $(this);

        layer.confirm('您确定删除标签及标签值？', {
          btn: ['确定','取消'] //按钮
        }, function(){
            $.ajax({
                url:"{{ action('Admin\CommodityController@delete') }}",
                data:{v_id:v_id,t_id:t_id},
                type:'get',
                success:function(mes){
                    if(mes == 'ok'){
                        _this.parents('tr').remove();
                        layer.msg('标签及标签值删除成功', {icon: 1});
                    }else{
                        layer.msg('标签及标签值删除失败', {icon: 2});
                    }
                }
            });
        });

    });
}

function fun(obj){
    var id = $(obj).parents('tr').find('td:eq(0)').html();
    $.ajax({
        url:"{{ action('Admin\CommodityController@status_com') }}",
        data:{id:id},
        type:'get'
    });
}

</script>
@endsection
