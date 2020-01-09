@extends('layouts.app')

@section('content')


<div class="page-wrapper" style="min-height: 149px;">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Membership Transactions</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">

                   </div>
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
                        @if(count($ybrMembership5Transactions) == 0)
                        <div class="panel-body text-center">
                            <h4>{{ trans('ybr_membership5_transactions.none_available') }}</h4>
                        </div>
                        @else

                        <div class="table-responsive">

                            <table class="table table-striped ">
                                <thead>
                                <tr>
                            <th>{{ trans('ybr_membership5_transactions.membership_start') }}</th>
                            <th>{{ trans('ybr_membership5_transactions.membership_end') }}</th>
                            <th>{{ trans('ybr_membership5_transactions.membership_charge_date') }}</th>
                            <th>{{ trans('ybr_membership5_transactions.membership_charge') }}</th>
                            <th>{{ trans('ybr_membership5_transactions.product_id') }}</th>
                            <th>{{ trans('ybr_membership5_transactions.plan_id') }}</th>
                            <th>User</th>
                            <th>{{ trans('ybr_membership5_transactions.created_at') }}</th>
                            <th>{{ trans('ybr_membership5_transactions.updated_at') }}</th>

                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($ybrMembership5Transactions as $ybrMembership5Transaction)
                                <tr>
                                                                <td class="">{{ $ybrMembership5Transaction->membership_start }}</td>
                            <td class="">{{ $ybrMembership5Transaction->membership_end }}</td>
                            <td class="">{{ $ybrMembership5Transaction->membership_charge_date }}</td>
                            <td class="">{{ $ybrMembership5Transaction->membership_charge }}</td>
                            <td class="">{{ $ybrMembership5Transaction->product_id }}</td>
                            <td class="">{{ $ybrMembership5Transaction->plan_id }}</td>
                            <td class="">{{ optional($ybrMembership5Transaction->creator)->name }}</td>
                            <td class="">{{ $ybrMembership5Transaction->created_at }}</td>
                            <td class="">{{ $ybrMembership5Transaction->updated_at }}</td>

                                    <td>

                                        <form method="POST" action="{!! route('membership-transactions.ybr_membership5_transaction.destroy', $ybrMembership5Transaction->id) !!}" accept-charset="UTF-8">
                                            <input name="_method" value="DELETE" type="hidden">
                                            {{ csrf_field() }}

                                            <div class="btn-group btn-group-xs pull-right" role="group">
{{--                                                <a href="{{ route('membership-transactions.ybr_membership5_transaction.show', $ybrMembership5Transaction->id ) }}" class="btn btn-info" title="{{ trans('ybr_membership5_transactions.show') }}">--}}
{{--                                                    <span class="glyphicon glyphicon-open" aria-hidden="true"></span>View--}}
{{--                                                </a>--}}
{{--                                                <a href="{{ route('membership-transactions.ybr_membership5_transaction.edit', $ybrMembership5Transaction->id ) }}" class="btn btn-primary" title="{{ trans('ybr_membership5_transactions.edit') }}">--}}
{{--                                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Edit--}}
{{--                                                </a>--}}

{{--                                                <button type="submit" class="btn btn-danger" title="{{ trans('ybr_membership5_transactions.delete') }}" onclick="return confirm(&quot;{{ trans('ybr_membership5_transactions.confirm_delete') }}&quot;)">--}}
{{--                                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>Delete--}}
{{--                                                </button>--}}
                                            </div>

                                        </form>

                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {!! $ybrMembership5Transactions->render() !!}

                        </div>


                        @endif


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection











