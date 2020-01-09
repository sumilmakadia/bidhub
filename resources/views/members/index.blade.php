@extends('layouts.app')

@section('content')



<div class="page-wrapper" style="min-height: 149px;">
	<div class="container-fluid">
		<div class="row page-titles">
			<div class="col-md-5 align-self-center">
				<h4 class="text-themecolor">{{ trans('users.model_plural') }}</h4>
			</div>
			<div class="col-md-7 align-self-center text-right">
				<div class="d-flex justify-content-end align-items-center">
 <a href="{{ route('members.user.create') }}" class="btn btn-info m-l-15" title="{{ trans('users.create') }}">
                            <i class="fa fa-plus-circle"></i>Create New
                         </a>				</div>
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
				 @if(count($users) == 0)
                            <div class="panel-body text-center">
                                <h4>{{ trans('users.none_available') }}</h4>
                            </div>
                        @else

                              <div class="table-responsive">

                                        <table class="table table-striped ">
                                            <thead>
                                                <tr>
                                                    <th>{{ trans('users.role_id') }}</th>
                            <th>{{ trans('users.name') }}</th>
                            <th>{{ trans('users.email') }}</th>
                            <th>{{ trans('users.email_verified_at') }}</th>
                            <th>{{ trans('users.password') }}</th>
                            <th>{{ trans('users.remember_token') }}</th>

                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($users as $user)
                                                <tr>
                                                    <td>{{ optional($user->Role)->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->email_verified_at }}</td>
                            <td>{{ $user->password }}</td>
                            <td>{{ $user->remember_token }}</td>

                                                    <td>

                                                        <form method="POST" action="{!! route('members.user.destroy', $user->id) !!}" accept-charset="UTF-8">
                                                        <input name="_method" value="DELETE" type="hidden">
                                                        {{ csrf_field() }}

                                                            <div class="btn-group btn-group-xs pull-right" role="group">
                                                                <a href="{{ route('members.user.show', $user->id ) }}" class="btn btn-info" title="{{ trans('users.show') }}">
                                                                    <span class="glyphicon glyphicon-open" aria-hidden="true"></span>View
                                                                </a>
                                                                <a href="{{ route('members.user.edit', $user->id ) }}" class="btn btn-primary" title="{{ trans('users.edit') }}">
                                                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Edit
                                                                </a>

                                                                <button type="submit" class="btn btn-danger" title="{{ trans('users.delete') }}" onclick="return confirm(&quot;{{ trans('users.confirm_delete') }}&quot;)">
                                                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>Delete
                                                                </button>
                                                            </div>

                                                        </form>

                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                            {!! $users->render() !!}

                                    </div>


                         @endif


</div>
		</div>
			</div>
		</div>
	</div>
</div>
@endsection