<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>{{ config('app.name', 'application-name=BidHub') }}</title>
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<!-- Favicon icon -->
	<link rel="icon" type="image/png" sizes="16x16" href="{{$assets_path_public_eli}}images/favicon.png"><!-- This page CSS -->
	
	<!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-116420264-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    
    gtag('config', 'UA-116420264-1');
    </script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	
    <link rel="stylesheet" href="{{$assets_path}}js/Owl/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="{{$assets_path}}js/Owl/dist/assets/owl.theme.default.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
	<link rel="stylesheet" href="{{$assets_path}}js/prettyphoto/css/prettyPhoto.css" type="text/css" media="screen" charset="utf-8" />
	<!-- chartist CSS -->
	<link href="{{$assets_path_public_eli}}node_modules/morrisjs/morris.css" rel="stylesheet">
	<!--Toaster Popup message CSS -->
	<link href="{{$assets_path_public_eli}}node_modules/toast-master/css/jquery.toast.css" rel="stylesheet">
	<link href="{{$assets_path_public_eli}}node_modules/calendar/dist/fullcalendar.css" rel="stylesheet"/>
	<!-- Custom CSS -->
	<link href="{{$assets_path_public_eli}}dist/css/style.min.css" rel="stylesheet">
	<link href="{{asset('css/style.css')}}" rel="stylesheet">
	<!-- Dashboard 1 Page CSS -->
	<link href="{{$assets_path_public_eli}}dist/css/pages/dashboard1.css" rel="stylesheet">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

	<![endif]-->
	<link href="{{$assets_path_public_eli}}dist/css/pages/pricing-page.css" rel="stylesheet">


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
	<?php if(Request::is('chat-rooms')): ?>
	<link href="{{$assets_path_public_eli}}dist/css/pages/chat-app-page.css" rel="stylesheet">
	<?php endif ?>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.2/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
	
	<!-- fileuploader -->
	<!-- font -->
    <link href="{{$assets_path}}assets/fileuploader/dist/font/font-fileuploader.css" media="all" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    
    <!-- css -->
    <link href="{{$assets_path}}assets/fileuploader/dist/jquery.fileuploader.min.css" media="all" rel="stylesheet">
    <link href="{{$assets_path}}assets/fileuploader/examples/thumbnails/css/jquery.fileuploader-theme-thumbnails.css" media="all" rel="stylesheet">
    <link href="{{$assets_path}}css/custom.css" media="all" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Raleway" />
    <!-- js -->
    
    <style type="text/css">
    @media (min-width: 1367px){.h-dark-testi{padding:9rem 10rem 12rem 12rem}}@media (max-width: 767.98px){.hb .followus{display:none}}@media (max-width: 991.98px){.hb .carousel-caption{padding-bottom:15%}.skillgap-bg{background:none;text-align:center}.h-dark-testi{position:relative;padding:5rem}.h-red-testi{padding:5rem;margin-right:0}.approch-bg .enskill{position:relative;width:100%;padding:5rem;top:0}}@media (min-width: 993px) and (min-width: 1024px){.h-dark-testi{padding:4rem 8rem}}

/*# sourceMappingURL=rwd.css.map */

@import url("https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700|Ubuntu:300,400,500,700&display=swap");body{background:#fff;font-family:'Montserrat', sans-serif}p{font-size:15px}.text-blue{color:#517fdb}h1{font-size:4rem;font-weight:300}.bg-red{background:#ff0000}.bg-dark{background:#282828}.btn{border-radius:2rem}.btn-theme{background:#ed9a7c;color:#fff;font-weight:500}.btn-theme:hover{color:#fff;background:#282828}a{position:relative}a .link{padding-top:10px}a .link:before{left:0;bottom:0;width:100%;height:2px;background:#0883a4;-webkit-transform:scaleX(0);transform:scaleX(0)}a .link:hover:before{-webkit-transform:scaleX(1);transform:scaleX(1)}.ptb-5{padding-top:5rem;padding-bottom:5rem}.p-10{padding:5rem !important}.mb-10{margin-bottom:5rem}header{background:#517fdb}header .navbar-light .navbar-nav .nav-link{color:#fff;padding-right:1rem;padding-left:1rem}header nav{color:#fff;font-size:14px}header nav:hover{color:#ff0000}.hb{position:relative}.hb .carousel-caption{left:15%;right:15%;bottom:30%}.hb .carousel-caption p{font-size:16px}.hb .carousel-caption a.link{color:#fff;text-transform:uppercase;font-size:13px;padding:10px}footer{background:#333;color:#fff;padding-top:15px;padding-bottom:15px;font-size:13px}footer a{color:#fff;margin:10px}

/*# sourceMappingURL=style.css.map */
</style>

	<style media="screen">
		p {
			margin-bottom: 30px;
		}
		
	.navbar-nav {
    display: -webkit-inline-box !important;
}
li.nav-item {
    display: inline-block;
}

li.nav-item.dropdown.messages {
    display: inherit;
}

.navbar-collapse ul.navbar-nav.mr-auto {
    width: 70%;
}

		.skin-blue .topbar .top-navbar .navbar-header .navbar-brand .light-logo {
			display: inline-block;
			color: rgba(255, 255, 255, .8);
			padding: 5%;
			max-height: 80%;
			max-width: 80%;
		}
		 .fileuploader {
                padding: 0;
                background: none;
            }
            
            .fileuploader-theme-thumbnails .fileuploader-thumbnails-input, 
            .fileuploader-theme-thumbnails .fileuploader-items-list .fileuploader-item {
                width: 128px;
                height: 128px;
            }
            .fileuploader-theme-thumbnails .fileuploader-items .fileuploader-items-list {
                margin: -30px 0 0 10px!important;
            }
	</style>

	<style>
		.mh-200 {
			min-height: 200px;
		}

	
		.card {
			margin-bottom: 20px;
			padding: 20px;
		}

		.h3, h3 {
			font-size: 1.5rem;
			padding-top: 25px !important;
		}
		.project-title {
            padding-bottom: 10px;
            border-bottom: 1px solid #d9dde0;
            margin-bottom: 20px;
            min-height: 81px;
        }
        .project-title h3 {
            padding-top: 0 !important;
            margin-bottom: 0 !important;
        }
        .project-card p {
            margin-bottom: 0 !important;
        }
		.panel {
			background-color: #fff;
			padding: 20px;
		}

		.topbar .top-navbar .navbar-nav > .nav-item > .nav-link {
			/* padding-left: 15px; */
			/* padding-right: 15px; */
			font-size: 18px;
			line-height: 50px;
		}

		.shw-rside {
			right: 0;
			width: 700px;
		}

		.control-label {
			display: none;
		}

		.skin-blue .topbar .top-navbar .navbar-header .navbar-brand .light-logo {
			display: inline-block;
			color: rgba(255, 255, 255, .8);
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

		span.input-group-addon {
			font-size: 22px;
			margin-right: 10px;
			vertical-align: middle;
			padding-top: 5px;
		}

		.fa, .fas {
			font-weight: 900;
			padding: 5px;
		}

		.h-300 {
			min-height: 220px !important;
		}

		.h-370 {
			min-height: 410px !important;
		}

		.topbar .top-navbar .navbar-nav > .nav-item > .nav-link {
			font-size: 16px;
			line-height: 50px;
		}
		.topbar .top-navbar .navbar-header {
            background: rgba(0, 0, 0, 0);
            line-height: 65px;
            padding-left: 10px;
            min-width: 70px;
        }
        .navbar-dark .navbar-nav .nav-link {
            color: rgb(255, 255, 255);
        }
        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            color: #000;
        }
        .fa-star{
            color: #fb9678;
            border: 1px solid #fb9678;
            margin-right: 10px;
            padding: 8px;
        }
        .select2-container {
        width: 100%!important;
    }
    
    @media only screen and (max-width:780px){
        .topbar .dropdown-menu .dropdown-item {white-space: inherit;}
    }
	</style>

	@yield('css')

</head>
<body class="skin-blue fix-header single-column  card-no-border ">
	<div class="preloader1">
		<div class="loader">
			<div class="loader__figure"></div>
			<p class="loader__label">@yield('title')</p>
		</div>
	</div>
<div id="main-wrapper">
                            @php
                            if(isset(Auth::user()->id)) {
    					        $trans = DB::table('ybr_membership5_transactions')->where('created_by', Auth::id())->where('status', 'SUCCESS')->orderBy('id', 'desc')->first();
    					        if(isset($trans)) {
    					        $from = strtotime($trans->membership_charge_date);
    					        $message = 'You Will Be Billed After Your Trial Expires';
    					        } else {
    					        $from = Auth::user()->created_at;
    					        $from = strtotime($from. ' + 60 days');
    					        //$from = strtotime($from);
    					        $message = 'You Will Downgraded to Free User After Your Trial Expires';
    					        }
    					        
    					        if(Auth::user()->role_id != 1) {
    					        
    					        $plan = DB::table('ybr_membership2_plans')->where('id', Auth::user()->role_id)->first();
    					        date_default_timezone_set('America/New_York');
    					        
    					         
    
                                $today = time();
                                $difference = $today - $from;
                                
                                if($difference < 0){
                                    $days_left = abs(floor($difference / 86400));
                                } else {
                                    $days_left = 0;
                                }
                                
                                if(Auth::user()->admin_created == 1 && $plan->id == 8 && $days_left <= 0) {
                                    DB::table('users')->where('id', Auth::user()->id)->update(['role_id' => 2, 'days_left' => $days_left]);
                                } else {
                                    DB::table('users')->where('id', Auth::user()->id)->update(['days_left' => $days_left]);
                                }
                                
                                }
                            }
					        @endphp
	<!--<div class="nav-item" style="background-color:#000;">-->
	<!--    <div class="nav-link d-none d-lg-block d-md-block waves-effect waves-dark" style="padding: 8px 10px 5px;line-height: 16px;color:#fff;text-align:center;">-->
	<!--        Site is in beta testing.  Please feel free to explore the site, launch will be coming soon.-->
	<!--    </div>-->
	<!--</div>    				        -->
    <div class="nav-item" style="background-color:#000;">
         @if(Session::has('roommessage'))
        <a href="#." class="nav-link d-none d-lg-block d-md-block waves-effect waves-dark" style="padding: 8px 10px 5px;line-height: 16px;color:#fff;text-align:center;">{{ Session::get('roommessage') }}</a>
            @endif  
                                @isset(Auth::user()->id)
                                @if(Auth::user()->role_id == 2)
                                <a href="/pricing" class="nav-link d-none d-lg-block d-md-block waves-effect waves-dark" style="padding: 8px 10px 5px;line-height: 16px;color:#fff;text-align:center;">You are currently a free user.  Click here to upgrade your membership to utilize more features.</a>
                                @else
                                @if(Auth::user()->role_id == 8)
								@isset($plan->plan_name)@isset($difference)<a href="/pricing" class="nav-link d-none d-lg-block d-md-block waves-effect waves-dark" style="padding: 8px 10px 5px;line-height: 16px;color:#fff;text-align:center;">PREMIUM - {{$days_left}} Trial Days Left - {{$message}} </a>@endisset @endisset
	                            @endif
	                            @endif
	                            @endisset
	</div>
		<header class="topbar">
			<nav class="navbar top-navbar navbar-expand-md navbar-dark">
				<!-- ============================================================== -->
				<!-- Logo -->
				<!-- ============================================================== -->
				<div class="navbar-header">
					<a class="navbar-brand" href="/">
						<!-- Logo icon --><b>
							<!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
							<!-- Dark Logo icon -->
							<!-- <img src="../assets/images/logo-icon.png" alt="homepage" class="dark-logo">

							<img src="../assets/images/logo-light-icon.png" alt="homepage" class="light-logo"> -->
						</b>
						<!--End Logo icon -->
						<!-- Logo text --><span>
			<!-- dark Logo text -->
			
			<img src="{{$assets_path_public_eli}}images/bidhub.png" alt="homepage" class="dark-logo" style="max-width:none;">
							<!-- Light Logo text -->
			<img src="{{$assets_path_public_eli}}images/bidhub.png" class="light-logo" alt="homepage"></span> </a>
				</div>
				<!-- ============================================================== -->
				<!-- End Logo -->
				<!-- ============================================================== -->
				<div class="navbar-collapse">
					<!-- ============================================================== -->
					<!-- toggle and nav items -->
					<!-- ============================================================== -->
					<ul class="navbar-nav mr-auto" @if(Auth::check() == false) style="width:100%;" @endif>
						{{--				<li class="nav-item"><a class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark" href="javascript:void(0)"><i class="icon-menu"></i></a></li>--}}
						
						@if(Auth::user() && Auth::user()->role_id != 2)
						@php
							$menus = array(
								array('title'=> 'Project Room',        'url' => '/project-room'),
								array('title'=> 'Directory',            'url' => '/directory'),
					 			array('title'=> 'Help Wanted',          'url' => '/help-wanted'),
								array('title'=> 'Property For Sale',    'url' => '/property-for-sale'),
							   array('title'=> 'Building Materials and Equipment',    'url' => '/equipment-for-sale'),
							//	array('title'=> 'Marketplace',         'url' => '/market-place'),
							//	array('title'=> 'Find Contractor',      'url' => '/profiles/contractors'),
							//	array('title'=> 'Calendar',             'url' => '/calendar'),
							//	array('title'=> 'Budget Planner',       'url' => '/budget-planner')
							);
						@endphp
						@else
						@php
							$menus = array(
								array('title'=> 'Project Room',        'url' => '/project-room'),
								array('title'=> 'Directory',            'url' => '/directory'),
								array('title'=> 'Help Wanted',          'url' => '/help-wanted'),
								array('title'=> 'Property For Sale',    'url' => '/property-for-sale'),
								array('title'=> 'Building Materials and Equipment',    'url' => '/equipment-for-sale'),
							//	array('title'=> 'Marketplace',         'url' => '/market-place'),
							//	array('title'=> 'Find Contractor',      'url' => '/profiles/contractors'),
							//	array('title'=> 'Calendar',             'url' => '/calendar'),
							//	array('title'=> 'Budget Planner',       'url' => '/budget-planner')
							);
						@endphp
						@endif
						@if(Auth::check())
							@foreach($menus as $menu)
								<li class=" nav-item dropdown">
								    
								    @if($menu['title'] == 'Directory')
									 <a href="{{$menu['url']}}" target="" style="" data-toggle="dropdown" class="dropdown-toggle nav-link d-none d-lg-block d-md-block waves-effect waves-dark">
										<span>{{$menu['title']}} <span class="fa fa-caret-down"></span></span> 
									</a> 
                                        
                                        <ul class="dropdown-menu">
                                          <li><a href="{{url('/directory/search?trade=&account_type=Subcontractor&distance=100&page=1')}}" class="selcusvvv" data-id="Subcontractor" style="padding:7px 10px; display: block;">Subcontractor</a></li>
                                          <li><a href="{{url('/directory/search?trade=&account_type=General Contractor&distance=100&page=1')}}" class="selcusvvv" data-id="General Contractor" style="padding:7px 10px; display: block;">General Contractor</a></li>
                                          <!--<li><a href="{{url('/directory/search?trade=&account_type=Homeowner&distance=100&page=1')}}" class="selcusvvvv" data-id="Homeowner" style="padding:7px 10px; display: block;">Homeowner</a></li>-->
                                          <li><a href="{{url('/directory/search?trade=&account_type=Advertiser&distance=100&page=1')}}" class="" data-id="Advertiser" style="padding:7px 10px; display: block;">Advertiser</a></li>
                                          <li><a href="{{url('/directory/search?trade=Educational Services&account_type=&distance=100&page=1')}}" style="padding:7px 10px; display: block;">Educational</a></li>
                                          <li><a href="{{url('/directory/search?trade=Cellulose Manufacturer&account_type=&distance=100&page=1')}}" style="padding:7px 10px; display: block;">Manufacturer</a></li>
                                          <li><a href="{{url('/directory/search?trade=Supplier&account_type=&distance=100&page=1')}}" style="padding:7px 10px; display: block;">Supplier</a></li>
                                          <li><a href="{{url('/directory/search?trade=Estimating Tools- Software&account_type=&distance=100&page=1')}}" style="padding:7px 10px; display: block;">Estimating</a></li>
                                        </ul>
                                     @else
                                     <a href="{{$menu['url']}}" target="" style="" class="nav-link d-none d-lg-block d-md-block waves-effect waves-dark">
										<span>{{$menu['title']}}</span> 
									</a> 
									@endif
									
									<!--<a href="{{$menu['url']}}" target="" style="" class="nav-link d-none d-lg-block d-md-block waves-effect waves-dark">
										<span>{{$menu['title']}}</span>
									</a>-->
								</li>
							@endforeach
						@endif
						
					    @if(Auth::check() == false)
						    
						    @php
							$menus = array(
							    array('title'=> 'Home',            'url' => '/'),
							    array('title'=> 'Project Room',        'url' => '/project-room'),
								array('title'=> 'Directory',            'url' => '/directory'),
					 			array('title'=> 'Help Wanted',          'url' => '/help-wanted'),
					 			array('title'=> 'Property For Sale',    'url' => '/property-for-sale'),
							    array('title'=> 'Building Materials and Equipment',    'url' => '/equipment-for-sale')
							);
						@endphp
						    
						    @foreach($menus as $menu)
								<li class=" nav-item dropdown">

									@if($menu['title'] == 'Directory')
									 <a href="{{$menu['url']}}" target="" style="" data-toggle="dropdown" class="dropdown-toggle nav-link d-none d-lg-block d-md-block waves-effect waves-dark">
										<span>{{$menu['title']}} <span class="fa fa-caret-down"></span></span> 
									</a> 
                                        
                                        <ul class="dropdown-menu">
                                          <li><a href="{{url('/directory/search?trade=&account_type=Subcontractor&distance=100&page=1')}}" class="selcusvvv" data-id="Subcontractor" style="padding:7px 10px; display: block;">Subcontractor</a></li>
                                          <li><a href="{{url('/directory/search?trade=&account_type=General Contractor&distance=100&page=1')}}" class="selcusvvv" data-id="General Contractor" style="padding:7px 10px; display: block;">General Contractor</a></li>
                                          <!--<li><a href="{{url('/directory/search?trade=&account_type=Homeowner&distance=100&page=1')}}" class="selcusvvvv" data-id="Homeowner" style="padding:7px 10px; display: block;">Homeowner</a></li>-->
                                          <li><a href="{{url('/directory/search?trade=&account_type=Advertiser&distance=100&page=1')}}" class="" data-id="Advertiser" style="padding:7px 10px; display: block;">Advertiser</a></li>
                                          <li><a href="{{url('/directory/search?trade=Educational Services&account_type=&distance=100&page=1')}}" style="padding:7px 10px; display: block;">Educational</a></li>
                                          <li><a href="{{url('/directory/search?trade=Cellulose Manufacturer&account_type=&distance=100&page=1')}}" style="padding:7px 10px; display: block;">Manufacturer</a></li>
                                          <li><a href="{{url('/directory/search?trade=Supplier&account_type=&distance=100&page=1')}}" style="padding:7px 10px; display: block;">Supplier</a></li>
                                          <li><a href="{{url('/directory/search?trade=Estimating Tools- Software&account_type=&distance=100&page=1')}}" style="padding:7px 10px; display: block;">Estimating</a></li>
  
                                        </ul>
                                     @else
                                     <a href="{{$menu['url']}}" target="" style="" class="nav-link d-none d-lg-block d-md-block waves-effect waves-dark">
										<span>{{$menu['title']}}</span> 
									</a> 
									@endif
								</li>
							@endforeach
						
						@endif

					</ul>
					<!-- ============================================================== -->
					<!-- User profile and search -->
					<!-- ============================================================== -->
					<ul class="navbar-nav my-lg-0">
					        
					  <!--      <li class="nav-item">-->
							<!--	@isset($plan->plan_name)@isset($difference)<a href="/pricing" class="nav-link d-none d-lg-block d-md-block waves-effect waves-dark" style="border: 2px solid #fff;padding: 8px 10px 5px;line-height: 16px;margin-top: 18px;">{{$plan->plan_name}} {{floor($difference / 86400)}} trial Days Left </a>@endisset @endisset-->
							<!--</li>-->
						@if(Auth::check())
            
						
							@if (Auth::user()->role_id == 1)
								<li class="nav-item">
									<a href="/projects/admin" class="nav-link d-none d-lg-block d-md-block waves-effect waves-dark">Admin</a>
								</li>
								@else
								<li class="nav-item">
								<a href="/project-room/manage" class="nav-link d-none d-lg-block d-md-block waves-effect waves-dark">Add Projects Here</a>
							</li>
							@endif
                            @php
									$messages =  App\Models\Crest\chatroom_message::where('sent_to', Auth::user()->id)->where('viewed', 0)->get();
									$message_count = $messages->count();
									
									$proposals = App\Models\Crest\proposal_notifications::where('user_id', Auth::user()->id)->where('opened', 0)->get();
									$proposal_count = $proposals->count();
									
									$resumes = App\Models\Crest\resume_notifications::where('user_id', Auth::user()->id)->where('opened', 0)->get();
									$resume_count = $resumes->count();
							@endphp
							<li class="nav-item dropdown messages">
                                <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="ti-email"></i>
                                    <div class="notify"> @if($message_count > 0)<span class="heartbit"></span> <span class="point"></span> @endif </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown">
									<ul>
										<li>
											<div class="drop-title">Chat Messages</div>
										</li>
										<li>
											<div class="message-center ps ps--theme_default" data-ps-id="8bcf39be-39a4-5083-c8df-6c64f12efa30">
												<!-- Message -->
												
												@foreach($messages as $message)
												@isset($message->profile->first_name)
												<a href="/chat-rooms/{{$message->chatroom_id}}">
													<div class="btn btn-danger btn-circle"><i class="fa fa-paper-plane"></i></div>
													<div class="mail-contnet">
													    
														<h5>{{$message->profile->first_name . ' ' . $message->profile->last_name}}</h5> <span class="mail-desc">{{str_replace("<br>"," ",$message->message)}}</span> <span class="time">{{$message->created_at}}</span></div>
												        
												</a>
												@endisset
												@endforeach
												<!--<a href="javascript:void(0)">-->
												<!--	<div class="btn btn-danger btn-circle"><i class="fa fa-link"></i></div>-->
												<!--	<div class="mail-contnet">-->
												<!--		<h5>Luanch Admin</h5> <span class="mail-desc">Just see the my new admin!</span> <span class="time">9:30 AM</span></div>-->
												<!--</a>-->
												<!-- Message -->

												<div class="ps__scrollbar-x-rail" style="left: 0px; bottom: 0px;">
													<div class="ps__scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div>
												</div>
												<div class="ps__scrollbar-y-rail" style="top: 0px; right: 0px;">
													<div class="ps__scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div>
												</div>
											</div>
										</li>

									</ul>
								</div>
                            </i>
							<li class="nav-item dropdown notifications">
								<a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="ti-bell"></i>
									<div class="notify">@if($proposal_count > 0 || $resume_count > 0)<span class="heartbit">1</span> <span class="point"></span> @endif</div>
								</a>
								<div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown">
									<ul>
										<li>
											<div class="drop-title">Notifications</div>
										</li>
										<li>
											<div class="message-center ps ps--theme_default" data-ps-id="8bcf39be-39a4-5083-c8df-6c64f12efa30">
												<!-- Message -->
												
												@foreach($proposals as $proposal)
												<a href="/project-room/show/{{$proposal->proposal->project->id}}">
													<div class="btn btn-danger btn-circle"><i class="fa fa-paper-plane"></i></div>
													<div class="mail-contnet">
														<h5>New Proposal</h5> <span class="mail-desc">{{str_replace('<br>'," ",$proposal->message)}}</span> <span class="time">{{$proposal->created_at}}</span></div>
												</a>
												@endforeach
												@foreach($resumes as $resume)
												@if(isset($resume->resume->help->id))
												<a href="/help-wanted/show/{{$resume->resume->help->id}}">
													<div class="btn btn-danger btn-circle"><i class="fa fa-paper-plane"></i></div>
													<div class="mail-contnet">
														<h5>New Resume</h5> <span class="mail-desc">{{str_replace('<br>'," ",$resume->message)}}</span> <span class="time">{{$resume->created_at}}</span></div>
												</a>
												@endif
												@endforeach
												<!--<a href="javascript:void(0)">-->
												<!--	<div class="btn btn-danger btn-circle"><i class="fa fa-link"></i></div>-->
												<!--	<div class="mail-contnet">-->
												<!--		<h5>Luanch Admin</h5> <span class="mail-desc">Just see the my new admin!</span> <span class="time">9:30 AM</span></div>-->
												<!--</a>-->
												<!-- Message -->

												<div class="ps__scrollbar-x-rail" style="left: 0px; bottom: 0px;">
													<div class="ps__scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div>
												</div>
												<div class="ps__scrollbar-y-rail" style="top: 0px; right: 0px;">
													<div class="ps__scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div>
												</div>
											</div>
										</li>

									</ul>
								</div>
							</li>
							<li class="nav-item dropdown u-pro">
								<a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{Auth::user()->avatar}}" alt="user" class=""> <span class="hidden-md-down">{{Auth::user()->name}} &nbsp;<i class="fa fa-angle-down"></i></span> </a>
{{--								{{url('/storage').'/'.Auth::user()-avatar}}--}}
								<div class="dropdown-menu dropdown-menu-right animated flipInY">
								    <div id="mbl-menu" style="display:none;">
								        <a href="/project-room" class="dropdown-item">Manage and Create Projects</a>
    									<a href="#." class="dropdown-item dropdown-toggle" data-toggle="dropdown">Directory <span class="fa fa-caret-down"></span></a>
    								
                                        <ul class="">
                                          <li><a href="{{url('/directory/search?trade=&account_type=Subcontractor&distance=100&page=1')}}" class="selcusvvv" data-id="Subcontractor" style="padding:7px 10px; display: block;">Subcontractor</a></li>
                                          <li><a href="{{url('/directory/search?trade=&account_type=General Contractor&distance=100&page=1')}}" class="selcusvvv" data-id="General Contractor" style="padding:7px 10px; display: block;">General Contractor</a></li>
                                          <!--<li><a href="{{url('/directory/search?trade=&account_type=Homeowner&distance=100&page=1')}}" class="selcusvvvv" data-id="Homeowner" style="padding:7px 10px; display: block;">Homeowner</a></li>-->
                                          <li><a href="{{url('/directory/search?trade=&account_type=Advertiser&distance=100&page=1')}}" class="" data-id="Advertiser" style="padding:7px 10px; display: block;">Advertiser</a></li>
                                          <li><a href="{{url('/directory/search?trade=Educational Services&account_type=&distance=100&page=1')}}" style="padding:7px 10px; display: block;">Educational</a></li>
                                          <li><a href="{{url('/directory/search?trade=Cellulose Manufacturer&account_type=&distance=100&page=1')}}" style="padding:7px 10px; display: block;">Manufacturer</a></li>
                                          <li><a href="{{url('/directory/search?trade=Supplier&account_type=&distance=100&page=1')}}" style="padding:7px 10px; display: block;">Supplier</a></li>
                                          <li><a href="{{url('/directory/search?trade=Estimating Tools- Software&account_type=&distance=100&page=1')}}" style="padding:7px 10px; display: block;">Estimating</a></li>

                                        </ul>
                                    
									
    									<a href="/help-wanted" class="dropdown-item">Manage and Create Help Wanted Ads</a>
    								<a href="/property-for-sale" class="dropdown-item">Manage and Create Property For Sale Listings</a>
    								<a href="/equipment-for-sale" class="dropdown-item">Building Materials and Equipment</a>
    										<!--	<a href="/equipment-for-sale" class="dropdown-item">Manage and Create Building Materials/ Equipment For Sale Listings</a>
    									<a href="/market-place" class="dropdown-item">Marketplace</a>-->
    									@if(Auth::user()->role_id == 1)
    									<a href="/projects/admin" class="dropdown-item">Admin</a>
    									@endif
								    </div>
								<?php $profile = \App\Models\Crest\profile::where('user_id', auth()->user()->id)->first(); ?>
									@if (isset($profile))
										<a href="/profiles/show/{{$profile->id}} " class="dropdown-item">View Profile</a>
										<a href="/profiles/edit/{{$profile->id}}" class="dropdown-item">Edit Profile</a>
										<a href="{{ route('profiles.profile.viewer',  $profile->id) }}" class="dropdown-item">Activity</a>
									@endif
									
									<a href="/project-room/manage" class="dropdown-item">Manage and Create Projects</a>
									@if (Auth::user()->role_id != 2)
									<a href="/help-wanted/manage" class="dropdown-item">Manage and Create Help Wanted Ads</a>
									<a href="/property-for-sale/manage" class="dropdown-item">Manage and Create Property For Sale Listings</a>
										<a href="/equipment-for-sale/manage" class="dropdown-item">Manage and Create Building Materials/ Equipment For Sale Listings</a>
									<a href="/proposals" class="dropdown-item">Proposals Sent</a>
									@endif
									<a href="/resumes" class="dropdown-item">Resumes Sent</a>
									<a href="/favorites/manage" class="dropdown-item">Favorites</a>
									<a href="/chat-rooms" class="dropdown-item">Messages</a>
									
									<a href="/pricing" class="dropdown-item">Manage Membership</a>
									<a href="/transactions" class="dropdown-item">Transactions</a>
									<a href="/account" class="dropdown-item"> Account Settings </a>
									<a href="/logout" class="dropdown-item">Logout</a>
								</div>
							</li>
						@endif
						@if(Auth::check() == false)
					        
					        <li class="nav-item dropdown u-pro mobile_menu">
								<a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="navbar-toggler-icon"></i></span> </a>

								<div class="dropdown-menu dropdown-menu-right animated flipInY">
								    <div id="mbl-menu" style="display:none;">
								        <a href="/project-room" class="dropdown-item">Project room</a>
    									<a href="#." class="dropdown-item dropdown-toggle" data-toggle="dropdown">Directory <span class="fa fa-caret-down"></span></a>
    								
                                        <ul class="">
                                          <li><a href="{{url('/directory/search?trade=&account_type=Subcontractor&distance=100&page=1')}}" class="selcusvvv" data-id="Subcontractor" style="padding:7px 10px; display: block;">Subcontractor</a></li>
                                          <li><a href="{{url('/directory/search?trade=&account_type=General Contractor&distance=100&page=1')}}" class="selcusvvv" data-id="General Contractor" style="padding:7px 10px; display: block;">General Contractor</a></li>
                                          <!--<li><a href="{{url('/directory/search?trade=&account_type=Homeowner&distance=100&page=1')}}" class="selcusvvvv" data-id="Homeowner" style="padding:7px 10px; display: block;">Homeowner</a></li>-->
                                          <li><a href="{{url('/directory/search?trade=&account_type=Advertiser&distance=100&page=1')}}" class="" data-id="Advertiser" style="padding:7px 10px; display: block;">Advertiser</a></li>
                                          <li><a href="{{url('/directory/search?trade=Educational Services&account_type=&distance=100&page=1')}}" style="padding:7px 10px; display: block;">Educational</a></li>
                                            <li><a href="{{url('/directory/search?trade=Cellulose Manufacturer&account_type=&distance=100&page=1')}}" style="padding:7px 10px; display: block;">Manufacturer</a></li>
                                            <li><a href="{{url('/directory/search?trade=Supplier&account_type=&distance=100&page=1')}}" style="padding:7px 10px; display: block;">Supplier</a></li>
                                            <li><a href="{{url('/directory/search?trade=Estimating Tools- Software&account_type=&distance=100&page=1')}}" style="padding:7px 10px; display: block;">Estimating</a></li>
                                    </ul>
                                    
									
    								<a href="/help-wanted" class="dropdown-item">Help wanted</a>
    								<a href="/property-for-sale" class="dropdown-item">Property for sale</a>
    								<a href="/equipment-for-sale" class="dropdown-item">Building Materials and Equipment</a>
    									
								    </div>
									
								</div>
							</li>
							<!--<li class="nav-item">-->
							<!--	<a class="nav-link waves-effect waves-dark" href="/login">Login</a>-->
							<!--</li>-->
							<!--<li class="nav-item">-->
							<!--	<a class="nav-link waves-effect waves-dark" href="/register">Register</a>-->
							<!--</li>-->
						@endif
					</ul>
				</div>
			</nav>
		</header>
		
		<style>.topbar .top-navbar .navbar-nav>.nav-item>.nav-link{padding-left:10px;}</style>

	@yield('content')

<!-- ============================================================== -->
	<!-- All Jquery -->
	<!-- ============================================================== -->
    
	
	
	<!--Wave Effects -->
	<script src="{{$assets_path_public_eli}}dist/js/waves.js"></script>
	<!--Menu sidebar -->
	<script src="{{$assets_path_public_eli}}dist/js/sidebarmenu.js"></script>
	<!--Custom JavaScript -->
	<script src="{{$assets_path_public_eli}}dist/js/custom.min.js"></script>
	<!-- ============================================================== -->
	<!-- This page plugins -->
	<!-- ============================================================== -->
	<!--morris JavaScript -->
	<!--<script src="{{$assets_path_public_eli}}node_modules/raphael/raphael-min.js"></script>-->
	<!--<script src="{{$assets_path_public_eli}}node_modules/morrisjs/morris.min.js"></script>-->
	<script src="{{$assets_path_public_eli}}node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
	<!-- Popup message jquery -->
	<script src="{{$assets_path_public_eli}}node_modules/toast-master/js/jquery.toast.js"></script>
	<!-- Chart JS -->
	<!--<script src="{{$assets_path_public_eli}}dist/js/dashboard1.js"></script>-->
	<!-- Calendar JavaScript -->
	{{--<script src="${{assets_path_public_eli}}node_modules/calendar/jquery-ui.s') }}"></script>--}}
	
	<script src="{{$assets_path_public_eli}}node_modules/moment/moment.js"></script>
	<script src="{{$assets_path_public_eli}}node_modules/calendar/dist/fullcalendar.min.js"></script>
	<script src="{{$assets_path_public_eli}}node_modules/calendar/dist/cal-init.js"></script>


	<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.2/js/fileinput.min.js"></script>
		
		<!-- Bootstrap popper Core JavaScript -->
	<script src="{{$assets_path_public_eli}}node_modules/popper/popper.min.js"></script>
	<script src="{{$assets_path_public_eli}}node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
	<!-- slimscrollbar scrollbar JavaScript -->
	<script src="{{$assets_path_public_eli}}dist/js/perfect-scrollbar.jquery.min.js"></script>
		<script type="text/javascript">
              $('#chat, #msg, #comment, #todo').perfectScrollbar();
	</script>
	<script src="{{$assets_path}}js/Owl/dist/owl.carousel.min.js"></script>
	
	<script>
	    
	      
      
	    
	</script>
	
    <script src="{{$assets_path}}js/prettyphoto/js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>

		{{-- <script src="{{ asset('js/app.js') }}"></script> --}}
	<script type="text/javascript">
              $(function () {
                  var contact_options = 0;
                  
                  if($('.contact-options').length == 0) {
                      contact_options = 1;
                  }
                  else {
                      $('.contact-options:checked').each(function(i) {
                          contact_options++;
                      });
                      
                      $('.contact-options').click(function() {
                          if($(this).is(':checked')) {
                              contact_options++;
                          }
                          else {
                              contact_options--;
                          }
                      });
                  }

                  // sends the uploaded file file to the fielselect event
                  $(document).on('change', ':file', function () {
                      var input = $(this);
                      var label = input.val().replace(/\\/g, '/').replace(/.*\//, '');

                      input.trigger('fileselect', [label]);
                  });

                  // Set the label of the uploaded file
                  $(':file').on('fileselect', function (event, label) {
                      $(this).closest('.uploaded-file-group').find('.uploaded-file-name').val(label);
                  });

                  // Deals with the upload file in edit mode
                  $('.custom-delete-file:checkbox').change(function (e) {
                      var self = $(this);
                      var container = self.closest('.input-width-input');
                      var display = container.find('.custom-delete-file-name');

                      if (self.is(':checked')) {
                          display.wrapInner('<del></del>');
                      } else {
                          var del = display.find('del').first();
                          if (del.is('del')) {
                              del.contents().unwrap();
                          }
                      }
                  }).change();

                  // Sets the validator defaults
                  $.validator.setDefaults({
                      errorElement: "span",
                      errorClass: "help-block",
                      highlight: function (element, errorClass, validClass) {
                          $(element).closest('.form-group').addClass('has-error');
                      },
                      unhighlight: function (element, errorClass, validClass) {
                          $(element).closest('.form-group').removeClass('has-error');
                      },
                      errorPlacement: function (error, element) {
                          if (element.parent('.input-group').length) {
                              error.insertAfter(element.parent());
                          } else if (element.prop('type') === 'checkbox' || element.prop('type') === 'radio') {
                              error.appendTo(element.closest(':not(input, label, .checkbox, .radio)').first());
                          } else {
                              error.insertAfter(element);
                          }
                      }
                  });

                  // Makes sure any input with the required class is actually required
                  $('form').each(function (index, item) {
                      var form = $(item);
                      form.validate();

                      form.find(':input.required').each(function (i, input) {
                          $(input).attr('required', true);
                      });
                  });

              });
              
    $(document).ready(function () {
           $("a[rel^='prettyPhoto']").prettyPhoto({
            social_tools:'',
            });  
          $('.owl-carousel').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            responsiveClass:true,
            responsive:{
                0:{
                    items:1,
                    nav:true
                },
                600:{
                    items:3,
                    nav:false
                },
                1000:{
                    items:3,
                    nav:true,
                    loop:false
                }
            }
        })
       });
	</script>
	
	<script>
	    var siteurlc = '<?php echo url("/"); ?>';
	    $(document).on("click",".selcus",function(){
	        var seldata = $(this).data('id');
	        console.log(seldata);
	        
	        /*$('[name="account_type[]"]').val( seldata );
	        
	        $('[name="account_type[]"]').select2().trigger('change');*/
	        location.assign(siteurlc+'/directory/search?trade=&account_type='+seldata+'&distance=100&page=1');
	        //$( "#location-search" ).submit();
	    });
	</script>
	
	<style>
	
	    .topbar .top-navbar .navbar-nav>.nav-item>.nav-link {
    padding-left: 9px;
}
li.nav-item.mobile_menu{display:none;}

@media only screen and (max-width: 992px){
    li.nav-item.mobile_menu{display:block;}
}
	</style>

	<!-- ============================================================== -->
	<!-- footer -->
	<!-- ============================================================== -->
	<footer class="footer <?php if($sidebar == true){
					echo 'ml-0';
		  }?>"> © 2019 Bidhub.com
	</footer>

	@yield('js')
	<!-- ============================================================== -->
	<!-- End footer -->
	<!-- ============================================================== -->

</div>
</body>
</html>
