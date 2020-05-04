<div class="modal" id="create_event_modal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form id="create_event_form" action="{{ url('/admin/events/create') }}" method="POST">
				<div class="modal-header">
					<h5 class="modal-title">Create Event</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-12">
							{{ csrf_field() }}
							<div class="form-group row mb-3">
								<div class="col-12">
									<label for="title">Title:</label>
									<input type="text" name="title" class="form-control" required />
								</div>
							</div>

							<div class="form-group row mb-3">
								<div class="col-6">
									<label for="title">Location:</label>
									<input type="text" name="location" class="form-control" required />
								</div>

								<div class="col-6">
									<label for="title">Date and Time:</label>
									<input type="datetime-local" name="event_datetime" class="form-control" required />
								</div>

							</div>

							<div class="form-group row mb-3">
								<div class="col-12">
									<label for="title">Game:</label>
									<select name="game_id" form="create_event_form" class="form-control">
										@foreach($games as $g)
										<option value="{{ $g->id }}">{{ $g->title }}</option>
										@endforeach
									</select>
								</div>
							</div>

							<div class="form-group row mb-3">
								<div class="col-12">
									<label for="title">Event Type:</label>
									<select name="event_type_id" form="create_event_form" class="form-control">
										@foreach($types as $t)
										<option value="{{ $t->id }}">{{ $t->type }}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-danger">Create</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>