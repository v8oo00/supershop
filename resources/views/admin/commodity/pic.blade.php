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
                            <th>商品图片</th>
                            <th>图片状态</th>
                            <th>图片操作</th>
                        </tr>
                    </thead>
                    <tbody v-for="item in items">
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
    //"onUpload":onUploadFun，//在上传后执行的函数
    //autoCommit:true,//文件是否自动上传
    "fileType":['png','jpg']//文件类型限制，默认不限制，注意写的是文件后缀
});
function beforeUploadFun(opt){
    opt.otherData =[{"name":"c_id","value":"{{$com_id}}"}];
}
function onUploadFun(opt,data){
    alert(data);
    uploadTools.uploadError(opt);//显示上传错误
    uploadTools.uploadSuccess(opt);//显示上传成功
}

function testUpload(){
	var opt = uploadTools.getOpt("fileUploadContent");
	uploadEvent.uploadFileEvent(opt);
}
</script>
@endsection
