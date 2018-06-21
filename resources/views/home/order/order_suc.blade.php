@extends('layouts.home')

@section('content')
<div class="breadcrumb-area">
    <div class="container">
        <ol class="breadcrumb">
          <li><a href="{{action('HomeController@index')}}"><i class="fa fa-home"></i> Home</a></li>
          <li class="active">Order_suc</li>
        </ol>
    </div>
</div>

    <br>
	<div class='container'>
		<div class="advertising-grids" style="margin-bottom:30px;">
			<div class="col-md-5 advertising-left">
				<img src="/homes/img/order_suc.png" title="advertising" style="width:297px;">
			</div>
			<div class="col-md-5">
				<h2>您的订单已提交成功！</h2>
				<p style='color:#9E9898;line-height:1.8em;font-family:"open_sanslight";margin-top: 50px;'>金额：{{$order->total}} ￥</p>
				<p style='color:#9E9898;line-height:1.8em;font-family:"open_sanslight";'>订单：{{$order->order_num}}</p>
				<p style='color:#9E9898;line-height:1.8em;font-family:"open_sanslight";margin-bottom: 30px;'>配送：{{$address->province}} {{$address->city}} {{$address->county}} {{$address->street}} {{$address->username}} {{$address->userphone}}</p>
				<a href="{{action('UserController@index')}}">前往个人中心</a>
				<a href="{{action('HomeController@index')}}" style="margin-left:20px;">返回首页</a>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
@endsection
