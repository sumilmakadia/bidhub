@extends('layouts.app')

@section('content')
<div class="page-wrapper" style="min-height: 149px;">
	<div class="container-fluid">
		<div class="row page-titles">
			<div class="col-md-5 align-self-center">
				<h4 class="text-themecolor">{{ !empty($budgetItem->title) ? $budgetItem->title : 'Budget Item' }}</h4>
			</div>
			<div class="col-md-7 align-self-center text-right">
				<div class="d-flex justify-content-end align-items-center">
 <a href="{{ route('budget-items.budget_item.index') }}" class="btn btn-info m-l-15 float-right" title="{{ trans('budget_items.show_all') }}">
                        <i class="fa fa-plus-circle"></i>
                        {{ trans('budget_items.show_all') }}
                </a>
                				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="card">
                        <div class="card-body">
            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" action="{{ route('budget-items.budget_item.update', $budgetItem->id) }}" id="edit_budget_item_form" name="edit_budget_item_form" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            @include ('budget-items.form', [
                                        'budgetItem' => $budgetItem,
                                      ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-info d-none d-lg-block m-l-15" type="submit" value="{{ trans('budget_items.update') }}">
                    </div>
                </div>
            </form>
            </div>
            		</div>
</div>
		</div>
	</div>
</div>

@endsection