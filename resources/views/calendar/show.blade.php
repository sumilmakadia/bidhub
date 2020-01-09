@extends('layouts.app')
@section('title', 'Page Title')
@section('content')

	<div class="page-wrapper" style="min-height: 149px;">
		<div class="container-fluid">
			<div class="row page-titles">
				<div class="col-md-5 align-self-center">
					<h4 class="text-themecolor">{{ isset($event->title) ? $event->title : 'Event' }}</h4>
				</div>
				<div class="col-md-7 align-self-center text-right">
					<div class="d-flex justify-content-end align-items-center">
						<a href="{{route('calendar.delete', $event->id)}}" class="btn btn-success m-l-15" title="">
							Remove Event
						</a>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4 col-xlg-3 col-md-5">
					<div class="card">
						<div class="card-body">
							@if (isset($event->image))
								<img src='{{url("storage/".$event->image)}}' class="img img-responsive" alt />
							@endif
							<p>
							<h6>Date</h6>
							<small class="text-muted"> {{ $event->date }}</small>
							</p>
							<p>
							<h6>Link</h6>
							<small class="text-muted">{{ $event->link }}</small>
							</p>
							<p>
							<h6>Created By</h6>
							<small class="text-muted"> {{ $event->user->name }}</small>
							</p>
						</div>
					</div>
				</div>
				<div class="col-lg-8 col-xlg-9 col-md-7">
					<div class="card">
						<div class="card-body">
							<p class="m-t-30">{{ $event->description }}</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection