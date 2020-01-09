@extends('layouts.app')
@section('title', 'Page Title')
@section('content')

<div class="page-wrapper" style="min-height: 149px;">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">{{ isset($title) ? $title : 'Portfolios Photo' }}</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <a href="{{ route('portfolios_photos.portfolios_photo.create') }}" class="btn btn-info m-l-15" title="{{ trans('portfolios_photos.create') }}">
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
   <h6>{{ trans('portfolios_photos.portfolio_id') }}</h6>
   <small class="text-muted"> {{ optional($portfoliosPhoto->Portfolio)->title }}</small>
</p>
<p>
   <h6>{{ trans('portfolios_photos.file_name') }}</h6>
   <small class="text-muted"> {{ $portfoliosPhoto->file_name }}</small>
</p>
<p>
   <h6>{{ trans('portfolios_photos.file_path') }}</h6>
   <small class="text-muted"> {{ $portfoliosPhoto->file_path }}</small>
</p>
<p>
   <h6>{{ trans('portfolios_photos.file_type') }}</h6>
   <small class="text-muted"> {{ $portfoliosPhoto->file_type }}</small>
</p>
<p>
   <h6>{{ trans('portfolios_photos.created_by') }}</h6>
   <small class="text-muted"> {{ optional($portfoliosPhoto->creator)->name }}</small>
</p>
<p>
   <h6>{{ trans('portfolios_photos.created_at') }}</h6>
   <small class="text-muted"> {{ $portfoliosPhoto->created_at }}</small>
</p>
<p>
   <h6>{{ trans('portfolios_photos.updated_at') }}</h6>
   <small class="text-muted"> {{ $portfoliosPhoto->updated_at }}</small>
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