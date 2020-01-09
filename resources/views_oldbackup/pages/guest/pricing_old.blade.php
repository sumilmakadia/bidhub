@extends('themes.ino.app_ino')

@section('title', 'Pricing')

@section('content')
<style>
.purchase-btn {
    color: #fff;
    border: 1px solid #fff;
    background-color: #fb9677;
}
</style>
	<section class="support-area" style="padding:50px 0">
		<div class="container">
			<div class="row"></div>
		</div>
	</section>
	<section class="pricing-area" id="price" style="padding-top:30px;padding-bottom:0;">
    <div class="col-md-12">
		<div class="container">
			<div class="section-title">
				<h2>{{setting('home.location_28')}}</h2>
				<p>{{setting('home.location_29')}}</p>
			</div>
		
			<div class="tab-content priceing-tab" style="padding-top:30px">
				<div role="tabpanel" class="tab-pane active" id="price-1">
				 <div class="row ">
				    @foreach($plans as $plan)
					<div class="col-md-4 col-sm-12 price wow fadeIn" style="visibility: visible; animation-name: fadeIn;margin-bottom: 30px;">
						<div class="pricing-box">
							<div class="pricing-header">
								<h2>{{$plan->plan_name}}</h2>
								@if($plan->plan_amount != 0.00)
								<h3 class="packeg_typ"><span>$</span>{{$plan->plan_amount}}<small> {{$plan->plan_interval}}</small></h3>
								@else
								<h3 class="packeg_typ"><span></span>Free<small> {{$plan->plan_interval}}</small></h3>
								@endif
								@if($plan->id ==2)
								<a href="/register" class="try" style="color:#fb9677;">(Free For Life)</a>
								@elseif($plan->id == 8)
								<a href="/register" class="try" style="color:#fb9677;">(60 Day Free Trial)</a>
								@else
								<p class="try" style="color:#fb9677;min-height: 50px;"></p>
								@endif
							</div>
							<ul class="list-unstyled plan-lists" style="padding: 0 5px;">
							    @php
							    $features = explode(',', $plan->plan_description);
							    @endphp
							    @for($i = 0; $i < 13; $i++)
								<li style="height:40px;">{{isset($features[$i]) ? $features[$i] : ''}}</li>
								@endfor
							</ul>
							
							<a href="/register" class="purchase-btn">Get Started</a>
						</div>
					</div>
					@endforeach
					</div>
					</div>
					</div>
				    <div class="tab-content priceing-tab" style="padding-top:30px">
				    <div role="tabpanel" class="row tab-pane active" id="price-1">
					<div class="section-title" style="margin-top:50px;">
        				<h2>ADD-ONS TO MEMBERSHIP</h2>
        				<p></p>
        			</div>
        			<div class="row ">
					@foreach($addons as $adds)
					<div class="col-md-3 col-sm-12 price wow fadeIn" style="visibility: visible; animation-name: fadeIn;margin-bottom: 30px;">
						<div class="pricing-box">
							<div class="pricing-header">
								<h2 style="min-height: 70px;padding:0 25px;">{{$adds->title}}</h2>
								@if($adds->amount != 0.00)
								<h3 class="packeg_typ"><span>$</span>{{$adds->amount}}<small> Monthly</small></h3>
								@else
								<h3 class="packeg_typ" style="color:#fb9677;"><span></span>Free<small> {{$adds->days}}</small></h3>
								@endif
							</div>
							<ul class="list-unstyled plan-lists" style="padding: 0 5px;">
							    @php
							    $features = explode(',', $adds->benefits);
							    @endphp
							    @for($i = 0; $i < 3; $i++)
								<li style="height:40px;">{{isset($features[$i]) ? $features[$i] : ''}}</li>
								@endfor
							</ul>
							
							<a href="/register" class="purchase-btn">Get Started</a>
						</div>
					</div>
					@endforeach
					</div>
				
			</div>
		</div>
	</div>
	</section>
	<section class="plans-extra" id="plans-extra" style="padding:30px">
		<div class="container" >
			<div class="section-title" style="margin:0 auto;">
				<h2 style="display: inline-block;margin:50px 0 0;">All plans come with the following:</h2>
			</div>
		<div class="row ">
			<div class="col-sm-3 user wow fadeIn" style="visibility: visible; animation-name: fadeIn;min-height: 250px;">
				<div class="user-item">
					<i class="lnr lnr-tag"></i>
					<h2 class="th-h2">View Help Wanted Ads</h2>
				</div>
			</div>
			<div class="col-sm-3 user wow fadeIn" style="visibility: visible; animation-name: fadeIn;min-height: 250px;">
				<div class="user-item">
					<i class="lnr lnr-home"></i>
					<h2 class="th-h2">View Property for Sale</h2>
				</div>
			</div>
			<div class="col-sm-3 user wow fadeIn" style="visibility: visible; animation-name: fadeIn;min-height: 250px;">
				<div class="user-item">
					<i class="lnr lnr-inbox"></i>
					<h2 class="th-h2">View Directory</h2>
				</div>
			</div>
			<div class="col-sm-3 user wow fadeIn" style="visibility: visible; animation-name: fadeIn;min-height: 250px;">
				<div class="user-item">
					<i class="lnr lnr-exit-up"></i>
					<h2 class="th-h2">Post Unlimited Projects</h2>
				</div>
			</div>
			<div class="col-sm-3 user wow fadeIn" style="visibility: visible; animation-name: fadeIn;min-height: 250px;">
				<div class="user-item">
					<i class="lnr lnr-select"></i>
					<h2 class="th-h2">Create Profile</h2>
				</div>
			</div>
			<div class="col-sm-3 user wow fadeIn" style="visibility: visible; animation-name: fadeIn;min-height: 250px;">
				<div class="user-item">
					<i class="lnr lnr-list"></i>
					<h2 class="th-h2">Listing in Free Tier Directory</h2>
				</div>
			</div>
			<div class="col-sm-3 user wow fadeIn" style="visibility: visible; animation-name: fadeIn;min-height: 250px;">
				<div class="user-item">
					<i class="lnr lnr-store"></i>
					<h2 class="th-h2">Marketplace Access</h2>
				</div>
			</div>
			<div class="col-sm-3 user wow fadeIn" style="visibility: visible; animation-name: fadeIn;min-height: 250px;">
				<div class="user-item">
					<i class="lnr lnr-sync"></i>
					<h2 class="th-h2">Advanced Filters</h2>
				</div>
			</div>
			<div class="col-sm-3 user wow fadeIn" style="visibility: visible; animation-name: fadeIn;min-height: 250px;">
				<div class="user-item">
					<i class="lnr lnr-star"></i>
					<h2 class="th-h2">Favoriting Projects</h2>
				</div>
			</div>
			<div class="col-sm-3 user wow fadeIn" style="visibility: visible; animation-name: fadeIn;min-height: 250px;">
				<div class="user-item">
					<i class="lnr lnr-bubble"></i>
					<h2 class="th-h2">Instant Messaging</h2>
				</div>
			</div>
			<div class="col-sm-3 user wow fadeIn" style="visibility: visible; animation-name: fadeIn;min-height: 250px;">
				<div class="user-item">
					<i class="lnr lnr-database"></i>
					<h2 class="th-h2">Dashboard</h2>
				</div>
			</div>
			</div>
	</section>
	@include('themes.ino.elements.block11')
	
	@include('themes.ino.elements.block9')
	@include('themes.ino.elements.block8')
@endsection
