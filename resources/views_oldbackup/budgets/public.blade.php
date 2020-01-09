@extends('layouts.app')

@section('content')

	<div class="page-wrapper" style="min-height: 149px;">
		<div class="container-fluid">
			<div class="row page-titles">
				<div class="col-md-5 align-self-center">
					<h4 class="text-themecolor">Budget Planner</h4>
				</div>
				<div class="col-md-7 align-self-center text-right">
					<div class="d-flex justify-content-end align-items-center">
						<a href="{{ route('budgets.budget.index') }}" class="btn btn-info m-l-15" title="{{ trans('helps.index') }}">
							Manage Budgets
						</a>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="card text-center">


					</div>
				</div>
			</div>

		</div>


	</div>
@endsection