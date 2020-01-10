<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" dir="{{ __('voyager::generic.is_rtl') == 'true' ? 'rtl' : 'ltr' }}">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	
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

.container_chkboxc {
  display: block;
  position: relative;
  padding-left: 26px;
  margin-bottom: 0px;
  cursor: pointer;
  font-size: 22px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default checkbox */
.container_chkboxc input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.container_chkboxc .checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 16px;
  width: 16px;
  background-color: transparent;
  border: 1px solid #000;
  border-radius: 3px;
}

/* On mouse-over, add a grey background color */
.container_chkboxc:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.container_chkboxc input:checked ~ .checkmark {
  background-color: transparent;
}

/* Create the checkmark/indicator (hidden when not checked) */
.container_chkboxc .checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.container_chkboxc input:checked ~ .checkmark:after {
  display: block;
}

/* Style the checkmark/indicator */
.container_chkboxc .checkmark:after {
    left: 5px;
    top: 2px;
    width: 5px;
    height: 9px;
    border:  solid #000;
    border-width: 0 2px 1px 0;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
}


.col-12.text-center.mystylttile.mb-20 {
    margin-top: 33px;
    margin-bottom: 20px;
}



	.mb-50{
		margin-bottom: 50px;
	}
	.mb-20{
		margin-bottom: 20px;
	}
	.forgetc{
	    text-decoration: underline;
        color: #000 !important;
        letter-spacing: 2px;
        font-size: 13px;
	}
	
	.remembc{
	    
        color: #000 !important;
        letter-spacing: 2px;
        font-size: 13px;
	}
	.forgetc:hover{ text-decoration: underline; }
	.btn-info.btn-graycustome{background:#3d3d59;}
	.mycusbtnshup {
    background: #edb600;
    width: fit-content;
    padding: 4px 50px;
    margin: 0px auto;
    float: none;
    display: inline-block;
    border: 1px solid #efefef;
    border-radius: 90px;
    color: #efefef !important;
    }
    .text-info.mycusbtnshup:hover{color: #efefef !important;}
	.mystylttile h3{font-weight:bolder; font-size: 1.4rem;}
	body {
    font-family: raleway!important;
}
.login-box.card{background-color: transparent;}




/*new input stlye*/

.validate-input {
    position: relative;
}

.wrap-input100 {
    position: relative;
    width: 100%;
    z-index: 1;
    margin-bottom: 10px;
}


.input100 {
    font-family: Poppins-Medium;
    font-size: 18px;
    line-height: 1.5;
    color: #666;
    display: block;
    width: 100%;
    background: #eae7e7;
    height: 50px;
    border-radius: 25px;
    padding: 0 30px 0 68px;
    border: 4px solid #fff;
}

.input100::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
  color: #eb5359;
  font-size:20px;
  padding-left:25%;
  opacity: 1; /* Firefox */
}

.input100:-ms-input-placeholder { /* Internet Explorer 10-11 */
  color: #eb5359;
  padding-left:25%;
  font-size:20px;
}

.input100::-ms-input-placeholder { /* Microsoft Edge */
  color: #eb5359;
  padding-left:25%;
  font-size:20px;
}

.focus-input100 {
    display: block;
    position: absolute;
    border-radius: 25px;
    bottom: 0;
    left: 0;
    z-index: -1;
    width: 100%;
    height: 100%;
    box-shadow: 0 0;
    color: rgba(87,184,70,.8);
}

.symbol-input100 {
    font-size: 15px;
    display: -webkit-box;
    display: -webkit-flex;
    display: -moz-box;
    display: -ms-flexbox;
    display: flex;
    align-items: center;
    position: absolute;
    border-radius: 25px;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 100%;
    padding-left: 35px;
    pointer-events: none;
    color: #eb5359;
    -webkit-transition: all .4s;
    -o-transition: all .4s;
    -moz-transition: all .4s;
    transition: all .4s;
}

.btn-info.btn-graycustome {
   
    border: none !important;
}

.btn-info:not(:disabled):not(.disabled).active, .btn-info:not(:disabled):not(.disabled):active, .show>.btn-info.dropdown-toggle {
    color: #fff;
    background-color: #3d3d59 !important;
    border: none !important;
    box-shadow: none;
    
}

/*over*/













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
		<div class="login-register" style="background-image:url('{{$assets_path_public_eli}}images/background/bidhub_login_screen.jpg')">
			<div class="login-box card">
				<div class="card-body">
				    
				    @if(Session::has('redirectlogin_ses'))
                  <p class="alert text-center {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('redirectlogin_ses') }}</p>
                  @endif
				    
					<form action="{{ route('voyager.login') }}" method="POST">
						{{ csrf_field() }}
					<div class="col-8 mx-auto mb-20 text-center">
						<img src="/public/assets/bidhub/bidhub-logo.png" alt="homepage" class="img-fluid dark-logo">
						
					</div>
                        
                        <div class="col-12 text-center mystylttile mb-20">
						     <h3>MEMBER LOGIN</h3>
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
						
						
						    <div class="col-md-12">
						    	<div class="form-group form-group-default" id="emailGroup">
{{--							<label>{{ __('voyager::generic.email') }}</label>--}}
							<!--<div class="controls">
								<input type="text" name="email" id="email" value="" placeholder="{{ __('voyager::generic.email') }}" class="form-control" required autocomplete="false">
							</div>-->
						</div>
						
						<div class="wrap-input100 validate-input">
                            <input class="input100" type="text" name="email" id="email"  placeholder="Username" required autocomplete="false">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            </span>
                        </div>

						<div class="form-group form-group-default" id="passwordGroup">
{{--							<label>{{ __('voyager::generic.password') }}</label>--}}
						<!--	<div class="controls">
								<input type="password" name="password" placeholder="{{ __('voyager::generic.password') }}" class="form-control" required autocomplete="false">
							</div>-->
						</div>
						
						<div class="wrap-input100 validate-input">
                            <input class="input100" type="password" name="password" placeholder="{{ __('voyager::generic.password') }}" required autocomplete="false">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                            </span>
                        </div>
						
						
						<div class="text-center">
							<div class="col-xs-12 p-b-20">
								<button class="btn btn-block btn-lg btn-info btn-graycustome btn-rounded" type="submit"><!--{{ __('voyager::generic.login') }}--> Login Now</button>
							</div>
						</div>
						    </div>
						
					
						
						

						<div class="form-group row">
							<div class="col-md-12">
								<div class="d-flex no-block align-items-center">
								    <div class="col-md-6">
								        <label class="container_chkboxc remembc">Remember me
                                                <input type="checkbox" name="remember">
                                                    <span class="checkmark"></span>
                                        </label>
										
									</div>
									<div class="col-md-6 text-right">
										<a href="/forgot-password" class="text-muted forgetc" style=""><!--<i class="fas fa-lock m-r-5"></i>--> Forgot Password?</a>
									</div>
								</div>
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
								<div><h6>Not a member? </h6></div>
							    <div><a href="/register" class="text-info mycusbtnshup m-l-5"><b>Create account</b></a></div>
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
