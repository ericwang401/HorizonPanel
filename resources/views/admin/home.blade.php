<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'HorizonPanel') }} - {{ ucfirst(Request::segment(1)) }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,600,700|Material+Icons" rel="stylesheet">

    <!-- Icons -->
    <link rel="dns-prefetch" href="//cdnjs.cloudflare.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

</head>

<body>
    <div id="app">
        <example-component></example-component>
	</div>
	
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>