@extends('layouts.home')

@section('css')
<link rel="stylesheet" href="/homes/com/css/style.css">
<link rel="stylesheet" href="/homes/com/css/jstarbox.css">
<link rel="stylesheet" href="/homes/com/css/etalage.css">
<style>
.product-my>.product-icon-left::before {
	background: transparent  none repeat scroll 0 0;
	content: "";
	height: 1px;
	position: absolute;
	top: -12px;
	width: 60px;
}
</style>
<link href="/homes/upload_com/jquery.filer.css" type="text/css" rel="stylesheet" />
<link href="/homes/upload_com/jquery.filer-dragdropbox-theme.css" type="text/css" rel="stylesheet" />
<link rel="stylesheet"  href="/homes/zoom/css/zoom.css" media="all" />
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

<div class="shop-area" style='margin-bottom:100px;;'>
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

										@for($i=0;$i< 5;$i++)
											@if($i< commodity_start($commodity->id))
												<a><i class="fa fa-star"></i></a>
											@else
												<a><i class="fa fa-star-o"></i></a>
											@endif
										@endfor

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
                                                @else{{$commodity->price/$commodity->activity->calculation}}
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
							<div class="bestseller-area dotted-style-2">
					<div class="section-title">
						<h3 style="text-align:left;padding-left:5px;">本店热卖</h3>
					</div>
					<div class="single-product-items-active border-1">
						<div class="single-product-items">
							@foreach($mshops_hsale as $key_o=>$shop_o)
							@if($key_o< 4)
							<div class="single-product single-product-sidebar white-bg">
								<div class="product-img product-img-left">
									<a href="/commodity/{{$shop_o->id}}"><img src="{{$shop_o->picture}}" alt="" /></a>
								</div>
								<div class="product-content product-content-right">
									<div class="pro-title">
										<h4><a href="/commodity/{{$shop_o->id}}">{{$shop_o->name}}</a></h4>
									</div>
									<div class="pro-rating ">
										@for($i=0;$i< 5;$i++)
											@if($i< commodity_start($shop_o->id))
												<a><i class="fa fa-star"></i></a>
											@else
												<a><i class="fa fa-star-o"></i></a>
											@endif
										@endfor
									</div>
									<div class="price-box">
										<span class="price product-price">${{$shop_o->price}}</span>
									</div>
									<div class="product-icon product-my">
										<div class="product-icon-left f-left">
											<a href="/commodity/{{$shop_o->id}}"><i class="fa fa-shopping-cart"></i>Add to Cart</a>
										</div>
									</div>
								</div>
							</div>
							@endif
							@endforeach
						</div>
						<div class="single-product-items">
							@foreach($mshops_hsale as $key_o=>$shop_o)
							@if($key_o>= 4)
							<div class="single-product single-product-sidebar white-bg">
								<div class="product-img product-img-left">
									<a href="/commodity/{{$shop_o->id}}"><img src="{{$shop_o->picture}}" alt="" /></a>
								</div>
								<div class="product-content product-content-right">
									<div class="pro-title">
										<h4><a href="/commodity/{{$shop_o->id}}">{{$shop_o->name}}</a></h4>
									</div>
									<div class="pro-rating ">
										@for($i=0;$i< 5;$i++)
											@if($i< commodity_start($shop_o->id))
												<a><i class="fa fa-star"></i></a>
											@else
												<a><i class="fa fa-star-o"></i></a>
											@endif
										@endfor
									</div>
									<div class="price-box">
										<span class="price product-price">${{$shop_o->price}}</span>
									</div>
									<div class="product-icon product-my">
										<div class="product-icon-left f-left" style="::before:background:none;">
											<a href="/commodity/{{$shop_o->id}}"><i class="fa fa-shopping-cart"></i>Add to Cart</a>
										</div>
									</div>
								</div>
							</div>
							@endif
							@endforeach
						</div>
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
                                    <li style='text-align:center;'>商品详情</li>
                                    <li style='text-align:center;'>商品评价 ( {{count($commodity->evaluates)}} )</li>
                                    <li style='text-align:center;'>本店同类</li>

										<div class="col-md-12" style='padding:0px;border:1px solid #eee;text-align:center;'>
											<div class="col-md-12" style="font-size:15px;padding-top:5px;padding-bottom:5px;font-weight:bold;border-bottom:1px solid #eee;margin-bottom:5px;">
												商品店铺
											</div>
											<div class="col-md-12" style='border-bottom:1px solid #eee;'>
												<a href="#">
													<img src="{{$commodity->shop->avatar}}" alt="" class='img-rounded' style="width:100px;height:100px;">
												</a>
											</div>
											<div class="col-md-12" style="border-bottom:1px solid #eee;padding-top:10px;padding-bottom:10px;">
												<div class="col-md-6" style='padding:0px;text-align:right;font-size:14px;'>
													店铺名称 :
												</div>
												<div class="col-md-6" style='padding:0px;text-align:left;padding-left:10px;font-size:13px;'>
													<a href="#" style='color:#ED6F64'>{{$commodity->shop->name}}</a>
												</div>
											</div>
											<div class="col-md-12" style="border-bottom:1px solid #eee;padding-top:10px;padding-bottom:10px;">
												<div class="col-md-6" style='padding:0px;text-align:right;font-size:14px;'>
													店铺评分 :
												</div>
												<div class="col-md-6" style='padding:0px;text-align:left;padding-left:10px;'>
													@for($i=0;$i< 5;$i++)
														@if($i< shop_start($commodity->shop->id))
															<a><i class="fa fa-star"></i></a>
														@else
															<a><i class="fa fa-star-o"></i></a>
														@endif
													@endfor

												</div>
											</div>
											<div class="col-md-12" style="border-bottom:1px solid #eee;padding-top:10px;padding-bottom:10px;">
												<div class="col-md-6" style='padding:0px;text-align:right;font-size:14px;'>
													<button type="button" name="button" class="btn {{Auth::check()&&Auth::user()->followed_shop($commodity->shop->id) ? 'btn-primary' : 'btn-default'}} btn-xs scshop" shop_id="{{$commodity->shop->id}}">{{Auth::check()&&Auth::user()->followed_shop($commodity->shop->id) ? '已收藏' : '收藏店铺'}}</button>
												</div>
												<div class="col-md-6" style='padding:0px;text-align:left;padding-left:10px;'>
													<a href="{{action('ShopController@catshop',$commodity->shop->id)}}" class='btn btn-default btn-xs'>进入店铺</a>
												</div>
											</div>
										</div>

                                </ul>
                                <div class="resp-tabs-container vertical-tabs">
                                    <div>
                                        {!! $commodity->detail !!}
                                    </div>
									<!-- 商品评价 -->
                                    <div>
										@if(Auth::check() && Auth::user())
										<div class="col-md-12">
											<div class="col-md-12" style='border-bottom:1px solid #eee;margin-bottom:10px;padding-bottom:10px;'>
												<div class="">
													<span>亲爱的 <b style='font-size:14px;font-weight:bold;color:#F4A137;'>向北</b> 请写下您的评价 : </span>

													<span id="click-demo" style="float:right;margin-left:10px;"></span>
													<span style="float:right">评分:</span>
													<input type="hidden" name="score" value="" id='score'>
													<input type="hidden" name="commodity_eval_id" value="{{$commodity->id}}" id='commodity_eval_id'>
												</div>
												<textarea id="evalute_text" name="name" rows="3" style='resize:none;margin-top:10px;'></textarea>
												<form action="" method="post" id='uploadForm' enctype="multipart/form-data">
													<input type="file" name="files[]" id="filer_input" multiple="multiple">
													<input type="hidden" id="evaluate" value='1'>
												</form>
												<span>注 : 最多上传五张图片哦</span>
												<button type="button" name="button" id='upload_evaluate' class='btn btn-warning' style='float:right;border-radius:5%;'>确认评价</button>
											</div>
										</div>
										@endif
										@foreach($evaluates as $evaluate)
											<div class="col-md-12" style='border-bottom:1px solid #eee;margin-bottom:10px;padding-bottom:10px;'>
												<div class="col-md-12">
													<div class="media">
														<div class="media-left">
															<a href="#">
																<img class="media-object img-rounded" src="{{App\User::findOrFail($evaluate->user_id)->avatar}}" style='max-width:50px;height:50px;margin-top:15px;' alt="">
															</a>
														</div>
														<div class="media-body">
															<h4 class="media-heading">用户 : {{App\User::findOrFail($evaluate->user_id)->name}}
																<div class="" style='float:right;'>
																	@for($i=0;$i< 5;$i++)
																		@if($i<$evaluate->score)
																			<a><i class="fa fa-star"></i></a>
																		@else
																			<a><i class="fa fa-star-o"></i></a>
																		@endif
																	@endfor
																</div>

															</h4>
																{{$evaluate->text}}
															<div class="col-md-12" style='padding:0px;margin-top:10px;'>
																<ul class='gallery'>
																	@foreach($evaluate->image as $pic)
																		<li class='pull-left' style='margin-right:5px;;'><a href="{{$pic->image}}"><img src="{{$pic->image}}" class='img-thumbnail' alt="" style='max-width:65px;height:65px;'></a></li>
																	@endforeach
																</ul>
															</div>
														</div>
													</div>
												</div>
											</div>
										@endforeach
                                    </div>
									<!-- 同类商品 -->
                                    <div>

										<div class="col-md-12 col-sm-12">
											<h2 class="page-heading mt-40" style='margin:0px;'>
												<span class="cat-name">本店同类商品</span>
											</h2>
											<div class="shop-page-bar">
												<div>
													<!-- Tab panes -->
													<div class="tab-content">
														<div role="tabpanel" class="tab-pane active" id="home">
															<div class="row">
																@foreach($mshops_bcate as $b_cate)
																<div class="col-lg-4 col-md-4 col-sm-6">
																	<div class="single-product mb-30  white-bg">
																		<div class="product-img pt-20">
																			<a href="/commodity/{{$b_cate->id}}"><img src="{{$b_cate->picture}}" alt="" /></a>
																		</div>
																		<div class="product-content product-i">
																			<div class="pro-title">
																				<h4><a href="/commodity/{{$b_cate->id}}">{{$b_cate->name}}</a></h4>
																			</div>
																			<div class="pro-rating ">
																				<a><i class="fa fa-star"></i></a>
																				<a><i class="fa fa-star"></i></a>
																				<a><i class="fa fa-star"></i></a>
																				<a><i class="fa fa-star"></i></a>
																				<a><i class="fa fa-star-o"></i></a>
																			</div>
																			<div class="price-box">
																				<span class="price product-price">${{$b_cate->price}}</span>
																			</div>
																			<div class="product-icon product-my" style='margin-top:40px;'>
																				<div class="product-icon-left f-left">
																					<a href="/commodity/{{$b_cate->id}}"><i class="fa fa-shopping-cart"></i>Add to Cart</a>
																				</div>
																			</div>
																		</div>
																		<span class="new">new</span>
																	</div>
																</div>
																@endforeach
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

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
                                @else
                                    $('#zhekou').html('$ '+parseInt(price)/{{$commodity->activity->calculation}})
                                @endif
                            @else
                                $('#zhekou').html('$ '+price)
                            @endif

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
						<strong class="qty">qty:
							<span class="small_num">${mes[i]['num']}</span>
							<span class="small_sku">${mes[i]['sku']['s_value']}</span>
						</strong>
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
			}else{
				$(`<li class="small_cart commodity${mes[i]['id']}">
					<a class="product-image" href="/commodity/${mes[i]['commodities']['id']}">
						<img alt="" src="${mes[i]['pic']}">
					</a>
					<div class="product-details">
						<p class="cartproduct-name">
							<a href="/commodity/${mes[i]['commodities']['id']}">${mes[i]['commodities']['name']}</a>
						</p>
						<strong class="qty">qty:
							<span class="small_num">${mes[i]['num']}</span>
							<span class="small_sku">${mes[i]['sku']['s_value']}</span>
						</strong>
						<span class="sig-price small_price">
							<del style="color:red;">${mes[i]['sku']['price']}</del>
							<span style="color:green;">$</span>
							<span class="amount" style="color:green;">${mes[i]['sku']['price'] / mes[i]['commodities']['activity']['calculation']}</span>
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

<script type="text/javascript" src="/homes/raty/jquery.raty.min.js"></script>
<script type="text/javascript">
$(function(){
	$('#click-demo').raty({
		click: function(score, evt) {
			$('#score').val(score);
		},
		score:function(){
			return $(this).attr("data-num");
		},
		starOn:'/homes/raty/star-on.png',
		starOff:'/homes/raty/star-off.png',
		starHalf:'/homes/raty/star-half.png',
		readOnly:false,
		halfShow:true,
		size:15,
   });
})
</script>

<script src="/homes/upload_com/jquery.filer.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#filer_input').filer({
			changeInput: '<div class="jFiler-input-dragDrop" style="width:100%;margin-bottom:10px;"><div class="jFiler-input-inner"><div class="jFiler-input-icon"><i class="icon-jfi-folder"></i></div><div class="jFiler-input-text"></div></div></div>',
		    showThumbs: true,
		    theme: "dragdropbox",
			limit:5,
			onRemove:function(){
					layer.msg('删除成功');
			},
		    templates: {
		        box: '<ul class="jFiler-items-list jFiler-items-grid"></ul>',
		        item: '<li class="jFiler-item">\
		                    <div class="jFiler-item-container">\
		                        <div class="jFiler-item-inner">\
		                            <div class="jFiler-item-thumb">\
		                                <div class="jFiler-item-status"></div>\
		                                <div class="jFiler-item-info">\
		                                    <span class="jFiler-item-title"><b title="@{{fi-name}}">@{{fi-name | limitTo: 25}}</b></span>\
		                                    <span class="jFiler-item-others">@{{fi-size2}}</span>\
		                                </div>\
		                                @{{fi-image}}\
		                            </div>\
		                            <div class="jFiler-item-assets jFiler-row">\
		                                <ul class="list-inline pull-left">\
		                                    <li>@{{fi-progressBar}}</li>\
		                                </ul>\
		                                <ul class="list-inline pull-right">\
		                                    <li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
		                                </ul>\
		                            </div>\
		                        </div>\
		                    </div>\
		                </li>',
		        itemAppend: '<li class="jFiler-item">\
		                        <div class="jFiler-item-container">\
		                            <div class="jFiler-item-inner">\
		                                <div class="jFiler-item-thumb">\
		                                    <div class="jFiler-item-status"></div>\
		                                    <div class="jFiler-item-info">\
		                                        <span class="jFiler-item-title"><b title="@{{fi-name}}">@{{fi-name | limitTo: 25}}</b></span>\
		                                        <span class="jFiler-item-others">@{{fi-size2}}</span>\
		                                    </div>\
		                                    @{{fi-image}}\
		                                </div>\
		                                <div class="jFiler-item-assets jFiler-row">\
		                                    <ul class="list-inline pull-left">\
		                                        <li><span class="jFiler-item-others">@{{fi-icon}}</span></li>\
		                                    </ul>\
		                                    <ul class="list-inline pull-right">\
		                                        <li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
		                                    </ul>\
		                                </div>\
		                            </div>\
		                        </div>\
		                    </li>',
		        itemAppendToEnd: false,
		        removeConfirmation: false,
		        _selectors: {
		            list: '.jFiler-items-list',
		            item: '.jFiler-item',
		            remove: '.jFiler-item-trash-action'
		        }
		    }
		});
	});

	$('#upload_evaluate').click(function(){

		var evalute_text = $('#evalute_text').val();
		var evalute_score = $('#score').val();
		var commodity_eval_id = $('#commodity_eval_id').val();
		console.log(evalute_text);
		if(evalute_text != ''){
			if(evalute_score != ''){
				$.ajax({
				    url: '/commodity/evaluate_text',
				    type: 'POST',
				    data: {text:evalute_text,score:evalute_score,commodity_id:commodity_eval_id},
					success:function(mes){
						$('#evaluate').val(mes);
						var formData = new FormData();
						$($('#filer_input')[0].files).each(function(key,val){
							formData.append('file[]', $('#filer_input')[0].files[key]);
						})
						formData.append('evaluate', $('#evaluate').val());
						$.ajax({
						    url: '/commodity/evaluate_pic',
						    type: 'POST',
						    cache: false,
						    data: formData,
						    processData: false,
						    contentType: false,
							success:function(mes){
								window.location.reload();
							},
							error:function(){

							}
						});
					},
					error:function(){
						layer.msg('评价失败');
					}
				});
			}else{
				layer.msg('请选择评分');
			}
		}else{
			layer.msg('请写下评价');
		}
	});

	//收藏店铺
	$('.scshop').click(function(){
		@if(Auth::check() && Auth::user())
			var shop_id = $(this).attr('shop_id');
			$.ajax({
				url:"{{action('CollectionShopController@store')}}",
				data:{shop_id:shop_id},
				type:'get',
				success:function(mes){
					if(mes == 1){
						$(this).removeClass('btn-default');
						$(this).addClass('btn-primary');
						$(this).html('已收藏');
						$('#collection_wishshop').html(parseInt($('#collection_wishshop').html())+1);
						layer.msg('收藏店铺成功');
					}else{
						$(this).removeClass('btn-primary');
						$(this).addClass('btn-default');
						$(this).html('收藏店铺');
						$('#collection_wishshop').html(parseInt($('#collection_wishshop').html())-1);
						layer.msg('取消该店铺的收藏');
					}
				}.bind(this)
			});

			return false;
		@endif
	});
</script>

<script src="/homes/zoom/js/zoom.min.js"></script>
@endsection
