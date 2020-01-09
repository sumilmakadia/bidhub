@extends('admin.app')

@section('content')


	<div class="page-wrapper" style="min-height: 149px;">
		<div class="container-fluid">
			<div class="row page-titles">
				<div class="col-md-5 align-self-center">
					<h4 class="text-themecolor">{{ trans('helps.model_plural') }}</h4>
				</div>
				<div class="col-md-7 align-self-center text-right">
					<div class="d-flex justify-content-end align-items-center">
						<a href="{{ route('help-wanted.help.create') }}" class="btn btn-info m-l-15" title="{{ trans('helps.create') }}">
							<i class="fa fa-plus-circle"></i>Create New Help Wanted
						</a></div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="card">
					    <form method="POST" action="/help-wanted/admin/bulk" accept-charset="UTF-8">
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
							@if(count($helps) == 0)
								<div class="panel-body text-center">
									<h4>{{ trans('helps.none_available') }}</h4>
								</div>
							@else

								<div class="table-responsive">

									<table class="table table-striped ">
										<thead>
										<tr>
										    <th style="padding-left:11px;background-image:none;"><input type="checkbox" id="ckbCheckAll" value="" /></th>
											<th>{{ trans('helps.title') }}</th>
											<th>{{ trans('helps.level_of_experience') }}</th>
											<th>{{ trans('helps.date_need_resume') }}</th>
											<th>{{ trans('helps.date_job_start') }}</th>
											<th>Location</th>

											<th></th>
										</tr>
										</thead>
										<tbody>
										@foreach($helps as $help)
											<tr>
											    <td><input type="checkbox" id="{{ $help->id }}" value="{{ $help->id }}" name="help_id[]" class="checkBoxClass"/></td>
											    </form>
												<td class="">{{ $help->title }}</td>
												<td class="">{{ $help->level_of_experience }}</td>
												<td class="">{{ $help->date_need_resume }}</td>
												<td class="">{{ $help->date_job_start }}</td>
												<td class="">{{ $help->location }}</td>

												<td>

													<form method="POST" action="{!! route('help-wanted.help.destroy', $help->id) !!}" accept-charset="UTF-8">
														<input name="_method" value="DELETE" type="hidden">
														{{ csrf_field() }}

														<div class="btn-group btn-group-xs pull-right" role="group">
															<a href="{{ route('help-wanted.help.show', $help->id ) }}" class="btn btn-info" title="{{ trans('helps.show') }}">
																<span class="glyphicon glyphicon-open" aria-hidden="true"></span>View
															</a>
															<a href="{{ route('help-wanted.help.edit', $help->id ) }}" class="btn btn-primary" title="{{ trans('helps.edit') }}">
																<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Edit
															</a>

															<button type="submit" class="btn btn-danger" title="{{ trans('helps.delete') }}" onclick="return confirm(&quot;{{ trans('helps.confirm_delete') }}&quot;)">
																<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>Delete
															</button>
														</div>

													</form>

												</td>
											</tr>
										@endforeach
										</tbody>
									</table>
									{!! $helps->render() !!}

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










