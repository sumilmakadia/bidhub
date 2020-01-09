@extends('layouts.app')

@section('content')


	<div class="page-wrapper" style="min-height: 149px;">
		<div class="container-fluid">
			<div class="row page-titles">
				<div class="col-md-5 align-self-center">
					<h4 class="text-themecolor">Proposals Submitted</h4>
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
							@if(count($proposals) == 0)
								<div class="panel-body text-center">
									<h4>{{ trans('proposals.none_available') }}</h4>
								</div>
							@else

								<div class="table-responsive">

									<table class="table table-striped ">
										<thead>
										<tr>
											<th>Job Name</th>
											<th>Company Name</th>
											<th>Name</th>
											<th>Due Date</th>
											<th>Trades</th>
											<th></th>
										</tr>
										</thead>
										<tbody>
										@foreach($proposals as $key => $proposal)
									
											<tr>
											    @isset($proposal->project)
												<td class="">@isset($proposal->project->title){{ $proposal->project->title }}@endisset</td>
												<td class="">@isset($proposal->project->profile->company){{ $proposal->project->profile->company }}@endisset</td>
												<td class="">@isset($proposal->project->profile){{ $proposal->project->profile->first_name . ' ' . $proposal->project->profile->last_name }}@endisset</td>
												<td class="">@isset($proposal->project->need_bid_by_date){{ $proposal->project->need_bid_by_date }}@endisset</td>
												<td class="">@isset($proposal->trade){{ $proposal->trade }}@endisset</td>
												<td>

													<form method="POST" action="{!! route('proposals.proposal.destroy', $proposal->id) !!}" accept-charset="UTF-8">
														<input name="_method" value="DELETE" type="hidden">
														{{ csrf_field() }}

														<div class="btn-group btn-group-xs pull-right" role="group">
														    @isset($proposal->chatroom)
															<a href="{{ asset('chat-rooms') . '/' . $proposal->chatroom->id }}" class="btn btn-success" title="{{ trans('proposals.show') }}">
																<span class="glyphicon glyphicon-open" aria-hidden="true"></span>Chat
															</a>
															@else
															<a href="{{ asset('chat-rooms') . '/create/' . $proposal->project_id . '/' . $proposal->id . '/' . $proposal->project_owner }}" class="btn btn-success" title="{{ trans('proposals.show') }}">
																<span class="glyphicon glyphicon-open" aria-hidden="true"></span>Chat
															</a>
															@endisset
															<!--<a href="{{ route('proposals.proposal.edit', $proposal->id ) }}" class="btn btn-primary" title="{{ trans('proposals.edit') }}">-->
															<!--	<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Edit-->
															<!--</a>-->

															<button type="submit" class="btn btn-danger" title="{{ trans('proposals.delete') }}" onclick="return confirm(&quot;{{ trans('proposals.confirm_delete') }}&quot;)">
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
									{!! $proposals->render() !!}

								</div>


							@endif


						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection











