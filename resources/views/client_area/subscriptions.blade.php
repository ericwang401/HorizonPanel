@extends('layouts.app')

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

@section('content')
	@foreach ($subscriptions as $subscription)
		<h1>{{ $subscription->package()->first()->title }}</h1>
	@endforeach
@endsection