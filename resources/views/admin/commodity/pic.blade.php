@extends('layouts.admin')
@section('css')
<link href="/admins/manypic/css/iconfont.css" rel="stylesheet" type="text/css"/>
<link href="/admins/manypic/css/fileUpload.css" rel="stylesheet" type="text/css">
@endsection
@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2> Commodities<small> Pictures</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <p class="text-muted font-13 m-b-30">
                Show the Pictures for users
                <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" style="float:right;">添加图片</button>
                </p>

                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap homeusers" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>商品</th>
                            <th>商品图片</th>
                            <th>图片状态</th>
                        </tr>
                    </thead>
                    <tbody v-for="item in items">
                        @foreach($pictures as $picture)
                            <tr>
                                <td>{{$picture->id}}</td>
                                <td>{{$picture->commodity->name}}</td>
                                <td style="text-align:center;"><button type="button" name="button" img-src='{{$picture->image}}' class='btn btn-defaut btn-xs pigimg'>点击查看图片</button></td>
                                <td><input type="checkbox" class="js-switch" @if($picture->status==1) checked @endif onchange="fun(this)" /></td>
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
$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
$('#exampleModal').on('show.bs.modal', function (event) {

})

$("#fileUploadContent").initUpload({
    "uploadUrl":'{{action("Admin\CommodityController@pic_upload")}}',//上传文件信息地址
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
        url:"{{ action('Admin\CommodityController@status') }}",
        data:{id:id},
        type:'get'
    });
}
</script>
@endsection
