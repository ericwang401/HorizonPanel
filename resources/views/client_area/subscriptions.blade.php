@extends('layouts.dashboard')

<?php

/** Documentation
 * $subscription returns the specific row inside $subscriptions with the following columns
 * id (int) | user_id (int) | package_id (int) | subscription_type (string) | status (string) | overdue_amount (string) | last_payment (timestamp)
 * 
 * 
 * To fetch the package information for things like the title name
 * $subscription->package()->first()->title
 * 
 */

?>

@section('header')
{{ __('clientarea.subscriptions') }}
@endsection

@section('content')
<div class="container-fluid mt--6">
	<div class="row">
	  <div class="col">
		<div class="card">
			<div class="card-header border-0">
				<h3 class="mb-0">{{ __('clientarea.subscriptions') }}</h3>
			  </div>
	<div class="table-responsive pb-5">
    	<table class="table table-flush" id="package-table">
    	    <thead class="thead-light">
    	        <tr>
    	            <th>{{ __('clientarea.name') }}</th>
    	            <th>{{ __('clientarea.billing_interval') }}</th>
    	            <th>{{ __('clientarea.price') }}</th>
    	            <th>{{ __('clientarea.last_payment') }}</th>
    	        </tr>
    	    </thead>
    	    <tfoot>
    	        <tr>
    	            <th>{{ __('clientarea.name') }}</th>
    	            <th>{{ __('clientarea.billing_interval') }}</th>
    	            <th>{{ __('clientarea.price') }}</th>
    	            <th>{{ __('clientarea.last_payment') }}</th>
    	        </tr>
    	    </tfoot>
    	    <tbody>
				@foreach ($subscriptions as $subscription)
    	        <tr>
    	            <td>{{ $subscription->package()->first()->title }}</td>
    	            <td>N/A</td>
    	            <td>N/A</td>
    	            <td>N/A</td>
				</tr>
				@endforeach
    	    </tbody>
    	</table>
	</div>
		</div>
	  </div>
	</div>
</div>
@endsection

@section('css')
<link href="{{ asset('assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('pre-js')
<script src="{{ asset('assets/vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/vendor/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/vendor/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
<script src="{{ asset('assets/vendor/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/vendor/datatables.net-select/js/dataTables.select.min.js') }}"></script>
@endsection

@section('js')
<script>
	$('#package-table').dataTable( {
		"lengthChange": false,
		"searching": false,
		"paging": false,
       	"bInfo" : false,
		keys: !0,
		select: {
			style: "multi"
		},
		language: {
			paginate: {
				previous: "<i class='fas fa-angle-left'>",
				next: "<i class='fas fa-angle-right'>"
			}
		},
	});
</script>	
@endsection