@extends('layouts.home')

@section('css')
@endsection

@section('content')
<div class="container" style='margin-top:50px;'>
    <div class="row" style='background-color:#fff;margin-bottom:50px;padding-bottom:20px;'>
        <div class="col-md-8">
            <div class="col-md-12" style='margin-top:20px;'>
                <div class="col-md-4" style='text-align:center;'>
                    <img src="{{$shop->avatar}}" alt="" class='img-circle img-thumbnail'>
                </div>
            </div>
            <div class="col-md-12" style='margin-top:10px;'>
                <div class="col-md-2" style='padding-left:30px;'>
                    <h5>店铺名称</h5>
                </div>
                <div class="col-md-10" style='padding-left:30px;'>
                    <h5>{{$shop->name}}</h5>
                </div>
            </div>
            <div class="col-md-12" style='margin-top:10px;'>
                <div class="col-md-2" style='padding-left:30px;'>
                    <h5>店铺账户</h5>
                </div>
                <div class="col-md-10" style='padding-left:30px;'>
                    <h5>{{$shop->user->name}}</h5>
                </div>
            </div>
            <div class="col-md-12" style='margin-top:10px;'>
                <div class="col-md-2" style='padding-left:30px;'>
                    <h5>店铺描述</h5>
                </div>
                <div class="col-md-10" style='padding-left:30px;'>
                    <h5>{{$shop->desc}}</h5>
                </div>
            </div>
            <div class="col-md-12" style='margin-top:10px;'>
                <div class="col-md-2" style='padding-left:30px;'>
                    <h5>店铺地址</h5>
                </div>
                <div class="col-md-10" style='padding-left:30px;'>
                    <h5>{{$shop->address}}</h5>
                </div>
            </div>
            <div class="col-md-12" style='margin-top:10px;'>
                <div class="col-md-2" style='padding-left:30px;'>
                    <h5>店铺电话</h5>
                </div>
                <div class="col-md-10" style='padding-left:30px;'>
                    <h5>{{$shop->phone}}</h5>
                </div>
            </div>

            <div class="col-md-12" style='margin-top:10px;'>
                <div class="col-md-2" style='padding-left:30px;'>
                    <h5>店铺状态</h5>
                </div>
                <div class="col-md-10" style='padding-left:30px;'>
                    @if($shop->status == 0)
                        <h5 style='color:red;'>审核中...</h5>
                    @elseif($shop->status == 1)
                        <h5 style='color:black;'>运营中...</h5>
                    @elseif($shop->status == 2)
                        <h5 style='color:red;'>禁用中...</h5>
                    @endif
                </div>
            </div>

        </div>
        <div class="col-md-4">
            <div class="col-md-12" style='margin-top:20px; border:1px solid #ccc;padding-bottom:20px;'>
                <div class="col-md-12" style='margin-top:15px;'>
                    <h5><i class='fa fa-play' style='float:left;height:100%;'></i><span style='margin-left:10px;float:left;height:100%;width:90%;'>欢迎加入 <a>SuperShop</a> 网络电商 共同发展这一美足事业</span></h5>
                </div>

                <div class="col-md-12" style='margin-top:15px;'>
                    <h5><i class='fa fa-play' style='float:left;height:100%;'></i><span style='margin-left:10px;float:left;height:100%;width:90%;'>现值我公司业务扩充之机，欢迎加入我们的团队，公司将提供具有竞争力的薪酬福利和广阔的个人发展空间</span></h5>
                </div>

                <div class="col-md-12" style='margin-top:15px;'>
                    <h5><i class='fa fa-play' style='float:left;height:100%;'></i><span style='margin-left:10px;float:left;height:100%;width:90%;'>我们有强大的工作人员以及售后服务 如果你有什么问题 请 <a href='#'>联系客服</a></span></h5>
                </div>

                <div class="col-md-12" style='margin-top:15px;'>
                    <h5><i class='fa fa-play' style='float:left;height:100%;'></i><span style='margin-left:10px;float:left;height:100%;width:90%;'>加入本网请自觉遵守相关规定 一切规定按照商家协议 如有违反 追究个人法律责任</span></h5>
                </div>

                <div class="col-md-12" style='margin-top:30px;text-align:center;'>
                    <a href='/' class='btn btn-warning'>返回首页</a>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@section('js')

@endsection
