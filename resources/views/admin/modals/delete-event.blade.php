<div class="modal" id="delete_event_modal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form id="delete_event_form" action="{{ url('/admin/events/delete') }}" method="POST">
				<div class="modal-header">
					<h5 class="modal-title">Delete Event</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-12">
							{{ csrf_field() }}
							<input type="hidden" name="event_id" />
							<p>Are you sure you want to delete this event?</p>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-danger">Delete</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>