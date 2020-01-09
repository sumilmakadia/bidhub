@extends('layouts.app')
@section('title', 'Page Title')
@section('content')

<div class="page-wrapper" style="min-height: 149px;">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">{{ isset($title) ? $title : 'Ybr Membership6 Permission' }}</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <a href="{{ route('ybr_membership6_permissions.ybr_membership6_permission.create') }}" class="btn btn-info m-l-15" title="{{ trans('ybr_membership6_permissions.create') }}">
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
   <h6>{{ trans('ybr_membership6_permissions.route') }}</h6>
   <small class="text-muted"> {{ $ybrMembership6Permission->route }}</small>
</p>
<p>
   <h6>{{ trans('ybr_membership6_permissions.product_id') }}</h6>
   <small class="text-muted"> {{ $ybrMembership6Permission->product_id }}</small>
</p>
<p>
   <h6>{{ trans('ybr_membership6_permissions.plan_id') }}</h6>
   <small class="text-muted"> {{ $ybrMembership6Permission->plan_id }}</small>
</p>
<p>
   <h6>{{ trans('ybr_membership6_permissions.created_at') }}</h6>
   <small class="text-muted"> {{ $ybrMembership6Permission->created_at }}</small>
</p>
<p>
   <h6>{{ trans('ybr_membership6_permissions.updated_at') }}</h6>
   <small class="text-muted"> {{ $ybrMembership6Permission->updated_at }}</small>
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