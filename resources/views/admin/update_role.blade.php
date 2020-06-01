@extends('layouts.admin')

@section('content')
<div class="card mb-4">
	<!-- Card header -->
	<div class="card-header">
		<div class="row">
			<div class="col-6">
				<h3 class="mb-0">@lang('admin.edit_role')</h3>
			</div>

			<div class="col-6 text-right">
				<form method="POST" action="{{ route('admin.destroy_role', $role->id) }}">
					@csrf
					@method('delete')
					<button type="submit" class="btn btn-sm btn-danger float-right"><i class="fas fa-trash"></i>
						@lang('admin.delete_role')</button>
				</form>
			</div>
		</div>
	</div>
	<!-- Card body -->
	<div class="card-body">
		<form method="POST" action="{{ route('admin.update_role', $role->id) }}">
			@csrf
			@method('put')

			<h3>@lang('admin.editing') "{{ $role->name }}"</h3>
			<div class="row">
				@foreach ($permissions as $permission)
				<div class="col-md-4">
					<div class="custom-control custom-checkbox mb-3">
						<input class="custom-control-input" name="{{ $permission->name }}"
							id="{{ str_replace(' ', '', $permission->name) }}" type="checkbox"
							{{ empty($role->permissions->pluck('pivot')->where('permission_id', 'LIKE', $permission->id)->first()) !== true ? 'checked' : '' }}>
						<label class="custom-control-label"
							for="{{ str_replace(' ', '', $permission->name) }}">{{ ucfirst($permission->name) }}</label>
					</div>
				</div>
				@endforeach
			</div>
			<button type="submit" class="btn btn-primary">@lang('admin.update')</button>
			<a href="{{ route('admin.roles') }}" class="btn btn-secondary">@lang('admin.cancel')</a>

		</form>

	</div>
</div>
@endsection