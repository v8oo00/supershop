<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>SUPERSHOP!</title>

<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}" />

<link rel="shortcut icon" href="/supershop.ico" />
<!-- Place favicon.ico in the root directory -->

<!-- all css here -->
<!-- bootstrap.min.css -->
<link rel="stylesheet" href="/homes/css/bootstrap.min.css">
@section('css')
@show
<!-- layer -->
<link rel="stylesheet" href='{{asset("layer/theme/default/layer.css")}}'>

<!-- font-awesome.min.css -->
<link rel="stylesheet" href="/homes/css/font-awesome.min.css">
<!-- owl.carousel.css -->

<link rel="stylesheet" href="/homes/css/owl.carousel.css">

<!-- owl.carousel.css -->
<link rel="stylesheet" href="/homes/css/meanmenu.min.css">
<!-- shortcode/shortcodes.css -->
<link rel="stylesheet" href="/homes/css/shortcode/shortcodes.css">
<!-- nivo-slider.css -->
<link rel="stylesheet" href="/homes/css/nivo-slider.css">
<!-- style.css -->
<link rel="stylesheet" href="/homes/style.css">
<!-- responsive.css -->
<link rel="stylesheet" href="/homes/css/responsive.css">

<script src="/homes/js/vendor/modernizr-2.8.3.min.js"></script>
</head>
<body>

<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<!-- Add your site or application content here -->
<!-- header -->
<header>
	<!-- header-top-area-start -->
	<div class="header-top-area black-bg ptb-7 hidden-xs">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-4">
					<div class="header-top-left">
						<span><a href="#">Call us toll free:</a>(+1)866-550-3669</span>
					</div>
				</div>
				<div class="col-lg-9 col-md-9 col-sm-8">
					<div class="header-top-right">

						<ul>
							<li class="slide-toggle"><a href="#"><i class="fa fa-user"></i> My Account</a>
								<ul class="show-toggle">
									@if(!Auth::check())
										<li><a href="{{ route('register') }}">register</a></li>
										<li><a href="{{ route('login') }}">login</a></li>
									@else
                                    	<li><a href="{{ action('UserController@index') }}">Personal</li>
									@endif
								</ul>
							</li>
						</ul>
						<ul>
							@if(Auth::check())
							<li><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-check"></i> Checkout</a>
								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									{{ csrf_field() }}
								</form>
							</li>
							@endif
						</ul>
						<ul>
							<li class="slide-toggle-2"><a href="#"><i class="fa fa-skype"></i>网站服务</a>
								<ul class="show-toggle-2">
									<li><a href="/shop/admission">商家入驻</a></li>
									<li><a href="{{ route('register') }}">客服中心</a></li>
									<li><a href="{{ route('register') }}">问题反馈</a></li>
									<li><a href="/admin">网站后台</a></li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- header-top-area-end -->
	<!-- header-bottom-area-start -->
	<div class="header-bottom-area bg-color-1 ptb-25">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="logo">
						<a href="index.html"><img src="/homes/img/logo.png" alt="" /></a>
					</div>
				</div>
				<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
					<div class="header-bottom-middle">
						<div class="top-search">
							<span class="tex_top_skype"><i class="fa fa-skype"></i>Skype: <span class="">Support.skype</span></span>
							<span class="tex_top_email"><i class="fa fa-envelope"></i>Email: <span class="">demo@towerthemes.com</span></span>
						</div>
						<div class="search-box">
							<form action="#">
								<select name="#" id="select">
									<option value="">All categories</option>
									<option value="40">Accessories</option>
									<option value="41">Clothing</option>
									<option value="42">-Hoodies</option>
									<option value="47">-T-shirts</option>
									<option value="43">Men's</option>
									<option value="50"> -Hats</option>
									<option value="44">Music</option>
									<option value="46">-Singles</option>
									<option value="49">-Albums</option>
									<option value="45">Posters</option>
									<option value="48">Women's</option>
									<option value="51">-Hats</option>
									<option value="52">----Shoes</option>
									<option value="53">----Scarves</option>
									<option value="54">Jewellery</option>
									<option value="55">---Rings</option>
									<option value="56">----Gold Ring</option>
									<option value="57">----platinum ring</option>
									<option value="58">----Silver Ring</option>
									<option value="59">----Diamond rings</option>
									<option value="60">---Necklaces</option>
									<option value="61">----Diamond necklaces</option>
									<option value="62">----Pearl necklaces</option>
									<option value="63">----Silver necklaces</option>
									<option value="64">----Statement necklaces</option>
									<option value="65">Equipments</option>
									<option value="73">---Accessories</option>
									<option value="78">----headphone</option>
									<option value="79">----health</option>
									<option value="80">----camera</option>
									<option value="74">---beauty</option>
									<option value="75">----run</option>
									<option value="76">----evening</option>
									<option value="77">----coats</option>
									<option value="66">Watches</option>
									<option value="67">Books</option>
									<option value="68">Sports</option>
									<option value="69">Gifts</option>
								</select>
								<input type="text" placeholder="Search...">
								<button><i class="fa fa-search"></i></button>
							</form>
						</div>
					</div>
					<div class="header-bottom-right">
						<div class="left-cart">
							<div class="header-compire">
								<a href="#"><i class="fa fa-heart"></i> Wish List 0 </a>
								<a href="#"><i class="fa fa-refresh"></i> Compare  0 </a>
							</div>
						</div>
						<div class="shop-cart-area">
							<div class="top-cart-wrapper">
								<div class="block-cart">
									<div class="top-cart-title">
										<a href="{{ action('CartController@index') }}">
											<span class="title-cart">my cart</span>
											<span class="count-item">
												@if(Auth::check() && Auth::user())
													items <span id="count_item">{{$carts_data->count()}}</span>
												@else
													items <span id="count_item">0</span>
												@endif
											</span>
											<span class="price small_sub_total">
												@if(Auth::check() && Auth::user())

												@else
													$0
												@endif
											</span>
										</a>
									</div>
									<div class="top-cart-content">
										<ol class="mini-products-list" id="small_cart_data">

										@if(Auth::check() && Auth::user())
											@foreach($carts_data as $cart_data)
											<li class="small_cart commodity{{$cart_data->id}}">
												<a class="product-image" href="{{action('CommodityController@product',$cart_data->commodities->id)}}">
													<img alt="" src="{{$cart_data->commodities->compictures->first()->image}}">
												</a>
												<div class="product-details">
													<p class="cartproduct-name">
														<a href="{{action('CommodityController@product',$cart_data->commodities->id)}}">{{$cart_data->commodities->name}}</a>
													</p>
													<strong class="qty">qty:
														<span class="small_num small_num_{{$cart_data->id}}">{{$cart_data->num}}</span>
														<span class="small_sku">{{$cart_data->sku->s_value}}</span>
													</strong>
													<span class="sig-price small_price">
														@if($cart_data->commodities->activity_id == 0)
				                                        <span style="color:green">$</span>
				                                        <span class="amount" style="color:green;">{{$cart_data->sku->price}}</span>
				                                        @else
				                                        <del style="color:red;">${{$cart_data->sku->price}}</del>
				                                        <span style="color:green;">$</span>
				                                        <span class="amount" style="color:green;">{{$cart_data->sku->price/$cart_data->commodities->activity->calculation}}</span>
				                                        @endif
													</span>
													<span class="small_total">
														total:<span class="small_cart_total" style="fonst-size:20px;color:blue;"></span>
													</span>
												</div>
												<div class="pro-action">
													<a class="btn-remove small_remove_cart" href="javascript:" cart_id="{{$cart_data->id}}">remove</a>
												</div>
											</li>
											@endforeach
										@endif

										</ol>
										@if(Auth::user() && Auth::check())
										<div class="top-subtotal">
											Subtotal: <span class="sig-price small_sub_total"></span>
										</div>
										<div class="cart-actions">
											<form action="{{action('CartController@index')}}" method="get">
												<button type="submit"><span>Checkout</span></button>
											</form>
										</div>
										@else
										<div class="top-subtotal">
											登录之后才能看到自己的商品喔 - . - !
										</div>
										@endif
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- header-bottom-area-end -->
</header>																											<!-- header -->
<!-- mainmenu-area-start -->
<div class="mainmenu-area bg-color-2 hidden-xs hidden-sm">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-3">
				<div class="mainmenu-left visible-lg  visible-md">
					<div class="product-menu-title">
						<h2>All categories <i class="fa fa-arrow-circle-down"></i></h2>
					</div>
					<div class="product_vmegamenu" style="@if(isset($block))display:block; @else display:none; @endif">
						<ul>
							@foreach($cates as $cate)
							<li>
								<a href="/cate/f_cate/{{$cate->id}}"  class="hover-icon"><img src="/homes/img/menu-l/22.png" alt="" style="width:42px;height:42px;"/>{{$cate['cate']}}</a>
								<div class="vmegamenu @if(count($cate['son'])<=15) vmegamenu2 @endif">
									@foreach(cate_all_son(count($cate['son']),$cate['id']) as $son)

											<span>
												@foreach($son as $mson)
													<a href='/cate/s_cate/{{$mson['id']}}'>{{$mson['cate']}}</a>
												@endforeach
											</span>

									@endforeach
								</div>
							</li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>
			<div class="col-lg-9 col-md-9">
				<div class="mainmenu">
					<nav>
						<ul>
							<li><a href="{{ action('HomeController@index') }}">Home</a></li>
							<li><a href="about.html">About</a></li>
							<li><a href="shop.html">Shop</a></li>
							<li><a href="{{ action('CartController@index') }}">Cart</a></li>
							<li><a href="/login">Login</a></li>
							<li><a href="{{ action('UserController@index') }}">My Account</a></li>
							<li><a href="contact-us.html">Contact Us</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- mobile-menu-start -->
<div class="mobile-menu-area hidden-md hidden-lg">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="mobile-menu">
					<nav id="mobile-menu">
						<ul>
							<li><a href="{{ action('HomeController@index') }}">Home</a></li>
							<li><a href="about.html">About</a></li>
							<li><a href="shop.html">Shop</a></li>
							<li><a href="{{ action('CartController@index') }}">Cart</a></li>
							<li><a href="/login">Login</a></li>
							<li><a href="{{ action('UserController@index') }}">My Account</a></li>
							<li><a href="contact-us.html">Contact Us</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- mobile-menu-end -->
<!-- mainmenu-area-end -->
@section('content')
@show
<!-- newletter-area-start -->
<div class="newletter-area ptb-30">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
				<div class="newletter-logo">
					<a href="#"><img src="/homes/img/logo.png" alt="" /></a>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="subscribe-form">
					<form action="#">
						<input placeholder="Email address..." type="text">
						<button class="subscribe">Subscribe</button>
					</form>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<div class="subscribe-social text-right">
					<a href="#"><i class="fa fa-youtube"></i></a>
					<a href="#"><i class="fa fa-facebook"></i></a>
					<a href="#"><i class="fa fa-google-plus"></i></a>
					<a href="#"><i class="fa fa-twitter"></i></a>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- newletter-area-end -->
<footer>
	<!-- footer-top-area -->
	<div class="footer-top-area border-1 ptb-30 bg-color-3">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="footer-title">
						<h4>Store Information</h4>
					</div>
					<div class="footer-widget">
						<div class="contact-info">
							<ul>
								<li>
									<div class="contact-icon">
										<i class="fa fa-home"></i>
									</div>
									<div class="contact-text">
										<span>PO Box 16122 Collins Street West Victoria 8007 Australia</span>
									</div>
								</li>
								<li>
									<div class="contact-icon">
										<i class="fa fa-envelope-o"></i>
									</div>
									<div class="contact-text">
										<a href="#"><span>demo@towerthemes.com</span></a>
									</div>
								</li>
								<li>
									<div class="contact-icon">
										<i class="fa fa-phone"></i>
									</div>
									<div class="contact-text">
										<span>(+1)866-550-3669</span>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="footer-title">
						<h4>Information</h4>
					</div>
					<div class="footer-widget">
						<div class="list-unstyled">
							<ul>
								<li><a href="#">About Us</a></li>
								<li><a href="#">Delivery Information</a></li>
								<li><a href="#">Privacy Policy</a></li>
								<li><a href="#">Terms & Conditions</a></li>
								<li><a href="#">Contact Us</a></li>
								<li><a href="#">Site Map</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="footer-title">
						<h4>My Account</h4>
					</div>
					<div class="footer-widget">
						<div class="list-unstyled">
							<ul>
								<li><a href="#">My Account</a></li>
								<li><a href="#">Order History</a></li>
								<li><a href="#">Wish List</a></li>
								<li><a href="#">Newsletter</a></li>
								<li><a href="#">Specials</a></li>
								<li><a href="#">Brands</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="footer-title">
						<h4>Instagram</h4>
					</div>
					<div class="footer-widget">
						<div class="footer-widget-img">
							<div class="single-img">
								<a href="#"><img src="/homes/img/footer/1.jpg" alt="" /></a>
							</div>
							<div class="single-img">
								<a href="#"><img src="/homes/img/footer/2.jpg" alt="" /></a>
							</div>
							<div class="single-img">
								<a href="#"><img src="/homes/img/footer/3.jpg" alt="" /></a>
							</div>
							<div class="single-img">
								<a href="#"><img src="/homes/img/footer/4.jpg" alt="" /></a>
							</div>
							<div class="single-img">
								<a href="#"><img src="/homes/img/footer/5.jpg" alt="" /></a>
							</div>
							<div class="single-img">
								<a href="#"><img src="/homes/img/footer/6.jpg" alt="" /></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>
<!-- copyright-area-start -->
<div class="copyright-area text-center bg-color-3">
	<div class="container">
		<div class="copyright-border ptb-30">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="copyright text-left">
						<p>Copyright &copy; 2017.Company name All rights reserved.</p>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="payment text-right">
						<a href="#"><img src="/homes/img/payment.png" alt="" /></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- copyright-area-end -->

<!-- all js here -->
<!-- jquery-1.12.0 -->
<script type="text/javascript" src='{{asset("js/app.js")}}'></script>
<script src="/homes/js/vendor/jquery-1.12.0.min.js"></script>
<!-- bootstrap.min.js -->
<script src="/homes/js/bootstrap.min.js"></script>
<!-- nivo.slider.js -->
<script src="/homes/js/jquery.nivo.slider.pack.js"></script>
<!-- jquery-ui.min.js -->
<script src="/homes/js/jquery-ui.min.js"></script>
<!-- jquery.magnific-popup.min.js -->
<script src="/homes/js/jquery.magnific-popup.min.js"></script>
<!-- jquery.meanmenu.min.js -->
<script src="/homes/js/jquery.meanmenu.js"></script>
<!-- jquery.scrollup.min.js-->
<script src="/homes/js/jquery.scrollup.min.js"></script>
<!-- owl.carousel.min.js -->
<script src="/homes/js/owl.carousel.min.js"></script>
<!-- plugins.js -->
<script src="/homes/js/plugins.js"></script>
<!-- main.js -->
<script src="/homes/js/main.js"></script>
<!-- csjl -->
<script src="/sel/pcasunzip.js" charset="gb2312"></script>
<!-- layer -->
<script src="{{asset('/layer/layer.js')}}"></script>
<script type="text/javascript">
	$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

@if(Auth::check() && Auth::user())
	//小计和总计
	function small_count(){
		var count = 0;
		$('.small_cart').each(function(){
			var price = parseFloat($(this).find('.product-details').find('.small_price').find('.amount').html());
			var num = parseInt($(this).find('.product-details').find('.qty').find('.small_num').html());

			//写入小计
			$(this).find('.product-details').find('.small_total').find('.small_cart_total').html('$'+price*num);

			count += price*num;
		});

		$('.small_sub_total').html('$'+count);
	}

	small_count();

	//购物车页面中的小计和总计
	function cart_count(){
		var count = 0;
		$('.a').each(function(){
			var price = parseFloat($(this).find('td:eq(3)').find('.amount').html());
			var num = parseInt($(this).find('td:eq(4)').find('input').val());

			//写入小计
			$(this).find('td:eq(5)').find('span').html('$'+price*num);

			count += price*num;
		});

		$('#cart_total').html('$'+count);
	}

	//订单页面的小计和总和
	function order_count(){
		var count = 0;
		$('.ordera').each(function(){
			var price = parseFloat($(this).find('td:eq(3)').find('.amount').html());
			var num = parseInt($(this).find('td:eq(4)').html());

			//写入小计
			$(this).find('td:eq(5)').find('span').html('$'+price*num);

			count += price*num;
		});

		$('.cart_total').html('$'+count);
	    $("input[name='total']").val(count);
	}

	//小购物车中点击删除
	function del_small_cart(){
		$('.small_remove_cart').click(function(){
			let cart_id = $(this).attr('cart_id');
			$.ajax({
		        url:"{{action('CartController@del')}}",
		        type:'post',
		        data:{id:cart_id},
		        success:function(mes){
		            if(mes=='ok'){
						$('#count_item').html(parseInt($('#count_item').html()) - 1);
						$('.commodity'+cart_id).remove();
		                small_count();
						cart_count();
						order_count();
		                layer.msg('清除购物车成功');
		            }
		        }
		    });
		});
	}

	del_small_cart();
@endif
</script>

@section('js')
@show
</body>
</html>
