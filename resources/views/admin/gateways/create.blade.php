@extends('layouts.admin')

@section('content')
@if (Session::get('type'))
	<div class="alert {{ Session::get('type') }}" role="alert">
		{{ Session::get('info') }}
	</div>
@endif

@error('name')
	<div class="alert alert-danger" role="alert">
		{{ $message }}
	</div>
@enderror

<div class="card mb-4">
	<!-- Card header -->
	<div class="card-header">
	  <h3 class="mb-0">@lang('admin.add_gateway')</h3>
	</div>
	<!-- Card body -->
	<div class="card-body">
        <div class="alert alert-default" role="alert">
            @lang('admin.add_gateway_notice')
        </div>
    
	  <form method="POST" action="{{ route('admin.gateways.store') }}">
		@csrf
		<div class="form-group">
			<label class="form-control-label" for="name">@lang('admin.name')</label>
			<input type="text" class="form-control" name="name" id="name" placeholder="@lang('admin.name')" value="{{ old('name') }}" required>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="custom-control custom-checkbox mb-3">
					<input class="custom-control-input" name="disabled" value="@lang('main.disabled')" id="disabled" type="checkbox">
					<label class="custom-control-label" for="disabled">@lang('main.disabled')</label>
			  	</div>
			</div>
		</div>
		<button type="submit" class="btn btn-primary">@lang('admin.submit')</button> <a href="{{ route('admin.roles') }}" class="btn btn-secondary">@lang('admin.cancel')</a>
	  </form>
	</div>
  </div>
@endsection