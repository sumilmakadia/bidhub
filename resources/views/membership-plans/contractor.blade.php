@extends('layouts.app')

@section('content')
	<div class="page-wrapper" style="min-height: 149px;">
		<div class="container-fluid">
			<div class="row page-titles">
				<div class="col-md-5 align-self-center">
					<h4 class="text-themecolor">Contractor Pricing</h4>
				</div>
				<div class="col-md-7 align-self-center text-right">
					<div class="d-flex justify-content-end align-items-center">

					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-body">
							<div class="row pricing-plan">
								<div class="col-md-3 col-xs-12 col-sm-6 no-padding">
									<div class="pricing-box">
										<div class="pricing-body b-l">
											<div class="pricing-header">
												<h4 class="text-center">Plan 1</h4>
												<h2 class="text-center"><span class="price-sign">$</span>10</h2>
												<p class="uppercase">per month</p>
											</div>
											<div class="price-table-content">
												<div class="price-row"><i class="icon-user"></i> Feature</div>
												<div class="price-row">
													<button class="btn btn-success waves-effect waves-light m-t-20">Sign up</button>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-3 col-xs-12 col-sm-6 no-padding">
									<div class="pricing-box">
										<div class="pricing-body b-l">
											<div class="pricing-header">
												<h4 class="text-center">Plan 2</h4>
												<h2 class="text-center"><span class="price-sign">$</span>20</h2>
												<p class="uppercase">per month</p>
											</div>
											<div class="price-table-content">
												<div class="price-row"><i class="icon-user"></i> Feature</div>
												<div class="price-row">
													<button class="btn btn-success waves-effect waves-light m-t-20">Sign up</button>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-3 col-xs-12 col-sm-6 no-padding">
									<div class="pricing-box">
										<div class="pricing-body b-l">
											<div class="pricing-header">
												<h4 class="text-center">Plan 3</h4>
												<h2 class="text-center"><span class="price-sign">$</span>30</h2>
												<p class="uppercase">per month</p>
											</div>
											<div class="price-table-content">
												<div class="price-row"><i class="icon-user"></i> Feature</div>
												<div class="price-row">
													<button class="btn btn-success waves-effect waves-light m-t-20">Sign up</button>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-3 col-xs-12 col-sm-6 no-padding">
									<div class="pricing-box">
										<div class="pricing-body b-l">
											<div class="pricing-header">
												<h4 class="text-center">Plan 4</h4>
												<h2 class="text-center"><span class="price-sign">$</span>40</h2>
												<p class="uppercase">per month</p>
											</div>
											<div class="price-table-content">
												<div class="price-row"><i class="icon-user"></i> Feature</div>
												<div class="price-row">
													<button class="btn btn-success waves-effect waves-light m-t-20">Sign up</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection
