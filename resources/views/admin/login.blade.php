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
	<body style="height: 100vh; position: relative;">
		<div class="container" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
			<div class="row justify-content-center">
				<div class="col-lg-5 col-md-7 col-sm-12 col-12">
					<div class="login-card">
						<img src="https://pbs.twimg.com/profile_images/1207769579054874635/x8bFHthj_400x400.jpg" class="centered image-height-96" style="border-radius: 100%;" />
						<h5 class="text-center mt-16">Admin Login</h5>

						<form action="{{ url('/admin/login') }}" method="POST">
							{{ csrf_field() }}
							<div class="form-group mt-32">
								<label>Email:</label>
								<input type="email" name="email" class="form-control" required />
							</div>

							<div class="form-group">
								<label>Password:</label>
								<input type="password" name="password" class="form-control" required />
							</div>

							@if(session()->has('error'))
							<div class="form-group">
								<p class="text-center mb-0" style="color: red;">{{ session()->get('error') }}</p>
							</div>
							@endif

							<div class="form-group mt-32">
								<button type="submit" class="login btn btn-danger centered">Login</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		@include('layouts.js')

		<script type="text/javascript">
			$('.login').on('click', function() {
				const email = $('#email').val();
				const password = $('#password').val();

				var valid = true;

				if (email == "") {
					$('#email').css('border', '1px solid red');
					valid = false;
				}

				if (password == "") {
					$('#password').css('border', '1px solid red');
					valid = false;
				}

				if (valid == true) {

				}
			});

			$('#email').on('focus', function() {
				$(this).css('border', '1px solid #ced4da');
			});

			$('#password').on('focus', function() {
				$(this).css('border', '1px solid #ced4da');
			});
		</script>
	</body>
</html>