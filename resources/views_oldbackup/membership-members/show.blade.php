@extends('layouts.app')
@section('content')
<div class="page-wrapper" style="min-height: 149px;">
	<div class="container-fluid">
		<div class="row page-titles">
			<div class="col-md-5 align-self-center">
				<h4 class="text-themecolor">{{ isset($title) ? $title : 'Ybr Membership3 Member' }}</h4>
			</div>
			<div class="col-md-7 align-self-center text-right">
				<div class="d-flex justify-content-end align-items-center">
 <a href="{{ route('membership-members.ybr_membership3_member.create') }}" class="btn btn-info m-l-15" title="{{ trans('ybr_membership3_members.create') }}">
                            <i class="fa fa-plus-circle"></i>Create New
                         </a>						</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">




			<div class="card">
            <div class="card-body">
            
                        <dt>{{ trans('ybr_membership3_members.status') }}</dt>
            <dd>{{ $ybrMembership3Member->status }}</dd>
            <dt>{{ trans('ybr_membership3_members.object') }}</dt>
            <dd>{{ $ybrMembership3Member->object }}</dd>
            <dt>{{ trans('ybr_membership3_members.customer_id') }}</dt>
            <dd>{{ $ybrMembership3Member->customer_id }}</dd>
            <dt>{{ trans('ybr_membership3_members.product_id') }}</dt>
            <dd>{{ $ybrMembership3Member->product_id }}</dd>
            <dt>{{ trans('ybr_membership3_members.plan_id') }}</dt>
            <dd>{{ $ybrMembership3Member->plan_id }}</dd>
            <dt>{{ trans('ybr_membership3_members.plan_amount') }}</dt>
            <dd>{{ $ybrMembership3Member->plan_amount }}</dd>
            <dt>{{ trans('ybr_membership3_members.plan_interval') }}</dt>
            <dd>{{ $ybrMembership3Member->plan_interval }}</dd>
            <dt>{{ trans('ybr_membership3_members.plan_interval_count') }}</dt>
            <dd>{{ $ybrMembership3Member->plan_interval_count }}</dd>
            <dt>{{ trans('ybr_membership3_members.trial_period_days') }}</dt>
            <dd>{{ $ybrMembership3Member->trial_period_days }}</dd>
            <dt>{{ trans('ybr_membership3_members.created') }}</dt>
            <dd>{{ $ybrMembership3Member->created }}</dd>
            <dt>{{ trans('ybr_membership3_members.canceled_at') }}</dt>
            <dd>{{ $ybrMembership3Member->canceled_at }}</dd>
            <dt>{{ trans('ybr_membership3_members.current_period_start') }}</dt>
            <dd>{{ $ybrMembership3Member->current_period_start }}</dd>
            <dt>{{ trans('ybr_membership3_members.current_period_end') }}</dt>
            <dd>{{ $ybrMembership3Member->current_period_end }}</dd>

            </div>
            	</div>

		</div>
	</div>
</div>
@endsection