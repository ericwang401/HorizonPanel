<!--
=========================================================
* Argon Dashboard PRO - v1.2.0
=========================================================
* Product Page: https://www.creative-tim.com/product/argon-dashboard-pro
* Copyright  Creative Tim (http://www.creative-tim.com)
* Coded by www.creative-tim.com
=========================================================
* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'HorizonPanel') }} - {{ ucfirst(Request::segment(2)) }}</title>

	<!-- Fonts -->
	<link rel="dns-prefetch" href="//fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

	<!-- Icons -->
	<link rel="dns-prefetch" href="//cdnjs.cloudflare.com">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

	<!-- Styles -->
	<link href="{{ asset('assets/css/argon.css') }}" rel="stylesheet">

	@yield('css')
</head>

<body>

	<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
		<div class="scrollbar-inner">
			<!-- Brand -->
			<div class="sidenav-header  d-flex  align-items-center">
				<a class="navbar-brand" href="{{ route('client.dashboard') }}">
					@if( config('app.logo') )
					<img src="{{ config('app.logo') }}" alt="{{ config('app.name', 'HorizonPanel') }} logo">
					@else
					<h3>{{ config('app.name', 'HorizonPanel') }}</h3>
					@endif
				</a>
				<div class=" ml-auto ">
					<!-- Sidenav toggler -->
					<div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin"
						data-target="#sidenav-main">
						<div class="sidenav-toggler-inner">
							<i class="sidenav-toggler-line"></i>
							<i class="sidenav-toggler-line"></i>
							<i class="sidenav-toggler-line"></i>
						</div>
					</div>
				</div>
			</div>
			<div class="navbar-inner">
				<!-- Collapse -->
				<div class="collapse navbar-collapse" id="sidenav-collapse-main">
					<!-- Nav items -->
					<ul class="navbar-nav">

						<?php
						/*
						This is a dropdown menu. Uncomment or paste the HTML structure below if you wish to add it

						<li class="nav-item">
							<a class="nav-link active" href="#navbar-dashboards" data-toggle="collapse" role="button"
								aria-expanded="true" aria-controls="navbar-dashboards">
								<i class="ni ni-shop text-primary"></i>
								<span class="nav-link-text">Dashboards</span>
							</a>
							<div class="collapse show" id="navbar-dashboards">
								<ul class="nav nav-sm flex-column">
									<li class="nav-item">
										<a href="/pages/dashboards/dashboard.html" class="nav-link">
											<span class="sidenav-mini-icon"> D </span>
											<span class="sidenav-normal"> Dashboard </span>
										</a>
									</li>
									<li class="nav-item">
										<a href="/pages/dashboards/alternative.html" class="nav-link">
											<span class="sidenav-mini-icon"> A </span>
											<span class="sidenav-normal"> Alternative </span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						*/ ?>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('client.dashboard') }}">
								<i class="fas fa-home"></i>
								<span class="nav-link-text">@lang('clientarea.home')</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('client.subscriptions') }}">
								<i class="fas fa-cubes"></i>
								<span class="nav-link-text">@lang('clientarea.subscriptions')</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">
								<i class="fas fa-shield-alt"></i>
								<span class="nav-link-text">@lang('clientarea.security')</span>
							</a>
						</li>
					</ul>
					<!-- Divider -->
					<hr class="my-3">
					<!-- Heading -->
					<h6 class="navbar-heading p-0 text-muted">
						<span class="docs-normal">@lang('clientarea.developer')</span>
						<span class="docs-mini"><i class="fas fa-tools"></i></span>
					</h6>
					<!-- Navigation -->
					<ul class="navbar-nav mb-md-3">
						<li class="nav-item">
							<a class="nav-link" href="#">
								<i class="fas fa-check-circle"></i>
								<span class="nav-link-text">@lang('clientarea.begin')</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">
								<i class="fas fa-book"></i>
								<span class="nav-link-text">@lang('clientarea.documentation')</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">
								<i class="fas fa-key"></i>
								<span class="nav-link-text">@lang('clientarea.api_keys')</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</nav>

	<div class="main-content">
		<nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
			<div class="container-fluid">
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<!-- Navbar links -->
					<ul class="navbar-nav align-items-center  ml-md-auto ">
						<li class="nav-item d-xl-none">
							<!-- Sidenav toggler -->
							<div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin"
								data-target="#sidenav-main">
								<div class="sidenav-toggler-inner">
									<i class="sidenav-toggler-line"></i>
									<i class="sidenav-toggler-line"></i>
									<i class="sidenav-toggler-line"></i>
								</div>
							</div>
						</li>
						<li class="nav-item d-none">
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
								aria-expanded="false">
								<i class="far fa-bell"></i>
							</a>
							<div class="dropdown-menu dropdown-menu-xl  dropdown-menu-right  py-0 overflow-hidden">
								<!-- Dropdown header -->
								<div class="px-3 py-3">
									<h6 class="text-sm text-muted m-0">You have <strong class="text-primary">1</strong>
										notification.</h6>
								</div>
								<!-- List group -->
								<div class="list-group list-group-flush">
									<a href="#!" class="list-group-item list-group-item-action">
										<div class="row align-items-center">
											<div class="col-auto">
												<i class="fas fa-check-square notification-icon text-success"></i>
											</div>
											<div class="col ml--2">
												<div class="d-flex justify-content-between align-items-center">
													<div>
														<h4 class="mb-0 text-sm">Order Cancelled</h4>
													</div>
													<div class="text-right text-muted">
														<small>2 hrs ago</small>
													</div>
												</div>
												<p class="text-sm mb-0">Your order "Horizon VPS KVM Hosting" has been
													cancelled</p>
											</div>
										</div>
									</a>
									<a href="#!" class="list-group-item list-group-item-action">
										<div class="row align-items-center">
											<div class="col-auto">
												<i class="fas fa-window-close notification-icon text-danger"></i>
											</div>
											<div class="col ml--2">
												<div class="d-flex justify-content-between align-items-center">
													<div>
														<h4 class="mb-0 text-sm">VPS Suspended</h4>
													</div>
													<div class="text-right text-muted">
														<small>4 hrs ago</small>
													</div>
												</div>
												<p class="text-sm mb-0">Our system has detected your VPS has been
													running a Bitcoin miner.</p>
											</div>
										</div>
									</a>
								</div>
								<!-- View all -->
								<a href="#!" class="dropdown-item text-center text-primary font-weight-bold py-3">View
									all</a>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
								aria-expanded="false">
								<i class="fas fa-layer-group"></i>
							</a>
							<div
								class="dropdown-menu dropdown-menu-lg dropdown-menu-dark bg-default  dropdown-menu-right ">
								<div class="row shortcuts px-4">
									<a href="#!" class="col-4 shortcut-item">
										<span class="shortcut-media avatar rounded-circle bg-gradient-red">
											<i class="fab fa-cpanel"></i>
										</span>
										<small>cPanel</small>
									</a>
									<a href="#!" class="col-4 shortcut-item">
										<span class="shortcut-media avatar rounded-circle bg-gradient-orange">
											<i class="fas fa-gamepad"></i>
										</span>
										<small>Game Panel</small>
									</a>
									<a href="#!" class="col-4 shortcut-item">
										<span class="shortcut-media avatar rounded-circle bg-gradient-info">
											<i class="fas fa-server"></i>
										</span>
										<small>Openstack</small>
									</a>
								</div>
							</div>
						</li>
					</ul>
					<ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
						<li class="nav-item dropdown">
							<a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
								aria-expanded="false">
								<div class="media align-items-center">
									<span class="avatar avatar-sm rounded-circle">
										<img alt="Image placeholder" src="/assets/img/theme/team-4.jpg">
									</span>
									<div class="media-body  ml-2  d-none d-lg-block">
										<span class="mb-0 text-sm  font-weight-bold">{{ Auth::user()->name }}</span>
									</div>
								</div>
							</a>
							<div class="dropdown-menu  dropdown-menu-right ">
								<a href="#!" class="dropdown-item">
									<i class="fas fa-user-circle"></i>
									<span>@lang('clientarea.my_profile')</span>
								</a>
								<div class="dropdown-divider"></div>
								<a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
									<i class="fas fa-sign-out-alt"></i>
									<span>@lang('Logout')</span>
								</a>
								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                	@csrf
                            	</form>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</nav>

		<div class="header bg-primary pb-6">
			<div class="container-fluid">
				<div class="header-body">
					<div class="row align-items-center py-4">
						<div class="col-lg-6 col-7">
							<h6 class="h2 text-white d-inline-block mb-0">@yield('header')</h6>
							<nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
								<ol class="breadcrumb breadcrumb-links breadcrumb-dark">
									<li class="breadcrumb-item"><a href="{{ route('client.dashboard') }}"><i class="fas fa-home"></i></a></li>
									@for($i = 2; $i <= count(Request::segments()); $i++)
										@if ($i === count(Request::segments()))
											<li class="breadcrumb-item active">
												{{ strtoupper(Request::segment($i)) }}
											</li>
										@else
											<li class="breadcrumb-item">
												<a href="{{ URL::to( implode( '/', array_slice(Request::segments(), 0 ,$i, true)))}}">
													{{ strtoupper(Request::segment($i)) }}
												</a>
											</li>
										@endif
										<?php /* <li class="breadcrumb-item active" aria-current="page">Default</li> */ ?>
									@endfor
								</ol>
							</nav>
						</div>
					</div>

					@if (Request::segment(2) === "dashboard")
					<div class="row">
						<div class="col-xl-3 col-md-6">
							<div class="card card-stats">
								<!-- Card body -->
								<div class="card-body">
									<div class="row">
										<div class="col">
											<h5 class="card-title text-uppercase text-muted mb-0">@lang('clientarea.subscriptions')</h5>
											<span class="h2 font-weight-bold mb-0">{{ number_format( count( Auth::user()->subscriptions()->get() ) ) }}</span>
										</div>
										<div class="col-auto">
											<div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
												<i class="fas fa-cubes"></i>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-md-6">
							<div class="card card-stats">
								<!-- Card body -->
								<div class="card-body">
									<div class="row">
										<div class="col">
											<h5 class="card-title text-uppercase text-muted mb-0">@lang('clientarea.notifications')</h5>
											<span class="h2 font-weight-bold mb-0">2,356</span>
										</div>
										<div class="col-auto">
											<div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
												<i class="fas fa-bell"></i>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-md-6">
							<div class="card card-stats">
								<!-- Card body -->
								<div class="card-body">
									<div class="row">
										<div class="col">
											<h5 class="card-title text-uppercase text-muted mb-0">@lang('clientarea.open_tickets')</h5>
											<span class="h2 font-weight-bold mb-0">924</span>
										</div>
										<div class="col-auto">
											<div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
												<i class="fas fa-clipboard-check"></i>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-md-6">
							<div class="card card-stats">
								<!-- Card body -->
								<div class="card-body">
									<div class="row">
										<div class="col">
											<h5 class="card-title text-uppercase text-muted mb-0">@lang('clientarea.last_payment')</h5>
											<span class="h2 font-weight-bold mb-0">N/A</span>
										</div>
										<div class="col-auto">
											<div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
												<i class="fas fa-money-bill-alt"></i>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					@endif
				</div>
			</div>
		</div>

		@yield('content')
	</div>

	

	<script src="{{ asset('assets/vendor/jquery/dist/jquery.min.js') }}"></script>
	@yield('pre-js')
	<script src="{{ asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
	<script src="{{ asset('assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
	<script src="{{ asset('assets/vendor/js-cookie/js.cookie.js') }}"></script>
	<script src="{{ asset('assets/js/argon.js') }}"></script>

	@yield('js')
</body>

</html>