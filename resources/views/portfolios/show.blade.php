@extends('layouts.app')
@section('title', 'Page Title')
@section('content')

	<div class="page-wrapper" style="min-height: 149px;">
		<div class="container-fluid">
			<div class="row page-titles">
				<div class="col-md-5 align-self-center">
					<h4 class="text-themecolor">{{ isset($portfolio->title) ? $portfolio->title : 'Portfolio' }}</h4>
				</div>
				<div class="col-md-7 align-self-center text-right">
					<div class="d-flex justify-content-end align-items-center">


					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4 col-xlg-3 col-md-4">
					<div class="card">
						<div class="card-body">
							<div style="display:inline-block">
								<div style="float:left;">
									<a href="/profiles/show/{{$portfolio->profile->id}}"><img src="{{$portfolio->profile->avatar}}" width="100px" height="100px"/></a>
								</div>
								<div style="float:left;padding-left: 10px;">
    								<strong>{{$portfolio->profile->company}}</strong><br>
    								{{$portfolio->profile->first_name}} {{$portfolio->profile->last_name}}<br>
    								{{$portfolio->profile->type}}
								</div>
							</div>
							<div style="margin-top:30px;text-align:center;">
                                <img id="portfolio-image" src="@if(isset($portfolio->image)){{$portfolio->image}}@endif">
                            </div>
						</div>
					</div>
				</div>
				<div class="col-lg-8 col-xlg-9 col-md-8">
					<div class="card">
						<div class="card-body">
							<p class="m-t-30">{{$portfolio->description}}</p>
							
							<h4>Additional Files</h4>
							<div class="row">
							    @isset($files)
								@foreach ($files as $file)
									<div class="col-lg-2 col-md-4 col-sm-4 m-t-20">
										<div class="row">
										    @php
										    if($file->file_type == 'pdf'){
										        $src = '/public/storage/company/images/PDF-icon-small-231x300.png';
										    } else {
										        $src = $file->file_path;
										    }
										    @endphp
										    <div style="width:100%;padding:10px;"><img width="100%" src="{{$src}}"></div>
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