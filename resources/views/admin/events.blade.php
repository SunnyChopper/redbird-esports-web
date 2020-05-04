@extends('layouts.app')

@section('content')
	@include('admin.modals.create-event-type')
	@include('admin.modals.create-event')
	@include('admin.modals.delete-event')
	<div class="container mt-64 pt-64 pb-64">
		<div class="row">
			<div class="col-12">
				@if(count($types) > 0)
					@if(count($events) > 0)
						<div style="overflow: auto;">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>Title</th>
										<th>Location</th>
										<th>Date/Time</th>
										<th>Event Type</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									@foreach($events as $e)
									<tr>
										<td style="vertical-align: middle;">{{ $e->title }}</td>
										<td style="vertical-align: middle;">{{ $e->location }}</td>
										<td style="vertical-align: middle;">{{ Carbon\Carbon::parse($e->event_datetime)->format('M jS, Y') }} at {{ Carbon\Carbon::parse($e->event_datetime)->format('h:i A') }}</td>
										<td style="vertical-align: middle;">{{ $e->type()->first()->type }}</td>
										<td style="vertical-align: middle;">
											<button data-id={{ $e->id }} type="button" class="delete_event btn btn-sm btn-danger" style="float: right;">Delete</button>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>

							<div class="centered">
								<button type="button" class="create_event btn btn-primary" style="display: inline-block;">Create New Event</button>
								<button type="button" class="create_event_type btn btn-primary" style="display: inline-block;">Create New Event Type</button>
							</div>
						</div>
					@else
						<div class="row justify-content-center">
							<div class="col-lg-6 col-md-7 col-sm-10 col-12">
								<div style="background: #f0f0f0; padding: 24px; border-radius: 8px;">
									<h4 class="text-center">No Events</h4>
									<p class="text-center">No events were found in the system. Click below to create the first event.</p>
									<button type="button" class="create_event btn btn-danger btn-sm centered">Create Event</button>
								</div>
							</div>
						</div>
					@endif
				@else
					<div class="row justify-content-center">
						<div class="col-lg-6 col-md-7 col-sm-10 col-12">
							<div style="background: #f0f0f0; padding: 24px; border-radius: 8px;">
								<h4 class="text-center">No Event Types</h4>
								<p class="text-center">In order to create an event, you must first create an event type.</p>
								<button type="button" class="create_event_type btn btn-danger btn-sm centered">Create Event Type</button>
							</div>
						</div>
					</div>
				@endif
			</div>
		</div>
	</div>
@endsection

@section('page_js')
	<script type="text/javascript">
		$('.create_event_type').on('click', function() {
			$('#create_event_type_modal').modal('show');
		});

		$('.create_event').on('click', function() {
			$('#create_event_modal').modal('show');
		});

		$('.delete_event').on('click', function() {
			var id = $(this).data('id');
			$('input[name=event_id]').val(id);
			$('#delete_event_modal').modal('show');
		});
	</script>
@endsection