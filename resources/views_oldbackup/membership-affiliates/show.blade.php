@extends('layouts.app')
@section('title', 'Page Title')
@section('content')

<div class="page-wrapper" style="min-height: 149px;">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">{{ isset($title) ? $title : 'Ybr Membership4 Affiliate' }}</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <a href="{{ route('membership-affiliates.ybr_membership4_affiliate.create') }}" class="btn btn-info m-l-15" title="{{ trans('ybr_membership4_affiliates.create') }}">
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
   <h6>{{ trans('ybr_membership4_affiliates.created_by') }}</h6>
   <small class="text-muted"> {{ optional($ybrMembership4Affiliate->creator)->name }}</small>
</p>
<p>
   <h6>{{ trans('ybr_membership4_affiliates.affiliate_total_referrals') }}</h6>
   <small class="text-muted"> {{ $ybrMembership4Affiliate->affiliate_total_referrals }}</small>
</p>
<p>
   <h6>{{ trans('ybr_membership4_affiliates.affiliate_url') }}</h6>
   <small class="text-muted"> {{ $ybrMembership4Affiliate->affiliate_url }}</small>
</p>
<p>
   <h6>{{ trans('ybr_membership4_affiliates.affiliate_status') }}</h6>
   <small class="text-muted"> {{ $ybrMembership4Affiliate->affiliate_status }}</small>
</p>
<p>
   <h6>{{ trans('ybr_membership4_affiliates.affiliate_email') }}</h6>
   <small class="text-muted"> {{ $ybrMembership4Affiliate->affiliate_email }}</small>
</p>
<p>
   <h6>{{ trans('ybr_membership4_affiliates.affiliate_phone') }}</h6>
   <small class="text-muted"> {{ $ybrMembership4Affiliate->affiliate_phone }}</small>
</p>
<p>
   <h6>{{ trans('ybr_membership4_affiliates.affiliate_country') }}</h6>
   <small class="text-muted"> {{ $ybrMembership4Affiliate->affiliate_country }}</small>
</p>
<p>
   <h6>{{ trans('ybr_membership4_affiliates.affiliate_state') }}</h6>
   <small class="text-muted"> {{ $ybrMembership4Affiliate->affiliate_state }}</small>
</p>
<p>
   <h6>{{ trans('ybr_membership4_affiliates.affiliate_city') }}</h6>
   <small class="text-muted"> {{ $ybrMembership4Affiliate->affiliate_city }}</small>
</p>
<p>
   <h6>{{ trans('ybr_membership4_affiliates.affiliate_address') }}</h6>
   <small class="text-muted"> {{ $ybrMembership4Affiliate->affiliate_address }}</small>
</p>
<p>
   <h6>{{ trans('ybr_membership4_affiliates.affiliate_address2') }}</h6>
   <small class="text-muted"> {{ $ybrMembership4Affiliate->affiliate_address2 }}</small>
</p>
<p>
   <h6>{{ trans('ybr_membership4_affiliates.affiliate_zip') }}</h6>
   <small class="text-muted"> {{ $ybrMembership4Affiliate->affiliate_zip }}</small>
</p>
<p>
   <h6>{{ trans('ybr_membership4_affiliates.created_at') }}</h6>
   <small class="text-muted"> {{ $ybrMembership4Affiliate->created_at }}</small>
</p>
<p>
   <h6>{{ trans('ybr_membership4_affiliates.updated_at') }}</h6>
   <small class="text-muted"> {{ $ybrMembership4Affiliate->updated_at }}</small>
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