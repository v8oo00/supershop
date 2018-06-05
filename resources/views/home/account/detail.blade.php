@extends('layouts.home')

@section('title')

<div class="listings-title">
	<div class="container">
		<div class="wrap-title">
			<h1>My Account</h1>
			<div class="bread">
				<div class="breadcrumbs theme-clearfix">
					<div class="container">
						<ul class="breadcrumb">
							<li>
								<a href="{{ action('HomeController@index') }}">Home</a>
								<span class="go-page"></span>
							</li>

							<li class="active">
								<span>My account</span>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

@section('content')
<div class="container">
    <div class="row">
        <div id="contents" role="main" class="main-page  col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="post-6 page type-page status-publish hentry">
                <div class="entry">
                    <div class="entry-content">
                        <header>
                            <h2 class="entry-title">我的账户</h2>
                        </header>

                        <div class="entry-content">
                            <div class="woocommerce">
                                <nav class="woocommerce-MyAccount-navigation">
                                    <ul>

                                        <li>
                                            <a href="{{action('AccountController@index')}}">Dashboard</a>
                                        </li>

                                        <li class="is-active">
                                           <a href="{{action('AccountController@detail')}}">我的信息</a>
                                        </li>

                                        <li>
                                           <a href="http://demo.smartaddons.com/templates/html/etrostore/order.html">我的订单</a>
                                        </li>

                                        <li>
                                            <a href="http://demo.smartaddons.com/templates/html/etrostore/addresses.html">我的地址</a>
                                        </li>
                                    </ul>
                                </nav>

                                <div class="woocommerce-MyAccount-content">
										<form class="edit-account" action="" method="post">
											<p class="form-row form-row-first">
												<label for="account_first_name">
													Name
													<span class="required">*</span>
												</label>
												<input type="text" class="input-text" name="account_first_name" id="account_first_name" value="Kaszas II">
											</p>
										  <div class="clear"></div>

											<p class="form-row form-row-wide">
												<label for="account_email">
													Email address
													<span class="required">*</span>
												</label>

												<input type="email" class="input-text" name="account_email" id="account_email" value="test@yahoo.com">
											</p>

											<fieldset>
												<legend>Password Change</legend>
												<p class="form-row form-row-wide">
													<label for="password_current">Current Password (leave blank to leave unchanged)</label>
													<input type="password" class="input-text" name="password_current" id="password_current">
												</p>

												<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
													<label for="password_1">New Password (leave blank to leave unchanged)</label>
													<input type="password" class="input-text" name="password_1" id="password_1">
												</p>

												<p class="form-row form-row-wide">
													<label for="password_2">Confirm New Password</label>
													<input type="password" class="input-text" name="password_2" id="password_2">
												</p>
											</fieldset>

											<div class="clear"></div>
											<p>
												<input type="submit" class="button" name="save_account_details" value="Save changes">
											</p>
										</form>
                                    </div>
                                </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
@endsection
