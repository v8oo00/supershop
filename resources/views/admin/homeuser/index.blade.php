@extends('layouts.admin')

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>Browse<small>HomeUsers</small></h2>
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
                  Show the information of foreground users
                </p>

                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap homeusers" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Avatar</th>
                      <th>Sex</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>QQ</th>
                      <th>Money</th>
                      <th style="text-align:center">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($homeUsers as $homeUser)
                        <tr>
                            <td style="line-height:50px;">{{ $homeUser->id }}</td>
                            <td style="line-height:50px;">{{ $homeUser->name }}</td>
                            <td style="text-align:center"><img src="{{ $homeUser->avatar }}" style="width:50px;height:50px;"></td>
                            <td style="line-height:50px;">@if($homeUser->sex == 0)女@else男@endif</td>
                            <td style="line-height:50px;">{{ $homeUser->email }}</td>
                            <td style="line-height:50px;">{{ $homeUser->phone }}</td>
                            <td style="line-height:50px;">{{ $homeUser->qq }}</td>
                            <td style="line-height:50px;">{{ $homeUser->money }}</td>
                            <td style="line-height:50px;text-align:center"><input type="checkbox" class="js-switch" @if($homeUser->status==1) checked @endif onchange="fun(this)" /></td>
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
            url:"{{ action('Admin\HomeUserController@status') }}",
            data:{id:id},
            type:'get'
        });
    }
</script>

@endsection
