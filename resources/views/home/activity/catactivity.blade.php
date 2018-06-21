@extends('layouts.home')

@section('css')
@endsection

@section('content')
<div class="breadcrumb-area">
	<div class="container">
		<ol class="breadcrumb">
		  <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
		  <li class="active">Activity</li>
		</ol>
	</div>
</div>
<div class="container">
    <div class="row" style='background-color:#fff'>
        <div class="col-md-12">

            <div class="col-md-6">
                <div class="col-md-12" style='padding:0px;margin-top:80px;'>
                    <div class="col-md-2" style='padding:0px;text-align:right;'>
                        活动名称 :
                    </div>
                    <div class="col-md-6" style='padding:0px;font-weight:bold;padding-left:10px;'>
                        {{$activity->name}}
                    </div>
                </div>
                <div class="col-md-12" style='padding:0px;margin-top:10px;'>
                    <div class="col-md-2" style='padding:0px;text-align:right;'>
                        活动规则 :
                    </div>
                    <div class="col-md-6" style='padding:0px;font-weight:bold;padding-left:10px;'>
                        {{$activity->rule}}
                    </div>
                </div>
                <div class="col-md-12" style='padding:0px;margin-top:10px;'>
                    <div class="col-md-2" style='padding:0px;text-align:right;'>
                        活动计算 :
                    </div>
                    <div class="col-md-6" style='padding:0px;font-weight:bold;padding-left:10px;'>
                        活动价格 = 商品原价 / 活动折扣({{$activity->calculation}})
                    </div>
                </div>
                <div class="col-md-12" style='padding:0px;margin-top:10px;'>
                    <div class="col-md-2" style='padding:0px;text-align:right;'>

                    </div>
                    <div class="col-md-6" style='padding:0px;font-weight:bold;padding-left:10px;color:green'>
                        例：100/{{$activity->calculation}} = {{100/$activity->calculation}}
                    </div>
                </div>
                <div class="col-md-12" style='padding:0px;margin-top:10px;'>
                    <div class="col-md-2" style='padding:0px;text-align:right;'>
                        活动开始 :
                    </div>
                    <div class="col-md-6" style='padding:0px;font-weight:bold;padding-left:10px;'>
                        {{date('Y-m-d',$activity->start_time)}}
                    </div>
                </div>
                <div class="col-md-12" style='padding:0px;margin-top:10px;'>
                    <div class="col-md-2" style='padding:0px;text-align:right;'>
                        活动结束 :
                    </div>
                    <div class="col-md-6" style='padding:0px;font-weight:bold;padding-left:10px;'>
                        {{date('Y-m-d',$activity->end_time)}}
                    </div>
                </div>
                <div class="col-md-12" style='padding:0px;margin-top:10px;'>
                    <div class="col-md-2" style='padding:0px;text-align:right;'>
                        活动商品数量 :
                    </div>
                    <div class="col-md-6" style='padding:0px;font-weight:bold;padding-left:10px;'>
                        {{count($activity->commodities)}}
                    </div>
                </div>
            </div>
            <div class="col-md-6" style='padding:10px;text-align:center;'>
                <img src="{{$activity->image}}" alt="" style=''>
            </div>
        </div>

        <div class="col-md-12" style='margin-top:30px;border-top:1px solid #ccc;padding-top:30px;'>
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
