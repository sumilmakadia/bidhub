@extends('admin.app')

@section('content')


	<div class="page-wrapper" style="min-height: 149px;">
		<div class="container-fluid">
			<div class="row page-titles">
				<div class="col-md-5 align-self-center">
					<h4 class="text-themecolor">Manage Claim Requests</h4>
				</div>
				<div class="col-md-7 align-self-center text-right">
					<div class="d-flex justify-content-end align-items-center">

						<a href="{{ route('directory.directories.create') }}" class="btn btn-info m-l-15" title="{{ trans('directories.create') }}">
							<i class="fa fa-plus-circle"></i>Create
						</a></div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="card">
					    <form method="POST" action="/directory/admin/bulk" accept-charset="UTF-8">
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
							@if(count($claims) == 0)
								<div class="panel-body text-center">
									<h4>{{ trans('directories.none_available') }}</h4>
								</div>
							@else

								<div class="table-responsive">

									<table class="table table-striped ">
										<thead>
										<tr>
										    <th style="padding-left:11px;background-image:none;"><input type="checkbox" id="ckbCheckAll" value="" /></th>
											<th>Name</th>
                                            <th>Email</th>
											<th>Phone</th>
											<th>Trade</th>
											<th>Location</th>
											<th>Deny</th>
											<th>Approve/Remove</th>
										</tr>
										</thead>
										<tbody>
										@foreach($claims as $claim)
											<tr>
											    <td><input type="checkbox" id="{{ $claim->id }}" value="{{ $claim->id }}" name="claim_id[]" class="checkBoxClass"/></td>
											    </form>
												<td class="">{{ $claim->contact_name }}</td>
												<td class="">{{ $claim->email }}</td>
												<td class="">{{ $claim->phone }}</td>
												<td class="">@isset($claim->profile->trade){{ $claim->profile->trade }}@endisset</td>
												<td class="">@isset($claim->profile->trade){{ $claim->profile->location }}@endisset</td>

												<td>

													<form method="POST" action="{!! route('directory.directories.destroy', $claim->id) !!}" accept-charset="UTF-8">
														<input name="_method" value="DELETE" type="hidden">
														{{ csrf_field() }}

														<div class="btn-group btn-group-xs pull-right" role="group">
															<!--<a href="@isset($directories->profile->id){{ route('profiles.profile.edit', $claim->profile->id ) }}@endisset" class="btn btn-info" title="{{ trans('directories.show') }}">-->
															<!--	<span class="glyphicon glyphicon-open" aria-hidden="true"></span>View-->
															<!--</a>-->
															<!--<a href="@isset($directories->profile->id){{ route('profiles.profile.edit', $claim->profile->id ) }}@endisset" class="btn btn-primary" title="{{ trans('directories.edit') }}">-->
															<!--	<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Edit-->
															<!--</a>-->

															<button type="submit" class="btn btn-danger" title="{{ trans('directories.delete') }}" onclick="return confirm(&quot;{{ 'Claim will been denied and removed' }}&quot;)">
																<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>Deny
															</button>
														</div>

													</form>

												</td>
												<td>
            										<a href="#" id="approve-{{$claim->id}}" data-id="{{$claim->directory_id}}" data-is="@if($claim->approved == 0) 1 @else 0 @endif" data-user="{{$claim->user_id}}" class="btn @if($claim->approved == 0)btn-green @else btn-red @endif approve" style="color:#fff;" title="{{ trans('directories.appove') }}">
            													<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>@if($claim->approved == 0)Approve @else Remove @endif
            										</a>
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

    $('.table').DataTable( {
            columnDefs: [ { orderable: false, targets: 0 }]
        } );
        
        $("#ckbCheckAll").click(function () {
            $(".checkBoxClass").prop('checked', $(this).prop('checked'));
        });
      
    $('.approve').click(function (e) {
        e.preventDefault();

				$.ajax({
					type: 'post',
					url: '/directory/approve',
					data: {
					    '_token': $('meta[name="csrf-token"]').attr('content'),
					    'is_approved': $(this).data( "is" ),
						'id': $(this).data( "id" ),
						'user_id': $(this).data( "user" ),
					},
				   success: function(data) {
				       
				       console.log(data.id);
				       
				       if(data.approved == 0){
				           $('#approve-'+data.id).css({"background-color": "#00c292", "color": "#fff", "border-color": "#00c292"});
				           $('#approve-'+data.id).data('is', 1);
				           $('#approve-'+data.id).text('Approve');
				       } else if(data.approved == 1)  {
				       
				            $('#approve-'+data.id).css({"background-color": "#e36a75", "color": "#fff", "border-color": "#e36a75"});
				            $('#approve-'+data.id).data('is', 0);
				            $('#approve-'+data.id).text('Remove');
				       }
				     
					} 
				}).done(function(data) {
				    
		});
	});

</script>	
@endsection