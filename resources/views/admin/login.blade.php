<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>Super Shop</title>

    <!-- Bootstrap -->
    <link href="{{mix('css/app.css')}} " rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/admins/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <!-- Animate.css -->
    <link href="/admins/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="/admins/build/css/custom.min.css" rel="stylesheet">

    <link rel="stylesheet" href='{{asset("layer/theme/default/layer.css")}}'>
  </head>

  <body class="login">

    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
              {!! Form::open(['url' => 'admin/login','method' => 'POST','id'=>'account_l']) !!}
                <h1>Login</h1>
                <div>
                  <input type="text" class="form-control" placeholder="phone" required="" name='phone'/>
                </div>
                <div>
                  <input type="password" class="form-control" placeholder="Password" required="" name='password'/>
                </div>
                <div>
                  <button class="btn btn-default submit" type='submit'>Log in</button>
                  <a class="reset_pass" href="#">Lost your password?</a>
                </div>

                <div class="clearfix"></div>

                <div class="separator">
                  <p class="change_link">New to site?
                    <a href="#signup" class="to_register"> Create Account </a>
                  </p>

                  <div class="clearfix"></div>
                  <br />

                  <div>
                    <h1><i class="fa fa-smile-o"></i>Super Shop OK</h1>
                    <p>©2018 A Network Super Mall Produced By Laravel Is Required To Study Infringement In Beijing.</p>
                  </div>
                </div>
              {!! Form::close() !!}
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            {!! Form::open(['url' => 'admin/register','method' => 'POST','id'=>'account_f']) !!}
              <h1>Create Account</h1>
              <div>
                {!! Form::text('name','',['class' => 'form-control','placeholder'=>'name','id'=>'acc_name']); !!}
              </div>
              <div>
                {!! Form::number('phone','',['class' => 'form-control','placeholder'=>'Phone','id'=>'phone_v']); !!}
              </div>
              <div id='example'>

                {!! Form::text('vcode','',['class' => 'form-control','placeholder'=>'vcode','style'=>'width:63%;margin:0px 0px 20px;float:left;','id'=>'vcode_c']); !!}

                <button class="btn btn-default" style="float:left;" type="button" id='ucpaas-vcode' @click='send' :disabled="isDisable">
                    <span v-if="sendMsgDisabled">@{{ time+'S' }}</span>
                    <span v-if="!sendMsgDisabled">点击发送验证码</span>
                </button>

              </div>
              <div>
                {!! Form::text('password','',['class' => 'form-control','placeholder'=>'Password','id'=>'acc_pass']); !!}
              </div>
              {!! Form::button('submit',['class'=>'btn btn-default submit','type'=>'submit','id'=>'sub_c'])!!}
              <div>
                
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-smile-o"></i>Super Shop OK</h1>
                  <p>©2018 A Network Super Mall Produced By Laravel Is Required To Study Infringement In Beijing.</p>
                </div>
              </div>
              {!! Form::close() !!}
          </section>
        </div>
      </div>
    </div>


    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{asset('/layer/layer.js')}}"></script>
    <script type="text/javascript">
$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

        var vm = new Vue({
            el: '#example',
            data(){
                return {
                    time: 60, // 发送验证码倒计时
                    sendMsgDisabled: false,
                    isDisable:false
                }
            },
            methods:{
                send(){
                    if($('#phone_v').val()){
                      $.ajax({
                        type:"post",
                        url:'{{url("admin/ucpaas_vcode")}}', 
                        dataType: 'text',
                        data:{'phone':$('#phone_v').val()},
                        success:function(data){

                        },
                        error: function(xhr, type){
                            layer.msg('发送失败');
                        }

                      });
                      var me = this;
                      me.sendMsgDisabled = true;
                      me.isDisable=true;
                      let interval = window.setInterval(function() {
                          if ((me.time--) <= 0) {
                              me.time = 60;
                              me.sendMsgDisabled = false;
                              window.clearInterval(interval);
                              me.isDisable = false;
                          }
                      }, 1000);

                    }else{
                      layer.msg('输入手机号');
                    }
                }
            }
        })

        $('#sub_c').click(function(){
            $.ajax({
                type:"post",
                url:'{{url("admin/ucpaas_check")}}', 
                dataType: 'text',
                data:{'phone':$('#phone_v').val(),'code':$('#vcode_c').val()},
                success:function(data){
                  if(data=='true'){
                    $('#account_f').submit();
                  }else{
                    layer.msg('验证码错误');
                  }
                },
                error: function(xhr, type){
                  layer.msg('请完成填写');
                }

            });
            return false;
        });

@if($errors->has('name'))
    layer.tips('{{ $errors->first("name") }}', '#acc_name');
@endif
@if($errors->has('password'))
    layer.tips("{{$errors->first('password')}}", '#acc_pass');
@endif
    </script>
  </body>
</html>
