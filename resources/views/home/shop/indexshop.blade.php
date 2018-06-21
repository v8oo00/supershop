@extends('layouts.home')

@section('css')
<link rel="stylesheet" href="/homes/shop/css/magic-input.min.css">
<link rel="stylesheet" href="/homes/tag/jquery.tagsinput.min.css">
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
            <button type="button" name="button" class='btn btn-warning btn-lg' data-toggle="modal" data-target="#commodityModal" style='margin-top:35px;margin-bottom:35px;'>添加商品</button>
        </div>
        <div class="col-md-12" style='margin-top:50px;'>
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>名称</th>
                        <th>分类</th>
                        <th>店铺</th>
                        <th>简介</th>
                        <th>公司</th>
                        <th>销量</th>
                        <th>点击量</th>
                        <th>状态</th>
                        <th>活动</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($commodities as $key=>$commodity)
                    <tr class='touch_show' commodity_iiiiid='{{$commodity->id}}'>
                        <td>{{$key}}</td>
                        <td>
                            <a href="/commodity/{{$commodity->id}}">{{$commodity->name}}</a>
                        </td>
                        <td>{{$commodity->cate->cate}}</td>
                        <td>{{$commodity->shop->name}}</td>
                        <td>{{$commodity->desc}}</td>
                        <td>{{$commodity->company}}</td>
                        <td>{{$commodity->sale}}</td>
                        <td>{{$commodity->click_num}}</td>
                        <td><input type="checkbox" class="mgc-switch mgc-sm" @if($commodity->status==1) checked @endif onchange="fun(this)" /></td>
                        <td>
                            @if($commodity->activity_id == 0)
                                商品暂无参与活动
                            @else
                                {{$commodity->activity->name}}
                            @endif
                        </td>
                        <td style='position:absolute;height:45px;width:380px;display:none;' class='aaa'>
                            <a href="/shop/catshop/catdetail/{{$commodity->id}}" class='btn btn-primary'>查看详情</a>
                            <button type="button" class="btn btn-primary gltags" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">管理标签</button>
                            <a href="/shop/catshop/catpic/{{$commodity->id}}" class='btn btn-primary'>管理图片</a>
                            <a href="/shop/catshop/catsku/{{$commodity->id}}" class='btn btn-primary'>管理sku</a>
                        </td>
                    </tr>

                    @endforeach
                    <tr>
                        <td colspan='11' style='text-align:center;padding-bottom:30px;' >
                            {{$commodities->links()}}
                        </td>
                    </tr>
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
                            <input name="tags" id="tags"  />
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



<div class="modal fade " id="commodityModal" tabindex="-1" role="dialog" aria-labelledby="commodityModalLabel">
    <div class="modal-dialog modal-lg" role="document" style='width:1000px;'>
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="commodityModalLabel">添加商品</h4>
            </div>
            <div class="modal-body">

                {!! Form::open(['url' => 'shop/catshop/shopaddcom','method' => 'POST','class'=>'form-horizontal form-label-left','novalidate'=>'','enctype'=>"multipart/form-data"]) !!}

                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12">Name</label>
                        <div class="col-md-9 col-sm-9 col-xs-12"  id='name'>
                            <input type="text" class="form-control" placeholder="请输入商品名称" name='name'>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12" >Desc</label>
                        <div class="col-md-9 col-sm-9 col-xs-12" id='desc'>
                            <input type="text" name="desc" class="form-control col-md-10" placeholder="请输入商品描述">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12" >Company</label>
                        <div class="col-md-9 col-sm-9 col-xs-12" id='company'>
                            <input type="text" name="company" class="form-control col-md-10" placeholder="请输入商品公司">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12" >Origin</label>
                        <div class="col-md-9 col-sm-9 col-xs-12" id='origin'>
                            <input type="text" name="origin" class="form-control col-md-10" placeholder="请输入商品原产地">
                        </div>
                    </div>
                    <input type="hidden" name="shop_id" value="{{$shop->id}}">
                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12" >Cates</label>
                        <div class="col-md-9 col-sm-9 col-xs-12" id='cates'>
                            <select class="select2_group form-control" name='cate_id'>
                                @foreach($cates as $cate)
                                    @if($cate->pid == 0)
                                    <optgroup label="{{$cate->cate}}">
                                    @endif
                                        @if($cate->pid != 0)
                                        <option value="{{$cate->id}}">&nbsp;&nbsp;&nbsp;{{$cate->cate}}</option>
                                        @endif
                                    @if($cate->pid == 0)
                                    </optgroup>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12" >Detail</label>
                        <div class="col-md-9 col-sm-9 col-xs-12" id='detail'>
                        </div>
                        <textarea id="text1" name='detail' style="width:100%; height:200px;display:none;"></textarea>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                            <button type="reset" class="btn btn-primary">Reset</button>
                            <button type="submit" class="btn btn-success" onclick="layer.msg('添加成功')">Submit</button>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>

        </div>
    </div>
</div>
@endsection

@section('js')
<script type="text/javascript" src='/admins/wangeditor/wangEditor.min.js'></script>
<script type="text/javascript" src='/homes/tag/jquery.tagsinput.min.js'></script>
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

    $('.touch_show').mouseover(function(){
        $(this).children('.aaa').show();
    }).mouseout(function(){
        $(this).children('.aaa').hide();
    });

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

    $('#tags').tagsInput();

    // //当点击管理标签时触发
    $('.gltags').click(function(){
        var id = $(this).parents('tr').attr('commodity_iiiiid');
        $('#bc').attr('c_id',id);
        $.ajax({
            url:"{{ action('ShopController@tags')}}",
            data:{id:id},
            type:'post',
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

        //当点击取消按钮时
        $('#qx').click(function(){
            $('#name').val('');
            // 删除标签值
            removeTag1();
            $('#tvborder').css({'height':'0px','transition':'all 0.2s'});
            $('#out').find('i').attr('class','glyphicon glyphicon-plus');
            $('#out').attr('out','false');
        });
    });
    //
    // //当点击保存按钮时
    $('#bc').click(function(){
        var c_id = $('#bc').attr('c_id');

        if($('#tags').val() != '' && $('#name').val() != ''){
            var tags = $('#name').val();
            var vals = $('#tags').val();

            $.ajax({
                url:"{{action('ShopController@storetv')}}",
                data:{id:c_id,tag:tags,value:vals},
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
                            url:"{{ action('ShopController@tags')}}",
                            data:{id:c_id},
                            type:'post',
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
    //
    //
    // //当关闭模态框时
    $('#exampleModal').on('hidden.bs.modal',function(){
        $('.tag_val').remove();
        removeTag1();
        $('#tvborder').css({'height':'0px','transition':'all 0.2s'});
        $('#out').find('i').attr('class','glyphicon glyphicon-plus');
        $('#out').attr('out','false');
    });

    // //删除标签值
    function removeTag1(){
        $('#tags').importTags('');
    }
    //
    // //插入标签和标签值
    function deal(mes){
        for(var i in mes){
            var list = $('#tag_val').clone().show().removeAttr('id').addClass('tag_val');
            list.find('td:eq(0)').html(i);
            list.find('td:eq(1)').html(mes[i]['value']);
            list.find('td:eq(2)').html('<a href="javascript:" v_id='+mes[i]['id']+' t_id='+mes[i]['t_id']+' class="btn btn-danger btn-xs delete"><i class="fa fa-trash-o"></i> Delete </a>');
            $('#tag_val_tou').after(list);
        }
    }
    //
    // //删除标签和标签值
    function del(){
        $('.delete').click(function(){
            var t_id = $(this).attr('t_id');
            var v_id = $(this).attr('v_id');
            var _this = $(this);

            layer.confirm('您确定删除标签及标签值？', {
              btn: ['确定','取消'] //按钮
            }, function(){
                $.ajax({
                    url:"{{ action('ShopController@delete') }}",
                    data:{v_id:v_id,t_id:t_id},
                    type:'post',
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
    //
    //

    function fun(obj){
        var id = $(obj).parents('tr').attr('commodity_iiiiid');
        $.ajax({
            url:"{{ action('ShopController@status_com') }}",
            data:{id:id},
            type:'post'
        });
        // console.log('aaaa');
    }

    var E = window.wangEditor
    var editor = new E('#detail')
    var $text1 = $('#text1')
    editor.customConfig.onchange = function (html) {

       $text1.val(html)
    }
    // 配置服务器端地址
    editor.customConfig.uploadImgHeaders = {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    }

    editor.customConfig.uploadFileName = 'file[]'

    editor.customConfig.uploadImgServer = '/admin/commodity/uploadpic'

    editor.customConfig.uploadImgHooks = {
        before: function (xhr, editor, files) {
            // 图片上传之前触发
            // xhr 是 XMLHttpRequst 对象，editor 是编辑器对象，files 是选择的图片文件

            // 如果返回的结果是 {prevent: true, msg: 'xxxx'} 则表示用户放弃上传
            // return {
            //     prevent: true,
            //     msg: '放弃上传'
            // }
        },
        success: function (xhr, editor, result) {
            // 图片上传并返回结果，图片插入成功之后触发
            // xhr 是 XMLHttpRequst 对象，editor 是编辑器对象，result 是服务器端返回的结果
        },
        fail: function (xhr, editor, result) {
            // 图片上传并返回结果，但图片插入错误时触发
            // xhr 是 XMLHttpRequst 对象，editor 是编辑器对象，result 是服务器端返回的结果
        },
        error: function (xhr, editor) {
            // 图片上传出错时触发
            // xhr 是 XMLHttpRequst 对象，editor 是编辑器对象
        },
        timeout: function (xhr, editor) {
            // 图片上传超时时触发
            // xhr 是 XMLHttpRequst 对象，editor 是编辑器对象
        },

        // 如果服务器端返回的不是 {errno:0, data: [...]} 这种格式，可使用该配置
        // （但是，服务器端返回的必须是一个 JSON 格式字符串！！！否则会报错）
        customInsert: function (insertImg, result, editor) {
            // 图片上传并返回结果，自定义插入图片的事件（而不是编辑器自动插入图片！！！）
            // insertImg 是插入图片的函数，editor 是编辑器对象，result 是服务器端返回的结果

            // 举例：假如上传图片成功后，服务器端返回的是 {url:'....'} 这种格式，即可这样插入图片：
            var url = result.data
            $(url).each(function( key, val){
                insertImg(val)
            })


            // result 必须是一个 JSON 格式字符串！！！否则报错
        }
    }


    editor.create()
    // 初始化 textarea 的值
    $text1.val(editor.txt.html())
</script>
@endsection
