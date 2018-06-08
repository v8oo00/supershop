@extends('layouts.home')

@section('content')
<!-- 位置这一块 -->
<div class="breadcrumb-area">
	<div class="container">
		<ol class="breadcrumb">
		  <li><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
		  <li class="active">Regist</li>
		</ol>
	</div>
</div>
<!-- 位置这一块end -->

<!-- 注册这一块 -->
<div class="account-area pt-30 log" style='margin-bottom:50px;'>
	<div class="container">
		<div class="row">
			<div class="col-md-2 col-lg-2 col-sm-2"></div>
			<div class="col-md-8 col-lg-8 col-sm-8">
                <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}
    				<div class="form-fields pb-30">
    					<h2>Register</h2>
    					<p>
    						<label>Name <span class="required">*</span></label>
    						<input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
    					</p>
                        <p>
    						<label>Email <span class="required">*</span></label>
    						<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
    					</p>
    					<p>
    						<label>Password <span class="required">*</span></label>
    						<input id="password" type="password" class="form-control" name="password" required>

    					</p>
                        <p>
    						<label>Password <span class="required">*</span></label>
    						<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
    					</p>
    				</div>
    				<div class="form-action floatright">
    					<input value="Register" type="submit">
    				</div>
                </form>
			</div>
		</div>
	</div>
</div>
<!-- 注册这一块end -->
@endsection

@section('js')
<script type="text/javascript">
@if ($errors->has('name'))
    layer.tips('{{ $errors->first("name") }}', '#name', {
        tipsMore: true
    });
@endif

@if ($errors->has('email'))
    layer.tips('{{ $errors->first("email") }}', '#email', {
        tipsMore: true
    });
@endif

@if ($errors->has('password'))
    layer.tips('{{ $errors->first("password") }}', '#password', {
        tipsMore: true
    });
@endif
</script>
@endsection
