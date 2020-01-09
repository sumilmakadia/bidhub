@extends('layouts.app')
@section('title', 'Page Title')
@section('content')
	<div class="page-wrapper" style="min-height: 149px;">
		<div class="container-fluid">
			<div class="row page-titles">
				<div class="col-md-5 align-self-center">
					<h4 class="text-themecolor">{{$profile->first_name }} {{ $profile->last_name }}</h4>
				</div>
				
				<div class="col-md-7 align-self-center text-right">
					<div class="d-flex justify-content-end align-items-center">
					    @if(Auth::id() == $profile->user->id)
						<a href="/portfolios" class="btn btn-warning m-l-15" title="">
							<i class="fa fa-heart"></i>Manage Porfolio
						</a>
						@endif
					<!--<?php $fav_user = \App\Models\Crest\favorite::where('created_by', Auth::user()->id)->where('favorite_type', 'favorite_users')->where('favorite_id',Auth::user()->id)->first(); ?>
						@if ($fav_user)
							<button href="" class="btn btn-warning m-l-15" title="" onclick="unfavoriteUser({{Auth::user()->id}})">
								<i class="fa fa-heart"></i>Unfavorite User
							</button>
						@else
							<button href="" class="btn btn-info m-l-15" title="" onclick="favoriteUser({{Auth::user()->id}})">
								<i class="fa fa-heart"></i>Favorite User
							</button>
						@endif-->


					</div>
				</div>
			</div>
			<div class="row">

				<div class="col-lg-4 col-xlg-3 col-md-5">
					<div class="card">
						<div class="card-body">
							<center class="m-t-30">
								<img class="profile-icon" src="{{$profile->avatar}}" alt="" style="max-width: 250px; max-height: 200px;">
							</center>

						</div>
					</div>
					<div class="card">
						<div class="card-body">
							<p>
							<h6>Company</h6>
							<small class="text-muted">{{ $profile->company }}</small>
							</p>
							<p>
							<h6>License Number</h6>
							<small class="text-muted">
						    @foreach(explode("\r\n",$profile->license_number) as $number)
							    {{ $number }}<br>
							@endforeach
						    </small>
							</p>
							<p>
							<h6>Location</h6>
							<small class="text-muted"> {{ $profile->location }}</small>
							</p>
							<p>
							<h6>Phone</h6>
							<small class="text-muted">{{ $profile->phone }}</small>
							</p>
							<p>
							<h6>Mobile</h6>
							<small class="text-muted">{{ $profile->mobile }}</small>
							</p>

							<p>
							<h6>Website</h6>
							<small class="text-muted">{{ $profile->website }}</small>
							</p>
							<p>
							<h6>Email</h6>
							<small class="text-muted">{{ $profile->user->email }}</small>
							</p>
							<h6>Trade</h6>
							<small class="text-muted">{{str_replace(",",", ", $profile->trade)}}</small>
							</p>

						</div>
					</div>
				</div>
				<div class="col-lg-8 col-xlg-9 col-md-7">
					<div class="card">
						<div class="card-body">
							<p class="m-t-30">{!! $profile->bio !!}</p>
						</div>
					</div>
					<div class="card">
						<div class="card-body">
						<?php $portfolios = DB::table('portfolios')->where('created_by', $profile->user_id)->get(); ?>
							<h3>Portfolio</h3>
							<div class="row p-20 p20">
							@foreach($portfolios as $portfolio)
								<div class="col-lg-4 col-md-6 m-b-20">
									<h4>{{$portfolio->title}}</h4>
									<img src="{{$portfolio->image}}" class="img-responsive radius mb-20" alt="">
									<p>{{str_limit($portfolio->description, 200, '...')}}</p>
									<a href="/portfolios/show/{{$portfolio->id}}" class="btn btn-primary">View</a>
								</div>
							@endforeach
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<input type="hidden" id="baseURL" value="{{asset('')}}">
@endsection


@section('js')
	<script>
              var baseURL = $('#baseURL').val();

              function favoriteUser(id) {
                  $.ajax({
                      url: baseURL+'favorites/create?id='+id+'&&type=user',
                      method: 'get',
                      success: function (res) {
                          window.location.reload();
                      }
                  })
              }

              function unfavoriteUser(id) {
                  $.ajax({
                      url: baseURL+'favorites/create?id='+id+'&&type=user',
                      method: 'get',
                      success: function (res) {
                          window.location.reload();
                      }
                  })
              }
	</script>
@endsection
