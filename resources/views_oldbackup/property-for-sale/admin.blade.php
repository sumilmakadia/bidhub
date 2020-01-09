@extends('admin.app')

@section('content')


	<div class="page-wrapper" style="min-height: 149px;">
		<div class="container-fluid">
			<div class="row page-titles">
				<div class="col-md-5 align-self-center">
					<h4 class="text-themecolor">{{ trans('properties.model_plural') }}</h4>
				</div>
				<div class="col-md-7 align-self-center text-right">
					<div class="d-flex justify-content-end align-items-center">
						<a href="{{ route('property-for-sale.property.create') }}" class="btn btn-info m-l-15" title="{{ trans('properties.create') }}">
							<i class="fa fa-plus-circle"></i>Create New
						</a></div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="card">
					    <form method="POST" action="/property-for-sale/admin/bulk" accept-charset="UTF-8">
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
							@if(count($properties) == 0)
								<div class="panel-body text-center">
									<h4>{{ trans('properties.none_available') }}</h4>
								</div>
							@else

								<div class="table-responsive">

									<table class="table table-striped ">
										<thead>
										<tr>
										    <th style="padding-left:11px;background-image:none;"><input type="checkbox" id="ckbCheckAll" value="" /></th>
											<th>{{ trans('properties.property_title') }}</th>
											{{--                            <th>{{ trans('properties.property_contact') }}</th>--}}
											{{--                            <th>{{ trans('properties.property_email') }}</th>--}}
											{{--                            <th>{{ trans('properties.property_phone') }}</th>--}}
											<th>{{ trans('properties.property_acres') }}</th>
											<th>{{ trans('properties.property_cost') }}</th>
											<th>{{ trans('properties.parcel_tax_number') }}</th>
											<th>Location</th>
											<th>{{ trans('properties.created_at') }}</th>
											<th>{{ trans('properties.updated_at') }}</th>

											<th></th>
										</tr>
										</thead>
										<tbody>
										@foreach($properties as $property)
											<tr>
											    <td><input type="checkbox" id="{{ $property->id }}" value="{{ $property->id }}" name="property_id[]" class="checkBoxClass"/></td>
											    </form>
												<td class="">{{ $property->property_title }}</td>
												{{--                            <td class="">{{ $property->property_contact }}</td>--}}
												{{--                            <td class="">{{ $property->property_email }}</td>--}}
												{{--                            <td class="">{{ $property->property_phone }}</td>--}}
												<td class="">{{ $property->property_acres }}</td>
												<td class="">{{ $property->property_cost }}</td>
												<td class="">{{ $property->parcel_tax_number }}</td>
												<td class="">{{ $property->location }}</td>
												<td class="">{{ $property->created_at }}</td>
												<td class="">{{ $property->updated_at }}</td>

												<td>

													<form method="POST" action="{!! route('property-for-sale.property.destroy', $property->id) !!}" accept-charset="UTF-8">
														<input name="_method" value="DELETE" type="hidden">
														{{ csrf_field() }}

														<div class="btn-group btn-group-xs pull-right" role="group">
															<a href="{{ route('property-for-sale.property.show', $property->id ) }}" class="btn btn-info" title="{{ trans('properties.show') }}">
																<span class="glyphicon glyphicon-open" aria-hidden="true"></span>View
															</a>
															<a href="{{ route('property-for-sale.property.edit', $property->id ) }}" class="btn btn-primary" title="{{ trans('properties.edit') }}">
																<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Edit
															</a>

															<button type="submit" class="btn btn-danger" title="{{ trans('properties.delete') }}" onclick="return confirm(&quot;{{ trans('properties.confirm_delete') }}&quot;)">
																<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>Delete
															</button>
														</div>

													</form>

												</td>
											</tr>
										@endforeach
										</tbody>
									</table>
									{!! $properties->render() !!}

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