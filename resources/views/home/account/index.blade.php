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

                                        <li class="is-active">
                                            <a href="{{action('AccountController@index')}}">Dashboard</a>
                                        </li>

                                        <li>
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
                                    <p>
                                        Hello <strong>Tester</strong> (not Tester? <a href="create_account.html">Sign out</a>)
                                    </p>
                                    <p>
                                        From your account dashboard you can view your
                                        <a href="http://demo.smartaddons.com/templates/html/etrostore/order.html">recent orders</a>,
                                        manage your <a href="http://demo.smartaddons.com/templates/html/etrostore/addresses.html">shipping and billing addresses</a>
                                        and <a href="http://demo.smartaddons.com/templates/html/etrostore/account_details.html">edit your password and account details</a>.
                                    </p>
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
