@extends('layouts.admin')

@section('content')

@isset($type)
	<div class="alert {{ $type }}" role="alert">
		{{ $info }}
	</div>
@endisset

@if (Session::get('type'))
	<div class="alert {{ Session::get('type') }}" role="alert">
		{{ Session::get('info') }}
	</div>
@endif

<div class="row">
	<div class="col">
		<div class="card">
			<!-- Card header -->
			<div class="card-header border-0">
				<div class="row">
					<div class="col-6">
						<h3 class="mb-0">@lang('admin.all_roles')</h3>
					</div>
					<div class="col-6 text-right">
						<a href="{{ route('admin.create_role') }}" class="btn btn-sm btn-primary btn-round btn-icon">
							<span class="btn-inner--icon"><i class="fas fa-user-tag"></i></span>
							<span class="btn-inner--text">@lang('admin.create_role')</span>
						</a>
					</div>
				</div>

				<form class="table-search navbar-search-light form-inline mr-sm-3">
					<div class="form-group mb-0">
						<div class="input-group input-group-alternative input-group-merge">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-search"></i></span>
							</div>
							<input class="form-control" placeholder="Search" type="text" name="q"
								value="{{ $q ?? '' }}">
						</div>
					</div>
				</form>
			</div>
			<!-- Light table -->
			<div class="table-responsive">
				<table class="table align-items-center table-flush">
					<thead class="thead-light">
						<tr>
							<th scope="col">@lang('admin.name')</th>
							<th scope="col"></th>
						</tr>
					</thead>
					<tbody class="list">
						@foreach ($roles as $role)
						<tr>

							<th scope="row">
								<div class="media align-items-center">
									<div class="media-body">
										@if ($role->name !== 'superuser')
											<a href="{{ route('admin.show_role', $role->id) }}">
												<span class="name mb-0 text-sm c-initial">{{ ucfirst($role->name) }}</span>
											</a>
										@else
											<span class="name mb-0 text-sm c-initial">{{ ucfirst($role->name) }}</span>
										@endif
									</div>
								</div>
							</th>

							@if ($role->name !== 'superuser')
							<td class="table-actions">

								<a href="{{ route('admin.show_role', $role->id) }}" class="table-action"
									data-toggle="tooltip" data-original-title="@lang('admin.edit_role')">
									<i class="far fa-edit"></i>
								</a>
								<form class="inline-block" method="POST" action="{{ route('admin.destroy_role', $role->id) }}">
									@method('delete')
									@csrf
									<button type="submit" class="table-action table-action-delete" data-toggle="tooltip"
										data-original-title="@lang('admin.delete_role')">
										<i class="fas fa-trash"></i>
									</button>
								</form>
							</td>
							@endif

						</tr>
						@endforeach



					</tbody>
				</table>
			</div>
			<!-- Card footer -->
			<div class="card-footer py-4">
				{{ $roles->links() }}
			</div>
		</div>
	</div>
</div>










@endsection