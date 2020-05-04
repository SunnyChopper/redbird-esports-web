@extends('layouts.app')

@section('content')
	@include('admin.modals.create-announcement')
	@include('admin.modals.delete-announcement')
	<div class="container mt-64 pt-64 pb-64">
		<div class="row">
			<div class="col-12">
				@if(count($games) > 0)
					@if(count($announcements) > 0)
					<div style="overflow: auto;">
						<table class="table table-striped mb-32">
							<thead>
								<tr>
									<th>Date</th>
									<th>Title</th>
									<th>Announcement</th>
									<th>Game</th>
								</tr>
							</thead>
							<tbody>
								@foreach($announcements as $a)
								<tr>
									<td style="vertical-align: middle;">{{ Carbon\Carbon::parse($a->created_at)->format('M jS, Y') }}</td>
									<td style="vertical-align: middle;">{{ $a->title }}</td>
									<td style="vertical-align: middle;">{{ $a->description }}</td>
									<td style="vertical-align: middle;">{{ $a->game()->first()->title }}</td>
									<td style="vertical-align: middle;">
										<button data-id="{{ $a->id }}" type="button" class="btn btn-sm btn-danger delete_announcement" style="float: right;">Delete</button>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>

						<button type="button" class="create_announcement btn btn-primary centered">Create Announcement</button>
					</div>
					@else
					<div class="row justify-content-center">
						<div class="col-lg-6 col-md-7 col-sm-10 col-12">
							<div style="background: #f0f0f0; padding: 24px; border-radius: 8px;">
								<h4 class="text-center">No Announcements</h4>
								<p class="text-center">No announcements were found in the database. Click below to create the first announcement.</p>
								<button type="button" class="create_announcement btn-sm btn btn-danger centered">Create Announcement</button>
							</div>
						</div>
					</div>
					@endif
				@else
					<div class="row justify-content-center">
						<div class="col-lg-6 col-md-7 col-sm-10 col-12">
							<div style="background: #f0f0f0; padding: 24px; border-radius: 8px;">
								<h4 class="text-center">No Games</h4>
								<p class="text-center">In order to create an announcement, you must first create a game. Click below to get started on creating a game.</p>
								<a href="{{ url('/admin/games') }}" class="btn btn-danger btn-sm centered">Create New Game</a>
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
		$('.create_announcement').on('click', function() {
			$('#create_announcement_modal').modal('show');
		});

		$('.delete_announcement').on('click', function() {
			var id = $(this).data('id');
			$('input[name=announcement_id]').val(id);
			$('#delete_announcement_modal').modal('show');
		});
	</script>
@endsection