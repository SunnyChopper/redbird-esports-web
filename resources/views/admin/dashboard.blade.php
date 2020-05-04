@extends('layouts.app')

@section('content')
	<div class="container mt-64 pt-64 pb-64">
		<div class="row justify-content-center">
			<div class="col-lg-7 col-md-9 col-sm-12 col-12">
				<div class="row">
					<div class="col-12">
						<h4>Recently Joined</h4>
						@if(count($users) > 0)
						<ul class="list-group">
							@foreach($users as $u)
							<li class="list-group-item">
								<div class="row" style="display: flex;">
									<div class="col-lg-8 col-md-8 col-sm-7 col-7" style="margin: auto;">
										<h6>{{ $u->name }}</h6>
										<p class="mb-0">Email: <a href="mailto:{{ $u->email }}">{{ $u->email }}</a></p>
										<p class="mb-0"><small>Joined {{ Carbon\Carbon::parse($u->created_at)->format('M jS, Y') }}</small></p>
									</div>

									<div class="col-lg-4 col-md-4 col-sm-5 col-5" style="margin: auto;">
										<button type="button" class="btn btn-sm btn-danger" style="float: right;">Delete User</button>
									</div>
								</div>
							</li>
							@endforeach
						</ul>

						<a href="{{ url('/admin/users') }}" class="btn btn-primary btn-sm mt-3 centered">View All Users</a>
						@else
						<div class="row justify-content-center">
							<div class="col-lg-6 col-md-7 col-sm-10 col-12">
								<div style="background: #f0f0f0; padding: 24px; border-radius: 8px;">
									<p class="text-center">No users were found in the system.</p>
								</div>
							</div>
						</div>
						@endif
					</div>
				</div>

				<div class="row mt-5">
					<div class="col-12">
						<h4>Upcoming Events</h4>
						@if(count($events) > 0)
						<ul class="list-group">
							@foreach($events as $e)
							<li class="list-group-item">
								<h5>{{ $e->title }}</h5>
								<p class="mb-0"><strong>Location:</strong> {{ $e->location }}</p>
								<p class="mb-0"><strong>Date and Time:</strong> {{ Carbon\Carbon::parse($e->event_datetime)->format('M jS, Y') }} at {{ Carbon\Carbon::parse($e->event_datetime)->format('h:i A') }}</p>
								<p class="mb-0"><strong>Game:</strong> {{ $e->game()->first()->title }}</p> 
							</li>
							@endforeach
						</ul>

						<a href="{{ url('/admin/events') }}" class="btn btn-primary btn-sm mt-3 centered">View All Events</a>
						@else
						<div class="row justify-content-center">
							<div class="col-lg-6 col-md-7 col-sm-10 col-12">
								<div style="background: #f0f0f0; padding: 24px; border-radius: 8px;">
									<p class="text-center">No events were found in the system.</p>
								</div>
							</div>
						</div>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection