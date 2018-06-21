@extends('layouts.home')

@section('css')
<link rel="stylesheet" href="/homes/shop/css/magic-input.min.css">
<link href="/admins/manypic/css/iconfont.css" rel="stylesheet" type="text/css"/>
<link href="/admins/manypic/css/fileUpload.css" rel="stylesheet" type="text/css">
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
            <button type="button" name="button" class='btn btn-warning btn-lg' data-toggle="modal" data-target="#exampleModal" style='margin-top:35px;margin-bottom:35px;'>添加图片</button>
        </div>
        <div class="col-md-12" style='margin-top:50px;'>
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>商品</th>
                        <th>商品图片</th>
                        <th>图片状态</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pictures as $picture)
                        <tr>
                            <td>{{$picture->id}}</td>
                            <td>{{$picture->commodity->name}}</td>
                            <td style="text-align:center;"><button type="button" name="button" img-src='{{$picture->image}}' class='btn btn-warning btn-xs pigimg'>点击查看图片</button></td>
                            <td><input type="checkbox" class="mgc-switch mgc-sm" @if($picture->status==1) checked @endif onchange="fun(this)" /></td>
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
                <h4 class="modal-title" id="exampleModalLabel">添加图片</h4>
            </div>
            <div class="modal-body">
                <div id="fileUploadContent" class="fileUploadContent"></div>
            </div>

        </div>
    </div>
</div>
<div id="outerdiv" style="position:fixed;top:0;left:0;background:rgba(0,0,0,0.7);z-index:2;width:100%;height:100%;display:none;">
    <div id="innerdiv" style="position:absolute;">
        <img id="bigimg" style="border:5px solid #fff;" src="" />
    </div>
</div>

@endsection

@section('js')
<script type="text/javascript" src="/admins/manypic/js/fileUpload.js"></script>
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

    $("#fileUploadContent").initUpload({
        "uploadUrl":'{{action("ShopController@shoppicupload")}}',//上传文件信息地址
        //"size":350,//文件大小限制，单位kb,默认不限制
        //"maxFileNumber":3,//文件个数限制，为整数
        //"filelSavePath":"",//文件上传地址，后台设置的根目录
        "beforeUpload":beforeUploadFun,//在上传前执行的函数
        "onUpload":onUploadFun,//在上传后执行的函数
        //autoCommit:true,//文件是否自动上传
        "fileType":['png','jpg']//文件类型限制，默认不限制，注意写的是文件后缀
    });
    function beforeUploadFun(opt){
        opt.otherData =[{"name":"c_id","value":"{{$com_id}}"}];
    }
    function onUploadFun(opt,data){
        layer.msg('上传成功',{time: 1000},function(){
                            window.location.reload();
                        });

    }

    function testUpload(){
    	var opt = uploadTools.getOpt("fileUploadContent");
    	uploadEvent.uploadFileEvent(opt);
    }


    $(".pigimg").click(function(){
        var _this = $(this);
        imgShow("#outerdiv", "#innerdiv", "#bigimg", _this);
    });

    function imgShow(outerdiv, innerdiv, bigimg, _this){
        var src = _this.attr("img-src");
        $(bigimg).attr("src", src);


        $("<img/>").attr("src", src).load(function(){
            var windowW = $(window).width();
            var windowH = $(window).height();
            var realWidth = this.width;
            var realHeight = this.height;
            var imgWidth, imgHeight;
            var scale = 0.8;

            if(realHeight>windowH*scale) {
                imgHeight = windowH*scale;
                imgWidth = imgHeight/realHeight*realWidth;
                if(imgWidth>windowW*scale) {
                    imgWidth = windowW*scale;
                }
            } else if(realWidth>windowW*scale) {
                imgWidth = windowW*scale;
                            imgHeight = imgWidth/realWidth*realHeight;
            } else {
                imgWidth = realWidth;
                imgHeight = realHeight;
            }
                    $(bigimg).css("width",imgWidth);

            var w = (windowW-imgWidth)/2;
            var h = (windowH-imgHeight)/2;
            $(innerdiv).css({"top":h, "left":w});
            $(outerdiv).fadeIn("fast");
        });

        $(outerdiv).click(function(){
            $(this).fadeOut("fast");
        });
    }

    function fun(obj){
        var id = $(obj).parents('tr').find('td:eq(0)').html();
        $.ajax({
            url:"{{ action('ShopController@shoppicstatus') }}",
            data:{id:id},
            type:'post'
        });
    }

</script>
@endsection
