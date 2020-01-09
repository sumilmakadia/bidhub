@extends('layouts.app')

@section('content')


	<div class="page-wrapper" style="min-height: 149px;">
		<div class="container-fluid">
			<div class="row page-titles">
				<div class="col-md-5 align-self-center">
					<h4 class="text-themecolor">{{ trans('projects.model_plural') }}</h4>
				</div>
				<div class="col-md-7 align-self-center text-right">
					<div class="d-flex justify-content-end align-items-center">
						<a href="{{ route('project-room.project.create') }}" class="btn btn-info m-l-15" title="{{ trans('projects.create') }}">
							<i class="fa fa-plus-circle"></i>Create New
						</a></div>
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
							@if(count($projects) == 0)
								<div class="panel-body text-center">
									<h4>{{ trans('projects.none_available') }}</h4>
								</div>
							@else

								<div class="table-responsive">

									<table class="table table-striped ">
										<thead>
										<tr>
											<th>Title</th>
											<th>Location</th>
											<th style="width:150px;">Trade</th>
											<th>Project Start Date</th>
											<th>Need Bid By Date</th>
											<th>Proposals</th>
											<th></th>
										</tr>
										</thead>
										<tbody>
										@foreach($projects as $project)
											<tr>
												<td class="">{{ $project->title }}</td>
												<td class="">{{ $project->location }}</td>
												<td class="">{{ $project->trade }}</td>
												<td class="">{{ $project->starts_on }}</td>
												<td class="">{{ $project->need_bid_by_date }}</td>
												<td class=""><a href="{{ route('project-room.project.show', $project->id ) }}" style="font-weight:bold; padding:5px 10px; border:1px solid lightgray; background-color:#fb9678; color:white;">{{ $project->proposals->count() }}</a></td>
												<td>

													<form method="POST" action="{!! route('project-room.project.destroy', $project->id) !!}" accept-charset="UTF-8">
														<input name="_method" value="DELETE" type="hidden">
														{{ csrf_field() }}

														<div class="btn-group btn-group-xs pull-right" role="group">
															<a href="{{ route('project-room.project.show', $project->id ) }}" class="btn btn-info" title="{{ trans('projects.show') }}">
																<span class="glyphicon glyphicon-open" aria-hidden="true"></span>View
															</a>
															<a href="{{ route('project-room.project.edit', $project->id ) }}" class="btn btn-primary" title="{{ trans('projects.edit') }}">
																<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Edit
															</a>

															<button type="submit" class="btn btn-danger" title="{{ trans('projects.delete') }}" onclick="return confirm(&quot;{{ trans('projects.confirm_delete') }}&quot;)">
																<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>Delete
															</button>
														</div>

													</form>

												</td>
											</tr>
										@endforeach
										</tbody>
									</table>
									{!! $projects->render() !!}

								</div>


							@endif


						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection











