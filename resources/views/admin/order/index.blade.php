@extends('layouts.admin')

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>Orders<small>Lists</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>

                  </li>
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <p class="text-muted font-13 m-b-30">
                  Show the order and address of user
                </p>

                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap homeusers" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>订单号</th>
                      <th>用户账户昵称</th>
                      <th>用户姓名</th>
                      <th>用户手机号</th>
                      <th>订单地址</th>
                      <th>订单金额</th>
                      <th>下单时间</th>
                      <th>订单详情</th>
                      <th>订单状态</th>
                    </tr>
                  </thead>
                  <tbody v-for="item in items">
                        @foreach($orders as $order )
                            <tr>
                                <td>{{$order['id']}}</td>
                                <td>{{$order['order_num']}}</td>
                                <td>{{App\User::findOrFail($order['uid'])['name']}}</td>
                                <td>{{App\Address::findOrFail($order['address_id'])['username']}}</td>
                                <td>{{App\Address::findOrFail($order['address_id'])['userphone']}}</td>
                                <td>{{getOrderAddressById($order['address_id'])}}</td>
                                <td>{{$order['total']}} 元</td>
                                <td>{{$order['updated_at']}}</td>
                                <td>
                                    <a href="#">查看订单</a>
                                </td>
                                <td>
                                    @if($order['status'] == 0)
                                        <button type="button" class="btn btn-round btn-danger btn-xs enter_order">未处理</button>
                                    @elseif($order['status']==1)
                                        <button type="button" class="btn btn-round btn-warning btn-xs enter_order">已发货</button>
                                    @else
                                        <button type="button" class="btn btn-round btn-info btn-xs enter_order">已收货</button>
                                    @endif
                                </td>
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
$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
    $('.enter_order').click(function(){
        var id = $($(this).parent().parent().children('td').get(0)).html();

        $.ajax({
            type:"post",
            url:'{{url("admin/order/check_status")}}',
            dataType: 'text',
            data:{'id':id},
            success:function(data){
                if(data=='info'){
                    $(this).attr('class','btn btn-round btn-info btn-xs enter_order');
                    $(this).html('已收货');
                }else if(data=='warning'){
                    $(this).attr('class','btn btn-round btn-warning btn-xs enter_order');
                    $(this).html('已发货');
                }else if(data=='danger'){
                    $(this).attr('class','btn btn-round btn-danger btn-xs enter_order');
                    $(this).html('未处理');
                }
            }.bind(this),
            error: function(xhr, type){
              // layer.msg('请完成填写');
            }
    });
})
</script>

@endsection
