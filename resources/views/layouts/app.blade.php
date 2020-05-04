<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta content="width=device-width, initial-scale=1.0" name="viewport">

		@if(isset($title))
		<title>{{ $title }}</title>
		@else
		<title>{{ config('app.name') }}</title>
		@endif

		<meta content="" name="description">
		<meta content="" name="keywords">

		<!-- Favicons -->
		<link href="{{ URL::asset('img/favicon.png') }}" rel="icon">
		<link href="{{ URL::asset('img/apple-touch-icon.png') }}" rel="apple-touch-icon">

		<!-- Google Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

		<!-- Vendor CSS Files -->
		<link href="{{ URL::asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
		<link href="{{ URL::asset('vendor/icofont/icofont.min.css') }}" rel="stylesheet">
		<link href="{{ URL::asset('vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
		<link href="{{ URL::asset('vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
		<link href="{{ URL::asset('vendor/venobox/venobox.css') }}" rel="stylesheet">
		<link href="{{ URL::asset('vendor/aos/aos.css') }}" rel="stylesheet">

		<!-- Template Main CSS File -->
		<link href="{{ URL::asset('css/style.css') }}" rel="stylesheet">
		<link href="{{ URL::asset('css/layouts.css') }}" rel="stylesheet">
	</head>
	<body>
		@include('layouts.navbar')
		@yield('banner')
		<main id="main">
			@yield('content')
		</main>
		@include('layouts.footer')
		<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
		@include('layouts.js')
	</body>
</html>