
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>{{ config('app.name', '[% application_name %]') }}</title>
{{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">--}}
{{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}




<script src="{{$assets_path_public_eli}}dist/js/perfect-scrollbar.jquery.min.js"></script>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<!-- Favicon icon -->
<link rel="icon" type="image/png" sizes="16x16" href="{{$assets_path_public_eli}}images/favicon.png"><!-- This page CSS -->
<script src="{{$assets_path_public_eli}}node_modules/jquery/jquery-3.2.1.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
<!-- chartist CSS -->
<link href="{{$assets_path_public_eli}}node_modules/morrisjs/morris.css" rel="stylesheet">
<!--Toaster Popup message CSS -->
<link href="{{$assets_path_public_eli}}node_modules/toast-master/css/jquery.toast.css" rel="stylesheet">
<link href="{{$assets_path_public_eli}}node_modules/calendar/dist/fullcalendar.css" rel="stylesheet" />
<!-- Custom CSS -->
<link href="{{$assets_path_public_eli}}dist/css/style.min.css" rel="stylesheet">
<!-- Dashboard 1 Page CSS -->
<link href="{{$assets_path_public_eli}}dist/css/pages/dashboard1.css" rel="stylesheet">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

<![endif]-->


<?php if (Request::is('pricing')): ?>
	<link href="{{$assets_path_public_eli}}dist/css/pages/pricing-page.css" rel="stylesheet">
<?php endif; ?>
<?php if (Request::is('messages')): ?>
	<link href="{{$assets_path_public_eli}}dist/css/style.min.css" rel="stylesheet">
	<!-- page css -->
	<link href="{{$assets_path_public_eli}}dist/css/pages/inbox.css" rel="stylesheet">
<?php endif; ?>
<?php if (Request::is('dashboard/jobs') || Request::is('dashboard/companies') || Request::is('dashboard/tutorials') || Request::is('dashboard/market-place')): ?>
	<!-- Popup CSS -->
	<link href="{{$assets_path_public_eli}}node_modules/Magnific-Popup-master/dist/magnific-popup.css" rel="stylesheet">
	<!-- Custom CSS -->
	<link href="{{$assets_path_public_eli}}dist/css/style.min.css" rel="stylesheet">
	<!-- page css -->
	<link href="{{$assets_path_public_eli}}dist/css/pages/user-card.css" rel="stylesheet">
<?php endif; ?>
<style media="screen">
.skin-blue .topbar .top-navbar .navbar-header .navbar-brand .light-logo {
    display: inline-block;
    color: rgba(255,255,255,.8);
    padding: 5%;
    max-height: 80%;
    max-width: 80%;
}

.mb-20 {
	margin-bottom: 20px;
}

.mb-30 {
	margin-bottom: 30px;
}

.mb-40 {
	margin-bottom: 40px;
}

.mb-50 {
	margin-bottom: 50px;
}

.mb-60 {
	margin-bottom: 60px;
}

.mb-70 {
	margin-bottom: 70px;
}

.mb-80 {
	margin-bottom: 80px;
}

.mb-100 {
	margin-bottom: 100px;
}

.mb-200 {
	margin-bottom: 200px;
}
.h-300 {
	min-height: 310px !important;
}
</style>
