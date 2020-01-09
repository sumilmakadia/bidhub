@extends('layouts.app')

@section('content')


<div class="page-wrapper" style="min-height: 149px;">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Manage Directory Postings</h4>
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
                        @if(count($directoriesObjects) == 0)
                        <div class="panel-body text-center">
                            <h4>{{ trans('directories.none_available') }}</h4>
                        </div>
                        @else

                        <div class="table-responsive">

                            <table class="table table-striped ">
                                <thead>
                                <tr>
                                                                <th>{{ trans('directories.company_name') }}</th>
                            <th>Trade</th>
                            <th>Website</th>
                            <th>Location</th>
                            <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($directoriesObjects as $directories)
                                <tr>
                                                                <td class="">{{ $directories->company_name }}</td>
                            <td class="">{{ $directories->trade }}</td>
                            <td class="">{{ $directories->company_website }}</td>
                            <td class="">{{ $directories->location }}</td>

                                    <td>

                                        <form method="POST" action="{!! route('directory.directories.destroy', $directories->id) !!}" accept-charset="UTF-8">
                                            <input name="_method" value="DELETE" type="hidden">
                                            {{ csrf_field() }}

                                            <div class="btn-group btn-group-xs pull-right" role="group">
                                                @if(isset($directories->profile->id))
                                                <a href="{{ route('profiles.profile.edit', $directories->profile->id) }}" class="btn btn-info" title="{{ trans('directories.show') }}">
                                                    <span class="glyphicon glyphicon-open" aria-hidden="true"></span>View
                                                </a>
                                                <a href="{{ route('profiles.profile.edit', $directories->profile->id) }}" class="btn btn-primary" title="{{ trans('directories.edit') }}">
                                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Edit
                                                </a>
                                                @endif
                                                <button type="submit" class="btn btn-danger" title="{{ trans('directories.delete') }}" onclick="return confirm(&quot;{{ trans('directories.confirm_delete') }}&quot;)">
                                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>Delete
                                                </button>
                                            </div>

                                        </form>

                                    </td>
                                    <td>
										<a href="#" id="approve-{{$directories->id}}" data-id="{{$directories->id}}" data-is="@if($directories->approved == 0) 1 @else 0 @endif" class="btn @if($directories->approved == 0)btn-green @else btn-red @endif approve" style="color:#fff;" title="{{ trans('directories.appove') }}">
													<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>@if($directories->approved == 0)Approve @else Remove @endif
										</a>
									</td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {!! $directoriesObjects->render() !!}

                        </div>


                        @endif


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

      
    $('.approve').click(function (e) {
        e.preventDefault();

				$.ajax({
					type: 'post',
					url: '/directory/approve',
					data: {
					    '_token': $('meta[name="csrf-token"]').attr('content'),
					    'is_approved': $(this).data( "is" ),
						'id': $(this).data( "id" )
					},
				   success: function(data) {
				       
				       console.log(data.id.id);
				       
				       if(data.id.approved == 0){
				           $('#approve-'+data.id.id).css({"background-color": "#00c292", "color": "#fff", "border-color": "#00c292"});
				           $('#approve-'+data.id.id).data('is', 1);
				           $('#approve-'+data.id.id).text('Approve');
				       } else {
				       
				            $('#approve-'+data.id.id).css({"background-color": "#e36a75", "color": "#fff", "border-color": "#e36a75"});
				            $('#approve-'+data.id.id).data('is', 0);
				            $('#approve-'+data.id.id).text('Remove');
				       }
				     
					} 
				}).done(function(data) {
				    
		});
	});

</script>
@endsection











