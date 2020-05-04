@extends('layouts.app')

@section('content')
	<div class="container mt-64 pt-64 pb-64">
		<div class="row justify-content-center">
			<div class="col-lg-7">
				<div class="row mb-5">
					<div class="col-12">
						<h3 class="mb-2">Recent Announcements</h3>
						@if(count($announcements) > 0)
							<ul class="list-group">
							@foreach($announcements as $a)
								<li class="list-group-item">
									<h5>{{ $a->title }}</h5>
									<p class="mb-2">{{ $a->description }}</p>
									<p class="mb-0"><small>{{ $a->game()->title }} | {{ Carbon\Carbon::parse($a->created_at)->format('M jS, Y') }}</small></p>
								</li>
							@endforeach
							</ul>

							<a href="{{ url('/announcements') }}" class="btn btn-primary centered">View All Announcements</a>
						@else
						<div style="background: #f0f0f0; padding: 24px; border-radius: 8px;">
							<p class="text-center mb-0">No announcements made yet.</p>
						</div>
						@endif
					</div>
				</div>

				<div class="row mb-5">
					<div class="col-12">
						<h3 class="mb-2">Games</h3>
						@if(count($games) > 0)
						@else
							<div style="background: #f0f0f0; padding: 24px; border-radius: 8px;">
								<p class="text-center mb-0">No games found.</p>
							</div>
						@endif
					</div>
				</div>

				<div class="row">
					<div class="col-12">
						<h3 class="mb-2">Upcoming Events</h3>
						@if(count($events) > 0)
						@else
							<div style="background: #f0f0f0; padding: 24px; border-radius: 8px;">
								<p class="text-center mb-0">No upcoming events found.</p>
							</div>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection