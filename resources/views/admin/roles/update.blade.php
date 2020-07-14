@extends('layouts.admin')

@section('content')
<div class="card mb-4">
	<!-- Card header -->
	<div class="card-header">
	  <h3 class="mb-0">@lang('admin.edit_role')</h3>
	</div>
	<!-- Card body -->
	<div class="card-body">
	  <form method="POST" action="{{ route('admin.roles.update', $role->id) }}">
		@csrf
		@method('put')

		<h3>@lang('admin.editing') "{{ $role->name }}"</h3>
		<div class="row">
			@foreach ($permissions as $permission)
			<div class="col-md-4">
				<div class="custom-control custom-checkbox mb-3">
					<input class="custom-control-input" name="permissions[]" value="{{ $permission->name }}" id="{{ str_replace(' ', '', $permission->name) }}" type="checkbox" {{ empty($role->permissions->pluck('pivot')->where('permission_id', 'LIKE', $permission->id)->first()) !== true ? 'checked' : '' }}>
					<label class="custom-control-label" for="{{ str_replace(' ', '', $permission->name) }}">{{ ucfirst($permission->name) }}</label>
			  	</div>
			</div>
			@endforeach
		</div>
		<button type="submit" class="btn btn-primary">@lang('admin.update')</button> 
		<a href="{{ route('admin.roles') }}" class="btn btn-secondary">@lang('admin.cancel')</a> 
		<button type="button" class="btn btn-danger delete-action float-right" data-form-id="#deleteForm">@lang('admin.delete_role')</button>
	  </form>
		
	  	<form id="deleteForm" class="inline-block" method="POST" action="{{ route('admin.roles.destroy', $role->id) }}">
			  @method('delete')
			  @csrf
		</form>
	</div>
  </div>
@endsection

@include('components.dialogs.delete')