@extends('layouts.home')

@section('content')
<div class="account-area pt-30 log">
			<div class="container">
				<div class="row">
					<div class="col-md-2 col-lg-2 col-sm-2">

					</div>
					<div class="col-md-8 col-lg-8 col-sm-8">
                        <div class="account-info pb-30">
                            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}
								<div class="form-fields">
									<h2>Login</h2>
									<p>
										<label>
											email address
											<span class="required">*</span>
										</label>
										<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
									</p>
									<p>
										<label>
											Password
											<span class="required">*</span>
										</label>
										<input id="password" type="password" class="form-control" name="password" required>
									</p>
								</div>
								<div class="form-action">
									<label>
									<a href="#" class="lost_password">Lost your password?</a>
									</label>
									<input value="Login" type="submit">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection
@section('js')
<script type="text/javascript">

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
