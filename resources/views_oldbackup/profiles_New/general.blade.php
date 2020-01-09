@extends('layouts.app')

@section('content')


	<div class="page-wrapper" style="min-height: 149px;">
		<div class="container-fluid">
			<div class="row page-titles">
				<div class="col-md-5 align-self-center">
					<h4 class="text-themecolor">{{ trans('profiles.model_plural') }}</h4>
				</div>
				<div class="col-md-7 align-self-center text-right">
					<div class="d-flex justify-content-end align-items-center">
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-12">
					@include('profiles/search');
				</div>
			</div>
			<div class="row">


				@if(Session::has('success_message'))
					<div class="alert alert-success">
						<span class="glyphicon glyphicon-ok"></span>
						{!! session('success_message') !!}

						<button type="button" class="close" data-dismiss="alert" aria-label="close">
							<span aria-hidden="true">&times;</span>
						</button>

					</div>
				@endif
				@if(count($profiles) == 0)
					<h4>{{ trans('profiles.none_available') }}</h4>
				@else



						@foreach($profiles as $profile)

							<div class="col-12 col-md-6">
								<div class="card h-310">
									<div class="el-card-item">
										<div class="row">
											<div class="col-3">
												<div class="el-card-avatar el-overlay-1">
													<a href="{{ route('profiles.profile.show', $profile->id) }}">
														<img class="profile-icon" src="{{asset('storage/' . $profile->avatar)}}" width="150" alt="">

													</a>

												</div>
											</div>
											<div class="col-9">
												<div class="el-card-content">
													<h3 class="p-0">
														<a href="{{ route('profiles.profile.show', $profile->id) }}">
															{{ $profile->first_name }}, {{ $profile->last_name }}
														</a>
													</h3>
													<p class="p-0">{{ str_limit($profile->bio,150) }}</p>
													<a href="{{ route('profiles.profile.show', $profile->id) }}" class="btn btn-info">View</a>
													<br>
												</div>
											</div>
										</div>

									</div>
								</div>
							</div>




						@endforeach
					{!! $profiles->render() !!}



				@endif
			</div>
		</div>
	</div>
	</div>


@endsection

@section('js')
	<script defer
	        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCtx0audikCJ0HFTFpkCSqLIVPQaOTihnw&libraries=places&callback=initMap">
	</script>
	<script>
              function initMap() {
                  var input = document.getElementById('location');
                  google.maps.event.addDomListener(input, 'keydown', function(event) {
                      if (event.keyCode === 13) {
                          event.preventDefault();
                      }
                      new google.maps.places.Autocomplete(input);
                  });
                  google.maps.event.addDomListener(window, 'load', initialize);
              }
	</script>
@endsection








