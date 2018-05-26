@extends('layouts.admin')

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>Browse<small>AdminUsers</small></h2>
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
                <p class="text-muted font-13 m-b-30">
                  Show the information of background users
                </p>

                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Avatar</th>
                      <th>Role</th>
                      <th>Phone</th>
                      <th>QQ</th>
                      <th>Last-login</th>
                      <th>Ip</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($adminUsers as $adminUser)
                        <tr>
                            <td style="line-height:50px;">{{$adminUser->id}}</td>
                            <td style="line-height:50px;">{{$adminUser->name}}</td>
                            <td style="text-align:center"><img src="{{$adminUser->avatar}}" style="width:50px;height:50px;"></td>
                            <td style="line-height:50px;">{{$adminUser->role->r_name}}</td>
                            <td style="line-height:50px;">{{$adminUser->phone}}</td>
                            <td style="line-height:50px;">{{$adminUser->qq}}</td>
                            <td style="line-height:50px;">{{$adminUser->last_login}}</td>
                            <td style="line-height:50px;">{{$adminUser->ip}}</td>
                            <td style="line-height:50px;"><input type="checkbox" class="js-switch" @if($adminUser->status==1) checked @endif onchange="fun(this)" /></td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
@endsection

@section('js')
<script type="text/javascript">
    function fun(obj){
        var id = $(obj).parents('tr').find('td:eq(0)').html();
        $.ajax({
            url:"{{ action('Admin\AdminUserController@status') }}",
            data:{id:id},
            type:'get'
        });
    }
</script>
@endsection
