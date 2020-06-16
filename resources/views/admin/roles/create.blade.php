@extends('layouts.admin')

@section('content')
<div class="card mb-4">
	<!-- Card header -->
	<div class="card-header">
	  <h3 class="mb-0">@lang('admin.create_role')</h3>
	</div>
	<!-- Card body -->
	<div class="card-body">
	  <form method="POST" action="{{ route('admin.store_role') }}">
		@csrf
		@error('name')
			<div class="alert alert-danger" role="alert">
				{{ $message }}
			</div>
		@enderror
		<div class="form-group">
			<label class="form-control-label" for="name">@lang('admin.name')</label>
			<input type="text" class="form-control" name="name" id="name" placeholder="@lang('admin.name')" required>
		</div>
		<div class="row">
			@foreach ($permissions as $permission)
			<div class="col-md-4">
				<div class="custom-control custom-checkbox mb-3">
					<input class="custom-control-input" name="permissions[]" value="{{ $permission->name }}" id="{{ str_replace(' ', '', $permission->name) }}" type="checkbox">
					<label class="custom-control-label" for="{{ str_replace(' ', '', $permission->name) }}">{{ ucfirst($permission->name) }}</label>
			  	</div>
			</div>
			@endforeach
		</div>
		<button type="submit" class="btn btn-primary">@lang('admin.submit')</button>
	  </form>
	</div>
  </div>
@endsection