@extends('layouts.app')

@section('css')
<link href="{{ asset('assets/css/sidebar.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
	<div class="shop-row">
		<div class="pull-md-right col-md-9">
			<div class="header-lined">
				<h1>
					{{ $active_category->title }}
				</h1>
				<p>{{ $active_category->description }}</p>
			</div>
		</div>
		<div class="col-md-3 pull-md-left sidebar hidden-xs hidden-sm">
			<div menuitemname="Categories" class="panel panel-sidebar">
				<div class="panel-heading">
					<h3 class="panel-title">
						<i class="fa fa-shopping-cart"></i>&nbsp;
						@lang('main.categories')
						<i class="fa fa-chevron-up panel-minimise pull-right"></i>
					</h3>
				</div>
				<div class="list-group" style="display: block;">
					@foreach ($package_categories as $category)
					<a menuitemname="{{ $category->title }}" href="{{ route('packages.show', $category->slug ?? $category->id) }}"
						class="list-group-item{{ $active_category->title === $category->title ? ' active' : '' }}">
						{{ $category->title }}
					</a>
					@endforeach
				</div>
			</div>
		</div>
		<div class="col-md-9 pull-md-right">
			<div class="products">
				<div class="row row-eq-height">
					@foreach ($active_category->packages as $package)
					<div class="col-md-6 price-card">
					<div class="card">
						<div class="card-header">
							<h5 class="h3 mb-0">{{ $package->title }}</h5>
						</div>
						<div class="card-body">
							<p class="card-text mb-4">{{ $package->description }}</p>
							<a href="#" class="btn btn-success btn-purchase">@lang('main.purchase')</a>
						</div>
					</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
@endsection