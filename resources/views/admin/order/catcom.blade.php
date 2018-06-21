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
                      <th>分类</th>
                      <th>图片</th>
                      <th>商品名称</th>
                      <th>商品参数</th>
                      <th>价格</th>
                    </tr>
                  </thead>
                  <tbody v-for="item in items">
                        @foreach($order_details as $detail )
                            <tr>
                                <td>{{getSku($detail->sku_id)->commodity->cate->cate}}</td>
                                <td>
                                    <img src="{{getSku($detail->sku_id)->commodity->compictures->first()->image}}" width='40px' alt="">
                                </td>
                                <td>{{getSku($detail->sku_id)->commodity->name}} × {{$detail->num}}</td>
                                <td>{{getSku($detail->sku_id)->s_value}}</td>
                                <td>
                                        @if(getSku($detail->sku_id)->commodity->activity_id==0)
                                            {{getSku($detail->sku_id)->price}}$ × {{$detail->num}} = {{getSku($detail->sku_id)->price * $detail->num}}$
                                        @else
                                            {{getSku($detail->sku_id)->price / getSku($detail->sku_id)->commodity->activity->calculation}}$ × {{$detail->num}} = {{getSku($detail->sku_id)->price / getSku($detail->sku_id)->commodity->activity->calculation * $detail->num}}$
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

</script>

@endsection
