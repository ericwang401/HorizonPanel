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
	  <h3 class="mb-0">@lang('admin.edit_gateway')</h3>
	</div>
	<!-- Card body -->
	<div class="card-body">
	  <form method="POST" action="{{ route('admin.gateways.update', $gateway->id) }}">
		@csrf
		@method('put')

		<h3>@lang('admin.editing') "{{ $gateway->name }}"</h3>

		@foreach ($parameters as $parameter => $value)
			@if (is_array($value))
				<label class="form-control-label">{{ $parameter }}</label>
				@foreach ($value as $subvalue => $option)
					<div class="custom-control custom-radio mb-3">
  						<input type="radio" id="{{ $option }}" name="parameters[{{ $parameter }}][]" class="custom-control-input" required>
  						<label class="custom-control-label" title="{{ $option }}" aria-label="{{ $option }} selection" for="{{ $option }}">{{ $option }}</label>
					</div>
				@endforeach
			@else
				<div class="form-group">
        			<label for="{{ $parameter }}" class="form-control-label">{{ $parameter }}</label>
        			<input class="form-control" type="text" name="parameters[{{ $parameter }}][]" title="{{ $parameter }}" aria-label="{{ $parameter }} parameter" id="{{ $parameter }}" required>
    			</div>
			@endif
		@endforeach

		<button type="submit" class="btn btn-primary">@lang('admin.submit')</button> <a href="{{ route('admin.roles.index') }}" class="btn btn-secondary">@lang('admin.cancel')</a>
	  </form>
	</div>
  </div>
@endsection