@extends('layouts.app')
@section('content')
<div class="page-wrapper" style="min-height: 149px;">
	<div class="container-fluid">
		<div class="row page-titles">
			<div class="col-md-5 align-self-center">
				<h4 class="text-themecolor">{{ isset($user->name) ? $user->name : 'User' }}</h4>
			</div>
			<div class="col-md-7 align-self-center text-right">
				<div class="d-flex justify-content-end align-items-center">
 <a href="{{ route('members.user.create') }}" class="btn btn-info m-l-15" title="{{ trans('users.create') }}">
                            <i class="fa fa-plus-circle"></i>Create New
                         </a>						</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">




			<div class="card">
            <div class="card-body">
            
                        <dt>{{ trans('users.role_id') }}</dt>
            <dd>{{ optional($user->Role)->id }}</dd>
            <dt>{{ trans('users.name') }}</dt>
            <dd>{{ $user->name }}</dd>
            <dt>{{ trans('users.email') }}</dt>
            <dd>{{ $user->email }}</dd>
            <dt>{{ trans('users.avatar') }}</dt>
            <dd>{{ $user->avatar }}</dd>
            <dt>{{ trans('users.email_verified_at') }}</dt>
            <dd>{{ $user->email_verified_at }}</dd>
            <dt>{{ trans('users.password') }}</dt>
            <dd>{{ $user->password }}</dd>
            <dt>{{ trans('users.remember_token') }}</dt>
            <dd>{{ $user->remember_token }}</dd>
            <dt>{{ trans('users.settings') }}</dt>
            <dd>{{ $user->settings }}</dd>
            <dt>{{ trans('users.created_at') }}</dt>
            <dd>{{ $user->created_at }}</dd>
            <dt>{{ trans('users.updated_at') }}</dt>
            <dd>{{ $user->updated_at }}</dd>

            </div>
            	</div>

		</div>
	</div>
</div>
@endsection