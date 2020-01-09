@extends('layouts.app')
@section('title', 'Page Title')
@section('content')

	<div class="page-wrapper" style="min-height: 149px;">
		<div class="container-fluid">
			<div class="row page-titles">
				<div class="col-md-5 align-self-center">
					<h4 class="text-themecolor">{{ $equipment->equipment_title }}</h4>
				</div>
				<div class="col-md-7 align-self-center text-right">
					<div class="d-flex justify-content-end align-items-center">
{{--						<a href="{{ route('equipment-for-sale.property.create') }}" class="btn btn-info m-l-15" title="{{ trans('equipments.create') }}">--}}
{{--							<i class="fa fa-plus-circle"></i>Create New--}}
{{--						</a>--}}

					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4 col-xlg-3 col-md-5">
					
					<div class="card">
						<div class="card-body">
                            <div style="display:inline-block">
								<div style="float:left;">
									<a href="/profiles/show/{{$equipment->profile->id}}"><img class="profile-icon" src="{{$equipment->profile->avatar}}" width="100px" height="100px"/></a>
								</div>
								<div style="float:left;padding-left: 10px;">
    								<strong>{{$equipment->profile->company}}</strong><br>
    								{{$equipment->profile->first_name}} {{$equipment->profile->last_name}}<br>
    								{{$equipment->profile->type}}
								</div>
							</div>
							</div>
							</div>
							<div class="card">
						<div class="card-body">
							@if(isset($equipment->equipment_image))
							<div style="margin:30px 0;text-align:center;">
                                <img id="portfolio-image" src="@if(isset($equipment->equipment_image)){{$equipment->equipment_image}}@endif" >
                            </div>
                            @endif
						    <p>
						    <h6>Preferred Method of Contact</h6>
						    <small class="text-muted">
						        @if($equipment->preferred_contact !== null)
						        @foreach(unserialize($equipment->preferred_contact) as $contact)
						            {{ $contact }}<br>
						        @endforeach
						        @endif
					        </small>
						    </p>
							<p>
						    <h6>Email</h6>
						    <small class="text-muted"> {{ $equipment->email }}</small>
						    </p>
							<p>
							@if($equipment->phone !== null)
						    <h6>Phone Number</h6>
						    <small class="text-muted"> {{ $equipment->phone }}</small>
						    </p>
						    @endif
							<p>
							<h6>{{ trans('equipments.equipment_cost') }}</h6>
							<small class="text-muted"> {{ $equipment->equipment_cost }}</small>
							</p>

							<p>
							<h6>Location</h6>
							<small class="text-muted"> {{ $equipment->location }}</small>
							</p>
							<!--<p>-->
							<!--<h6>What is your listing price?</h6>-->
							<!--<small class="text-muted"> {{ $equipment->equipment_cost }}</small>-->
							<!--</p>-->
							<!--<p>-->
							<!--<h6>How many acres of Equipment?</h6>-->
							<!--<small class="text-muted"> {{ $equipment->equipment_acres }}</small>-->
							<!--</p>-->
							<!--<p>-->
							<!--<h6>{{ trans('equipments.equipment_annual_taxes') }}</h6>-->
							<!--<small class="text-muted"> {{ $equipment->equipment_annual_taxes }}</small>-->
							<!--</p>-->
							<!--<p>-->
							<!--<h6>{{ trans('equipments.parcel_tax_number') }}</h6>-->
							<!--<small class="text-muted"> {{ $equipment->parcel_tax_number }}</small>-->
							<!--</p>-->
						</div>
					</div>
				</div>
				<div class="col-lg-8 col-xlg-9 col-md-7">
					<div class="card">
						<div class="card-body">
							<p class="m-t-30">{{ $equipment->equipment_description }}</p>
						</div>
					</div>
					<div class="card">
						<div class="card-body">
							<h4>Gallery</h4>
							<div class="row">
							    @isset($galeries)
							    <div class="owl-carousel">
								@foreach ($galeries as $file)
									<div style="width:100%;padding:10px;">
									    <a class="item" href="{{$file->file_path}}" rel="prettyPhoto" title="">
									        <img width="100%" src="{{$file->file_path}}">
									   </a>     
									</div>
								@endforeach
								</div>
								@endisset()
							</div>
						</div>
					</div>
					<div class="card">
						<div class="card-body">
							<h4>Additional Files</h4>
							<div class="row">
							    @isset($files)
								@foreach ($files as $file)
									<div class="col-lg-2 col-md-4 col-sm-4 m-t-20">
										<div class="row">
										    @php
										    if($file->file_type == 'pdf'){
										        $src = '/public/storage/equipments/images/PDF-icon-small-231x300.png';
										    } else {
										        $src = $file->file_path;
										    }
										    @endphp
										    <div style="width:100%;padding:10px;"><img width="100%" src=""></div>
										    @if($file->file_type == 'pdf')
											<div style="width:100%;padding:10px;">{{$file->file_name}}</div>
											<div style="text-align: center;width: 100%;margin-top: 10px;"><a class="btn btn-primary" target="_blank" href="{{$file->file_path}}">Download</a></div>
											@else
											<!--<div style="width:100%;padding:10px;">{{$file->file_name}}</div>-->
											<div style="text-align: center;width: 100%;margin-top: 10px;"><a class="btn btn-primary" href="{{$file->file_path}}" target="_blank">View</a></div>
											@endif
										</div>
									</div>
								@endforeach
								@endisset()
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
@endsection