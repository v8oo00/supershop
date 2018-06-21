@extends('layouts.home')

@section('css')
<link rel="stylesheet" href="{{asset('avatar/css/amazeui.min.css')}}">
<link rel="stylesheet" href="{{asset('avatar/css/amazeui.cropper.css')}}">
<link rel="stylesheet" href="{{asset('avatar/css/custom_up_img.css')}}">
<style media="screen">
    .shou:hover{
        cursor:pointer;
    }
    .form-group{
        margin-bottom:5px;
    }
    .orange-span,p{
        color:#666666;
    }
    th,td{
		text-align:center;
		line-height:58px !important;
        color:#666666;
	}
    h3{
		margin:0px;
        font-size:20px;
	}
</style>
@endsection

@section('content')
<div class="breadcrumb-area">
    <div class="container">
        <ol class="breadcrumb">
          <li><a href="{{action('HomeController@index')}}"><i class="fa fa-home"></i> Home</a></li>
          <li class="active">Personal</li>
        </ol>
    </div>
</div>

<div class="container">
    <a name="wodexinxi">
        <div class="row">
            <!--头像显示 开始-->
            <div class="col-md-4">
                <div class="up-img-cover" id="up-img-touch" style="width:350px;">
                    <img src="{{ Auth::user()->avatar }}" style="width:350px;height:350px;">
                    <div id="ziavatar" style="width:350px;height:0px;position:absolute;top:0px;background-color:black;color:white;text-align:center;line-height:350px;font-size:25px;overflow:hidden;">点击修改头像</div>
                </div>
            </div>
            <div class="col-md-8" style="">
    			<h2 style="font-size:25px;">Hello ! <strong id="uname">{{Auth::user()->name}}</strong></h2>
    			<p>账户注册时间：{{Auth::user()->created_at}}</p>
                <form  action='' class="row form-horizontal"  style='padding-left:0px;padding-right:0px;' >
    				<div class='col-md-8' >

    					<div class='form-group' style="height:50px;">
    						<label style="height:100%;padding-top:15px;font-weight:bold;text-align:left;" class='control-label col-md-2' for="nickname">昵称</label>
                            <div style="margin-top:10px;display:none;">
        						<div class="col-md-6">
        							<input class='form-control'  value="{{Auth::user()->name}}" name='name' type="text">
        						</div>
                                <div class="col-sm-4">
                                    <button class="btn btn-default bc bcmsg" style="margin-left:-10px;background-color:#0F88EB;color:white;width:64px;height:35px;" type="button">保存</button>
                                    <button class="btn btn-default qx" style="width:64px;height:35px;margin-left:10px;" type="button">取消</button>
                                </div>
                            </div>
                            <div class="shouhover">
                                <div class="col-sm-offset-2" style="height:52px;padding-left:10px;font-size:16px;">
                                    <span style="float:left;font-size:15px;margin-left:5px;line-height:50px;" class="orange-span">{{ Auth::user()->name }}</span>
                                    <div style="float:left;color:#175199;margin-left:10px;" class="shou">
                                        <span style="height:100%;line-height:50px;font-size:12px;" class="glyphicon glyphicon-user"></span>
                                        <span>编辑昵称</span>
                                    </div>
                                </div>
                            </div>
    					</div>

                        <div class='form-group' style="height:50px;">
    						<label style="height:100%;padding-top:15px;font-weight:bold;text-align:left;" class='control-label col-md-2' for="nickname">性别</label>
                            <div style="margin-top:10px;display:none;">
        						<div class="col-md-3" style="padding-top:6px;">
        							<input class='form-control'  value='0' name='sex' type="radio" style="float:left;width:16px;height:16px;" @if(Auth::user()->sex == 0) checked @endif /><span style="float:left;margin-left:5px;margin-right:10px;" class="orange-span">女</span>
                                    <input class="form-control" type="radio" name="sex" value="1" style="float:left;width:16px;height:16px;" @if(Auth::user()->sex == 1) checked @endif /><span style="float:left;margin-left:5px;margin-right:10px;" class="orange-span">男</span>
        						</div>
                                <div class="col-sm-7">
                                    <button class="btn btn-default bc bcsex" style="margin-left:-10px;background-color:#0F88EB;color:white;width:64px;height:35px;" type="button">保存</button>
                                    <button class="btn btn-default qx" style="width:64px;height:35px;margin-left:10px;" type="button">取消</button>
                                </div>
                            </div>
                            <div class="shouhover">
                                <div class="col-sm-offset-2" style="height:52px;padding-left:10px;font-size:16px;">
                                    <span style="float:left;font-size:15px;margin-left:5px;line-height:50px;" class="orange-span">@if(Auth::user()->sex == 0) 女 @elseif(Auth::user()->sex == 1) 男 @else 未知 @endif</span>
                                    <div style="float:left;color:#175199;margin-left:10px;" class="shou">
                                        <span style="height:100%;line-height:50px;font-size:12px;" class="glyphicon glyphicon-pencil"></span>
                                        <span>编辑性别</span>
                                    </div>
                                </div>
                            </div>
    					</div>

                        <div class='form-group' style="height:50px;">
    						<label style="height:100%;padding-top:15px;font-weight:bold;text-align:left;" class='control-label col-md-2' for="nickname">电话</label>
                            <div style="margin-top:10px;display:none;">
        						<div class="col-md-6">
        							<input class='form-control'  value="@if(Auth::user()->phone != 0) {{Auth::user()->phone}} @endif" name='phone' type="tel">
        						</div>
                                <div class="col-sm-4">
                                    <button class="btn btn-default bc bcmsg" style="margin-left:-10px;background-color:#0F88EB;color:white;width:64px;height:35px;" type="button">保存</button>
                                    <button class="btn btn-default qx" style="width:64px;height:35px;margin-left:10px;" type="button">取消</button>
                                </div>
                            </div>
                            <div class="shouhover">
                                <div class="col-sm-offset-2" style="height:52px;padding-left:10px;font-size:16px;">
                                    <span style="float:left;font-size:15px;margin-left:5px;line-height:50px;" class="orange-span">@if(Auth::user()->phone != 0) {{Auth::user()->phone}} @endif</span>
                                    <div style="float:left;color:#175199;margin-left:10px;" class="shou">
                                        <span style="height:100%;line-height:50px;font-size:12px;" class="glyphicon glyphicon-phone"></span>
                                        <span>编辑电话</span>
                                    </div>
                                </div>
                            </div>
    					</div>

                        <div class='form-group' style="height:50px;">
    						<label style="height:100%;padding-top:15px;font-weight:bold;text-align:left;" class='control-label col-md-2' for="nickname">QQ</label>
                            <div style="margin-top:10px;display:none;">
        						<div class="col-md-6">
        							<input class='form-control'  value="@if(Auth::user()->qq != 0) {{Auth::user()->qq}} @endif" name='qq' type="tel">
        						</div>
                                <div class="col-sm-4">
                                    <button class="btn btn-default bc bcmsg" style="margin-left:-10px;background-color:#0F88EB;color:white;width:64px;height:35px;" type="button">保存</button>
                                    <button class="btn btn-default qx" style="width:64px;height:35px;margin-left:10px;" type="button">取消</button>
                                </div>
                            </div>
                            <div class="shouhover">
                                <div class="col-sm-offset-2" style="height:52px;padding-left:10px;font-size:16px;">
                                    <span style="float:left;font-size:15px;margin-left:5px;line-height:50px;" class="orange-span">@if(Auth::user()->qq != 0) {{Auth::user()->qq}} @endif</span>
                                    <div style="float:left;color:#175199;margin-left:10px;" class="shou">
                                        <span style="height:100%;line-height:50px;font-size:12px;" class="glyphicon glyphicon-hand-right"></span>
                                        <span>编辑QQ</span>
                                    </div>
                                </div>
                            </div>
    					</div>

                        <div class='form-group' style="height:50px;">
    						<label style="height:100%;padding-top:15px;font-weight:bold;text-align:left;" class='control-label col-md-2' for="nickname">余额</label>
                            <div style="margin-top:10px;display:none;">
        						<div class="col-md-6">
        							<input class='form-control' name='money' type="number" placeholder="请输入充值金额" />
        						</div>
                                <div class="col-sm-4">
                                    <button class="btn btn-default bc cz" style="margin-left:-10px;background-color:#0F88EB;color:white;width:64px;height:35px;" type="button">充值</button>
                                    <button class="btn btn-default qx" style="width:64px;height:35px;margin-left:10px;" type="button">取消</button>
                                </div>
                            </div>
                            <div class="shouhover">
                                <div class="col-sm-offset-2" style="height:52px;padding-left:10px;font-size:16px;">
                                    <span style="float:left;font-size:15px;margin-left:5px;line-height:50px;" class="orange-span">{{ Auth::user()->money }}</span><span style="float:left;line-height:50px;" class="orange-span">￥</span>
                                    <div style="float:left;color:#175199;margin-left:10px;" class="shou">
                                        <span style="height:100%;line-height:50px;font-size:12px;" class="glyphicon glyphicon-info-sign"></span>
                                        <span>充值</span>
                                    </div>
                                </div>
                            </div>
    					</div>

    				</div>
    			</form>

            </div>



    	</div>
    </a>

    <a name="wodedingdan">
        <div class="panel panel-default" style="margin-top:30px;">
    		<div class="panel-heading">
    			<h3>订单管理</h3>
    		</div>

    		<div class="panel-body">
    			<div class="table-responsive">
    			  <table class="table table-hover table-striped">
    			  	<thead>
    			  		<tr>
    						<th>订单</th>
    						<th>订单日期</th>
    						<th>订单地址</th>
    						<th>订单状态</th>
    						<th>操作</th>
    					</tr>
    			  	</thead>
    			  	<tbody>
    			  	@foreach($orders as $order)
    			  		<tr class='g{{$order->id}} xx' info="false" >
    						<td class="xiala">{{$order->id}}</td>
    						<td>{{$order->created_at}}</td>
    						<td>{{getOrderAddressById($order->address_id)}}</td>
    						<td>{{getOrderStatus($order->status)}}</td>
    						<td>
    							<button class="btn btn-danger queren" @if($order->status != 1) disabled @endif>确认收货</button>
    						</td>
    					</tr>
                        @foreach($order->details as $detail)
                            <tr class="shop good{{$order->id}}" style="text-align:center;overflow:hidden;background:white;" >
                                <td style="line-height:55px;padding:0px;"><div style="height:0px;overflow:hidden;opacity:0;">{{getSku($detail->sku_id)->commodity->cate->cate}}</div></td>
                                <td style="line-height:55px;padding:0px;">
                                    <div style="height:0px;overflow:hidden;opacity:0;">
                                        <a href="/commodity/{{getSku($detail->sku_id)->commodity->id}}"><img src="{{getSku($detail->sku_id)->commodity->compictures->first()->image}}" width='40px' alt=""></a>
                                    </div>
                                </td>
                                <td style="line-height:55px;padding:0px;"><div style="height:0px;overflow:hidden;opacity:0;">{{getSku($detail->sku_id)->commodity->name}} × {{$detail->num}}</div></td>
                                <td style="line-height:55px;padding:0px;"><div style="height:0px;overflow:hidden;opacity:0;">{{getSku($detail->sku_id)->s_value}}</div></td>
                                <td style="line-height:55px;padding:0px;"><div style="height:0px;overflow:hidden;opacity:0;">{{getSku($detail->sku_id)->price}}$ × {{$detail->num}} = {{getSku($detail->sku_id)->price * $detail->num}}$</div></td>
                            </tr>
                        @endforeach
    				@endforeach
    			  	</tbody>
    			  </table>
    			</div>

    		</div>
    	</div>
    </a>

    <a name="wodedizhi">
        <div class="panel panel-default" >
			<div class="panel-heading">
				<h3>收货地址</h3>

			</div>

			<div class="panel-body">
				<div class="table-responsive">
				  <table class="table table-hover table-striped">
				  	<thead>
				  		<tr style="color:#666666;">
							<th>收货人姓名</th>
							<th>所在地区</th>
							<th>详细地址</th>
							<th>手机号</th>
							<th>操作</th>
						</tr>
				  	</thead>
				  	<tbody id="tb">
				  		@foreach($AllAddress as $address)
				  		<tr style="color:#666666;">
							<td>{{$address->username}}</td>
							<td>{{$address->province}},{{$address->city}},{{$address->county}}</td>
							<td>{{$address->street}}</td>
							<td>{{$address->userphone}}</td>
							<td>
								<button class="btn btn-danger" sb="scdz" info="{{$address->id}}">删除地址</button>
								<button class="btn btn-danger" sb="swmr" info1="{{$address->id}}" @if($address->id == Auth::user()->address_id) disabled @endif>@if($address->id == Auth::user()->address_id)默认地址@else设为默认@endif</button>
							</td>
						</tr>
						@endforeach
				  	</tbody>
				  </table>
				</div>

                <form class="row form-horizontal" id="empty">
					<div class='col-md-12'  >
						<div class='form-group' >
							<label class='control-label col-md-2 col-sm-2' for="nickname">收货人：</label>
							<div class="col-md-8 col-xs-10">
								<input class='form-control' name="username" type="text" placeholder="请输入收货人姓名">
							</div>
						</div>
						<div class='form-group' >
							<label class='control-label col-md-2 col-sm-2' for="nickname">手机号码：</label>
							<div class="col-md-8 col-xs-10">
								<input class='form-control' name="userphone" type="tel" placeholder="请输入收货人手机号">
							</div>
						</div>
						<div class='form-group' >
							<label class='control-label col-md-2 col-xs-3 col-sm-2' for="nickname">所在地区：</label>
							<div class="col-md-8 col-xs-12 col-sm-10" style='padding:0px;'>
								<div class="col-md-3 col-xs-3 selectInput" >
									<select name="province" id="province" class="form-control"></select>
								</div>
								<div class="col-md-3 col-xs-3 selectInput" >
									<select name="city" id="city" class="form-control"></select>
								</div>
								<div class="col-md-3 col-xs-3 selectInput" >
									<select name="county" id="area" class="form-control"></select>
								</div>
							</div>

						</div>
						<div class='form-group' >
							<label class='control-label col-md-2 col-sm-2' for="nickname">详细地址：</label>
							<div class="col-md-8 col-xs-10">
								<input class='form-control' name="street" type="text" placeholder="请输入街道地址">
							</div>
						</div>
					</div>
					<!-- 另起一行 -->
					<div class='col-md-12' >
						<button type='submit' class='btn btn-info btn-sm pull-right' id="address">添加地址</button>
					</div>
				</form>
            </div>
        </div>
    </a>
</div>
<!-- 修改头像 -->

<!--图片上传框-->
<div class="am-modal am-modal-no-btn up-modal-frame" tabindex="-1" id="up-modal-frame">
  <div class="am-modal-dialog up-frame-parent up-frame-radius">
    <div class="am-modal-hd up-frame-header">
       <label>修改头像</label>
      <a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
    </div>
    <div class="am-modal-bd  up-frame-body">
      <div class="am-g am-fl">

        <div class="am-form-group am-form-file">
          <div class="am-fl">
            <button type="button" class="am-btn am-btn-default am-btn-sm">
              <i class="am-icon-cloud-upload"></i> 选择要上传的文件</button>
          </div>
          <input type="file" class="up-img-file">
        </div>
      </div>
      <div class="am-g am-fl">
        <div class="up-pre-before up-frame-radius">
            <img alt="" src="{{Auth::user()->avatar}}" class="up-img-show" id="up-img-show" >
        </div>
        <div class="up-pre-after up-frame-radius">
        </div>
      </div>
      <div class="am-g am-fl">
        <div class="up-control-btns">
            <span class="am-icon-rotate-left"   id="up-btn-left"></span>
            <span class="am-icon-rotate-right"  id="up-btn-right"></span>
            <span class="am-icon-check up-btn-ok" url="/account/updateAvatar"
                parameter="{width:'350',height:'350'}">
            </span>
        </div>
      </div>

    </div>
  </div>
</div>

<!--加载框-->
<div class="am-modal am-modal-loading am-modal-no-btn" tabindex="-1" id="up-modal-loading">
  <div class="am-modal-dialog">
    <div class="am-modal-hd">正在上传...</div>
    <div class="am-modal-bd">
      <span class="am-icon-spinner am-icon-spin"></span>
    </div>
  </div>
</div>

<!--警告框-->
<div class="am-modal am-modal-alert" tabindex="-1" id="up-modal-alert">
  <div class="am-modal-dialog">
    <div class="am-modal-hd">信息</div>
    <div class="am-modal-bd"  id="alert_content">
              成功了
    </div>
    <div class="am-modal-footer">
      <span class="am-modal-btn">确定</span>
    </div>
  </div>
</div>

<!-- social_block-start -->
<div id="social_block">
	<ul>
		<li class="twitter"><a href="#wodexinxi">我的信息</a></li>
		<li class="youtube"><a href="" data-toggle="modal" data-target="#updatePassword">修改密码</a></li>
		<li class="google-plus"><a href="#wodedingdan">我的订单</a></li>
		<li class="pinterest"><a href="#wodedizhi">我的地址</a></li>
	</ul>
</div>
<!-- social_block-end -->

<!-- 修改密码模态框 -->
<div class="modal fade" id="updatePassword" tabindex="-1">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">密码修改</h4>
            </div>
            <div class="modal-body">
                <form name="editForm">
                    <div class="form-group">
                        <label for="recipient-name">原密码：</label>
                        <input  type='password' id="oldpassword"  class="form-control" name="oldpassword" required placeholder="原密码">
                        <div style="display: inline" id="tip1"></div>
                    </div>
                    <div class="form-group">
                        <label for="message-text">新密码:</label>
                        <input  type='password' id="password1" name="password1"  class="form-control" required placeholder="长度为: 6-18">
                        <div style="display: inline" id="tip2"></div>
                    </div>
                    <div class="form-group">
                        <label for="message-text">再次输入:</label>
                        <input type='password' id="password2" name="password2"  class="form-control" required placeholder="必须和第一次一样">
                        <div style="display: inline" id="tip3"></div>
                    </div>
            </div>
            <div class="modal-footer">
                <button onclick="submitPassword()" type="button" class="btn btn-primary qdmodal" data-dismiss="modal" disabled>确定</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
            </div>
            </form>
        </div>
  </div>
</div>

<!-- 结束修改头像 -->
@endsection

@section('js')
<script type="text/javascript" src="{{ asset('avatar/js/custom_up_img.js') }}"></script>
<script type="text/javascript" src="{{ asset('avatar/js/amazeui.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('avatar/js/cropper.min.js') }}"></script>
<script type="text/javascript">
$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

new PCAS("province","city","county","请选择省份","请选择城市","请选择地区");

//移动到头像选框时
$('#up-img-touch').hover(function(){
    $('#ziavatar').css({
        'height':'350px',
        'transition':'all 0.3s',
        'opacity':'0.6',
        'cursor':'pointer',
    });
},function(){
    $('#ziavatar').css({
        'height':'0px',
        'transition':'all 0.3s',
    });
});

//如果有信息 按钮消失
for(var i=0;i < $('.shou').length;i++){

    if($($('.shou')[i]).prev().html() == ''){

        $($('.shou')[i]).css('display','block');

    }else{

        $($('.shou')[i]).css('display','none');
    }
}

//移动到每行时有数据按钮弹出
$('.shouhover').hover(function(){
    $(this).children().children('div:eq(0)').css('display','block');
},function(){
    if($(this).children().children('span:eq(0)').html() != ''){
        $(this).children().children('div:eq(0)').css('display','none');
    }
});

//点击编辑按钮时触发
$('.shou').click(function(){
    $(this).parent().parent().css('display','none');
    $(this).parent().parent().prev().css('display','block');
});

//移动到保存按钮上的样式
$('.bc').hover(function(){
    $(this).css({
        'background-color':'#0D79D1'
    });
},function(){
    $(this).css({
        'background-color':'#0F88EB'
    });
});

//当点击取消按钮时
$('.qx').click(function(){
    $(this).parent().parent().css('display','none');
    $(this).parent().parent().next().css('display','block');
    return false;
});

//获取单选框的值
var sex = {{Auth::user()->sex}};

$('input[name="sex"]').click(function(){
    sex = $(this).val();
});

//修改性别
$('.bcsex').click(function(){
    var tthis = $(this);
    $.ajax({
        url:"{{ action('UserController@updateDetail') }}",
        type:'post',
        data:{name:'sex',value:sex},
        success:function(mes){
            if(mes == 'ok'){
                tthis.parent().parent().next().children().children('span:eq(0)').html(tthis.parent().prev().find('input[value='+sex+']').next().html());
                tthis.next().trigger('click');
            }
        }
    });

    return false;
});

//修改昵称 电话 QQ
$('.bcmsg').click(function(){
    var tthis = $(this);
    var name = $(this).parent().prev().children('input').attr('name');
    var value = $(this).parent().prev().children('input').val();
    $.ajax({
        url:"{{ action('UserController@updateDetail') }}",
        type:'post',
        data:{name:name,value:value},
        success:function(mes){
            if(mes == 'ok'){
                if(name == 'name'){
                    $('#uname').html(tthis.parent().prev().children('input').val());
                }
                tthis.parent().parent().next().children().children('span:eq(0)').html(tthis.parent().prev().children('input').val());
                tthis.next().trigger('click');
            }
        }
    });

    return false;
});

//充值余额
$('.cz').click(function(){
    var tthis = $(this);
    var money = $(this).parent().prev().children('input').val();
    $.ajax({
        url:"{{ action('UserController@cz') }}",
        type:'post',
        data:{money:money},
        success:function(mes){
            if(mes['result'] == 'ok'){
                //修改余额
                tthis.parent().parent().next().children().children('span:eq(0)').html(mes['money']);
                tthis.next().trigger('click');
            }
        }
    });
    return false;
});

//订单模块
$('.xx').click(function(){

	if($(this).attr('info') == 'false'){

	var id = $(this).find('td:eq(0)').html();
	$('.good'+id).each(function(){

		$(this).find('div').css({

			'height':'54px',
			'transition':'all 0.4s',
			'opacity':'1',
			'overflow':'hidden',

		});

	})
	$(this).attr('info','true');

	}else{

		var id = $(this).find('td:eq(0)').html();
		$('.good'+id).each(function(){

			$(this).find('div').css({

				'height':'0px',
				'transition':'all 0.4s',
				'opacity':'0',
				'overflow':'hidden',

			});

		})
		$(this).attr('info','false');

	}
});

$('.queren').click(function(){
	var bt = $(this);
	var id =$(this).parents('tr').find('td:eq(0)').html();
	$.ajax({
		url:"{{action('UserController@changeStatus')}}",
		data:{id:id},
		type:'post',
		success:function(mes){
			//禁用当前的按钮

			if(mes == 'yes'){
				bt.attr('disabled',true);
				//将待收货改为已收货
				$('.good'+id).each(function(){
					bt.parent('td').prev('td').html('已收货');
					$(this).find('td:eq(4)').find('span').html('已收货');

				});

				layer.msg('已确认收货');
			}

		}
	});
});

//收货地址模块
//添加新地址
$('#address').click(function(){
	var name = $('input[name="username"]').val();
	var phone = $('input[name="userphone"]').val();
	var sheng = $('select[name="province"]').val();
	var shi = $('select[name="city"]').val();
	var xian = $('select[name="county"]').val();
	var jiedao = $('input[name="street"]').val();

	$.ajax({
		url:"{{action('UserController@addAddress')}}",
		type:'post',
		data:{username:name,userphone:phone,province:sheng,city:shi,county:xian,street:jiedao,uid:{{Auth::id()}}},
		success:function(mes){
			if(mes){
				$(`<tr style="color:#666666;">
				<td>${name}</td>
				<td>${sheng},${shi},${xian}</td>
				<td>${jiedao}</td>
				<td>${phone}</td>
				<td>
					<button class="btn btn-danger" sb="scdz" info="${mes}">删除地址</button>
					<button class="btn btn-danger" sb="swmr" info1="${mes}">设为默认</button>
				</td>
			</tr>`).appendTo($('#tb'));
			$('#empty').trigger('reset');
            del();
            chongzhi();
			layer.msg('添加成功');

			}
		}
	})

	return false;
});

//删除地址
function del(){

	$('button[sb="scdz"]').bind('click',function(){
		var id = $(this).attr('info');

		$.ajax({
			url:"{{action('UserController@delAddress')}}",
			data:{id:id},
			type:'post',
			success:function(mes){
				if(mes == 'yes'){
					$(this).parents('tr').remove();
					layer.msg('删除成功');
				}else{
					layer.msg('删除失败,请联系管理员');
				}
			}.bind(this)
		})
	});
}

del();

//设为默认地址
function chongzhi(){
	$('button[sb="swmr"]').bind('click',function(){
		var id = $(this).attr('info1');
		$.ajax({
			url:"{{ action('UserController@swmr') }}",
			data:{id:id},
			type:'post',
			success:function(mes){
				if(mes){
					layer.msg('设为默认地址成功');
					$(this).html('默认地址');
					$(this).attr('disabled','');

					$('button[info1="'+mes+'"]').removeAttr('disabled');
					$('button[info1="'+mes+'"]').html('设为默认');

				}else if(mes == 'yes'){
					layer.msg('设为默认地址成功');
					$(this).html('默认地址');
					$(this).attr('disabled','');
				}
			}.bind(this)
		});
	});
}

chongzhi();

//修改密码模态框
var change = false;
var flag1 = false;
var flag2 = false;

$('#oldpassword').blur(function(){
    var oldpassword = $('#oldpassword').val();
    $.ajax({
        url:"{{action('UserController@changeOldPass')}}",
        data:{oldpassword:oldpassword},
        type:'post',
        success:function(mes){
            if(mes == 'ok'){
                $("#tip1").html("<font color=\"green\" size=\"2\"> OK</font>");
                change = true;
                check();
            }else{
                $("#tip1").html("<font color=\"red\" size=\"2\">  与原密码不符</font>");
                change = false;
            }
        }
    });
});

$("#password1").blur(function(){
      var num=$("#password1").val().length;
      if(num<6){
           $("#tip2").html("<font color=\"red\" size=\"2\">  太短了</font>");
      }
      else if(num>18){
           $("#tip2").html("<font color=\"red\" size=\"2\">  太长了</font>");
      }
      else{
          $("#tip2").html("<font color=\"green\" size=\"2\"> OK</font>");
          flag1 = true;
          check();
      }
  }) ;

$("#password2").blur(function(){
  var tmp=$("#password1").val();
  var num=$("#password2").val().length;
  if($("#password2").val()!=tmp){
      $("#tip3").html("<font color=\"red\" size=\"2\">  和第一次输入不同</font>");
  }
  else{
      if(num>=6&&num<=18){
          $("#tip3").html("<font color=\"green\" size=\"2\">  OK</font>");
          flag2 = true;
          check();
      }
      else{
          $("#tip3").html("<font color=\"red\" size=\"2\">  太短或太长</font>");
      }
  }
 });

function submitPassword(){
    var pass = $('#password1').val();
    $.ajax({
        type:'post',
        url:"{{action('UserController@changePass')}}",
        data:{password:pass},
        success:function(mes){
            if(mes == 'ok'){
                layer.msg("修改密码成功");
                $("#oldpassword").val("");
                $("#password1").val("");
                $("#password2").val("");
                $("#tip1").empty();
                $("#tip2").empty();
                $("#tip3").empty();
                $('.qdmodal').attr('disabled',true);
                change = false;
                flag1 = false;
                flag2 = false;
            }else{
                layer.msg("修改密码失败");
            }
        }
    });
}

function check(){
    if(change && flag1 && flag2){
        $('.qdmodal').removeAttr('disabled');
    }
}
</script>
@endsection
