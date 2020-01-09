@extends('admin.app')

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
											<th>Status</th>
											<th>State</th>
											<th>Due Date</th>
											<th>Start Date</th>
											<th>Trades</th>
											<th></th>
										</tr>
										</thead>
										<tbody>
										@foreach($proposals as $proposal)
											<tr>
												<td class="">Sample Project {{ $proposal->project_name }}</td>
												<td class="">accepted {{ $proposal->proposal_status }}</td>
												<td class="">Maryland{{ $proposal->project_state }}</td>
												<td class="">03/15/2000{{ $proposal->project_due_date }}</td>
												<td class="">03/15/2000{{ $proposal->project_start_date }}</td>
												<td>Electricians{{ $proposal->project_trades }}</td>
												<td>

													<form method="POST" action="{!! route('proposals.proposal.destroy', $proposal->id) !!}" accept-charset="UTF-8">
														<input name="_method" value="DELETE" type="hidden">
														{{ csrf_field() }}

														<div class="btn-group btn-group-xs pull-right" role="group">
															<a href="{{ route('proposals.proposal.show', $proposal->id ) }}" class="btn btn-info" title="{{ trans('proposals.show') }}">
																<span class="glyphicon glyphicon-open" aria-hidden="true"></span>View
															</a>
															<a href="{{ route('proposals.proposal.edit', $proposal->id ) }}" class="btn btn-primary" title="{{ trans('proposals.edit') }}">
																<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Edit
															</a>

															<button type="submit" class="btn btn-danger" title="{{ trans('proposals.delete') }}" onclick="return confirm(&quot;{{ trans('proposals.confirm_delete') }}&quot;)">
																<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>Delete
															</button>
														</div>

													</form>

												</td>
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