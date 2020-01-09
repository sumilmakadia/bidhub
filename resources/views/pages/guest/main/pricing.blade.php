@extends('themes.ino.app_ino')

@section('title', 'Pricing')

@section('content')
	<section class="support-area">
		<div class="container">
			<div class="row">




			</div>
		</div>
	</section>
	<section class="pricing-area" id="price">
		<div class="container">
			<div class="section-title">
				<h2>{{setting('home.location_28')}}</h2>
				<p>{{setting('home.location_29')}}</p>
			</div>
			<ul class="nav nav-tabs price-tab" role="tablist">
				<li role="presentation" class="active">
					<a href="#price-1" aria-controls="price-1" role="tab" data-toggle="tab">Monthly</a>
				</li>
				<li role="presentation">
					<a href="#price-2" aria-controls="price-2" role="tab" data-toggle="tab">Yearly</a>
				</li>
			</ul>
			<div class="tab-content priceing-tab">
				<div role="tabpanel" class="row tab-pane active" id="price-1">
					<div class="col-md-4 col-sm-4 price wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
						<div class="pricing-box">
							<div class="pricing-header">
								<h2>Free</h2>
								<h3 class="packeg_typ"><span>$</span>0<small> Lifetime</small></h3>
							</div>
							<ul class="list-unstyled plan-lists">
								<li>Feature</li>
								<li>Feature</li>
								<li>Feature</li>
							</ul>
							<a href="#" class="try">Try Now</a>
							<a href="#" class="purchase-btn">Purchase</a>
						</div>
					</div>
					<div class="col-md-4 col-sm-4 price wow fadeIn" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeIn;">
						<div class="pricing-box active">
							<div class="pricing-header">
								<div class="tag">popular</div>
								<h2>Professional</h2>
								<h3 class="packeg_typ"><span>$</span>49<small> Lifetime</small></h3>
							</div>
							<ul class="list-unstyled plan-lists">
								<li>Feature</li>
								<li>Feature</li>
								<li>Feature</li>
							</ul>
							<a href="#" class="try">Try Now</a>
							<a href="#" class="purchase-btn">Purchase</a>
						</div>
					</div>
					<div class="col-md-4 col-sm-4 price wow fadeIn" data-wow-delay="0.7s" style="visibility: visible; animation-delay: 0.7s; animation-name: fadeIn;">
						<div class="pricing-box">
							<div class="pricing-header">
								<h2>Business</h2>
								<h3 class="packeg_typ"><span>$</span>99<small> Lifetime</small></h3>
							</div>
							<ul class="list-unstyled plan-lists">
								<li>Feature</li>
								<li>Feature</li>
								<li>Feature</li>
							</ul>
							<a href="#" class="try">Try Now</a>
							<a href="#" class="purchase-btn">Purchase</a>
						</div>
					</div>
				</div>
				<div role="tabpanel" class="tab-pane tab2" id="price-2">
					<div class="row">
						<div class="col-md-4 col-sm-4 price">
							<div class="pricing-box">
								<div class="pricing-header">
									<h2>Free</h2>
									<h3 class="packeg_typ"><span>$</span>49<small> Lifetime</small></h3>
								</div>
								<ul class="list-unstyled plan-lists">
									<li>Feature</li>
									<li>Feature</li>
									<li>Feature</li>
								</ul>
								<a href="#" class="try">Try Now</a>
								<a href="#" class="purchase-btn">Purchase</a>
							</div>
						</div>
						<div class="col-md-4 col-sm-4 price">
							<div class="pricing-box active">
								<div class="pricing-header">
									<div class="tag">popular</div>
									<h2>Professional</h2>
									<h3 class="packeg_typ"><span>$</span>99<small> Lifetime</small></h3>
								</div>
								<ul class="list-unstyled plan-lists">
									<li>Feature</li>
									<li>Feature</li>
									<li>Feature</li>
								</ul>
								<a href="#" class="try">Try Now</a>
								<a href="#" class="purchase-btn">Purchase</a>
							</div>
						</div>
						<div class="col-md-4 col-sm-4 price">
							<div class="pricing-box">
								<div class="pricing-header">
									<h2>Business</h2>
									<h3 class="packeg_typ"><span>$</span>299<small> Lifetime</small></h3>
								</div>
								<ul class="list-unstyled plan-lists">
									<li>Feature</li>
									<li>Feature</li>
									<li>Feature</li>
								</ul>
								<a href="#" class="try">Try Now</a>
								<a href="#" class="purchase-btn">Purchase</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection
