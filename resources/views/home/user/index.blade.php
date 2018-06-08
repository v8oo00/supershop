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
</style>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <!--头像显示 开始-->
        <div class="col-md-4" style="padding:0px;">
            <div class="up-img-cover" id="up-img-touch" style="width:350px;">
                <img src="{{ Auth::user()->avatar }}" style="width:350px;height:350px;">
                <div id="ziavatar" style="width:350px;height:0px;position:absolute;top:0px;background-color:black;color:white;text-align:center;line-height:350px;font-size:25px;overflow:hidden;">点击修改头像</div>
            </div>
        </div>
        <div class="col-md-8" style="padding:0px;border:1px solid red;">
			<h2 style="font-size:25px;">Hello ! <strong>{{Auth::user()->name}}</strong></h2>
			<p>账户注册时间：{{Auth::user()->created_at}}</p>
            <form  action='' class="row form-horizontal"  style='padding-left:0px;padding-right:0px;' >
				<div class='col-md-8' >

					<div class='form-group' style="height:50px;">
						<label style="height:100%;padding-top:15px;font-weight:bold;text-align:left;" class='control-label col-md-2' for="nickname">昵称</label>
                        <div style="margin-top:10px;display:none;">
    						<div class="col-md-6">
    							<input class='form-control'  value='' name='name' type="text">
    						</div>
                            <div class="col-sm-4">
                                <button class="btn btn-default bc" style="margin-left:-10px;background-color:#0F88EB;color:white;width:64px;height:35px;" type="button">保存</button>
                                <button class="btn btn-default qx" style="width:64px;height:35px;margin-left:10px;" type="button">取消</button>
                            </div>
                        </div>
                        <div class="shouhover">
                            <div class="col-sm-offset-2" style="height:52px;padding-left:10px;font-size:16px;">
                                <span style="float:left;font-size:15px;margin-left:5px;line-height:50px;">{{ Auth::user()->name }}</span>
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
    							<input class='form-control'  value='0' name='sex' type="radio" style="float:left;width:16px;height:16px;"><span style="float:left;margin-left:5px;margin-right:10px;">女</span>
                                <input class="form-control" type="radio" name="sex" value="1" style="float:left;width:16px;height:16px;"><span style="float:left;margin-left:5px;margin-right:10px;">男</span>
    						</div>
                            <div class="col-sm-7">
                                <button class="btn btn-default bc" style="margin-left:-10px;background-color:#0F88EB;color:white;width:64px;height:35px;" type="button">保存</button>
                                <button class="btn btn-default qx" style="width:64px;height:35px;margin-left:10px;" type="button">取消</button>
                            </div>
                        </div>
                        <div class="shouhover">
                            <div class="col-sm-offset-2" style="height:52px;padding-left:10px;font-size:16px;">
                                <span style="float:left;font-size:15px;margin-left:5px;line-height:50px;"></span>
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
    							<input class='form-control'  value='' name='phone' type="tel">
    						</div>
                            <div class="col-sm-4">
                                <button class="btn btn-default bc" style="margin-left:-10px;background-color:#0F88EB;color:white;width:64px;height:35px;" type="button">保存</button>
                                <button class="btn btn-default qx" style="width:64px;height:35px;margin-left:10px;" type="button">取消</button>
                            </div>
                        </div>
                        <div class="shouhover">
                            <div class="col-sm-offset-2" style="height:52px;padding-left:10px;font-size:16px;">
                                <span style="float:left;font-size:15px;margin-left:5px;line-height:50px;"></span>
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
    							<input class='form-control'  value='' name='qq' type="tel">
    						</div>
                            <div class="col-sm-4">
                                <button class="btn btn-default bc" style="margin-left:-10px;background-color:#0F88EB;color:white;width:64px;height:35px;" type="button">保存</button>
                                <button class="btn btn-default qx" style="width:64px;height:35px;margin-left:10px;" type="button">取消</button>
                            </div>
                        </div>
                        <div class="shouhover">
                            <div class="col-sm-offset-2" style="height:52px;padding-left:10px;font-size:16px;">
                                <span style="float:left;font-size:15px;margin-left:5px;line-height:50px;"></span>
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
    							<input class='form-control'  value='' name='money' type="number">
    						</div>
                            <div class="col-sm-4">
                                <button class="btn btn-default bc" style="margin-left:-10px;background-color:#0F88EB;color:white;width:64px;height:35px;" type="button">保存</button>
                                <button class="btn btn-default qx" style="width:64px;height:35px;margin-left:10px;" type="button">取消</button>
                            </div>
                        </div>
                        <div class="shouhover">
                            <div class="col-sm-offset-2" style="height:52px;padding-left:10px;font-size:16px;">
                                <span style="float:left;font-size:15px;margin-left:5px;line-height:50px;"></span>
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
    </div>
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


<!-- 结束修改头像 -->
@endsection

@section('js')
<script type="text/javascript" src="{{ asset('avatar/js/custom_up_img.js') }}"></script>
<script type="text/javascript" src="{{ asset('avatar/js/amazeui.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('avatar/js/cropper.min.js') }}"></script>
<script type="text/javascript">
$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

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
</script>
@endsection
