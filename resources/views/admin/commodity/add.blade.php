@extends('layouts.admin')

@section('css')
    <link href="/admins/vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
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
                                <div id="alerts"></div>
                                <div class="btn-toolbar editor" data-role="editor-toolbar" data-target="#editor-one">

                                    <div class="btn-group">
                                        <a class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="fa fa-bold"></i></a>
                                        <a class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i class="fa fa-italic"></i></a>
                                        <a class="btn" data-edit="strikethrough" title="Strikethrough"><i class="fa fa-strikethrough"></i></a>
                                        <a class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i class="fa fa-underline"></i></a>
                                    </div>

                                    <div class="btn-group">
                                        <a class="btn" data-edit="insertunorderedlist" title="Bullet list"><i class="fa fa-list-ul"></i></a>
                                        <a class="btn" data-edit="insertorderedlist" title="Number list"><i class="fa fa-list-ol"></i></a>
                                        <a class="btn" data-edit="outdent" title="Reduce indent (Shift+Tab)"><i class="fa fa-dedent"></i></a>
                                        <a class="btn" data-edit="indent" title="Indent (Tab)"><i class="fa fa-indent"></i></a>
                                    </div>

                                    <div class="btn-group">
                                        <a class="btn" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)"><i class="fa fa-align-left"></i></a>
                                        <a class="btn" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)"><i class="fa fa-align-center"></i></a>
                                        <a class="btn" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)"><i class="fa fa-align-right"></i></a>
                                        <a class="btn" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)"><i class="fa fa-align-justify"></i></a>
                                    </div>

                                    <div class="btn-group">
                                        <a class="btn" title="Insert picture (or just drag &amp; drop)" id="pictureBtn"><i class="fa fa-picture-o"></i></a>
                                        <input type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" style="display:none;">
                                    </div>

                                    <div class="btn-group">
                                        <a class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="fa fa-undo"></i></a>
                                        <a class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="fa fa-repeat"></i></a>
                                    </div>
                                </div>
                                <div id="editor-one" class="editor-wrapper placeholderText" contenteditable="true"></div>
                                <textarea name="detail" id="descr" style="display:none;"></textarea>
                                <br>
                            </div>
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
<script src="/admins/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
<script src="/admins/vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
<script src="/admins/vendors/google-code-prettify/src/prettify.js"></script>
<script type="text/javascript">
    $('#pictureBtn').click(function(){
        $(this).next().click();
        console.log($('#descr').html());
    });
    $(".btn-success").click(function(){
        var descr=$('#editor-one').html();

        $("#descr").html(descr);
        // return false;
    })
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
