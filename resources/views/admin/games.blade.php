@extends('layouts.app')

@section('content')
	@include('admin.modals.create-game')
	@include('admin.modals.delete-game')

	<div class="container mt-64 pt-64 pb-64">
		<div class="row">
			<div class="col-12">
			@if(count($games) > 0)
				<div style="overflow: auto;">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Game</th>
								<th>Cover Image</th>
								<th># of Events</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							@foreach($games as $g)
							<tr>
								<td style="vertical-align: middle;">{{ $g->title }}</td>
								<td style="vertical-align: middle;"><img src="{{ $g->cover_image }}" style="width: 100px; height: auto;" /></td>
								<td style="vertical-align: middle;">{{ count($g->events()->get()) }}</td>
								<td style="vertical-align: middle;">
									<button data-id="{{ $g->id }}" type="button" class="delete_game btn btn-danger" style="float: right;">Delete</button>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>

					<button type="button" class="create_game btn btn-primary centered">Create Game</button>
				</div>
			@else
				<div class="row justify-content-center">
					<div class="col-lg-6 col-md-7 col-sm-10 col-12">
						<div style="background: #f0f0f0; padding: 24px; border-radius: 8px;">
							<h4 class="text-center">No Games</h4>
							<p class="text-center">No games were found in the database. Click below to create the first game.</p>
							<button type="button" class="create_game btn-sm btn btn-danger centered">Create Game</button>
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
		$('.create_game').on('click', function() {
			$('#create_game_modal').modal('show');
		});

		$('.delete_game').on('click', function() {
			const id = $(this).data('id');
			$('input[name=game_id]').val(id);
			$('#delete_game_modal').modal('show');
		});
	</script>
@endsection