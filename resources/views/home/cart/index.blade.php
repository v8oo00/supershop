@extends('layouts.home')

@section('content')
<!-- mobile-menu-end -->
<!-- mainmenu-area-end -->
<!-- breadcrumb start -->
<div class="breadcrumb-area">
    <div class="container">
        <ol class="breadcrumb">
          <li><a href="{{action('HomeController@index')}}"><i class="fa fa-home"></i> Home</a></li>
          <li class="active">Cart</li>
        </ol>
    </div>
</div>
<!-- breadcrumb end -->
<!-- cart-main-area start -->
<div class="cart-main-area pt-0">
    <div class="container">
        <div class="row">
            @if($carts->count()>0)
            <div class="col-md-12 col-sm-12 col-xs-12">
                <form action="#">
                    <div class="table-content table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">Image</th>
                                    <th class="product-name">Product</th>
                                    <th class="product-sku">Sku</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-subtotal">Total</th>
                                    <th class="product-remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($carts as $cart)
                                <tr class="a commodity{{$cart->id}}">
                                    <td class="product-thumbnail"><a href="{{action('CommodityController@product',$cart->commodities->id)}}"><img src="{{$cart->commodities->compictures->first()->image}}" alt="" /></a></td>
                                    <td class="product-name"><a href="{{action('CommodityController@product',$cart->commodities->id)}}">{{$cart->commodities->name}}</a></td>
                                    <td class="product-sku" style="font-weight:bold;">{{$cart->sku->s_value}}</td>
                                    <td class="product-price">
                                        @if($cart->commodities->activity_id == 0)
                                        <span style="font-weight:bold;font-size:15px;">$</span>
                                        <span class="amount">{{$cart->sku->price}}</span>
                                        @elseif($cart->commodities->activity_id == 1)
                                        <del style="color:red;">${{$cart->sku->price}}</del>
                                        <span style="font-weight:bold;font-size:15px;">$</span>
                                        <span class="amount">{{$cart->sku->price * 0.5}}</span>
                                        @elseif($cart->commodities->activity_id == 2)
                                        <del style="color:red;">${{$cart->sku->price}}</del>
                                        <span style="font-weight:bold;font-size:15px;">$</span>
                                        <span class="amount">{{$cart->sku->price * 0.4}}</span>
                                        @endif
                                    </td>
                                    <td class="product-quantity">
                                        <div class="inpT" cart_id="{{$cart->id}}" style="overflow:hidden;width:140px;height:30px;border: 1px solid #CCC;margin-left:10px;">
                                            <div class="reduce" onselectstart="return false;" style="-moz-user-select:none;cursor:pointer;text-align:center;width:30px;height:30px;line-height:30px;border-right-width: 1px;border-right-style: solid;border-right-color: #CCC;float:left">-</div>
                                            <input class="value_shop" value="{{$cart->num}}" style="background-color:white;border-style: none; border-width: 0px; width: 60px; text-align: center; outline: none; vertical-align: middle;height:30px;line-height:30px;" readonly>
                                            <div class="plus" onselectstart="return false;" sku_stock="{{$cart->sku->stock}}" style="-moz-user-select:none;cursor:pointer;text-align:center;width:30px;height:30px;line-height:30px;border-left-width: 1px;border-left-style: solid;border-left-color: #CCC;float:right">+</div>
                                        </div>
                                    </td>
                                    <td class="product-subtotal">
                                        @if($cart->commodities->activity_id == 0)
                                            <span>${{$cart->sku->price * $cart->num}}</span>
                                        @elseif($cart->commodities->activity_id == 1)
                                            <span>${{$cart->sku->price * 0.5 * $cart->num}}</span>
                                        @elseif($cart->commodities->activity_id == 1)
                                            <span>${{$cart->sku->price * 0.4 * $cart->num}}</span>
                                        @endif
                                    </td>
                                    <td class="product-remove"><a class="removeCart" href="javascript:" cart_id="{{$cart->id}}"><i class="fa fa-times"></i></a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="row" style="margin-bottom:20px;">
                        <div class="col-md-9 col-sm-7 col-xs-12">
                            <h2>Totals：<span id="cart_total"></span></h2>
                        </div>
                        <div class="col-md-3 col-sm-5 col-xs-12">
                            <div class="wc-proceed-to-checkout" style="margin-top:-30px;text-align:right;">
                                <a href="{{action('OrderController@index')}}">Proceed to Checkout</a>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
            @else
            <div class="col-md-12 col-sm-12 col-xs-12" style="text-align:center;font-size:50px;height:300px;line-height:300px;">
                目前购物车中还没有商品
            </div>
            @endif
        </div>
    </div>
</div>

@endsection

@section('js')
<script type="text/javascript">

//小计和总计
cart_count();

//进行数量的增加
$('.plus').click(function(){
    var cart_id = $(this).parent().attr('cart_id');
    var stock = $(this).attr('sku_stock');
    if(parseInt($(this).prev().val()) < stock){
        $(this).prev().val(parseInt($(this).prev().val())+1);
        updateCart(cart_id,'+');
        $('.small_num_'+cart_id).html(parseInt($('.small_num_'+cart_id).html())+1);
        small_count();
        cart_count();
    }else{
        layer.msg('目前已经超过商品的库存');
    }

    return false;
});

//进行数量的减少
$('.reduce').click(function(){
    var cart_id = $(this).parent().attr('cart_id');
    if(parseInt($(this).next().val()) > 1){
        $(this).next().val(parseInt($(this).next().val())-1);
        updateCart(cart_id,'-');
        $('.small_num_'+cart_id).html(parseInt($('.small_num_'+cart_id).html())-1);
        small_count();
        cart_count();
    }else{
        layer.msg('最少购买一件');
    }

    return false;
});

//进行增减时发送ajax进行购物车数据表的加减
function updateCart(cart_id,flag){
    $.ajax({
        url:"{{action('CartController@update')}}",
        type:'post',
        data:{id:cart_id,flag:flag},
    });
}

//删除购物车数据
$('.removeCart').click(function(){
    var cart_id = $(this).attr('cart_id');
    $.ajax({
        url:"{{action('CartController@del')}}",
        type:'post',
        data:{id:cart_id},
        success:function(mes){
            if(mes=='ok'){
                $('#count_item').html(parseInt($('#count_item').html()) - 1);
                $('.commodity'+cart_id).remove();
                cart_count();
                small_count();
                layer.msg('清除购物车成功');
            }
        }
    });
});
</script>
@endsection
