@extends('admin.app')

@section('content')


<div class="page-wrapper" style="min-height: 149px;">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">{{ trans('profiles.model_plural') }}</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <a href="{{ route('profiles.profile.create_user') }}" class="btn btn-info m-l-15" title="{{ trans('profiles.create') }}">
                       <i class="fa fa-plus-circle"></i>Create New
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form method="POST" action="/profiles/admin/bulk" accept-charset="UTF-8">
                    <input class="btn btn-danger" type="submit" value="Delete Selected" style="margin-left: 20px;cursor:pointer;">
                    {{csrf_field()}}
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
                            <h4>{{ trans('profiles.none_available') }}</h4>
                        </div>
                        @else

                        <div class="table-responsive">
                        <?php $roles = \Illuminate\Support\Facades\DB::table('roles')->get(); ?>
                            <table id="users" class="table table-striped ">
                                <thead>
                                <tr>
                                    <th style="padding-left:11px;background-image:none;"><input type="checkbox" id="ckbCheckAll" value="" /></th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Membership</th>
                                    <th>Addons</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td><input type="checkbox" id="{{ $user->id }}" value="{{ $user->id }}" name="user_id[]" class="checkBoxClass"/></td>
                                    </form>
                                    <td class="">@isset($user->profile->first_name){{ $user->profile->first_name }}@endisset @isset($user->profile->last_name){{ $user->profile->last_name }}@endisset</td>
                                    <td>{{ $user->email }}</td>
                                    <td>@isset($user->profile->phone){{ $user->profile->phone }}@endisset</td>
                                    @if($user->role_id == 1)
                                    <td>ADMINISTRATOR</td>
                                    @else
                                    <td>@isset($user->plan->plan_name){{ $user->plan->plan_name }}@endisset</td>
                                    @endif
                                    @if($user->help == 1)
                                    <td>Help Wanted @isset($user->addon->title), {{ $user->addon->title}}@endisset</td>
                                    @else
                                    <td>@isset($user->addon->title){{ $user->addon->title }}@endisset</td>
                                    @endif
                                    <td>
                                    @if ($user->profile)
                                            <form method="POST" action="{!! route('profiles.profile.destroy', $user->id) !!}" accept-charset="UTF-8">
                                                <input name="_method" value="DELETE" type="hidden">
                                                {{ csrf_field() }}

                                                <div class="btn-group btn-group-xs pull-right" role="group">
                                                    <a href="{{ route('profiles.profile.show', $user->profile->id) }}" class="btn btn-info" title="{{ trans('profiles.show') }}">
                                                        <span class="glyphicon glyphicon-open" aria-hidden="true"></span>View
                                                    </a>
                                                    <a href="{{ route('profiles.profile.edit', $user->profile->id ) }}" class="btn btn-primary" title="{{ trans('profiles.edit') }}">
                                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Edit
                                                    </a>

                                                    <button type="submit" class="btn btn-danger" title="{{ trans('profiles.delete') }}" onclick="return confirm(&quot;{{ trans('profiles.confirm_delete') }}&quot;)">
                                                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>Delete
                                                    </button>
                                                </div>
                                            </form>
                                    @else
                                            <form method="POST" action="{!! route('profiles.profile.destroy', $user->id) !!}" accept-charset="UTF-8">
                                                <input name="_method" value="DELETE" type="hidden">
                                                {{ csrf_field() }}

                                                <div class="btn-group btn-group-xs pull-right" role="group">
                                                    <button class="btn btn-info"  title="{{ trans('profiles.show') }}" disabled>
                                                        <span class="glyphicon glyphicon-open" aria-hidden="true"></span>View
                                                    </button>
                                                    <a href="{{ url('/profiles/create?id=').$user->id }}" class="btn btn-primary" title="{{ trans('profiles.edit') }}">
                                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Edit
                                                    </a>

                                                    <button type="submit" class="btn btn-danger" title="{{ trans('profiles.delete') }}" onclick="return confirm(&quot;{{ trans('profiles.confirm_delete') }}&quot;)">
                                                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>Delete
                                                    </button>
                                                </div>
                                            </form>
                                    @endif
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
    
        $('#users').DataTable( {
            columnDefs: [ { orderable: false, targets: 0 }]
        } );
        
        $("#ckbCheckAll").click(function () {
            $(".checkBoxClass").prop('checked', $(this).prop('checked'));
        });
    
</script>
@endsection











