@extends('layouts.app')

@section('content')


<div class="page-wrapper" style="min-height: 149px;">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">{{ trans('ybr_membership1_products.model_plural') }}</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <a href="{{ route('membership-products.ybr_membership1_product.create') }}" class="btn btn-info m-l-15" title="{{ trans('ybr_membership1_products.create') }}">
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
                        @if(count($ybrMembership1Products) == 0)
                        <div class="panel-body text-center">
                            <h4>{{ trans('ybr_membership1_products.none_available') }}</h4>
                        </div>
                        @else

                        <div class="table-responsive">

                            <table class="table table-striped ">
                                <thead>
                                <tr>
                                                                <th>{{ trans('ybr_membership1_products.product_title') }}</th>

                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($ybrMembership1Products as $ybrMembership1Product)
                                <tr>
                                                                <td class="">{{ $ybrMembership1Product->product_title }}</td>

                                    <td>

                                        <form method="POST" action="{!! route('membership-products.ybr_membership1_product.destroy', $ybrMembership1Product->id) !!}" accept-charset="UTF-8">
                                            <input name="_method" value="DELETE" type="hidden">
                                            {{ csrf_field() }}

                                            <div class="btn-group btn-group-xs pull-right" role="group">
                                                <a href="{{ route('membership-products.ybr_membership1_product.show', $ybrMembership1Product->id ) }}" class="btn btn-info" title="{{ trans('ybr_membership1_products.show') }}">
                                                    <span class="glyphicon glyphicon-open" aria-hidden="true"></span>View
                                                </a>
                                                <a href="{{ route('membership-products.ybr_membership1_product.edit', $ybrMembership1Product->id ) }}" class="btn btn-primary" title="{{ trans('ybr_membership1_products.edit') }}">
                                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Edit
                                                </a>

                                                <button type="submit" class="btn btn-danger" title="{{ trans('ybr_membership1_products.delete') }}" onclick="return confirm(&quot;{{ trans('ybr_membership1_products.confirm_delete') }}&quot;)">
                                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>Delete
                                                </button>
                                            </div>

                                        </form>

                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {!! $ybrMembership1Products->render() !!}

                        </div>


                        @endif


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection











