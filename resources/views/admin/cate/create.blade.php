@extends('layouts.admin')

@section('content')
<div class="">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Form Cate <small>create cate</small></h2>
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

            {!! Form::open(['url' => action('Admin\CateController@store'),'method' => 'POST','class'=>'form-horizontal form-label-left','novalidate']) !!}

              <p>Fill in <code>cate</code> to the mall <a href="form.html">form page</a>
              </p>
              <span class="section">Cate Info</span>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Cate</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select class="form-control" name="pid">
                    <option value="0">顶级分类</option>
                    @foreach($cates as $cate)
                        <option value="{{ $cate->id }}" @if($cate->id == $id) selected @endif>{{ $cate->cate }}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="name" class="form-control col-md-7 col-xs-12" name="cate" placeholder="Fill in the cate name" required="required" type="text">
                </div>
              </div>

              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                  <!-- <button type="submit" class="btn btn-primary">Cancel</button> -->
                  <button id="send" type="submit" class="btn btn-success">Submit</button>
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
    <script src="/admins/vendors/validator/validator.js"></script>
@endsection
