<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" dir="{{ __('voyager::generic.is_rtl') == 'true' ? 'rtl' : 'ltr' }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<!-- Favicon icon -->
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Raleway" />
	<link rel="icon" type="image/png" sizes="16x16" href="{{$assets_path_public_eli}}images/favicon.png">
	<title>{{ Voyager::setting("admin.title") }}</title>

	<!-- page css -->
	<link href="{{$assets_path_public_eli}}dist/css/pages/login-register-lock.css" rel="stylesheet">
	<!-- Custom CSS -->
	<link href="{{$assets_path_public_eli}}dist/css/style.min.css" rel="stylesheet">


	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<style>
	.mb-50{
		margin-bottom: 50px;
	}
	body {
    font-family: raleway!important;
}
</style>
<body class="skin-default card-no-border">
	<!-- ============================================================== -->
	<!-- Preloader - style you can find in spinners.css -->
	<!-- ============================================================== -->
	<div class="preloader">
		<div class="loader">
			<div class="loader__figure"></div>
			<p class="loader__label">{{ Voyager::setting("admin.title") }}</p>
		</div>
	</div>
	<!-- ============================================================== -->
	<!-- Main wrapper - style you can find in pages.scss -->
	<!-- ============================================================== -->
	<section id="wrapper">
		<div class="login-register" style="{{$assets_path_public_eli}}images/background/login-register.jpg">
			<div class="login-box card">
				<div class="card-body">
					<form action="{{ route('voyager.login') }}" method="POST">
						{{ csrf_field() }}
					<div class="col-8 mx-auto mb-50">
						<img src="/public/assets/bidhub/bidhub-logo.png" alt="homepage" class="img-fluid dark-logo">
					</div>

						<div class="col-12">
							<?php $admin_logo_img = Voyager::setting('admin.icon_image', ''); ?>
							@if($admin_logo_img == '')
							<!-- <img class="img-responsive pull-left flip logo hidden-xs animated fadeIn" src="{{ voyager_asset('images/logo-icon-light.png') }}" alt="Logo Icon"> -->
							@else
							<!-- <img class="img-responsive pull-left flip logo hidden-xs animated fadeIn" src="{{ Voyager::image($admin_logo_img) }}" alt="Logo Icon"> -->
							@endif
						</div>
						<!-- <div class="col-12">
							<p>{{ Voyager::setting('admin.description', __('voyager::login.welcome')) }}</p>
						</div> -->
						<div class="form-group form-group-default" id="emailGroup">
{{--							<label>{{ __('voyager::generic.email') }}</label>--}}
							<div class="controls">
								<input type="text" name="email" id="email" value="" placeholder="{{ __('voyager::generic.email') }}" class="form-control" required autocomplete="false">
							</div>
						</div>

						<div class="form-group form-group-default" id="passwordGroup">
{{--							<label>{{ __('voyager::generic.password') }}</label>--}}
							<div class="controls">
								<input type="password" name="password" placeholder="{{ __('voyager::generic.password') }}" class="form-control" required autocomplete="false">
							</div>
						</div>

						<div class="form-group row">
							<div class="col-md-12">
								<div class="d-flex no-block align-items-center">
									<div class="ml-auto">
										<a href="/forgot-password" class="text-muted"><i class="fas fa-lock m-r-5"></i> Forgot Password?</a>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group text-center">
							<div class="col-xs-12 p-b-20">
								<button class="btn btn-block btn-lg btn-info btn-rounded" type="submit">{{ __('voyager::generic.login') }}</button>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center">
{{--								<div class="social">--}}
{{--									<button class="btn  btn-facebook" data-toggle="tooltip" title="Login with Facebook"> <i aria-hidden="true" class="fab fa-facebook-f"></i> </button>--}}
{{--									<button class="btn btn-googleplus" data-toggle="tooltip" title="Login with Google"> <i aria-hidden="true" class="fab fa-google-plus-g"></i> </button>--}}
{{--								</div>--}}
							</div>
						</div>
						<div class="form-group m-b-0">
							<div class="col-sm-12 text-center">
								Don't have an account? <a href="/register" class="text-info m-l-5"><b>Sign Up</b></a>
							
							</div>
						</div>
					</form>

					<div style="clear:both"></div>

					@if(!$errors->isEmpty())
					<div class="alert alert-red">
						<ul class="list-unstyled">
							@foreach($errors->all() as $err)
							<li>{{ $err }}</li>
							@endforeach
						</ul>
					</div>
					@endif
					</div>
				</div>
			</div>
		</section>

		<!-- ============================================================== -->
		<!-- End Wrapper -->
		<!-- ============================================================== -->
		<!-- ============================================================== -->
		<!-- All Jquery -->
		<!-- ============================================================== -->
		<script src="{{$assets_path_public_eli}}node_modules/jquery/jquery-3.2.1.min.js"></script>
		<!-- Bootstrap tether Core JavaScript -->
		<script src="{{$assets_path_public_eli}}node_modules/popper/popper.min.js"></script>
		<script src="{{$assets_path_public_eli}}node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
		<!--Custom JavaScript -->
		<script type="text/javascript">
		jQuery(function() {
			jQuery(".preloader").fadeOut();
		});
		jQuery(function() {
			jQuery('[data-toggle="tooltip"]').tooltip()
		});
		// ==============================================================
		// Login and Recover Password
		// ==============================================================
		jQuery('#to-recover').on("click", function() {
			jQuery("#loginform").slideUp();
			jQuery("#recoverform").fadeIn();
		});
		</script>
		<script>
		var btn = document.querySelector('button[type="submit"]');
		var form = document.forms[0];
		var email = document.querySelector('[name="email"]');
		var password = document.querySelector('[name="password"]');
		btn.addEventListener('click', function(ev){
			if (form.checkValidity()) {
				btn.querySelector('.signingin').className = 'signingin';
				btn.querySelector('.signin').className = 'signin hidden';
			} else {
				ev.preventDefault();
			}
		});
		email.focus();
		document.getElementById('emailGroup').classList.add("focused");

		// Focus events for email and password fields
		email.addEventListener('focusin', function(e){
			document.getElementById('emailGroup').classList.add("focused");
		});
		email.addEventListener('focusout', function(e){
			document.getElementById('emailGroup').classList.remove("focused");
		});

		password.addEventListener('focusin', function(e){
			document.getElementById('passwordGroup').classList.add("focused");
		});
		password.addEventListener('focusout', function(e){
			document.getElementById('passwordGroup').classList.remove("focused");
		});

		</script>
	</body>

	</html>
