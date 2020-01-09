@extends('layouts.app')
@section('title', 'Page Title')
@section('content')

	<div class="page-wrapper" style="min-height: 149px;">
		<div class="container-fluid">
			<div class="row page-titles">
				<div class="col-md-5 align-self-center">
					<h4 class="text-themecolor">{{ $marketplace->company_name }}</h4>
				</div>
				<div class="col-md-7 align-self-center text-right">
					<div class="d-flex justify-content-end align-items-center">
						<a href="{{ route('market-place.marketplace.create') }}" class="btn btn-info m-l-15" title="{{ trans('marketplaces.create') }}">
							<i class="fa fa-plus-circle"></i>Create New
						</a>

					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4 col-xlg-3 col-md-5">
					<div class="card">
						<div class="card-body">
								<img src="{{asset($marketplace->company_image)}}" class="" width="150">
						</div>
						<div class="card-body">

							<p>
							<h6>{{ trans('marketplaces.company_phone') }}</h6>
							<small class="text-muted"> {{ $marketplace->company_phone }}</small>
							</p>
							<p>
							<h6>{{ trans('marketplaces.company_email') }}</h6>
							<small class="text-muted"> {{ $marketplace->company_email }}</small>
							</p>

							<p>
							<h6>{{ trans('marketplaces.company_website') }}</h6>
							<small class="text-muted"> {{ $marketplace->company_website }}</small>
							</p>
							<p>
							<h6>{{ trans('marketplaces.company_contact') }}</h6>
							<small class="text-muted"> {{ $marketplace->company_contact }}</small>
							</p>
							<p>
							<h6>{{ trans('marketplaces.company_country') }}</h6>
							<small class="text-muted"> {{ $marketplace->company_country }}, {{ $marketplace->company_state }}, {{ $marketplace->company_city }}, {{ $marketplace->company_zip }}</small>
							</p>

{{--							<p>--}}
{{--							<h6>{{ trans('marketplaces.created_by') }}</h6>--}}
{{--							<small class="text-muted"> {{ optional($marketplace->creator)->name }}</small>--}}
{{--							</p>--}}
						</div>
					</div>
				</div>
				<div class="col-lg-8 col-xlg-9 col-md-7">
					<div class="card">
						<div class="card-body">
							<p class="m-t-30"> {{ $marketplace->company_description }}</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection