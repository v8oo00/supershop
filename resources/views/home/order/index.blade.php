@extends('layouts.home')

@section('css')
<link href="http://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<link href="http://cdn.bootcss.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">
<style media="screen">
.demo{
    padding: 2em 0;
    background: #fff;
}
a:hover,a:focus{
    text-decoration: none;
    outline: none;
}
#accordion:before{
    content: "";
    width: 1px;
    height: 80%;
    background: #550527;
    position: absolute;
    top: 20px;
    left: 24px;
    bottom: 20px;
}
#accordion .panel{
    border: none;
    border-radius: 0;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.15);
    margin: 0 0 12px 50px;
    position: relative;
}
#accordion .panel:before{
    content: "";
    width: 2px;
    height: 100%;
    background: linear-gradient(to bottom, #688e26 0%,#ff816a 100%);
    position: absolute;
    top: 0;
    left: -2px;
}
#accordion .panel-heading{
    padding: 0;
    background: #fff;
    position: relative;
}
#accordion .panel-heading:before{
    content: "";
    width: 15px;
    height: 15px;
    border-radius: 50px;
    background: #fff;
    border: 1px solid #550527;
    position: absolute;
    top: 50%;
    left: -48px;
    transform: translateY(-50%);
}
#accordion .panel-title a{
    display: block;
    padding: 15px 55px 15px 30px;
    font-size: 20px;
    font-weight: 600;
    color: #550527;
    border: none;
    margin: 0;
    position: relative;
}
#accordion .panel-title a:before,
#accordion .panel-title a.collapsed:before{
    content: "\f068";
    font-family: fontawesome;
    width: 25px;
    height: 25px;
    line-height: 25px;
    border-radius: 50%;
    font-size: 15px;
    font-weight: normal;
    color: #688e26;
    text-align: center;
    border: 1px solid #688e26;
    position: absolute;
    top: 50%;
    right: 25px;
    transform: translateY(-50%);
    transition: all 0.5s ease 0s;
}
#accordion .panel-title a.collapsed:before{ content: "\f067"; }
#accordion .panel-body{
    padding: 0 30px 15px;
    border: none;
    font-size: 14px;
    color: #305275;
    line-height: 28px;
}
.sel{
	background-color:#eee;
}
.add:hover{
    cursor:pointer;
}
</style>
@endsection
@section('content')
<div class="breadcrumb-area">
    <div class="container">
        <ol class="breadcrumb">
          <li><a href="{{action('HomeController@index')}}"><i class="fa fa-home"></i> Home</a></li>
          <li class="active">Order</li>
        </ol>
    </div>
</div>

<div class="container">
    @include('flash::message')
    <div class="row">
        <div class="col-md-9">
			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
				<div class="panel panel-default">
					<div class="panel-heading" role="tab" id="headingOne">
						<h4 class="panel-title">
							<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
								Select Address
							</a>
						</h4>
					</div>
					<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
						<div class="panel-body">
                            <table class="table">
                                <tr>
                                    <th>To Name</th>
                                    <th>Tel</th>
                                    <th>Address</th>
                                    <th>Street</th>
                                </tr>
                                @foreach($address as $addres)
                                <tr class="add" address="{{$addres->id}}">
                                    <td>{{$addres->username}}</td>
                                    <td>{{$addres->userphone}}</td>
                                    <td>{{$addres->province}},{{$addres->city}},{{$addres->county}}</td>
                                    <td>{{$addres->street}}</td>
                                </tr>
                                @endforeach
                            </table>
						</div>
					</div>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading" role="tab" id="headingTwo">
						<h4 class="panel-title">
							<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
								New Address
							</a>
						</h4>
					</div>
					<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
						<div class="panel-body">
                            <form action="{{action('AddressController@add')}}" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="uid" value="{{Auth::id()}}" />
								<div class="row">
									<div class="form-group">
										<div class="col-md-12">
											<label>To_name</label>
											<input type="text" name='username' class='form-control'>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="form-group">
										<div class="col-md-12">
											<label>To_Phone</label>
											<input type="tel" name='userphone' class='form-control'>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="form-group">
										<div class="col-md-12">
											<label>sheng</label>
											<select name="province" id="province" class="form-control"></select>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										<div class="col-md-12">
											<label>shi</label>
											<select name="city" id="city" class="form-control"></select>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										<div class="col-md-12">
											<label>xian</label>
											<select name="county" id="area" class="form-control"></select>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										<div class="col-md-12">
											<label>Jie Dao:</label>
											<textarea name='street' class="form-control"></textarea>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12" style="margin-top:10px;">
										<input type="submit" value="Submit" class="btn btn-primary pull-right push-bottom" data-loading-text="Loading...">
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading" role="tab" id="headingThree">
						<h4 class="panel-title">
							<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
								Shopping
							</a>
						</h4>
					</div>
					<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
						<div class="panel-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="product-thumbnail">Image</th>
                                        <th class="product-name">Product</th>
                                        <th class="product-remove">Sku</th>
                                        <th class="product-price">Price</th>
                                        <th class="product-quantity">Quantity</th>
                                        <th class="product-subtotal">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($carts as $cart)
                                    <tr class="ordera commodity{{$cart->id}}">
                                        <td class="product-thumbnail"><a href="{{action('CommodityController@product',$cart->commodities->id)}}"><img src="{{$cart->commodities->compictures->first()->image}}" style="height:50px;width:50px;" /></a></td>
                                        <td class="product-name" style="line-height:50px;"><a href="{{action('CommodityController@product',$cart->commodities->id)}}">{{$cart->commodities->name}}</a></td>
                                        <td class="product-remove" style="font-weight:bold;line-height:50px;">{{$cart->sku->s_value}}</td>
                                        <td class="product-price" style="line-height:50px;">
                                            @if($cart->commodities->activity_id == 0)
                                            <span style="font-weight:bold;font-size:15px;">$</span>
                                            <span class="amount">{{$cart->sku->price}}</span>
                                            @else
                                            <del style="color:red;">${{$cart->sku->price}}</del>
                                            <span style="font-weight:bold;font-size:15px;">$</span>
                                            <span class="amount">{{$cart->sku->price / $cart->commodities->activity->calculation}}</span>
                                            @endif
                                        </td>
                                        <td class="product-quantity" style="font-weight:bold;font-size:15px;line-height:50px;">
                                            {{$cart->num}}
                                        </td>
                                        <td class="product-subtotal" style="line-height:50px;">
                                            @if($cart->commodities->activity_id == 0)
                                                <span>${{$cart->sku->price * $cart->num}}</span>
                                            @else
                                                <span>${{$cart->sku->price / $cart->commodities->activity->calculation * $cart->num}}</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <h3>Totals：<span class="cart_total"></span></h3>
						</div>
					</div>
				</div>

                <div class="panel panel-default">
    				<form action="{{ action('OrderController@add') }}" method='post'>
                        {{ csrf_field() }}
    					<input type="hidden" name='address_id' value=''>
    					<input type="hidden" name="total" value=''>
    					<input type="submit" value="Place Order" class="btn btn-lg btn-primary push-top"  @if($carts->count(0) <= 0) disabled @endif>
    				</form>
                </div>

			</div>
		</div>

        <div class="col-md-3">
			<div class="cart_totals">
				<h2>Cart Totals</h2>
				<table>
					<tbody>
						<tr class="cart-subtotal">
							<th>Subtotal</th>
							<td><span class="amount cart_total"></span></td>
						</tr>
						<tr class="order-total">
							<th>Total</th>
							<td>
								<strong><span class="amount cart_total"></span></strong>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
    </div>
</div>
@endsection

@section('js')
<script type="text/javascript">
$('.panel-heading').click(function(){
    if($(this).find('.panel-title').find('a:eq(0)').attr('aria-expanded') == 'true'){
        return false;
    }
});

//判断地址
if({{Auth::user()->address_id}} != 0){

	$('.add').each(function(){
		if($(this).attr('address') == {{Auth::user()->address_id}}){
			$(this).addClass('sel');
		}
	})
	$("input[name='address_id']").val({{Auth::user()->address_id}});
}else{
	$('.add:eq(0)').addClass('sel');
	$("input[name='address_id']").val($('.add:eq(0)').attr('address'));
}

new PCAS("province","city","county","请选择省份","请选择城市","请选择地区");

//选择地址
$('.add').click(function(){
	$(this).siblings().removeClass('sel');
	$(this).addClass('sel');

	//修改form中的address_id的值
	$("input[name='address_id']").val($(this).attr('address'));

});

order_count();
</script>

@endsection
