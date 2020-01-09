@extends('themes.elite.app_elite')

@section('title', 'Help Wanted')

@section('content')
	<div class="card">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="row">
						<div class="col">
							<select name="trades[]" id="trades" class="form-control">
								<option value="">Trades</option>
							</select>
						</div>
						<div class="col">
							<input type="text" class="form-control" placeholder="Enter Location">
						</div>
						<div class="col">
							<select name="trades[]" id="trades" class="form-control">
								<option value="">Distance</option>
								<option value="25">Within 25 Miles</option>
								<option value="50">Within 50 Miles</option>
								<option value="75">Within 75 Miles</option>
								<option value="100">Within 100 Miles</option>
							</select>
						</div>
						{{--						<div class="col">--}}
						{{--							<select name="trades[]" id="trades" class="form-control">--}}
						{{--								<option value="">Sort By</option>--}}
						{{--							</select>--}}
						{{--						</div>--}}

					</div>
				</div>
			</div>
		</div>

		<div class="comment-widgets">
			<!-- Comment Row -->
			<div class="d-flex no-block comment-row">
				<div class="col-1">
					<div class="p-2">
						<span class="round">
							<img src="{{$assets_path_public_eli}}images/users/1.jpg" alt="user" width="50">
						</span>
					</div>
				</div>
				<div class="col-7">
					<div class="comment-text w-100">
						<div class="row">
							<div class="col-9">
								<h5 class="font-medium">Title</h5>
							</div>
							<div class="col-3">
								<a href="javascript:void(0)" class="btn btn-info">View Job</a>
							</div>
						</div>
						<div class="row">
							<div class="col-6">
								<span class="text-muted pull-right p-r-10">April 14, 2016    </span>
							</div>
							<div class="col-6">

							</div>
						</div>
						<div class="row">
							<div class="col-12">
								<p class="m-t-10 m-b-10 text-muted">Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has beenorem Ipsum is simply dummy text of the printing and type setting industry.</p>

							</div>
						</div>


					</div>
				</div>
				<div class="col-4">
					<div class="col medium-6 small-12">
						<div class="col-inner">
							<div class="search-item-trades m-b-10">
								<div>
									<strong>Trades Required: </strong>
								</div>
								Blinds, Garage Doors, Gutters, Insulation
							</div>
							<div class="search-contact-method  m-b-10">
								<strong>Level of Experience:</strong>
							</div>
							<div class="search-contact-method  m-b-10">
								<strong>Submit Resume By:</strong> 2019-04-01
							</div>
							<div class="search-contact-method">
								<strong>Contact Me By:</strong> Email
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
		
