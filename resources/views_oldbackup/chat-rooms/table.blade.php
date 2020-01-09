@extends('layouts.app')
@section('content')
	<div class="page-wrapper" style="min-height: 149px;">
		<div class="container-fluid">
			<div class="row page-titles">
				<div class="col-md-5 align-self-center">
					<h4 class="text-themecolor">Messages</h4>
				</div>
				<div class="col-md-7 align-self-center text-right">
					<div class="d-flex justify-content-end align-items-center">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-body">
							@if(Session::has('success_message'))
								<div class="alert alert-success">
									<span class="glyphicon glyphicon-ok"></span>
									{!! session('success_message') !!}
									<button type="button" class="close" data-dismiss="alert" aria-label="close">
										<span aria-hidden="true">&times;</span>
									</button>

								</div>
							@endif
							@if(count($chat_rooms) == 0)
								<div class="panel-body text-center">
									<h4>No Chat Rooms Found</h4>
								</div>
							@else

								<div class="table-responsive">

									<table class="table table-striped ">
										<thead>
										<tr>
											<th>id</th>
											<th>Project</th>
											<th>User</th>
											<th></th>
										</tr>
										</thead>
										<tbody>
										@foreach($chat_rooms as $chat_room)
											<tr>
												<td class="">{{$chat_room->id}}</td>
												<td class=""><a href="{{url('/projects/show/').'/'.$chat_room->project_id}}"> {{$chat_room->project->title}}</a></td>
												<td class="">
													@if ($chat_room->owner_id == Auth::Id())
													          <?php $guest = \App\Models\User::find($chat_room->guest_id); echo $guest->name; ?>
													@else
														<?php $owner = \App\Models\User::find($chat_room->owner_id); echo $owner->name; ?>
													@endif
												</td>
												<td><a href="{{url('/chat-rooms').'/'.$chat_room->id}}" class="btn btn-info">Open Chat</a> </td>
											</tr>
										@endforeach
										</tbody>
									</table>
									{!! $chat_rooms->render() !!}

								</div>


							@endif


						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection











