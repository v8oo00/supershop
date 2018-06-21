@extends('layouts.home')

@section('css')
<link rel="stylesheet" href="/homes/shop/css/magic-input.min.css">
<link rel="stylesheet" href="/homes/tag/jquery.tagsinput.min.css">
@endsection

@section('content')
<div class="container">
    <div class="row" style='background-color:#fff;'>
        <div class="col-md-6" style='padding-top:10px;border-right:1px solid #ccc;border-bottom:1px solid #ccc;padding-bottom:10px;' id='a_mr'>
            <div class="col-md-2" style='padding-right:0px;padding-left:;'>
                <img src="{{$shop->avatar}}" alt="" class='img-circle img-thumbnail' style='width:80px;height:80px;'>
            </div>
            <div class="col-md-2" style='padding-right:0px;padding-left:0px;'>
                <div class="col-md-12" style='margin-top:20px;padding-left:0px;text-align:right;'>
                    店铺名称 :
                </div>
                <div class="col-md-12" style='padding-left:0px;text-align:right;'>
                    店铺评分 :
                </div>
            </div>
            <div class="col-md-3"style='padding-left:0px;'>
                <div class="col-md-12" style='margin-top:20px;padding-left:0px;'>
                    {{$shop->name}}
                </div>
                <div class="col-md-12" style='padding-left:0px;'>
                    @for($i=0;$i< 5;$i++)
                        @if($i< shop_start($shop->id))
                            <a><i class="fa fa-star"></i></a>
                        @else
                            <a><i class="fa fa-star-o"></i></a>
                        @endif
                    @endfor
                </div>
            </div>
            <div class="col-md-3">
                <div class="col-md-12" style='margin-top:25px'>
                    <a href="javascript:" id='more_info_c' flag='true'>查看更多信息</a>
                </div>
            </div>
            <div style='width:100%;height:240px;position:absolute;background-color:#fff;z-index:1000;left:1px;bottom:-240px;display:none;border-right:1px solid #ccc' id='more_info'>
                <div class="col-md-12" style='margin-top:15px;padding-left:0px;'>
                    <div class="col-md-3" style='text-align:right;padding-left:0px;padding-right:20px;'>
                        店铺联系地址 :
                    </div>
                    <div class="col-md-9">
                        {{$shop->address}}
                    </div>
                </div>
                <div class="col-md-12" style='margin-top:10px;padding-left:0px;'>
                    <div class="col-md-3" style='text-align:right;padding-left:0px;padding-right:20px;'>
                        销售量 :
                    </div>
                    <div class="col-md-9">
                        {{shop_sale($shop->id)}}
                    </div>
                </div>
                <div class="col-md-12" style='margin-top:10px;padding-left:0px;'>
                    <div class="col-md-3" style='text-align:right;padding-left:0px;padding-right:20px;'>
                        收藏量 :
                    </div>
                    <div class="col-md-9">
                        123123124
                    </div>
                </div>
                <div class="col-md-12" style='margin-top:10px;padding-left:0px;'>
                    <div class="col-md-3" style='text-align:right;padding-left:0px;padding-right:20px;'>
                        商品数 :
                    </div>
                    <div class="col-md-9">
                        {{count($shop->commodity)}}
                    </div>
                </div>
                <div class="col-md-12" style='margin-top:10px;padding-left:0px;'>
                    <div class="col-md-3" style='text-align:right;padding-left:0px;padding-right:20px;'>
                        店铺联系电话 :
                    </div>
                    <div class="col-md-9">
                        {{$shop->phone}}
                    </div>
                </div>
                <div class="col-md-12" style='margin-top:10px;padding-left:0px;'>
                    <div class="col-md-3" style='text-align:right;padding-left:0px;padding-right:20px;'>
                        店铺详情描述 :
                    </div>
                    <div class="col-md-9">
                        {{$shop->desc}}
                    </div>
                </div>
                <div class="col-md-12" style='margin-top:10px;padding-left:0px;'>
                    <div class="col-md-3" style='text-align:right;padding-left:0px;padding-right:20px;'>
                        店铺创建时间 :
                    </div>
                    <div class="col-md-9">
                        {{Carbon\Carbon::parse($shop->created_at)->year}} 年
                        {{Carbon\Carbon::parse($shop->created_at)->month}} 月
                        {{Carbon\Carbon::parse($shop->created_at)->day}} 日
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6" style='border-bottom:1px solid #ccc; text-align:center;' id='a_tj'>

            @if(Auth::check()&&Auth::user()->followed_shop($shop->id))
            <button type="button" name="button" class='btn btn-primary btn-lg scshop' shop_id="{{$shop->id}}" style='margin-top:35px;margin-bottom:35px;'>已收藏</button>
            @else
            <button type="button" name="button" class='btn btn-warning btn-lg scshop' shop_id="{{$shop->id}}" style='margin-top:35px;margin-bottom:35px;'>收藏店铺</button>
            @endif
            <a href='/shop/catshop/othershop/{{$shop->id}}/all' class='btn @if($fenlei=="all") btn-warning @else btn-default @endif btn-lg' style='margin-top:35px;margin-bottom:35px;'>所有宝贝</a>
            <a href='/shop/catshop/othershop/{{$shop->id}}/sale' class='btn @if($fenlei=="sale") btn-warning @else btn-default @endif btn-lg' style='margin-top:35px;margin-bottom:35px;'>销量排行</a>
            <a href='/shop/catshop/othershop/{{$shop->id}}/hot' class='btn @if($fenlei=="hot") btn-warning @else btn-default @endif btn-lg' style='margin-top:35px;margin-bottom:35px;'>当季热卖</a>

        </div>
        <div class="col-md-12" style='margin-top:50px;'>

			<div class="shop-page-bar">
				<div>

					<!-- Tab panes -->
					<div class="tab-content">
						<div role="tabpanel" class="tab-pane active" id="home">
							<div class="row">
                                @foreach($commodities as $commodity)
								<div class="col-lg-3 col-md-3">
									<div class="single-product mb-30  white-bg">
										<div class="product-img pt-20">
											<a href="/commodity/{{$commodity->id}}"><img src="{{$commodity->picture}}" alt="" /></a>
										</div>
										<div class="product-content product-i">
											<div class="pro-title">
												<h4><a href="/commodity/{{$commodity->id}}">{{$commodity->name}}</a></h4>
											</div>
											<div class="pro-rating ">
                                                @for($i=0;$i< 5;$i++)
        											@if($i< commodity_start($commodity->id))
        												<a><i class="fa fa-star"></i></a>
        											@else
        												<a><i class="fa fa-star-o"></i></a>
        											@endif
        										@endfor
											</div>
											<div class="price-box">
												<span class="price product-price">${{$commodity->price}}</span>
											</div>
											<div class="product-icon">
												<div class="product-icon-left f-left">
													<a href="/commodity/{{$commodity->id}}"><i class="fa fa-shopping-cart"></i>Add to Cart</a>
												</div>
                                                <div class="product-icon-right floatright">
                                                    <a href="/login" class="wishlist" info_id="{{$commodity->id}}" data-toggle="tooltip" title="Wishlist"><i class="fa fa-heart" style="color:{{Auth::check()&&Auth::user()->followed($commodity->id) ? 'orange' : '#555555'}}"></i></a>
                                                </div>
											</div>
										</div>
										<span class="new">new</span>
									</div>
								</div>
                                @endforeach
							</div>
							<div class="content-sortpagibar">

							</div>
						</div>

					</div>
				</div>
			</div>

        </div>
    </div>
</div>


@endsection

@section('js')
<script type="text/javascript">

    $('#more_info_c').click(function(){
        if($(this).attr('flag') == 'true'){
            $('#more_info').show();
            $(this).attr('flag','false');
        }else{
            $('#more_info').hide();
            $(this).attr('flag','true');
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
                        $(this).removeClass('btn-warning');
                        $(this).addClass('btn-primary');
                        $(this).html('已收藏');
                        $('#collection_wishshop').html(parseInt($('#collection_wishshop').html())+1);
                        layer.msg('收藏店铺成功');
                    }else{
                        $(this).removeClass('btn-primary');
                        $(this).addClass('btn-warning');
                        $(this).html('收藏店铺');
                        $('#collection_wishshop').html(parseInt($('#collection_wishshop').html())-1);
                        layer.msg('取消该店铺的收藏');
                    }
                }.bind(this)
            });

            return false;
        @else
            window.location.href="/login";
        @endif
    });

</script>
@endsection
