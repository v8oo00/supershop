@extends('layouts.home')

@section('css')
@endsection

@section('content')
<div class="container">
    <div class="row" style='background-color:#fff;'>
        <div class="col-md-12">
            @if($str == 'no')
                <div class="col-md-12" style='text-align:center;font-size:40px;padding-top:100px;padding-bottom:100px;'>
                    <span class='fa fa-meh-o' style='color:#ccc;'>暂时没有您所搜索的商品呦~</span>
                    <br>
                    <br>
                    <span style='font-size:20px;color:#FFD893'>看看推荐商品吧</span>
                </div>
            @endif
        </div>
        <div class="col-md-12" style='border-top:1px solid #ccc;'>
            @if($str == 'no')
            <div class="col-md-12" style='border-bottom:1px solid #ccc;padding:0px;padding-top:30px;padding-bottom:30px;font-size:20px;'>
                推荐商品
            </div>
            @endif
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
@endsection
