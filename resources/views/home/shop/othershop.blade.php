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
            <button type="button" name="button" class='btn btn-warning btn-lg' style='margin-top:35px;margin-bottom:35px;'><i class='fa fa-plus' style='margin-right:5px'></i>收藏店铺</button>
            <a href='/shop/catshop/othershop/{{$shop->id}}/all' class='btn btn-default btn-lg' style='margin-top:35px;margin-bottom:35px;'>所有宝贝</a>
            <a href='/shop/catshop/othershop/{{$shop->id}}/sale' class='btn btn-default btn-lg' style='margin-top:35px;margin-bottom:35px;'>销量排行</a>
            <a href='/shop/catshop/othershop/{{$shop->id}}/hot' class='btn btn-default btn-lg' style='margin-top:35px;margin-bottom:35px;'>当季热卖</a>
        </div>
        <div class="col-md-12" style='margin-top:50px;'>

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

</script>
@endsection
