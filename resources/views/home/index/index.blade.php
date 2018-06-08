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
								<a href="#"><img src="{{$commodity->picture}}" alt="" /></a>
							</div>
							<div class="product-content product-content-right">
								<div class="pro-title">
									<h4><a href="product-details.html">{{$commodity->name}}</a></h4>
								</div>
								<div class="pro-rating ">
									<a href="#"><i class="fa fa-star"></i></a>
									<a href="#"><i class="fa fa-star"></i></a>
									<a href="#"><i class="fa fa-star"></i></a>
									<a href="#"><i class="fa fa-star"></i></a>
									<a href="#"><i class="fa fa-star-o"></i></a>
								</div>
								<div class="price-box">
									<span class="price product-price">${{$commodity->price}}</span>
								</div>
								<div class="product-icon">
									<div class="product-icon-left f-left">
										<a href="#"><i class="fa fa-shopping-cart"></i>Add to Cart</a>
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
						<img class="img_b" src="/homes/img/menu-l/1-2.jpg" alt="" />
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
						<h3>Bestseller</h3>
					</div>
					<div class="single-product-items-active border-1">
						<div class="single-product-items">
							<div class="single-product single-product-sidebar white-bg">
								<div class="product-img product-img-left">
									<a href="#"><img src="img/product/6.jpg" alt="" /></a>
								</div>
								<div class="product-content product-content-right">
									<div class="pro-title">
										<h4><a href="product-details.html">Lounge Chair</a></h4>
									</div>
									<div class="pro-rating ">
										<a href="#"><i class="fa fa-star"></i></a>
										<a href="#"><i class="fa fa-star"></i></a>
										<a href="#"><i class="fa fa-star"></i></a>
										<a href="#"><i class="fa fa-star"></i></a>
										<a href="#"><i class="fa fa-star-o"></i></a>
									</div>
									<div class="price-box">
										<span class="price product-price">$300.00</span>
									</div>
									<div class="product-icon">
										<div class="product-icon-left f-left">
											<a href="#"><i class="fa fa-shopping-cart"></i>Add to Cart</a>
										</div>
									</div>
								</div>
							</div>
							<div class="single-product single-product-sidebar white-bg">
								<div class="product-img product-img-left">
									<a href="#"><img src="img/product/14.jpg" alt="" /></a>
								</div>
								<div class="product-content product-content-right">
									<div class="pro-title">
										<h4><a href="product-details.html">Samsung G941BW</a></h4>
									</div>
									<div class="pro-rating ">
										<a href="#"><i class="fa fa-star"></i></a>
										<a href="#"><i class="fa fa-star"></i></a>
										<a href="#"><i class="fa fa-star"></i></a>
										<a href="#"><i class="fa fa-star"></i></a>
										<a href="#"><i class="fa fa-star"></i></a>
									</div>
									<div class="price-box">
										<span class="price product-price">$230.00</span>
									</div>
									<div class="product-icon">
										<div class="product-icon-left f-left">
											<a href="#"><i class="fa fa-shopping-cart"></i>Add to Cart</a>
										</div>
									</div>
								</div>
							</div>
							<div class="single-product single-product-sidebar white-bg">
								<div class="product-img product-img-left">
									<a href="#"><img src="img/product/13.jpg" alt="" /></a>
								</div>
								<div class="product-content product-content-right">
									<div class="pro-title">
										<h4><a href="product-details.html">power banks</a></h4>
									</div>
									<div class="pro-rating ">
										<a href="#"><i class="fa fa-star"></i></a>
										<a href="#"><i class="fa fa-star"></i></a>
										<a href="#"><i class="fa fa-star"></i></a>
										<a href="#"><i class="fa fa-star"></i></a>
										<a href="#"><i class="fa fa-star"></i></a>
									</div>
									<div class="price-box">
										<span class="price product-price">$100.00</span>
									</div>
									<div class="product-icon">
										<div class="product-icon-left f-left">
											<a href="#"><i class="fa fa-shopping-cart"></i>Add to Cart</a>
										</div>
									</div>
								</div>
							</div>
							<div class="single-product single-product-sidebar white-bg">
								<div class="product-img product-img-left">
									<a href="#"><img src="img/product/3.jpg" alt="" /></a>
								</div>
								<div class="product-content product-content-right">
									<div class="pro-title">
										<h4><a href="product-details.html">iPhone</a></h4>
									</div>
									<div class="pro-rating ">
										<a href="#"><i class="fa fa-star"></i></a>
										<a href="#"><i class="fa fa-star"></i></a>
										<a href="#"><i class="fa fa-star"></i></a>
										<a href="#"><i class="fa fa-star"></i></a>
										<a href="#"><i class="fa fa-star"></i></a>
									</div>
									<div class="price-box">
										<span class="price product-price">$201.00</span>
									</div>
									<div class="product-icon">
										<div class="product-icon-left f-left">
											<a href="#"><i class="fa fa-shopping-cart"></i>Add to Cart</a>
										</div>
									</div>
								</div>
							</div>
							<div class="single-product single-product-sidebar white-bg">
								<div class="product-img product-img-left">
									<a href="#"><img src="img/product/7.jpg" alt="" /></a>
								</div>
								<div class="product-content product-content-right">
									<div class="pro-title">
										<h4><a href="product-details.html">MacBook Pro</a></h4>
									</div>
									<div class="pro-rating ">
										<a href="#"><i class="fa fa-star"></i></a>
										<a href="#"><i class="fa fa-star"></i></a>
										<a href="#"><i class="fa fa-star"></i></a>
										<a href="#"><i class="fa fa-star"></i></a>
										<a href="#"><i class="fa fa-star"></i></a>
									</div>
									<div class="price-box">
										<span class="price product-price">$700.00</span>
									</div>
									<div class="product-icon">
										<div class="product-icon-left f-left">
											<a href="#"><i class="fa fa-shopping-cart"></i>Add to Cart</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="single-product-items">
							<div class="single-product single-product-sidebar white-bg">
								<div class="product-img product-img-left">
									<a href="#"><img src="img/product/6.jpg" alt="" /></a>
								</div>
								<div class="product-content product-content-right">
									<div class="pro-title">
										<h4><a href="product-details.html">Lounge Chair</a></h4>
									</div>
									<div class="pro-rating ">
										<a href="#"><i class="fa fa-star"></i></a>
										<a href="#"><i class="fa fa-star"></i></a>
										<a href="#"><i class="fa fa-star"></i></a>
										<a href="#"><i class="fa fa-star"></i></a>
										<a href="#"><i class="fa fa-star-o"></i></a>
									</div>
									<div class="price-box">
										<span class="price product-price">$300.00</span>
									</div>
									<div class="product-icon">
										<div class="product-icon-left f-left">
											<a href="#"><i class="fa fa-shopping-cart"></i>Add to Cart</a>
										</div>
									</div>
								</div>
							</div>
							<div class="single-product single-product-sidebar white-bg">
								<div class="product-img product-img-left">
									<a href="#"><img src="img/product/14.jpg" alt="" /></a>
								</div>
								<div class="product-content product-content-right">
									<div class="pro-title">
										<h4><a href="product-details.html">Samsung G941BW</a></h4>
									</div>
									<div class="pro-rating ">
										<a href="#"><i class="fa fa-star"></i></a>
										<a href="#"><i class="fa fa-star"></i></a>
										<a href="#"><i class="fa fa-star"></i></a>
										<a href="#"><i class="fa fa-star"></i></a>
										<a href="#"><i class="fa fa-star"></i></a>
									</div>
									<div class="price-box">
										<span class="price product-price">$230.00</span>
									</div>
									<div class="product-icon">
										<div class="product-icon-left f-left">
											<a href="#"><i class="fa fa-shopping-cart"></i>Add to Cart</a>
										</div>
									</div>
								</div>
							</div>
							<div class="single-product single-product-sidebar white-bg">
								<div class="product-img product-img-left">
									<a href="#"><img src="img/product/13.jpg" alt="" /></a>
								</div>
								<div class="product-content product-content-right">
									<div class="pro-title">
										<h4><a href="product-details.html">power banks</a></h4>
									</div>
									<div class="pro-rating ">
										<a href="#"><i class="fa fa-star"></i></a>
										<a href="#"><i class="fa fa-star"></i></a>
										<a href="#"><i class="fa fa-star"></i></a>
										<a href="#"><i class="fa fa-star"></i></a>
										<a href="#"><i class="fa fa-star"></i></a>
									</div>
									<div class="price-box">
										<span class="price product-price">$100.00</span>
									</div>
									<div class="product-icon">
										<div class="product-icon-left f-left">
											<a href="#"><i class="fa fa-shopping-cart"></i>Add to Cart</a>
										</div>
									</div>
								</div>
							</div>
							<div class="single-product single-product-sidebar white-bg">
								<div class="product-img product-img-left">
									<a href="#"><img src="img/product/3.jpg" alt="" /></a>
								</div>
								<div class="product-content product-content-right">
									<div class="pro-title">
										<h4><a href="product-details.html">iPhone</a></h4>
									</div>
									<div class="pro-rating ">
										<a href="#"><i class="fa fa-star"></i></a>
										<a href="#"><i class="fa fa-star"></i></a>
										<a href="#"><i class="fa fa-star"></i></a>
										<a href="#"><i class="fa fa-star"></i></a>
										<a href="#"><i class="fa fa-star"></i></a>
									</div>
									<div class="price-box">
										<span class="price product-price">$201.00</span>
									</div>
									<div class="product-icon">
										<div class="product-icon-left f-left">
											<a href="#"><i class="fa fa-shopping-cart"></i>Add to Cart</a>
										</div>
									</div>
								</div>
							</div>
							<div class="single-product single-product-sidebar white-bg">
								<div class="product-img product-img-left">
									<a href="#"><img src="img/product/7.jpg" alt="" /></a>
								</div>
								<div class="product-content product-content-right">
									<div class="pro-title">
										<h4><a href="product-details.html">MacBook Pro</a></h4>
									</div>
									<div class="pro-rating ">
										<a href="#"><i class="fa fa-star"></i></a>
										<a href="#"><i class="fa fa-star"></i></a>
										<a href="#"><i class="fa fa-star"></i></a>
										<a href="#"><i class="fa fa-star"></i></a>
										<a href="#"><i class="fa fa-star"></i></a>
									</div>
									<div class="price-box">
										<span class="price product-price">$700.00</span>
									</div>
									<div class="product-icon">
										<div class="product-icon-left f-left">
											<a href="#"><i class="fa fa-shopping-cart"></i>Add to Cart</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- special-products-area -->
				<div class="special-products-area dotted-style-2 ptb-50">
					<div class="section-title">
						<h3>special-products</h3>
					</div>
					<div class="special-products-active border-1">
						<div class="single-product white-bg">
							<div class="product-img">
								<a href="#"><img src="img/product/2.jpg" alt="" /></a>
							</div>
							<div class="product-content">
								<div class="pro-title">
									<h4><a href="product-details.html">Lounge Chair Cinema</a></h4>
								</div>
								<div class="pro-rating ">
									<a href="#"><i class="fa fa-star"></i></a>
									<a href="#"><i class="fa fa-star"></i></a>
									<a href="#"><i class="fa fa-star"></i></a>
									<a href="#"><i class="fa fa-star"></i></a>
									<a href="#"><i class="fa fa-star-o"></i></a>
								</div>
								<div class="price-box">
									<span class="price product-price">$262.00</span>
								</div>
								<div class="product-icon">
									<div class="product-icon-left f-left">
										<a href="#"><i class="fa fa-shopping-cart"></i>Add to Cart</a>
									</div>
									<div class="product-icon-right floatright">
										<a href="#" data-toggle="tooltip" title="Compare"><i class="fa fa-exchange"></i></a>
										<a href="#" data-toggle="tooltip" title="Wishlist"><i class="fa fa-heart"></i></a>
									</div>
								</div>
							</div>
						</div>
						<div class="single-product white-bg">
							<div class="product-img">
								<a href="#"><img src="img/product/5.jpg" alt="" /></a>
							</div>
							<div class="product-content">
								<div class="pro-title">
									<h4><a href="product-details.html">Footstool</a></h4>
								</div>
								<div class="pro-rating ">
									<a href="#"><i class="fa fa-star"></i></a>
									<a href="#"><i class="fa fa-star"></i></a>
									<a href="#"><i class="fa fa-star"></i></a>
									<a href="#"><i class="fa fa-star"></i></a>
									<a href="#"><i class="fa fa-star-o"></i></a>
								</div>
								<div class="price-box">
									<span class="price product-price">$150.00</span>
								</div>
								<div class="product-icon">
									<div class="product-icon-left f-left">
										<a href="#"><i class="fa fa-shopping-cart"></i>Add to Cart</a>
									</div>
									<div class="product-icon-right floatright">
										<a href="#" data-toggle="tooltip" title="Compare"><i class="fa fa-exchange"></i></a>
										<a href="#" data-toggle="tooltip" title="Wishlist"><i class="fa fa-heart"></i></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- client-area-start  -->
				<div class="client-area dotted-style-2">
					<div class="section-title">
						<h3>client says</h3>
					</div>
					<div class="clinet-active border-1">
						<div class="single-client fix white-bg">
							<div class="client-content">
								<a href="#"><p>Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. ...</p></a>
							</div>
							<div class="clint-img">
								<div class="client-img-left">
									<img src="img/client/1.jpg" alt="" />
								</div>
								<div class="client-name">
									<span>Mr Test</span>
								</div>
							</div>
						</div>
						<div class="single-client fix white-bg">
							<div class="client-content">
								<a href="#"><p>Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. ...</p></a>
							</div>
							<div class="clint-img">
								<div class="client-img-left">
									<img src="img/client/2.jpg" alt="" />
								</div>
								<div class="client-name">
									<span>Mrs Brown</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12"  >
				<!-- feature-product-area -->
                @foreach($cates as $cate)
				<div class="feature-product-area dotted-style-2" style="margin-top:35px;">
					<div class="section-title">
						<h3>{{$cate->cate}}</h3>
					</div>
					<div class="feature-product-active border-1">
                        @foreach($cate->commodity as $commodity_c)
						<div class="single-product  white-bg">
							<div class="product-img pt-20">
								<a href="#"><img src="{{$commodity_c->picture}}" alt="" /></a>
							</div>
							<div class="product-content product-i">
								<div class="pro-title">
									<h4><a href="product-details.html">{{$commodity_c->name}}</a></h4>
								</div>
								<div class="pro-rating ">
									<a href="#"><i class="fa fa-star"></i></a>
									<a href="#"><i class="fa fa-star"></i></a>
									<a href="#"><i class="fa fa-star"></i></a>
									<a href="#"><i class="fa fa-star"></i></a>
									<a href="#"><i class="fa fa-star-o"></i></a>
								</div>
								<div class="price-box">
									<span class="price product-price">${{$commodity_c->price}}</span>
								</div>
								<div class="product-icon">
									<div class="product-icon-left f-left">
										<a href="#"><i class="fa fa-shopping-cart"></i>Add to Cart</a>
									</div>
									<div class="product-icon-right floatright">
										<a href="#" data-toggle="tooltip" title="Compare"><i class="fa fa-exchange"></i></a>
										<a href="#" data-toggle="tooltip" title="Wishlist"><i class="fa fa-heart"></i></a>
									</div>
								</div>
							</div>
							<span class="new">new</span>
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
