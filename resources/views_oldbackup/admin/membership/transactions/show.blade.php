@extends('admin.app')
@section('title', 'Page Title')
@section('content')

<div class="page-wrapper" style="min-height: 149px;">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Order #{{$ybrMembership5Transaction->id}}</h4>
            </div>
            
        </div>
        <div class="row">
            <div class="col-lg-4 col-xlg-3 col-md-5">
                <div class="card">
                   <div class="card-body">
                        <p>
                            
@isset($ybrMembership5Transaction->plan->plan_name)                            
<h6>{{ trans('ybr_membership5_transactions.plan_id') }}</h6>
   <small class="text-muted"> {{ $ybrMembership5Transaction->plan->plan_name }}</small>
</p>
@endisset

@isset($ybrMembership5Transaction->addon->title)                            
<h6>Add On</h6>
   <small class="text-muted"> {{ $ybrMembership5Transaction->addon->title }}</small>
</p>
@endisset
<p>
   <h6>{{ trans('ybr_membership5_transactions.membership_start') }}</h6>
   <small class="text-muted"> {{ $ybrMembership5Transaction->membership_start }}</small>
</p>
<p>
   <h6>{{ trans('ybr_membership5_transactions.membership_charge_date') }}</h6>
   <small class="text-muted"> {{ $ybrMembership5Transaction->membership_charge_date }}</small>
</p>
<p>
   <h6>{{ trans('ybr_membership5_transactions.membership_charge') }}</h6>
   <small class="text-muted"> ${{ $ybrMembership5Transaction->membership_charge }}</small>
</p>
<p>
   <h6>{{ trans('ybr_membership5_transactions.created_by') }}</h6>
   <small class="text-muted"> @isset($ybrMembership5Transaction->profile->first_name){{ $ybrMembership5Transaction->profile->first_name }}@endisset @isset($ybrMembership5Transaction->profile->last_name){{ $ybrMembership5Transaction->profile->last_name }}@endisset</small>
</p>
<p>
   <h6>{{ trans('ybr_membership5_transactions.created_at') }}</h6>
   <small class="text-muted"> {{ $ybrMembership5Transaction->created_at }}</small>
</p>

                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-xlg-9 col-md-7">
                <!--<div class="card">-->
                <!--   <div class="card-body">-->
                <!--      <p class="m-t-30"></p>-->
                <!--  </div>-->
                <!--</div>-->
            </div>
        </div>
    </div>
</div>
@endsection