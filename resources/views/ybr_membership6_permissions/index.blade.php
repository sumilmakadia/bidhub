@extends('layouts.app')

@section('content')


<div class="page-wrapper" style="min-height: 149px;">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">{{ trans('ybr_membership6_permissions.model_plural') }}</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <a href="{{ route('ybr_membership6_permissions.ybr_membership6_permission.create') }}" class="btn btn-info m-l-15" title="{{ trans('ybr_membership6_permissions.create') }}">
                        <i class="fa fa-plus-circle"></i>Create New
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
                        @if(count($ybrMembership6Permissions) == 0)
                        <div class="panel-body text-center">
                            <h4>{{ trans('ybr_membership6_permissions.none_available') }}</h4>
                        </div>
                        @else

                        <div class="table-responsive">

                            <table class="table table-striped ">
                                <thead>
                                <tr>
                                                                <th>{{ trans('ybr_membership6_permissions.route') }}</th>
                            <th>{{ trans('ybr_membership6_permissions.product_id') }}</th>
                            <th>{{ trans('ybr_membership6_permissions.plan_id') }}</th>

                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($ybrMembership6Permissions as $ybrMembership6Permission)
                                <tr>
                                                                <td class="">{{ $ybrMembership6Permission->route }}</td>
                            <td class="">{{ $ybrMembership6Permission->product_id }}</td>
                            <td class="">{{ $ybrMembership6Permission->plan_id }}</td>

                                    <td>

                                        <form method="POST" action="{!! route('ybr_membership6_permissions.ybr_membership6_permission.destroy', $ybrMembership6Permission->id) !!}" accept-charset="UTF-8">
                                            <input name="_method" value="DELETE" type="hidden">
                                            {{ csrf_field() }}

                                            <div class="btn-group btn-group-xs pull-right" role="group">
                                                <a href="{{ route('ybr_membership6_permissions.ybr_membership6_permission.show', $ybrMembership6Permission->id ) }}" class="btn btn-info" title="{{ trans('ybr_membership6_permissions.show') }}">
                                                    <span class="glyphicon glyphicon-open" aria-hidden="true"></span>View
                                                </a>
                                                <a href="{{ route('ybr_membership6_permissions.ybr_membership6_permission.edit', $ybrMembership6Permission->id ) }}" class="btn btn-primary" title="{{ trans('ybr_membership6_permissions.edit') }}">
                                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Edit
                                                </a>

                                                <button type="submit" class="btn btn-danger" title="{{ trans('ybr_membership6_permissions.delete') }}" onclick="return confirm(&quot;{{ trans('ybr_membership6_permissions.confirm_delete') }}&quot;)">
                                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>Delete
                                                </button>
                                            </div>

                                        </form>

                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {!! $ybrMembership6Permissions->render() !!}

                        </div>


                        @endif


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection











