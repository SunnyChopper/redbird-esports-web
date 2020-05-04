<div class="modal" id="create_event_type_modal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="{{ url('/admin/event/type/create') }}" method="POST">
				<div class="modal-header">
					<h5 class="modal-title">Create Event Type</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-12">
							{{ csrf_field() }}
							<div class="form-group row">
								<div class="col-12">
									<label for="title">Title:</label>
									<input type="text" name="title" class="form-control" required />
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