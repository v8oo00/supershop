@extends('layouts.home')
@section('css')
<style>
    .pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover{
        background-color: #444444;
        border-color: #444444;
        color:#ffae00;
    }
</style>
@endsection
@section('content')
<!-- breadcrumb start -->
<div class="breadcrumb-area">
	<div class="container">
		<ol class="breadcrumb">
		  <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
		  <li class="active">Cate</li>
		</ol>
	</div>
</div>
<!-- breadcrumb end -->

<!-- shop-area start -->
<div class="shop-area">
	<div class="container">
		<div class="row">
			<div class="col-md-3 col-sm-4">
				<div class="column mt-55">
					<h2 class="title-block">主题商场</h2>
					<div class="sidebar-widget">
						<h3 class="sidebar-title">全部商品分类</h3>
						<ul class="sidebar-menu">
							@foreach($f_cates as $f_cate)
                                <li><a href="/cate/f_cate/{{$f_cate->id}}" style="@if($f_cate->id == App\Cate::findOrFail($cate_id)->pid) color:#F39C11; @endif">{{$f_cate->cate}}</a></li>
                            @endforeach
						</ul>
					</div>
					<div class="sidebar-widget">
						<h3 class="sidebar-title">SMALLCATE</h3>
						<ul class="sidebar-menu">
                            @foreach($s_cates as $s_cate)
                                <li><a href="/cate/s_cate/{{$s_cate->id}}" style="@if($s_cate->id == $cate_id) color:#F39C11; @endif">{{$s_cate->cate}}</a></li>
                            @endforeach
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-9 col-sm-8">
				<h2 class="page-heading mt-40">
					<span class="cat-name">{{App\Cate::findOrFail($cate_id)->cate}}</span>
					<span class="heading-counter">There are 13 products.</span>
				</h2>
				<div class="shop-page-bar">
					<div>
						<div class="shop-bar">
							<!-- Nav tabs -->
							<ul class="shop-tab f-left" role="tablist">
								<li role="presentation" class="active"><a href="#home" data-toggle="tab"><i class="fa fa-th-large" aria-hidden="true"></i></a></li>
								<li role="presentation"><a href="#profile" data-toggle="tab"><i class="fa fa-th-list" aria-hidden="true"></i></a></li>
							</ul>
							<div class="selector-field f-left ml-20 hidden-xs">
								<form action="#">
									<label>Sort by</label>
									<select name="select">
										<option value="">----</option>
										<option value="">Price: Lowest first</option>
										<option value="">Price: Highest first</option>
										<option value="">Product Name: A to Z</option>
										<option value="">Product Name: Z to A</option>
										<option value="">In stock</option>
										<option value="">Reference: Lowest first</option>
										<option value="">Reference: Highest first</option>
									</select>
								</form>
							</div>
							<div class="selector-field f-left ml-30 hidden-xs">
								<form action="#">
									<label>Show</label>
									<select name="select">
										<option value="">12</option>
										<option value="">13</option>
										<option value="">14</option>
									</select>
								</form>
							</div>
							<div class="selector-field f-right ml-30">
								<form action="#">
									<button class="compare">Compare (1)</button>
								</form>
							</div>
						</div>
						<!-- Tab panes -->
						<div class="tab-content">
							<div role="tabpanel" class="tab-pane active" id="home">
								<div class="row">
                                    @foreach($cate_commodity as $key =>$commodity)
    									<div class="col-lg-4 col-md-4 col-sm-6">
    										<div class="single-product mb-30  white-bg">
    											<div class="product-img pt-20">
    												<a href="/commodity/{{$commodity->id}}"><img src="{{$commodity->picture}}" alt="" /></a>
    											</div>
    											<div class="product-content product-i">
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
    													<div class="product-icon-right floatright">
    														<a href="#" data-toggle="tooltip" title="Compare"><i class="fa fa-exchange"></i></a>
    														<a href="#" data-toggle="tooltip" title="Wishlist"><i class="fa fa-heart"></i></a>
    													</div>
    												</div>
    											</div>
                                                @if($key <=9)
                                                    <span class="new">hot</span>
                                                @endif
    										</div>
    									</div>
                                    @endforeach
								</div>


								<div class="content-sortpagibar" style='text-align:center;'>
									{{ $cate_commodity->links() }}
								</div>
							</div>
							<div role="tabpanel" class="tab-pane" id="profile">
								<div class="row">
                                    @foreach($cates_com as $key =>$commodity)
									<div class="col-lg-12">
										<div class="single-product  shop-single-product mb-30 white-bg">
											<div class="product-img pt-20">
												<a href="/commodity/{{$commodity->id}}"><img src="{{$commodity->picture}}" alt="" /></a>
											</div>
											<div class="product-content">
												<div class="pro-title">
													<h4><a href="/commodity/{{$commodity->id}}">{{$commodity->name}}</a></h4>
												</div>
												<div class="pro-rating mb-20">
													<a><i class="fa fa-star"></i></a>
													<a><i class="fa fa-star"></i></a>
													<a><i class="fa fa-star"></i></a>
													<a><i class="fa fa-star"></i></a>
													<a><i class="fa fa-star-o"></i></a>
												</div>
												<p>{{$commodity->desc}}</p>
												<div class="price-box">
													<span class="price product-price">${{$commodity->price}}</span>
												</div>
												<div class="product-icon">
													<div class="product-icon-left f-left">
														<a href="/commodity/{{$commodity->id}}"><i class="fa fa-shopping-cart"></i>Add to Cart</a>
													</div>
													<div class="product-icon-right floatright">
														<a href="#" data-toggle="tooltip" title="Compare"><i class="fa fa-exchange"></i></a>
														<a href="#" data-toggle="tooltip" title="Wishlist"><i class="fa fa-heart"></i></a>
													</div>
												</div>
											</div>
										</div>
									</div>
                                    @endforeach
								</div>
								<div class="content-sortpagibar" style='text-align:center;'>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- shop-area end -->
@endsection

@section('js')

@endsection
