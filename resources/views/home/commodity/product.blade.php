@extends('layouts.home')

@section('css')
<link rel="stylesheet" href="/homes/com/css/style.css">
<link rel="stylesheet" href="/homes/com/css/jstarbox.css">
<link rel="stylesheet" href="/homes/com/css/etalage.css">
@endsection

@section('content')

<div class="breadcrumb-area">
	<div class="container">
		<ol class="breadcrumb">
		  <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
		  <li class="active">Product</li>
		</ol>
	</div>
</div>

<div class="shop-area">
    <div class="container">
        <div class="row" style="margin-top:20px;">
            <div class="content details-page">
                <div class="product-details" style="width:100%;">
                    <div class="wrap" style="width:100%;">
                        <div class="details-left">
                            <div class="details-left-slider">
                                <ul id="etalage">
                                    @foreach($commodity->picture as $picture)
                                    <li>
                                        <img class="etalage_thumb_image" src="{{$picture->image}}" />
                                        <img class="etalage_source_image" src="{{$picture->image}}" />
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <!-- 商品价格 sku 描述等等... -->
                            <div class="details-left-info">
                                <div class="details-right-head">
                                    <h1>{{$commodity->name}}</h1>
                                    <ul class="pro-rate">
                                        <li><a class="product-rate" href="#"> <label> </label></a> <span> </span></li>
                                        <li><a href="#">0 Review(s) Add Review</a></li>
                                    </ul>
                                    <p class="product-detail-info">{{$commodity->desc}}</p>
                                    @if($commodity->activity_id != 0)
                                    <a class="learn-more" href="#" style='background-color:#FAFAFA;'><h3 style='margin:10px 10px 10px;'>
                                            活动 : <span style='color:red;'>{{App\Activity::findOrFail($commodity->activity_id)->name}}</span>
                                            <br>
                                            <br>
                                            规则 : <span style='color:red;'>{{App\Activity::findOrFail($commodity->activity_id)->rule}}</span>
                                    </h3></a>
                                    @endif
                                    <div class="product-more-details" style="margin-top:10px;">
                                        <ul class="price-avl">
                                            <li class="price">
                                                @if($commodity->activity_id !=0)
                                                <span id='yuanjia'>${{$commodity->price}}</span>
                                                @endif
                                                <label id='zhekou'>$@if($commodity->activity_id ==0){{$commodity->price}}
                                                @elseif($commodity->activity_id ==1){{$commodity->price*0.5}}
                                                @endif
                                            </label></li>
                                            <div class="clear"> </div>
                                        </ul>
                                        @foreach($tags as $tag)
                                        <ul class="product-colors">
                                            <h3 style="margin:0px 0px 0px;">{{$tag->name}}:</h3>
                                            @foreach(explode_kvalue($tag->tag_val->value) as $tag_val)
                                            <li><a href="javascript:" class='btn btn-default btn-xs check_tag' @if(in_array($tag_val,explode_kvalue($commodity->sku_value))) che_sku_ok="ok" @endif style="@if(in_array($tag_val,explode_kvalue($commodity->sku_value))) border-color:#f4a137;color:#f4a137; @endif">{{$tag_val}}</a></li>
                                            @endforeach
                                            <div class="clear"></div>
                                        </ul>
                                        @endforeach
                                        <div class="col-md-12" style="margin-top:20px;padding:0px;">
                                            <div class="col-md-1" style="margin:0px;padding:0px;">
                                                <span style='display:block;height:30px;line-height:30px;font-weight:bold;color:#000;'>数量:</span>
                                            </div>
                                            <div class="col-md-11" style="margin:0px;padding:0px;">
                                                <div id="inpT" style="overflow:hidden;width:153px;height:30px;border: 1px solid #CCC;">
                                                    <div id="reduce" onselectstart="return false;" style="-moz-user-select:none;cursor:pointer;text-align:center;width:30px;height:30px;line-height:30px;border-right-width: 1px;border-right-style: solid;border-right-color: #CCC;float:left">-</div>
                                                    <input class="sdddq " id="value_shop" value="1" style="background-color:white;border-style: none; border-width: 0px; width: 86px; text-align: center; outline: none; vertical-align: middle;height:30px;line-height:30px;" readonly>
                                                    <div id="plus" onselectstart="return false;" style="-moz-user-select:none;cursor:pointer;text-align:center;width:30px;height:30px;line-height:30px;border-left-width: 1px;border-left-style: solid;border-left-color: #CCC;float:right">+</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12" style="margin-top:15px;margin-bottom:10px;padding:0px;">
                                            <div class="col-md-1" style="margin:0px;padding:0px;">
                                                <span style='display:block;height:30px;line-height:30px;font-weight:bold;color:#000;'>库存:</span>
                                            </div>
                                            <div class="col-md-11" style="margin:0px;padding:0px;">
                                                <span id='sku_num' num="{{$commodity->stock}}" sku_id="{{$commodity->sku_id}}" style='display:block;height:30px;line-height:30px;font-weight:bold;color:#555;'>{{$commodity->stock}}</span>
                                            </div>
                                        </div>
                                        <button type="button" id='add_carts' class='btn btn-default btn-lg'  name="button" style='background-color:#FF6A6A;border:1px solid #FF6A6A;color:white;padding-right:20px;line-height:60px;height:60px;font-size:18px;border-radius:3%;'> <span style='margin-left:10px;margin-right:10px;' class='glyphicon glyphicon-shopping-cart'></span> 添加到购物车</button>
                                    </div>
                                </div>
                            </div>
                            <div class="clear"> </div>
                        </div>
                        <div class="details-right">
                            <div class="column mt-55" style='margin-top:0px;'>
                                <h2 class="title-block">Catalog</h2>
                                <div class="sidebar-widget">
                                    <h3 class="sidebar-title">Availability</h3>
                                    <ul class="sidebar-menu">
                                        <li><a href="#">In stock <span>(13)</span></a></li>
                                        <li><a href="#">In stock <span>(13)</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>

                    <!-- 详情、评论 栏目 -->
                    <div class="product-reviwes">
                        <div class="wrap" style="width:100%;">
                            <div id="verticalTab">
                                <ul class="resp-tabs-list">
                                    <li>Description</li>
                                    <li>Product tags</li>
                                    <li>Product reviews</li>
                                </ul>
                                <div class="resp-tabs-container vertical-tabs">
                                    <div>
                                        <h3> Details</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nibh urna, euismod ut ornare non, volutpat vel tortor. Integer laoreet placerat suscipit. Sed sodales scelerisque commodo. Nam porta cursus lectus.Proin nunc erat, gravida a facilisis quis, ornare id lectus. Proin consectetur nibh quis urna gravida mollis.</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nibh urna, euismod ut ornare non, volutpat vel tortor</p>
                                    </div>
                                    <div>
                                        <h3>Product Tags</h3>
                                        <h4>Add Your Tags:</h4>
                                        <form>
                                            <input type="text"> <input type="submit" value="ADD TAGS" />
                                            <span>Use spaces to separate tags. Use single quotes (') for phrases.</span>
                                        </form>
                                    </div>
                                    <div>
                                        <h3>Customer Reviews</h3>
                                        <p>There are no customer reviews yet.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="clear"> </div>
                        </div>
                        <div class="clear"> </div>
                    </div>
                </div>
            </div>
            <div class="clear"> </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="/homes/com/js/jquery.etalage.min.js"></script>
<!-- Include the Etalage files -->
<script>
    jQuery(document).ready(function($){

        $('#etalage').etalage({
            thumb_image_width: 300,
            thumb_image_height: 400,
            source_image_width: 900,
            source_image_height: 1200,
            show_hint: true,
            click_callback: function(image_anchor, instance_id){

            }
        });
        // This is for the dropdown list example:
        $('.dropdownlist').change(function(){
            etalage_show( $(this).find('option:selected').attr('class') );
        });

});
</script>

<script src="/homes/com/js/jstarbox.js"></script>
<!-- <link rel="stylesheet" href="/css/jstarbox.css" type="text/css" media="screen" charset="utf-8" /> -->
<script type="text/javascript">
    jQuery(function() {
        jQuery('.starbox').each(function() {
            var starbox = jQuery(this);
            starbox.starbox({
                average: starbox.attr('data-start-value'),
                changeable: starbox.hasClass('unchangeable') ? false : starbox.hasClass('clickonce') ? 'once' : true,
                ghosting: starbox.hasClass('ghosting'),
                autoUpdateAverage: starbox.hasClass('autoupdate'),
                buttons: starbox.hasClass('smooth') ? false : starbox.attr('data-button-count') || 5,
                stars: starbox.attr('data-star-count') || 5
            }).bind('starbox-value-changed', function(event, value) {
                if(starbox.hasClass('random')) {
                    var val = Math.random();
                    starbox.next().text(' '+val);
                    return val;
                }
            })
        });
    });
</script>

<script src="/homes/com/js/easyResponsiveTabs.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
         $('#horizontalTab').easyResponsiveTabs({
                type: 'default', //Types: default, vertical, accordion
                width: 'auto', //auto or any width like 600px
                fit: true,   // 100% fit in a container
                closed: 'accordion', // Start closed if in accordion view
                activate: function(event) { // Callback function if tab is switched
                var $tab = $(this);
                var $info = $('#tabInfo');
                var $name = $('span', $info);
                    $name.text($tab.text());
                    $info.show();
                }
            });

         $('#verticalTab').easyResponsiveTabs({
                type: 'vertical',
                width: 'auto',
                fit: true
             });
     });
</script>

<script type="text/javascript">
$(function(){
    $('.check_tag').each(function(){
        // console.log($(this));
        $(this).click(function(){

            $(this).parent().siblings().find('.check_tag').css({'border-color':'#adadad','color':'#333'}).removeAttr('che_sku_ok');
            $(this).css({'border-color':'#f4a137','color':'#f4a137'}).attr('che_sku_ok','ok');

            var click_btn = '';
			$('.check_tag[che_sku_ok=ok]').each(function(){
				click_btn += ','+$(this).html();
			});

            var good_id = {{$commodity->id}};

            $.ajax({
					url:'/commodity/sku',
					type:'post',
                    dateType:'json',
					data:{skuid:click_btn,good_id:good_id},
					success:function(mes){
                        // console.log(mes);
                        if(mes == 'no'){
                            $('#sku_num').html(0);
                            $('#sku_num').attr('num',0);
                            $('#value_shop').val(0);
                            $('#add_carts').attr('disabled','disabled');
                            layer.msg('暂无库存');
                        }else{
                            $('#add_carts').removeAttr('disabled');
                            eval('var obj = '+mes+';');
                            var id = $(obj).attr('id');
							var price = $(obj).attr('price');
							var num = $(obj).attr('num');
							var stock = $(obj).attr('stock');
                            $('#sku_num').html(stock);
                            $('#sku_num').attr('num',stock);
                            $('#value_shop').val(1);
                            $('#sku_num').attr('sku_id',id);

                            @if($commodity->activity_id !=0)
                                $('#yuanjia').html('$ '+price);
                                @if($commodity->activity_id ==0)
                                    $('#zhekou').html('$ '+price)
                                @elseif($commodity->activity_id ==1)
                                    $('#zhekou').html('$ '+parseInt(price)/2)
                                @endif
                            @else
                                $('#zhekou').html('$ '+price)
                            @endif

                            // console.log(price);

                        }
					}
				});

        });
    });


    //添加购物车
    $('#add_carts').click(function(){
		@if(Auth::check() && Auth::user())
			var c_id = {{ $commodity->id }};
			var sku_id = $('#sku_num').attr('sku_id');
			var num = $('#value_shop').val();
			$.ajax({
				url:"{{ action('CartController@add') }}",
				type:'post',
				data:{uid:{{Auth::id()}},c_id:c_id,sku_id:sku_id,num:num},
				success:function(mes){
					if(mes == 'ok'){

						//获取购物车数据并同步到小购物车中
						$.ajax({
							url:"{{action('CommodityController@cart_data')}}",
							type:"get",
							success:function(mes){
								add_small_cart(mes);
							}
						});

						layer.msg('添加购物车成功');
					}else{
						layer.msg('添加购物车失败');
					}
				}
			});
		@else
			layer.msg('请先进行登录');
		@endif

    });

	//同步到小购物车中
	function add_small_cart(mes){
		//先把小购物车中的数据全部删除
		$('.small_cart').remove();
		$('#count_item').html(mes.length);
		for(var i in mes){
			//如果没有活动
			if(mes[i]['commodities']['activity_id'] == 0){
				$(`<li class="small_cart commodity${mes[i]['id']}">
					<a class="product-image" href="/commodity/${mes[i]['commodities']['id']}">
						<img alt="" src="${mes[i]['pic']}">
					</a>
					<div class="product-details">
						<p class="cartproduct-name">
							<a href="/commodity/${mes[i]['commodities']['id']}">${mes[i]['commodities']['name']}</a>
						</p>
						<strong class="qty">qty:<span class="small_num">${mes[i]['num']}</span></strong>
						<span class="sig-price small_price">
							<span style="color:green">$</span>
							<span class="amount" style="color:green;">${mes[i]['sku']['price']}</span>
						</span>
						<span class="small_total">
							total:<span class="small_cart_total" style="fonst-size:20px;color:blue;"></span>
						</span>
					</div>
					<div class="pro-action">
						<a class="btn-remove small_remove_cart" href="javascript:" cart_id="${mes[i]['id']}">remove</a>
					</div>
				</li>`).appendTo($('#small_cart_data'));
			}else if(mes[i]['commodities']['activity_id'] == 1){ //活动一的商品
				$(`<li class="small_cart commodity${mes[i]['id']}">
					<a class="product-image" href="/commodity/${mes[i]['commodities']['id']}">
						<img alt="" src="${mes[i]['pic']}">
					</a>
					<div class="product-details">
						<p class="cartproduct-name">
							<a href="/commodity/${mes[i]['commodities']['id']}">${mes[i]['commodities']['name']}</a>
						</p>
						<strong class="qty">qty:<span class="small_num">${mes[i]['num']}</span></strong>
						<span class="sig-price small_price">
							<del style="color:red;">${mes[i]['sku']['price']}</del>
							<span style="color:green;">$</span>
							<span class="amount" style="color:green;">${mes[i]['sku']['price'] * 0.5}</span>
						</span>
						<span class="small_total">
							total:<span class="small_cart_total" style="fonst-size:20px;color:blue;"></span>
						</span>
					</div>
					<div class="pro-action">
						<a class="btn-remove small_remove_cart" href="javascript:" cart_id="${mes[i]['id']}">remove</a>
					</div>
				</li>`).appendTo($('#small_cart_data'));
			}else if(mes[i]['commodities']['activity_id'] == 1){ //活动二的商品
				$(`<li class="small_cart commodity${mes[i]['id']}">
					<a class="product-image" href="/commodity/${mes[i]['commodities']['id']}">
						<img alt="" src="${mes[i]['pic']}">
					</a>
					<div class="product-details">
						<p class="cartproduct-name">
							<a href="/commodity/${mes[i]['commodities']['id']}">${mes[i]['commodities']['name']}</a>
						</p>
						<strong class="qty">qty:<span class="small_num">${mes[i]['num']}</span></strong>
						<span class="sig-price small_price">
							<del style="color:red;">${mes[i]['sku']['price']}</del>
							<span style="color:green;">$</span>
							<span class="amount" style="color:green;">${mes[i]['sku']['price'] * 0.4}</span>
						</span>
						<span class="small_total">
							total:<span class="small_cart_total" style="fonst-size:20px;color:blue;"></span>
						</span>
					</div>
					<div class="pro-action">
						<a class="btn-remove small_remove_cart" href="javascript:" cart_id="${mes[i]['id']}">remove</a>
					</div>
				</li>`).appendTo($('#small_cart_data'));
			}

		}

		del_small_cart();
		small_count();
	}

    // 数量加减
    $('#plus').click(function(){
		if($('#value_shop').val() == ''){
			$('#value_shop').val('1')
		}else{
			if($('#value_shop').val() == $('#sku_num').attr('num')){
				$('#value_shop').val($('#sku_num').attr('num'))
                layer.msg('超过库存');
			}else{
				$('#value_shop').val(parseInt($('#value_shop').val())+1);
			}
		}
		return false;
	});

	$('#reduce').click(function(){
		if($('#value_shop').val() == ''){
			$('#value_shop').val('1')
		}else{
			if(parseInt($('#value_shop').val()) == 1){
				$('#value_shop').val('1')

			}else{
				$('#value_shop').val(parseInt($('#value_shop').val())-1);
			}
		}
		return false;
	});
})
</script>
@endsection
