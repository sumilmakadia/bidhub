@extends('layouts.app')

@section('content')


	<div class="page-wrapper" style="min-height: 149px;">
		<div class="container-fluid">
			<div class="row page-titles">
				<div class="col-md-5 align-self-center">
					<h3 class="mb-10 p-0">Favorites</h3>
					<h5>View Projects That You Have Favorited</h5>
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
							@if(count($favorites) == 0)
								<div class="panel-body text-center">
									<h4>{{ trans('favorites.none_available') }}</h4>
								</div>
							@else

								<div class="table-responsive">

									<table class="table table-striped ">
										<thead>
										<tr>

											<th>Job Name</th>
											<th>State</th>
											<th>Due Date</th>
											<th>Start Date</th>
											<th>Status</th>
											<th></th>
										</tr>
										</thead>
										<tbody>
										@foreach($favorites as $favorite)
											<tr>
											    @isset($favorite->project)
												<td class=""><strong><a href="/project-room/show/@isset($favorite->project->id){{$favorite->project->id}}@endisset">@isset($favorite->project->title){{$favorite->project->title}}@endisset</a></strong></td>
												<td class=" state">{{$favorite->project->location}}</td>
												<td class=" due_date">{{$favorite->project->need_bid_by_date}}</td>
												<td class=" start_date">{{$favorite->project->starts_on}}</td>
												<td class=" status">{{$favorite->project->status}}</td>
												<td>

													<form method="POST" action="{!! route('favorites.favorite.destroy', $favorite->id) !!}" accept-charset="UTF-8">
														<input name="_method" value="DELETE" type="hidden">
														{{ csrf_field() }}

														<div class="btn-group btn-group-xs pull-right" role="group">
															<button type="submit" class="btn btn-danger" title="{{ trans('favorites.delete') }}" onclick="return confirm(&quot;{{ trans('favorites.confirm_delete') }}&quot;)">
																<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>Delete
															</button>
														</div>

													</form>

												</td>
												@endisset
											</tr>
										@endforeach
										</tbody>
									</table>
									{!! $favorites->render() !!}

								</div>


							@endif


						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection











