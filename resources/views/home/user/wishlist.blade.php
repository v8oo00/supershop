@extends('layouts.home')

@section('content')
<div class="breadcrumb-area">
    <div class="container">
        <ol class="breadcrumb">
          <li><a href="{{action('HomeController@index')}}"><i class="fa fa-home"></i> Home</a></li>
          <li class="active">Wishlist</li>
        </ol>
    </div>
</div>


<div class="container">
    <div class="col-md-12">
        <div class="shop-page-bar">
            <div>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="home">
                        <div class="row">
                            @foreach($wishlists as $commodity)
                            <div class="col-lg-3 col-md-3">
                                <div class="single-product mb-30  white-bg">
                                    <div class="product-img pt-20">
                                        <a href="/commodity/{{$commodity->id}}"><img src="{{$commodity->compictures->first()->image}}" alt="" /></a>
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
                                            <span class="price product-price">${{$commodity->skus->first()->price}}</span>
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
@endsection
