@extends('themes.ino.app_ino')

@section('title', 'Contact Us')

@section('content')

	<section class="support-area">
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
					<div class="support-item wow fadeIn" data-wow-delay="0s" style="visibility: visible; animation-delay: 0s; animation-name: fadeIn;">
						<i class="lnr lnr-envelope"></i>
						<h2>Email</h2>
						<a href="#">location_31</a>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="support-item wow fadeIn" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeIn;">
						<i class="lnr lnr-phone-handset"></i>
						<h2>Phone</h2>
						<a href="#">location_33</a>
					</div>
				</div>

				<div class="col-sm-4">
					<div class="support-item wow fadeIn" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeIn;">
						<i class="lnr lnr-phone-handset"></i>
						<h2>Fax</h2>
						<a href="#">location_35</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="get_touch-area" id="contact">
		<div class="map">
			<iframe class="actAsDiv" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d198725.17847734212!2d-77.15465264882869!3d38.899264957793875!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89b7c6de5af6e45b%3A0xc2524522d4885d2a!2sWashington%2C+DC%2C+USA!5e0!3m2!1sen!2sbd!4v1480701250770{{setting('home.location_36')}}"></iframe>
		</div>
		<div class="get_touch">
			<div class="left_inner_content" style="width: 0px;"></div>
			<div class="right_inner_content">
				<h2 class="th-h2">{{setting('home.location_37')}}</h2>
				<form action="#" method="post" id="" class="row m0 contact-form">
					<div class="row">

						<div class="col-sm-6 form-group">
							<input type="text" id="name2" name="name" class="form-control contact-lname" placeholder="Name">
						</div>
						<div class="col-sm-6 form-group">
							<input type="text" id="email" name="email" class="form-control contact-mail" placeholder="Email">
						</div>
						<div class="col-sm-12 form-group">
							<textarea name="message" id="message" class="form-control contact-message" placeholder="Message"></textarea>
						</div>
						<div class="col-sm-12 form-group">
							<input type="submit" value="Contact Us" class="btn thm-btn">
							<span class="contact-submit-progress"></span>
							<p class="contact-submit-message"></p>
						</div>
					</div>
				</form>
			</div>
		</div>
	</section>
@endsection