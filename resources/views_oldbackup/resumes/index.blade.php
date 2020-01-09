@extends('layouts.app')

@section('content')


	<div class="page-wrapper" style="min-height: 149px;">
		<div class="container-fluid">
			<div class="row page-titles">
				<div class="col-md-5 align-self-center">
					<h4 class="text-themecolor">Resumes Submitted</h4>
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
							@if(count($resumes) == 0)
								<div class="panel-body text-center">
									<h4>You have no resumes submitted!</h4>
								</div>
							@else

								<div class="table-responsive">

									<table class="table table-striped ">
										<thead>
										<tr>
										    <th>Help Wanted Job</th>
											<th>Job Title</th>
											<th>Created Date</th>
											<th></th>
										</tr>
										</thead>
										<tbody>
										@foreach($resumes as $key => $resume)
											<tr>
											    <td class="">{{ $resume->help->title }}</td>
												<td class="">{{ $resume->job_title }}</td>
												<td class="">{{ date('m/d/Y H:m A',strtotime($resume->created_at)) }}</td>
												<td>

													<form method="POST" action="{!! route('resumes.resume.destroy', $resume->id) !!}" accept-charset="UTF-8">
														<input name="_method" value="DELETE" type="hidden">
														{{ csrf_field() }}

														<div class="btn-group btn-group-xs pull-right" role="group">
															<a href="{{ asset('resumes/show') . '/' . $resume->id }}" class="btn btn-info" title="{{ trans('resumes.show') }}">
																<span class="glyphicon glyphicon-open" aria-hidden="true"></span>View
															</a>
															<!--<a href="{{ route('resumes.resume.edit', $resume->id ) }}" class="btn btn-primary" title="{{ trans('resumes.edit') }}">-->
															<!--	<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Edit-->
															<!--</a>-->

															<button type="submit" class="btn btn-danger" title="{{ trans('resumes.delete') }}" onclick="return confirm(&quot;{{ trans('resumes.confirm_delete') }}&quot;)">
																<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>Delete
															</button>
														</div>

													</form>

												</td>
											</tr>
										@endforeach
										</tbody>
									</table>
									{!! $resumes->render() !!}

								</div>


							@endif


						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection











