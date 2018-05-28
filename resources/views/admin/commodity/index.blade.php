@extends('layouts.admin')

@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2> Commodities<small>Lists</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <p class="text-muted font-13 m-b-30">
                Show the Commodities for users
                </p>

                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap homeusers" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>商品名称</th>
                            <th>商品分类</th>
                            <th>商品店铺</th>
                            <th>商品简介</th>
                            <th>所属公司</th>
                            <th>商品销量</th>
                            <th>商品点击量</th>
                            <th>商品详情</th>
                            <th>商品操作</th>
                        </tr>
                    </thead>
                    <tbody v-for="item in items">
                        @foreach($commodities as $commodity)
                            <tr>
                                <td>{{$commodity->id}}</td>
                                <td>{{$commodity->name}}</td>
                                <td>{{$commodity->cate_id}}</td>
                                <td>{{$commodity->shop->name}}</td>
                                <td>{{$commodity->desc}}</td>
                                <td>{{$commodity->company}}</td>
                                <td>{{$commodity->sale}}</td>
                                <td>{{$commodity->click_num}}</td>
                                <td>{{$commodity->detail}}</td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">管理标签</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">商品标签及其值</h4>
            </div>
            <div class="modal-body">


<table class="table table-striped">
 <tr>
     <th>标签</th>
     <th>标签值</th>
 </tr>
 <tr>
     <td>尺寸</td>
     <td>S,M,L,XL,XXL,XXXL</td>
 </tr>
 <tr>
     <td>颜色</td>
     <td>红色,蓝色,白色,黑色</td>
 </tr>
 <tr>
     <td colspan="2">
     <button type="button" name="button" class='btn btn-info btn-block'><i class='glyphicon glyphicon-plus'></i></button>
     </td>
 </tr>
</table>


            </div>

        </div>
    </div>
</div>
@endsection

@section('js')
<script type="text/javascript">
$('#exampleModal').on('show.bs.modal', function (event) {

})
</script>
@endsection
