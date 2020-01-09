@extends('admin.app')

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
				    <form method="POST" action="/projects/admin/bulk" accept-charset="UTF-8">
				        {{ csrf_field() }}
                    <input class="btn btn-danger" type="submit" value="Delete Selected" style="margin-left: 20px;cursor:pointer;">
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
										    <th style="padding-left:11px;background-image:none;"><input type="checkbox" id="ckbCheckAll" value="" /></th>
											<th>Title</th>
											<th>Total Units</th>
											<th>Starts On</th>
											<th>Expires On</th>
											<th>Trade</th>
											<th>Location</th>
											<th></th>
										</tr>
										</thead>
										<tbody>
										@foreach($projects as $project)
											<tr>
                                                <td><input type="checkbox" id="{{ $project->id }}" value="{{ $project->id }}" name="project_id[]" class="checkBoxClass"/></td>
                                                </form>
												<td class="">{{ $project->title }}</td>
												<td class="">{{ $project->how_many_units }}</td>
												<td class="">{{ $project->starts_on }}</td>
												<td class="">{{ $project->need_bid_by_date }}</td>
												<td class="">{{ $project->trade }}</td>
												<td class="">{{ $project->location }}</td>
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
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script>
    
        $('.table').DataTable( {
            columnDefs: [ { orderable: false, targets: 0 }]
        } );
        
        $("#ckbCheckAll").click(function () {
            $(".checkBoxClass").prop('checked', $(this).prop('checked'));
        });
    
</script>
@endsection