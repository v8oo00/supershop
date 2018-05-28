@extends('layouts.admin')
@section('css')
<link rel="stylesheet" href="/admins/image_one_update/css/dropify.min.css">
<link rel="stylesheet" href='{{asset("layer/theme/default/layer.css")}}'>
@endsection
@section('content')
<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Picture<small>Create</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>

                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                {!! Form::open(['url' => 'admin/picture/store','method' => 'POST','class'=>'form-horizontal form-label-left','novalidate'=>'','enctype'=>"multipart/form-data"]) !!}
                      <p>
                          .
                      </p>
                      <span class="section">Please fill out the form correctly</span>

                          <input id="id" class="form-control col-md-7 col-xs-12" name="id" value='{{$p_maxid}}' required="required" type="hidden">

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="route">Route <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="route" class="form-control col-md-7 col-xs-12" name="route" placeholder="请填入图片的地址" required="required" type="text">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="input-file-now">image <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" id="input-file-now" class="dropify" name="image" required="required"/>
                          上传图片大小限制:长度范围:1000~1500 宽度范围:500~800
                        </div>
                      </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button  type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                     {!! Form::close() !!}
                  </div>
                </div>
              </div>
            </div>
            @endsection

@section('js')
<script type="text/javascript" src="/admins/image_one_update/js/dropify.min.js"></script>
<script src="{{asset('/layer/layer.js')}}"></script>
<script type="text/javascript">
$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
$('.dropify').dropify();

@if($errors->has('image'))

    layer.msg("{{$errors->first('image')}}");
@endif
</script>

@endsection
