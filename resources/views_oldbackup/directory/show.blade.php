@extends('layouts.app')
@section('title', 'Page Title')
@section('content')

	<div class="page-wrapper" style="min-height: 149px;">
		<div class="container-fluid">
			<div class="row page-titles">
				<div class="col-md-5 align-self-center">
					<h4 class="card-title m-t-10">{{$directories->company_name }} </h4>
				</div>
				<div class="col-md-7 align-self-center text-right">
					<div class="d-flex justify-content-end align-items-center">
						<a href="{{ route('directory.directories.create') }}" class="btn btn-info m-l-15" title="{{ trans('directories.create') }}">
							<i class="fa fa-plus-circle"></i>Create New
						</a>

					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4 col-xlg-3 col-md-5">
					<div class="card">
						<div class="card-body">
							<center class="m-t-30">
								<img class="profile-icon" src="{{asset('storage/' . $directories->company_image)}}" alt="" style="max-width: 300px; max-height: 250px;">
							</center>

						</div>
						<div class="card-body">
							<p>
							<h6>{{ trans('directories.company_phone') }}</h6>
							<small class="text-muted"> {{ $directories->company_phone }}</small>
							</p>
							<p>
							<h6>{{ trans('directories.company_email') }}</h6>
							<small class="text-muted"> {{ $directories->company_email }}</small>
							</p>
							<p>
							<h6>{{ trans('directories.company_website') }}</h6>
							<small class="text-muted"> {{ $directories->company_website }}</small>
							</p>
							<p>
							<p>
							<h6>Location</h6>
							<small class="text-muted"> {{ $directories->location }}</small>
							</p>
							<p>
							<h6>{{ trans('directories.company_contact') }}</h6>
							<small class="text-muted"> {{ $directories->company_contact }}</small>
							</p>

						</div>
					</div>
				</div>
				<div class="col-lg-8 col-xlg-9 col-md-7">
					<div class="card">
						<div class="card-body">
							<p class="m-t-30">{{ $directories->company_description }}</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection