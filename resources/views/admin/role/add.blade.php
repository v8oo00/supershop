@extends('layouts.admin')

@section('content')
<div class="">
           <div class="clearfix"></div>
           <div class="row">
             <div class="col-md-12 col-sm-12 col-xs-12">
               <div class="x_panel">
                 <div class="x_title">
                   <h2>Role<small>Create</small></h2>

                   <div class="clearfix"></div>
                 </div>
                 <div class="x_content">

                {!! Form::open(['url' => 'admin/role/store','method' => 'POST','class'=>'form-horizontal form-label-left','novalidate'=>'']) !!}
                     <p>角色定义是指 不同<code>角色</code>且<code>权限</code>不同
                     </p>
                     <span class="section">Create Form</span>

                     <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Role Name <span class="required">*</span>
                       </label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <input id="r_name" class="form-control col-md-7 col-xs-12" name="r_name" placeholder="Please Down Role's Name" required="required" type="text">
                       </div>
                     </div>

                     <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Textarea <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="textarea" required="required" name="desc" class="form-control col-md-7 col-xs-12" style="resize: none;"></textarea>
                        </div>
                      </div>

                     <div class="ln_solid"></div>
                     <div class="form-group">
                       <div class="col-md-6 col-md-offset-3">
                         <!-- <button type="submit" class="btn btn-primary">Cancel</button> -->
                         <button id="send" type="submit" class="btn btn-success">Submit</button>
                       </div>
                     </div>
                   </form>
                   {!! Form::close() !!}
                 </div>
               </div>
             </div>
           </div>
         </div>
@endsection

@section('js')
<!-- validator -->
<script src="/admins/vendors/validator/validator.js"></script>
@endsection
