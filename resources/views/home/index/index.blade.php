@extends('layouts.home')

@section('content')
<!-- 轮播图这一块 -->
<div class="slider-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-3 hidden-sm hidden-xs"></div>
			<div class="col-lg-6 col-md-6 col-sm-12">
				<div class="main-slider">
					<div class="slider-container">
						<!-- Slider Image -->
						<div id="mainSlider" class="nivoSlider slider-image">
                            @foreach($pictures as $picture)
                                <a href="#"><img src="{{$picture->image}}" alt="" title="#htmlcaption1"></a>
                            @endforeach
						</div>
					</div>
				</div>
				<div class="slider-product dotted-style-1 pt-30">
					<div class="slider-product-active">

                        @foreach($commodities as $commodity)
						<div class="single-product single-product-sidebar white-bg">
							<div class="product-img product-img-left">
								<a href="/commodity/{{$commodity->id}}"><img src="{{$commodity->picture}}" alt="" /></a>
							</div>
							<div class="product-content product-content-right">
								<div class="pro-title">
									<h4><a href="/commodity/{{$commodity->id}}">{{$commodity->name}}</a></h4>
								</div>
								<div class="pro-rating ">
									<a><i class="fa fa-star"></i></a>
									<a><i class="fa fa-star"></i></a>
									<a><i class="fa fa-star"></i></a>
									<a><i class="fa fa-star"></i></a>
									<a><i class="fa fa-star-o"></i></a>
								</div>
								<div class="price-box">
									<span class="price product-price">${{$commodity->price}}</span>
								</div>
								<div class="product-icon">
									<div class="product-icon-left f-left">
										<a href="/commodity/{{$commodity->id}}"><i class="fa fa-shopping-cart"></i>Add to Cart</a>
									</div>
								</div>
							</div>
						</div>
                        @endforeach
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
				<div class="slider-sidebar">
					<div class="slider-single-img mb-20">
						<a href="#">
							<img class="img_a" src="/homes/img/menu-l/1-1.jpg" alt="" />
							<img class="img_b" src="/homes/img/menu-l/1-1.jpg" alt="" />
						</a>
					</div>
					<div class="slider-single-img none-sm">
						<a href="#">
						<img class="img_a" src="/homes/img/menu-l/1-2.jpg" alt="" />
						<img class="img_b" src="/homes/img/menu-l/1-2.jpg" alt=""/>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- 轮播图这一块end -->

<!-- 商品分类这一块 -->
<div class="all-product-area pb-60">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" >
				<!-- bestseller-area -->
				<div class="bestseller-area dotted-style-2" style="margin-top:35px;">
					<div class="section-title">
						<h3>最热销售</h3>
					</div>
					<div class="single-product-items-active border-1">
						<div class="single-product-items">
                            @foreach($sale_com as $key=>$sale_one)
                                @if($key<= 9)
							    <div class="single-product single-product-sidebar white-bg">
    								<div class="product-img product-img-left">
    									<a href="/commodity/{{$sale_one->id}}"><img src="{{$sale_one->picture}}" alt="" /></a>
    								</div>
    								<div class="product-content product-content-right">
    									<div class="pro-title">
    										<h4><a href="/commodity/{{$sale_one->id}}">{{$sale_one->name}}</a></h4>
    									</div>
    									<div class="pro-rating ">
    										<a><i class="fa fa-star"></i></a>
    										<a><i class="fa fa-star"></i></a>
    										<a><i class="fa fa-star"></i></a>
    										<a><i class="fa fa-star"></i></a>
    										<a><i class="fa fa-star-o"></i></a>
    									</div>
    									<div class="price-box">
    										<span class="price product-price">${{$sale_one->price}}</span>
    									</div>
    									<div class="product-icon">
    										<div class="product-icon-left f-left">
    											<a href="/commodity/{{$sale_one->id}}"><i class="fa fa-shopping-cart"></i>Add to Cart</a>
    										</div>
    									</div>
    								</div>
    							</div>
                                @endif
                            @endforeach
						</div>
						<div class="single-product-items">
                            @foreach($sale_com as $key=>$sale_one)
                                @if($key > 9)
							    <div class="single-product single-product-sidebar white-bg">
    								<div class="product-img product-img-left">
    									<a href="/commodity/{{$sale_one->id}}"><img src="{{$sale_one->picture}}" alt="" /></a>
    								</div>
    								<div class="product-content product-content-right">
    									<div class="pro-title">
    										<h4><a href="/commodity/{{$sale_one->id}}">{{$sale_one->name}}</a></h4>
    									</div>
    									<div class="pro-rating ">
    										<a><i class="fa fa-star"></i></a>
    										<a><i class="fa fa-star"></i></a>
    										<a><i class="fa fa-star"></i></a>
    										<a><i class="fa fa-star"></i></a>
    										<a><i class="fa fa-star-o"></i></a>
    									</div>
    									<div class="price-box">
    										<span class="price product-price">${{$sale_one->price}}</span>
    									</div>
    									<div class="product-icon">
    										<div class="product-icon-left f-left">
    											<a href="/commodity/{{$sale_one->id}}"><i class="fa fa-shopping-cart"></i>Add to Cart</a>
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
			<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12"  >
				<!-- feature-product-area -->
                @foreach($cates as $cate)
				<div class="feature-product-area dotted-style-2" style="margin-top:35px;">
					<div class="section-title">
						<h3><a href="/cate/f_cate/{{$cate->id}}" style='color:#444444;'>{{$cate->cate}}</a>
                            @foreach(findcate_byfcate_id($cate->id) as $c_k=>$c_v)
                            @if($c_k < 4)
                                <a style="font-weight:normal;font-size:13px;margin-left:15px;" href='/cate/s_cate/{{$c_v->id}}'>{{$c_v->cate}}</a>

                            @endif
                            @endforeach
                            <a style="font-weight:normal;font-size:13px;margin-left:15px;" href='#'>更多...</a>
                        </h3>
					</div>
					<div class="feature-product-active border-1">
                        @foreach($cate->commodity as $commodity_c)
    						<div class="single-product  white-bg">
    							<div class="product-img pt-20">
    								<a href="/commodity/{{$commodity_c->id}}"><img src="{{$commodity_c->picture}}" alt="" /></a>
    							</div>
    							<div class="product-content product-i">
    								<div class="pro-title">
    									<h4><a href="/commodity/{{$commodity_c->id}}">{{$commodity_c->name}}</a></h4>
    								</div>
    								<div class="pro-rating ">
    									<a><i class="fa fa-star"></i></a>
    									<a><i class="fa fa-star"></i></a>
    									<a><i class="fa fa-star"></i></a>
    									<a><i class="fa fa-star"></i></a>
    									<a><i class="fa fa-star-o"></i></a>
    								</div>
    								<div class="price-box">
    									<span class="price product-price">${{$commodity_c->price}}</span>
    								</div>
    								<div class="product-icon">
    									<div class="product-icon-left f-left">
    										<a href="/commodity/{{$commodity_c->id}}"><i class="fa fa-shopping-cart"></i>Add to Cart</a>
    									</div>
    									<div class="product-icon-right floatright">
    										<a href="#" data-toggle="tooltip" title="Compare"><i class="fa fa-exchange"></i></a>
    										<a href="#" data-toggle="tooltip" title="Wishlist"><i class="fa fa-heart"></i></a>
    									</div>
    								</div>
    							</div>
    							<span class="new">hot</span>
    						</div>
                        @endforeach
    				</div>
    			</div>
                @endforeach

				<!-- banner-area-start -->
				<div class="banner-area pt-40">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<div class="slider-single-img res">
								<a href="#">
								<img class="img_a" src="/homes/img/banner/2.jpg" alt="" />
								<img class="img_b" src="/homes/img/banner/2.jpg" alt="" />
								</a>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<div class="slider-single-img">
								<a href="#">
								<img class="img_a" src="/homes/img/banner/3.jpg" alt="" />
								<img class="img_b" src="/homes/img/banner/3.jpg" alt="" />
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- 商品分类这一块end -->
@endsection

@section('js')

@endsection
