<!doctype html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>Home</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}" />

<link rel="icon" href="/homes/img/favicon.png" />
<!-- Place favicon.ico in the root directory -->

<!-- all css here -->
<!-- bootstrap.min.css -->
<link rel="stylesheet" href="/homes/css/bootstrap.min.css">
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


@section('css')
@show


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
									<li><a href="#">register</a></li>
									<li><a href="#">login</a></li>
								</ul>
							</li>
						</ul>
						<ul>
							<li><a href="#"><i class="fa fa-check"></i> Checkout</a></li>
						</ul>
						<ul>
							<li class="slide-toggle-2 text-uppercase"><a href="#"><i class="fa fa-usd"></i>USD</a>
								<ul class="show-toggle-2">
									<li><a href="#"><i class="fa fa-eur"></i> EUR</a></li>
									<li><a href="#"><i class="fa fa-gbp"></i> GBP</a></li>
									<li><a href="#"><i class="fa fa-usd"></i> USD</a></li>
								</ul>
							</li>
						</ul>
						<ul>
							<li class="slide-toggle-3 text-uppercase"><a href="#">fr-ca</a>
								<ul class="show-toggle-3">
									<li><a href="#">en-gb</a></li>
									<li><a href="#">fr-ca</a></li>
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
										<a href="#">
											<span class="title-cart">my cart</span>
											<span class="count-item">2 items</span>
											<span class="price">$444.00</span>
										</a>
									</div>
									<div class="top-cart-content">
										<ol class="mini-products-list">
											<!-- single item -->
											<li>
												<a class="product-image" href="product-details.html">
													<img alt="" src="/homes/img/cart/1.jpg">
												</a>
												<div class="product-details">
													<p class="cartproduct-name">
														<a href="product-details.html">Pellentesque habitant </a>
													</p>
													<strong class="qty">qty:1</strong>
													<span class="sig-price">$222.00</span>
												</div>
												<div class="pro-action">
													<a class="btn-remove" href="#">remove</a>
												</div>
											</li>
											<!-- single item -->
											<!-- single item -->
											<li>
												<a class="product-image" href="product-details.html">
													<img alt="" src="/homes/img/cart/2.jpg">
												</a>
												<div class="product-details">
													<p class="cartproduct-name">
														<a href="product-details.html">New catolog</a>
													</p>
													<strong class="qty">qty:1</strong>
													<span class="sig-price">$222.00</span>
												</div>
												<div class="pro-action">
													<a class="btn-remove" href="#">remove</a>
												</div>
											</li>
											<!-- single item -->

										</ol>
										<div class="top-subtotal">
											Subtotal: <span class="sig-price">$444.00</span>
										</div>
										<div class="cart-actions">
											<button><span>Checkout</span></button>
										</div>
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
								<a href="#"  class="hover-icon"><img src="/homes/img/menu-l/22.png" alt="" style="width:42px;height:42px;"/>{{$cate['cate']}}</a>
								<div class="vmegamenu @if(count($cate['son'])<=15) vmegamenu2 @endif">
									@foreach(cate_all_son(count($cate['son']),$cate['id']) as $son)

											<span>
												@foreach($son as $mson)
												<a href='#'>{{$mson['cate']}}</a>
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
							<li><a href="index.html">Home</a></li>
							<li><a href="about.html">About</a></li>
							<li><a href="shop.html">Shop</a></li>
							<li><a href="cart.html">Cart</a></li>
							<li><a href="login.html">Login</a></li>
							<li><a href="account.html">My Account</a></li>
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
							<li><a href="index.html">Home</a></li>
							<li><a href="about.html">About</a></li>
							<li><a href="shop.html">Shop</a></li>
							<li><a href="cart.html">Cart</a></li>
							<li><a href="login.html">Login</a></li>
							<li><a href="account.html">My Account</a></li>
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
<!-- social_block-start -->
<div id="social_block">
	<ul>
		<li class="facebook"><a href="#">Facebook</a></li>
		<li class="twitter"><a href="#">twitter</a></li>
		<li class="rss"><a href="#">rss</a></li>
		<li class="youtube"><a href="#">youtube</a></li>
		<li class="google-plus"><a href="#">google plus</a></li>
		<li class="pinterest"><a href="#">pinterest</a></li>
	</ul>
</div>
<!-- social_block-end -->


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

@section('js')
@show
</body>
</html>
