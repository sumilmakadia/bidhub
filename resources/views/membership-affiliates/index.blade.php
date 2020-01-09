@extends('layouts.app')

@section('content')


<div class="page-wrapper" style="min-height: 149px;">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">{{ trans('ybr_membership4_affiliates.model_plural') }}</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <a href="{{ route('membership-affiliates.ybr_membership4_affiliate.create') }}" class="btn btn-info m-l-15" title="{{ trans('ybr_membership4_affiliates.create') }}">
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
                        @if(count($ybrMembership4Affiliates) == 0)
                        <div class="panel-body text-center">
                            <h4>{{ trans('ybr_membership4_affiliates.none_available') }}</h4>
                        </div>
                        @else

                        <div class="table-responsive">

                            <table class="table table-striped ">
                                <thead>
                                <tr>
                                                                <th>{{ trans('ybr_membership4_affiliates.created_by') }}</th>
                            <th>{{ trans('ybr_membership4_affiliates.affiliate_total_referrals') }}</th>

                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($ybrMembership4Affiliates as $ybrMembership4Affiliate)
                                <tr>
                                                                <td class="">{{ optional($ybrMembership4Affiliate->creator)->name }}</td>
                            <td class="">{{ $ybrMembership4Affiliate->affiliate_total_referrals }}</td>

                                    <td>

                                        <form method="POST" action="{!! route('membership-affiliates.ybr_membership4_affiliate.destroy', $ybrMembership4Affiliate->id) !!}" accept-charset="UTF-8">
                                            <input name="_method" value="DELETE" type="hidden">
                                            {{ csrf_field() }}

                                            <div class="btn-group btn-group-xs pull-right" role="group">
                                                <a href="{{ route('membership-affiliates.ybr_membership4_affiliate.show', $ybrMembership4Affiliate->id ) }}" class="btn btn-info" title="{{ trans('ybr_membership4_affiliates.show') }}">
                                                    <span class="glyphicon glyphicon-open" aria-hidden="true"></span>View
                                                </a>
                                                <a href="{{ route('membership-affiliates.ybr_membership4_affiliate.edit', $ybrMembership4Affiliate->id ) }}" class="btn btn-primary" title="{{ trans('ybr_membership4_affiliates.edit') }}">
                                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Edit
                                                </a>

                                                <button type="submit" class="btn btn-danger" title="{{ trans('ybr_membership4_affiliates.delete') }}" onclick="return confirm(&quot;{{ trans('ybr_membership4_affiliates.confirm_delete') }}&quot;)">
                                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>Delete
                                                </button>
                                            </div>

                                        </form>

                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {!! $ybrMembership4Affiliates->render() !!}

                        </div>


                        @endif


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection











