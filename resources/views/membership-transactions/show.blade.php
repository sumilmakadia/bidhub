@extends('layouts.app')
@section('title', 'Page Title')
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
            <div class="col-lg-4 col-xlg-3 col-md-5">
                <div class="card">
                   <div class="card-body">
                        <p>
   <h6>{{ trans('ybr_membership5_transactions.membership_start') }}</h6>
   <small class="text-muted"> {{ $ybrMembership5Transaction->membership_start }}</small>
</p>
<p>
   <h6>{{ trans('ybr_membership5_transactions.membership_end') }}</h6>
   <small class="text-muted"> {{ $ybrMembership5Transaction->membership_end }}</small>
</p>
<p>
   <h6>{{ trans('ybr_membership5_transactions.membership_charge_date') }}</h6>
   <small class="text-muted"> {{ $ybrMembership5Transaction->membership_charge_date }}</small>
</p>
<p>
   <h6>{{ trans('ybr_membership5_transactions.membership_charge') }}</h6>
   <small class="text-muted"> {{ $ybrMembership5Transaction->membership_charge }}</small>
</p>
<p>
   <h6>{{ trans('ybr_membership5_transactions.product_id') }}</h6>
   <small class="text-muted"> {{ $ybrMembership5Transaction->product_id }}</small>
</p>
<p>
   <h6>{{ trans('ybr_membership5_transactions.plan_id') }}</h6>
   <small class="text-muted"> {{ $ybrMembership5Transaction->plan_id }}</small>
</p>
<p>
   <h6>{{ trans('ybr_membership5_transactions.created_by') }}</h6>
   <small class="text-muted"> {{ optional($ybrMembership5Transaction->creator)->name }}</small>
</p>
<p>
   <h6>{{ trans('ybr_membership5_transactions.created_at') }}</h6>
   <small class="text-muted"> {{ $ybrMembership5Transaction->created_at }}</small>
</p>
<p>
   <h6>{{ trans('ybr_membership5_transactions.updated_at') }}</h6>
   <small class="text-muted"> {{ $ybrMembership5Transaction->updated_at }}</small>
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