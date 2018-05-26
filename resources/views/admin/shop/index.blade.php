@extends('layouts.admin')

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>Browse<small>Shops</small></h2>
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
                  Show all the shops in the mall
                </p>

                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Avatar</th>
                      <th>User_Name</th>
                      <th>Shop_Name</th>
                      <th>Phone</th>
                      <th>desc</th>
                      <th>Address</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($shops as $shop)
                        <tr>
                            <td style="line-height:50px;">{{ $shop->id }}</td>
                            <td style="text-align:center;"><img src="{{ $shop->avatar }}" style="width:50px;height:50pxl;border-radius:50px;"></td>
                            <td style="line-height:50px;">{{ $shop->user->name }}</td>
                            <td style="line-height:50px;">{{ $shop->name }}</td>
                            <td style="line-height:50px;">{{ $shop->phone }}</td>
                            <td style="line-height:50px;">{{ $shop->desc }}</td>
                            <td style="line-height:50px;">{{ $shop->address }}</td>
                            <td style="padding-top:20px;"><input type="checkbox" class="js-switch" @if($shop->status==1) checked @endif onchange="fun(this)" /></td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
@endsection

<script type="text/javascript">
    function fun(obj){
        var id = $(obj).parents('tr').find('td:eq(0)').html();
        $.ajax({
            url:"{{ action('Admin\ShopController@status') }}",
            data:{id:id},
            type:'get'
        });
    }
</script>
