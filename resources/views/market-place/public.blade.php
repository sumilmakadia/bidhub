@extends('layouts.app')

@section('content')
	<div class="page-wrapper" style="min-height: 149px;">
		<div class="container-fluid">
			<div class="row page-titles">
				<div class="col-md-5 align-self-center">
					<h4 class="text-themecolor">Marketplace</h4>
				</div>
				<div class="col-md-7 align-self-center text-right">
				    @if (Auth::user()->role_id == 1)
					<div class="d-flex justify-content-end align-items-center">
						<a href="{{ route('market-place.marketplace.index') }}" class="btn btn-info m-l-15" title="{{ trans('helps.index') }}">
							Manage Marketplace
						</a>
					</div>
					@endif
				</div>
			</div>

			<div class="row">
				<div class="col-12">
					@include('market-place.search')
				</div>
			</div>
			<div class="row el-element-overlay">
				@if(count($marketplaces) == 0)
					<div class="panel-body text-center col-md-12">
						<h4>{{ trans('marketplaces.none_available') }}</h4>
					</div>
				@else
					@foreach($marketplaces as $marketplace)
						<div class="col-lg-3 col-md-6">
							<div class="card h-370">
								<div class="el-card-item">
									<div class="el-card-avatar el-overlay-1">
											<img style="height: 150px;width: 100%;" src="{{asset($marketplace->company_image)}}" class="img-fluid">
									</div>
									<div class="el-card-content">
										<h3 class="box-title" style="color: #fb9678;font-weight;bold;">{{ $marketplace->company_name }}</h3>
										<p>{{ $marketplace->company_description }}</p>
										<!--<p>{{ str_limit($marketplace->company_description,150) }}</p>-->
										<span class="float-left">{{ $marketplace->company_category }}</span>
										<a href="{{ $marketplace->company_website }}" class="float-right" target="_blank">Shop Now</a>
									</div>
								</div>
							</div>
						</div>
					@endforeach
					{!! $marketplaces->appends(['name' => $name, 'category' => $category])->render() !!}
				@endif
			</div>
		</div>
	</div>
@endsection


