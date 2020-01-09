@extends('layouts.app')

@section('content')


<div class="page-wrapper" style="min-height: 149px;">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">{{ trans('budgets.model_plural') }}</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <a href="{{ route('budgets.budget.create') }}" class="btn btn-info m-l-15" title="{{ trans('budgets.create') }}">
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
                        @if(count($budgets) == 0)
                        <div class="panel-body text-center">
                            <h4>{{ trans('budgets.none_available') }}</h4>
                        </div>
                        @else

                        <div class="table-responsive">

                            <table class="table table-striped ">
                                <thead>
                                <tr>
                                                                <th>{{ trans('budgets.budget_title') }}</th>
                            <th>{{ trans('budgets.budget_amount') }}</th>
                            <th>{{ trans('budgets.budget_status') }}</th>
                            <th>{{ trans('budgets.created_by') }}</th>
                            <th>{{ trans('budgets.project_id') }}</th>

                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($budgets as $budget)
                                <tr>
                                                                <td class="">{{ $budget->budget_title }}</td>
                            <td class="">{{ $budget->budget_amount }}</td>
                            <td class="">{{ $budget->budget_status }}</td>
                            <td class="">{{ optional($budget->creator)->name }}</td>
                            <td class="">{{ $budget->project_id }}</td>

                                    <td>

                                        <form method="POST" action="{!! route('budgets.budget.destroy', $budget->id) !!}" accept-charset="UTF-8">
                                            <input name="_method" value="DELETE" type="hidden">
                                            {{ csrf_field() }}

                                            <div class="btn-group btn-group-xs pull-right" role="group">
                                                <a href="{{ route('budgets.budget.show', $budget->id ) }}" class="btn btn-info" title="{{ trans('budgets.show') }}">
                                                    <span class="glyphicon glyphicon-open" aria-hidden="true"></span>View
                                                </a>
                                                <a href="{{ route('budgets.budget.edit', $budget->id ) }}" class="btn btn-primary" title="{{ trans('budgets.edit') }}">
                                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Edit
                                                </a>

                                                <button type="submit" class="btn btn-danger" title="{{ trans('budgets.delete') }}" onclick="return confirm(&quot;{{ trans('budgets.confirm_delete') }}&quot;)">
                                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>Delete
                                                </button>
                                            </div>

                                        </form>

                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {!! $budgets->render() !!}

                        </div>


                        @endif


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection











