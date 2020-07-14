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
						<h3 class="mb-0">@lang('admin.all_available_gateways')</h3>
					</div>
					<div class="col-6 text-right">
						<a href="{{ route('admin.gateways.create') }}" class="btn btn-sm btn-primary btn-round btn-icon">
							<span class="btn-inner--icon"><i class="fas fa-money-check"></i></span>
							<span class="btn-inner--text">@lang('admin.add_gateway')</span>
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
							<th scope="col">@lang('admin.gateway')</th>
							<th scope="col">@lang('main.disabled')</th>
							<th scope="col"></th>
						</tr>
					</thead>
					<tbody class="list">
						@foreach ($gateways as $gateway)
						<tr>

							<th scope="row">
								<div class="media align-items-center">
									<div class="media-body">
										{{ Omnipay\Omnipay::create($gateway->gateway)->getName() }}
									</div>
								</div>
							</th>

							<th scope="row">
								<span class="badge badge-dot mr-4">
									<i class="{{ ($gateway->disabled) ? 'bg-warning' : 'bg-success' }}"></i>
									<span class="status">{{ ($gateway->disabled) ? 'Yes' : 'No' }}</span>
							  	</span>
							</th>

							<td class="table-actions">

								<a href="{{ route('admin.gateways.edit', $gateway->id) }}" class="table-action"
									data-toggle="tooltip" data-original-title="@lang('admin.edit_gateway')">
									<i class="far fa-edit"></i>
								</a>
								<form class="inline-block" method="POST" action="{{ route('admin.gateways.destroy', $gateway->id) }}">
									@method('delete')
									@csrf
									<button type="button" class="table-action table-action-delete" data-toggle="tooltip"
										data-original-title="@lang('admin.delete_gateway')">
										<i class="fas fa-trash"></i>
									</button>
								</form>
							</td>

						</tr>
						@endforeach



					</tbody>
				</table>
			</div>
			<!-- Card footer -->
			<div class="card-footer py-4">
				{{ $gateways->links() }}
			</div>
		</div>
	</div>
</div>
@endsection

@include('components.dialogs.delete', ['title' => __('admin.delete_gateway'), 'description' => __('admin.delete_gateway_description')])