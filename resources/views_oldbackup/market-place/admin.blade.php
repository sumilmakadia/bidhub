@extends('admin.app')

@section('content')


	<div class="page-wrapper" style="min-height: 149px;">
		<div class="container-fluid">
			<div class="row page-titles">
				<div class="col-md-5 align-self-center">
					<h4 class="text-themecolor">Marketplace</h4>
				</div>
				
				<div class="col-md-7 align-self-center text-right">
				    <div class="d-flex justify-content-end align-items-center" style="float: right;">
                        <div class="d-flex justify-content-end align-items-center">
                        <a href="{{ route('market-place.marketplace.categories') }}" class="btn btn-info m-l-15" title="Manage Categories">
							<i class="fa fa-plus-circle"></i>Manage Categories
						</a></div>
					</div>
					<div class="d-flex justify-content-end align-items-center">
                        <div class="d-flex justify-content-end align-items-center">
                        <a href="{{ route('market-place.marketplace.create') }}" class="btn btn-info m-l-15" title="{{ trans('marketplace.create') }}">
							<i class="fa fa-plus-circle"></i>Create New
						</a></div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="card">
					    <form method="POST" action="/market-place/admin/bulk" accept-charset="UTF-8">
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
							@if(count($marketplaces) == 0)
								<div class="panel-body text-center">
									<h4>{{ trans('marketplaces.none_available') }}</h4>
								</div>
							@else

								<div class="table-responsive">

									<table id="market-place" class="table table-striped ">
										<thead>
										<tr>
										    <th style="padding-left:11px;background-image:none;"><input type="checkbox" id="ckbCheckAll" value="" /></th>
											<!--<th>{{ trans('marketplaces.id') }}</th>-->
											<th>{{ trans('marketplaces.company_name') }}</th>
											<th>{{ trans('marketplaces.company_description') }}</th>
											<!--<th>{{ trans('marketplaces.company_phone') }}</th>-->
											<!--<th>{{ trans('marketplaces.company_email') }}</th>-->
											<!--<th>{{ trans('marketplaces.company_image') }}</th>-->
											<th>Affiliate Link</th>
											<!--<th>{{ trans('marketplaces.company_website') }}</th>-->
											<th>Category</th>
											<!--<th>{{ trans('marketplaces.company_country') }}</th>-->
											<!--<th>{{ trans('marketplaces.company_state') }}</th>-->
											<!--<th>{{ trans('marketplaces.company_city') }}</th>-->
											<!--<th>{{ trans('marketplaces.company_zip') }}</th>-->
											<!--<th>{{ trans('marketplaces.created_by') }}</th>-->
											<!--<th>{{ trans('marketplaces.created_at') }}</th>-->

											<th></th>
										</tr>
										</thead>
										<tbody>
										@foreach($marketplaces as $marketplace)
											<tr>
											    <td><input type="checkbox" id="{{ $marketplace->id }}" name="market_place[]" value="{{ $marketplace->id }}" class="checkBoxClass"/></td>
											    </form>
												<!--<td class="">{{ $marketplace->id }}</td>-->
												<td class="">{{ $marketplace->company_name }}</td>
												<td class="">{{  substr($marketplace->company_description , 0, 100)  }}</td>
												<!--<td class="">{{ $marketplace->company_phone }}</td>-->
												<!--<td class="">{{ $marketplace->company_email }}</td>-->
												<!--<td class="">{{ $marketplace->company_image }}</td>-->
												<td class="" style="max-width:200px;">{{ $marketplace->company_website }}</td>
												<!--<td class="">{{ $marketplace->company_contact }}</td>-->
												<td class="">{{ $marketplace->company_category }}</td>
												<!--<td class="">{{ $marketplace->company_state }}</td>-->
												<!--<td class="">{{ $marketplace->company_city }}</td>-->
												<!--<td class="">{{ $marketplace->company_zip }}</td>-->
												<!--<td class="">{{ optional($marketplace->creator)->name }}</td>-->
												<!--<td class="">{{ $marketplace->created_at }}</td>-->

												<td>

													<form method="POST" action="{!! route('market-place.marketplace.destroy', $marketplace->id) !!}" accept-charset="UTF-8">
														<input name="_method" value="DELETE" type="hidden">
														{{ csrf_field() }}

														<div class="btn-group btn-group-xs pull-right" role="group">
															<a href="{{ route('market-place.marketplace.show', $marketplace->id ) }}" class="btn btn-info" title="{{ trans('marketplaces.show') }}">
																<span class="glyphicon glyphicon-open" aria-hidden="true"></span>View
															</a>
															<a href="{{ route('market-place.marketplace.edit', $marketplace->id ) }}" class="btn btn-primary" title="{{ trans('marketplaces.edit') }}">
																<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Edit
															</a>

															<button type="submit" class="btn btn-danger" title="{{ trans('marketplaces.delete') }}" onclick="return confirm(&quot;{{ trans('marketplaces.confirm_delete') }}&quot;)">
																<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>Delete
															</button>
														</div>

													</form>

												</td>
											</tr>
										@endforeach
										</tbody>
									</table>
								

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
    
        $('#market-place').DataTable( {
            columnDefs: [ { orderable: false, targets: 0 }]
        } );
        
        $("#ckbCheckAll").click(function () {
            $(".checkBoxClass").prop('checked', $(this).prop('checked'));
        });
    
</script>	
@endsection