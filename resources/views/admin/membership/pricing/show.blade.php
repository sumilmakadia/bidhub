@extends('layouts.app')
@section('title', 'Page Title')
@section('content')

<div class="page-wrapper" style="min-height: 149px;">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">{{ isset($title) ? $title : 'Ybr Membership2 Plan' }}</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <a href="{{ route('pricing.ybr_membership2_plan.create') }}" class="btn btn-info m-l-15" title="{{ trans('ybr_membership2_plans.create') }}">
                        <i class="fa fa-plus-circle"></i>Create New
                    </a>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-xlg-3 col-md-5">
                <div class="card">
                   <div class="card-body">
                        <p>
   <h6>{{ trans('ybr_membership2_plans.product_id') }}</h6>
   <small class="text-muted"> {{ optional($ybrMembership2Plan->YbrMembership1Product)->product_title }}</small>
</p>
<p>
   <h6>{{ trans('ybr_membership2_plans.plan_name') }}</h6>
   <small class="text-muted"> {{ $ybrMembership2Plan->plan_name }}</small>
</p>
<p>
   <h6>{{ trans('ybr_membership2_plans.plan_description') }}</h6>
   <small class="text-muted"> {{ $ybrMembership2Plan->plan_description }}</small>
</p>
<p>
   <h6>{{ trans('ybr_membership2_plans.plan_amount') }}</h6>
   <small class="text-muted"> {{ $ybrMembership2Plan->plan_amount }}</small>
</p>
<p>
   <h6>{{ trans('ybr_membership2_plans.plan_object') }}</h6>
   <small class="text-muted"> {{ $ybrMembership2Plan->plan_object }}</small>
</p>
<p>
   <h6>{{ trans('ybr_membership2_plans.plan_billing_scheme') }}</h6>
   <small class="text-muted"> {{ $ybrMembership2Plan->plan_billing_scheme }}</small>
</p>
<p>
   <h6>{{ trans('ybr_membership2_plans.plan_currency') }}</h6>
   <small class="text-muted"> {{ $ybrMembership2Plan->plan_currency }}</small>
</p>
<p>
   <h6>{{ trans('ybr_membership2_plans.plan_interval') }}</h6>
   <small class="text-muted"> {{ $ybrMembership2Plan->plan_interval }}</small>
</p>
<p>
   <h6>{{ trans('ybr_membership2_plans.plan_interval_count') }}</h6>
   <small class="text-muted"> {{ $ybrMembership2Plan->plan_interval_count }}</small>
</p>
<p>
   <h6>{{ trans('ybr_membership2_plans.plan_livemode') }}</h6>
   <small class="text-muted"> {{ $ybrMembership2Plan->plan_livemode }}</small>
</p>
<p>
   <h6>{{ trans('ybr_membership2_plans.trial_period_days') }}</h6>
   <small class="text-muted"> {{ $ybrMembership2Plan->trial_period_days }}</small>
</p>
<p>
   <h6>{{ trans('ybr_membership2_plans.created_at') }}</h6>
   <small class="text-muted"> {{ $ybrMembership2Plan->created_at }}</small>
</p>
<p>
   <h6>{{ trans('ybr_membership2_plans.updated_at') }}</h6>
   <small class="text-muted"> {{ $ybrMembership2Plan->updated_at }}</small>
</p>

                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-xlg-9 col-md-7">
                <div class="card">
                   <div class="card-body">
                      <p class="m-t-30">Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection