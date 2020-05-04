@extends('layouts.app')

@section('content')
	<div class="container mt-64 pt-64 pb-64">
		<div class="row justify-content-center">
			<div class="col-lg-7 col-md-8 col-sm-12 col-12">
				<h3 class="text-center mb-5">Login</h3>
				<div style="background: #f0f0f0; padding: 24px; border-radius: 8px;">
					<form action="{{ url('/login') }}" method="POST">
						{{ csrf_field() }}
						<div class="form-group row mb-5">
							<div class="col-12">
								<label for="email">Email<span class="red">*</span>:</label>
								<input type="email" name="email" class="form-control" />
							</div>
						</div>

						<div class="form-group row mb-5">
							<div class="col-12">
								<label for="password">Password<span class="red">*</span>:</label>
								<input type="password" name="password" class="form-control" />
							</div>
						</div>

						@if(session()->has('error'))
						<div class="form-group row mb-5">
							<div class="col-12">
								<p class="red text-center mb-0">{{ session()->get('error') }}</p>
							</div>
						</div>
						@endif

						<div class="form-group row">
							<div class="col-12">
								<input type="submit" value="Login" class="btn btn-danger centered" />
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection