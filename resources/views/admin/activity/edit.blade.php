@extends('layouts.admin')
@section('css')
<link rel="stylesheet" href="/admins/image_one_update/css/dropify.min.css">
@endsection
@section('content')
<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Activity <small>Edit</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>

                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                {!! Form::open(['url' => 'admin/activity/edit','method' => 'POST','class'=>'form-horizontal form-label-left','novalidate'=>'','enctype'=>"multipart/form-data"]) !!}

                      <p>
                          .
                      </p>
                      <span class="section">Please fill out the form correctly</span>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="hidden" name="id" value="{{$activity->id}}">
                          <input id="name" class="form-control col-md-7 col-xs-12" name="name" placeholder="请填入活动名称" required="required" type="text" value="{{$activity->name}}">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="route">Route <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="route" class="form-control col-md-7 col-xs-12" name="route" placeholder="请填入活动的地址" required="required" type="text" value="{{$activity->route}}">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="input-file-now">image <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" id="input-file-now" class="dropify" name="image" data-default-file="{{$activity->image}}"/>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Rule <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="textarea" required="required" name="rule" class="form-control col-md-7 col-xs-12" style="resize:none;">{{$activity->rule}}</textarea>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="input-file-now">Time <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                              <fieldset>
                                <div class="control-group">
                                  <div class="controls">
                                    <div class="input-prepend input-group">
                                      <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
                                      <input type="text" style="width: 200px" name="reservation" id="reservation" class="form-control" value="{{ChangeCalendarFormat(date('Y-m-d',$activity->start_time),0,1)}} - {{ChangeCalendarFormat(date('Y-m-d',$activity->end_time),0,1)}}">
                                    </div>
                                  </div>
                                </div>
                              </fieldset>
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
<script type="text/javascript">
$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
$('.dropify').dropify();
</script>

@endsection