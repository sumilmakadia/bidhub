@extends('layouts.app')
@section('content')
<div class="page-wrapper" style="min-height: 149px;">
	<div class="container-fluid">
		<div class="row page-titles">
			<div class="col-md-5 align-self-center">
				<h4 class="text-themecolor">{{ isset($role->name) ? $role->name : 'Role' }}</h4>
			</div>
			<div class="col-md-7 align-self-center text-right">
				<div class="d-flex justify-content-end align-items-center">
 <a href="{{ route('site-roles.role.create') }}" class="btn btn-info m-l-15" title="{{ trans('roles.create') }}">
                            <i class="fa fa-plus-circle"></i>Create New
                         </a>						</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">




			<div class="card">
            <div class="card-body">
            
                        <dt>{{ trans('roles.name') }}</dt>
            <dd>{{ $role->name }}</dd>
            <dt>{{ trans('roles.display_name') }}</dt>
            <dd>{{ $role->display_name }}</dd>
            <dt>{{ trans('roles.created_at') }}</dt>
            <dd>{{ $role->created_at }}</dd>
            <dt>{{ trans('roles.updated_at') }}</dt>
            <dd>{{ $role->updated_at }}</dd>

            </div>
            	</div>

		</div>
	</div>
</div>
@endsection