@extends('layouts.admin')

@section('css')
@endsection
@section('content')
<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Form Basic Elements <small>different form elements</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Settings 1</a>
                                </li>
                                <li><a href="#">Settings 2</a>
                                </li>
                            </ul>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    {!! Form::open(['url' => 'admin/commodity/create_com','method' => 'POST','class'=>'form-horizontal form-label-left','novalidate'=>'','enctype'=>"multipart/form-data"]) !!}

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Name</label>
                            <div class="col-md-9 col-sm-9 col-xs-12"  id='name'>
                                <input type="text" class="form-control" placeholder="请输入商品名称" name='name'>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Desc</label>
                            <div class="col-md-9 col-sm-9 col-xs-12" id='desc'>
                                <input type="text" name="desc" class="form-control col-md-10" placeholder="请输入商品描述">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Company</label>
                            <div class="col-md-9 col-sm-9 col-xs-12" id='company'>
                                <input type="text" name="company" class="form-control col-md-10" placeholder="请输入商品公司">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Origin</label>
                            <div class="col-md-9 col-sm-9 col-xs-12" id='origin'>
                                <input type="text" name="origin" class="form-control col-md-10" placeholder="请输入商品原产地">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >shops</label>
                            <div class="col-md-9 col-sm-9 col-xs-12" id='shops'>
                                <select class="select2_single form-control" tabindex="-1" name='shop_id'>
                                    @foreach($shops as $shop)
                                        <option value="{{$shop->id}}">{{$shop->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Cates</label>
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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Detail</label>
                            <div class="col-md-9 col-sm-9 col-xs-12" id='detail'>
                            </div>
                            <textarea id="text1" name='detail' style="width:100%; height:200px;display:none;"></textarea>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                <button type="reset" class="btn btn-primary">Reset</button>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script type="text/javascript" src='/admins/wangeditor/wangEditor.min.js'></script>
<script type="text/javascript">
$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
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


@if($errors->has('name'))

    layer.tips("{{$errors->first('name')}}", '#name', {
        tips: [4, '#000000'],
        tipsMore: true
    });
@endif

@if($errors->has('desc'))

    layer.tips("{{$errors->first('desc')}}", '#desc', {
        tips: [4, '#000000'],
        tipsMore: true
    });
@endif

@if($errors->has('company'))

    layer.tips("{{$errors->first('company')}}", '#company', {
        tips: [4, '#000000'],
        tipsMore: true
    });
@endif

@if($errors->has('origin'))

    layer.tips("{{$errors->first('origin')}}", '#origin', {
        tips: [4, '#000000'],
        tipsMore: true
    });
@endif

@if($errors->has('shop_id'))

    layer.tips("{{$errors->first('shop_id')}}", '#shops', {
        tips: [4, '#000000'],
        tipsMore: true
    });
@endif

@if($errors->has('cate_id'))

    layer.tips("{{$errors->first('cate_id')}}", '#cates', {
        tips: [4, '#000000'],
        tipsMore: true
    });
@endif

@if($errors->has('detail'))

    layer.tips("{{$errors->first('detail')}}", '#detail', {
        tips: [4, '#000000'],
        tipsMore: true
    });
@endif
</script>
@endsection
