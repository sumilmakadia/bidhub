<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>{{ config('app.name', 'application-name=BidHub') }}</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<!-- Favicon icon -->
	<link rel="icon" type="image/png" sizes="16x16" href="{{$assets_path_public_eli}}//5images/favicon.png"><!-- This page CSS -->
	<script src="{{$assets_path_public_eli}}node_modules/jquery/jquery-3.2.1.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
	<!-- chartist CSS -->
	<link href="{{$assets_path_public_eli}}node_modules/morrisjs/morris.css" rel="stylesheet">
	<!--Toaster Popup message CSS -->
	<link href="{{$assets_path_public_eli}}node_modules/toast-master/css/jquery.toast.css" rel="stylesheet">
	<link href="{{$assets_path_public_eli}}node_modules/calendar/dist/fullcalendar.css" rel="stylesheet"/>
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
    <link href="{{$assets_path}}css/custom.css" media="all" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Raleway" />
	<style media="screen">
		p {
			margin-bottom: 30px;
		}

		.skin-blue .topbar .top-navbar .navbar-header .navbar-brand .light-logo {
			display: inline-block;
			color: rgba(255, 255, 255, .8);
			padding: 5%;
			max-height: 80%;
			max-width: 80%;
		}
	</style>

	<style>
		.mh-200 {
			min-height: 200px;
		}

		.footer {
			position: absolute;
		}

		.card {
			margin-bottom: 20px;
			padding: 20px;
		}

		.h3, h3 {
			font-size: 1.5rem;
			padding-top: 25px !important;
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
        .left-sidebar {
            position: absolute;
            width: 220px;
            height: 100%;
            top: 0;
            z-index: 20;
            padding-top: 70px;
            box-shadow: 1px 0 0px rgb(237, 241, 245);
        }
	</style>

	@yield('css')

</head>
<body class="skin-blue fix-header card-no-border ">
	<div class="preloader">
		<div class="loader">
			<div class="loader__figure"></div>
			<p class="loader__label">@yield('title')</p>
		</div>
	</div>
<div id="main-wrapper">
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
			<img src="{{$assets_path_public_eli}}images/bidhub.png" alt="homepage" class="dark-logo">
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
					<ul class="navbar-nav mr-auto">
						{{--				<li class="nav-item"><a class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark" href="javascript:void(0)"><i class="icon-menu"></i></a></li>--}}
						@php
							$menus = array(
								array('title'=> 'Project Room',             'url' => '/project-room'),
								array('title'=> 'Directory',            'url' => '/directory'),
								array('title'=> 'Help Wanted',          'url' => '/help-wanted'),
								array('title'=> 'Property For Sale',    'url' => '/property-for-sale'),
								array('title'=> 'Marketplace',          'url' => '/market-place'),
							//	array('title'=> 'Find Contractor',      'url' => '/profiles/contractors'),
							//	array('title'=> 'Calendar',             'url' => '/calendar'),
							//	array('title'=> 'Budget Planner',       'url' => '/budget-planner')
							);
						@endphp
						@if(Auth::check())
							@foreach($menus as $menu)
								<li class=" nav-item">
									<a href="{{$menu['url']}}" target="" style="" class="nav-link d-none d-lg-block d-md-block waves-effect waves-dark">
										<span>{{$menu['title']}}</span>
									</a>
								</li>
							@endforeach
						@endif

					</ul>
					<!-- ============================================================== -->
					<!-- User profile and search -->
					<!-- ============================================================== -->
					<ul class="navbar-nav my-lg-0">
						@if(Auth::check())

							<li class="nav-item">
								<a href="/project-room/manage" class="nav-link d-none d-lg-block d-md-block waves-effect waves-dark">Projects</a>
							</li>
							@if (Auth::user()->role_id == 1)
								<li class="nav-item">
									<a href="/projects/admin" class="nav-link d-none d-lg-block d-md-block waves-effect waves-dark">Admin</a>
								</li>
							@endif
                            @php
									$messages =  App\Models\Crest\chatroom_message::where('sent_to', Auth::user()->id)->where('viewed', 0)->get();
									$count = $messages->count();
									
							@endphp

							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="ti-bell"></i>
									<div class="notify">@if($count > 0)<span class="heartbit"></span> <span class="point"></span>@endif</div>
								</a>
								<div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown">
									<ul>
										<li>
											<div class="drop-title">Notifications</div>
										</li>
										<li>
											<div class="message-center ps ps--theme_default" data-ps-id="8bcf39be-39a4-5083-c8df-6c64f12efa30">
												<!-- Message -->
												@foreach($messages as $message)
												@isset($message->user)
												<a href="/chat-rooms/{{$message->chatroom_id}}">
													<div class="btn btn-danger btn-circle"><i class="fa fa-paper-plane"></i></div>
													<div class="mail-contnet">
														<h5>{{$message->user->name}}</h5> <span class="mail-desc">{{$message->message}}</span> <span class="time">{{$message->created_at}}</span></div>
												</a>
												@endisset
												@endforeach
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
								<a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{''.Auth::user()->avatar}}" alt="user" class=""> <span class="hidden-md-down">{{Auth::user()->name}} &nbsp;<i class="fa fa-angle-down"></i></span> </a>
{{--								{{url('/storage').'/'.Auth::user()-avatar}}--}}
								<div class="dropdown-menu dropdown-menu-right animated flipInY">
								    @if(Auth::user()->role_id == 1)
								    <div id="mbl-admin" style="display:none;">
								        <a href="{{route('projects.project.admin')}}" class="dropdown-item">Manage Projects</a>
    									<a href="{{route('market-place.marketplace.admin')}}" class="dropdown-item">Manage Marketplace</a>
    									<a href="{{route('directory.directories.admin')}}" class="dropdown-item">Manage Claim Requests</a>
    									<a href="{{route('directory.free-directories.admin')}}" class="dropdown-item">Manage Free Directory</a>
    									<a href="{{route('property-for-sale.property.admin')}}" class="dropdown-item">Manage Properties For Sale</a>
    									<a href="{{route('help-wanted.help.admin')}}" class="dropdown-item">Manage Help Wanted</a>
    									<a href="{{route('profiles.profile.admin')}}" class="dropdown-item">Manage Users</a>
    									<a href="{{route('admin.membership.plans.ybr_membership2_plan.index')}}" class="dropdown-item">Manage Plans</a>
								    </div>
								    @endif
								    
								    <div id="mbl-menu" style="display:none;">
								        <a href="/project-room" class="dropdown-item">Project Room</a>
    									<a href="/directory" class="dropdown-item">Directory</a>
    									<a href="/help-wanted" class="dropdown-item">Help Wanted</a>
    									<a href="/property-for-sale" class="dropdown-item">Property For Sale</a>
    									<a href="/market-place" class="dropdown-item">Marketplace</a>
    									@if(Auth::user()->role_id == 1)
    									<a href="/projects/admin" class="dropdown-item">Admin</a>
    									@endif
								    </div>
								    
								    
								<?php $profile = \App\Models\Crest\profile::where('user_id', auth()->user()->id)->first(); ?>
									@if (isset($profile))
										<a href="/profiles/show/{{$profile->id}} " class="dropdown-item">View Profile</a>
										<a href="/profiles/edit/{{$profile->id}} " class="dropdown-item">Edit Profile</a>
									@endif
									<a href="/project-room/manage" class="dropdown-item">Projects</a>
									<a href="/proposals" class="dropdown-item">Proposals</a>
									<a href="/favorites/manage" class="dropdown-item">Favorites</a>
									<a href="/chat-rooms" class="dropdown-item">Messages</a>
									
									<a href="/pricing" class="dropdown-item">Manage Membership</a>
									<a href="/account" class="dropdown-item"> Account </a>
									<a href="/logout" class="dropdown-item">Logout</a>
								</div>
							</li>
						@endif
						@if(Auth::check() == false)
							<li class="nav-item">
								<a class="nav-link waves-effect waves-dark" href="/login">Login</a>
							</li>
							<li class="nav-item">
								<a class="nav-link waves-effect waves-dark" href="/register">Register</a>
							</li>
						@endif
					</ul>
				</div>
			</nav>
		</header>

	<aside class="left-sidebar">
		<!-- Sidebar scroll-->
		<div class="scroll-sidebar ps ps--theme_default ps--active-y" data-ps-id="c1dab30b-98bc-d610-0a00-437b86ddb638">
			<!-- Sidebar navigation-->
			<nav class="sidebar-nav">


				<ul id="sidebarnav">
					<li>
						<a class="waves-effect waves-dark" href="{{route('projects.project.admin')}}" aria-expanded="false">

							<span class="hide-menu">Manage Projects</span>
						</a>
					</li>
					<!--<li>-->
					<!--	<a class="waves-effect waves-dark" href="{{route('budgets.budget.admin')}}" aria-expanded="false">-->

					<!--		<span class="hide-menu">Manage Budgets</span>-->
					<!--	</a>-->
					<!--</li>-->
					<!--<li>-->
					<!--	<a class="waves-effect waves-dark" href="{{route('proposals.proposal.admin')}}" aria-expanded="false">-->

					<!--		<span class="hide-menu">Manage Proposals</span>-->
					<!--	</a>-->
					<!--</li>-->
					<li>
						<a class="waves-effect waves-dark" href="{{route('market-place.marketplace.admin')}}" aria-expanded="false">

							<span class="hide-menu">Manage Marketplace</span>
						</a>
					</li>
					<li>
						<a class="waves-effect waves-dark" href="{{route('directory.directories.admin')}}" aria-expanded="false">

							<span class="hide-menu">Manage Claim Requests</span>
						</a>
					</li>
                    <li>
						<a class="waves-effect waves-dark" href="{{route('directory.free-directories.admin')}}" aria-expanded="false">

							<span class="hide-menu">Manage Free Directory</span>
						</a>
					</li>
					<li>
						<a class="waves-effect waves-dark" href="{{route('property-for-sale.property.admin')}}" aria-expanded="false">

							<span class="hide-menu">Manage Properties For Sale</span>
						</a>
					</li>
					<li>
						<a class="waves-effect waves-dark" href="{{route('help-wanted.help.admin')}}" aria-expanded="false">

							<span class="hide-menu">Manage Help Wanted</span>
						</a>
					</li>
					<li>
						<a class="waves-effect waves-dark" href="{{route('profiles.profile.admin')}}" aria-expanded="false">

							<span class="hide-menu">Manage Users</span>
						</a>
					</li>
					<li>
						<a class="waves-effect waves-dark" href="{{route('admin.membership.plans.ybr_membership2_plan.index')}}" aria-expanded="false">

							<span class="hide-menu">Manage Plans</span>
						</a>
					</li>
					<li>
						<a class="waves-effect waves-dark" href="{{route('admin.membership.orders.index')}}" aria-expanded="false">

							<span class="hide-menu">Manage Orders</span>
						</a>
					</li>
					<a href="{{route('logout')}}" class="dropdown-item">Logout</a>

				</ul>

			</nav>



			<!-- End Sidebar navigation -->
			<div class="ps__scrollbar-x-rail" style="left: 0px; bottom: 0px;">
				<div class="ps__scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div>
			</div>
			<div class="ps__scrollbar-y-rail" style="top: 0px; height: 832px; right: 0px;">
				<div class="ps__scrollbar-y" tabindex="0" style="top: 0px; height: 397px;"></div>
			</div>
		</div>
		<!-- End Sidebar scroll-->
	</aside>


@yield('content')



<!-- ============================================================== -->
	<!-- All Jquery -->
	<!-- ============================================================== -->

	<!-- Bootstrap popper Core JavaScript -->
	<script src="{{$assets_path_public_eli}}node_modules/popper/popper.min.js"></script>
	<script src="{{$assets_path_public_eli}}node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
	<!-- slimscrollbar scrollbar JavaScript -->
	<script src="{{$assets_path_public_eli}}dist/js/perfect-scrollbar.jquery.min.js"></script>
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
	<script src="{{$assets_path_public_eli}}node_modules/raphael/raphael-min.js"></script>
	<script src="{{$assets_path_public_eli}}node_modules/morrisjs/morris.min.js"></script>
	<script src="{{$assets_path_public_eli}}node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
	<!-- Popup message jquery -->
	<script src="{{$assets_path_public_eli}}node_modules/toast-master/js/jquery.toast.js"></script>
	<!-- Chart JS -->
	<script src="{{$assets_path_public_eli}}dist/js/dashboard1.js"></script>
	<!-- Calendar JavaScript -->
	{{--<script src="${{assets_path_public_eli}}node_modules/calendar/jquery-ui.s') }}"></script>--}}
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	<script src="{{$assets_path_public_eli}}node_modules/moment/moment.js"></script>
	<script src="{{$assets_path_public_eli}}node_modules/calendar/dist/fullcalendar.min.js"></script>
	<script src="{{$assets_path_public_eli}}node_modules/calendar/dist/cal-init.js"></script>
	<script type="text/javascript">
              $('#chat, #msg, #comment, #todo').perfectScrollbar();
	</script>

	<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.2/js/fileinput.min.js"></script>

		{{-- <script src="{{ asset('js.js') }}"></script> --}}
	<script type="text/javascript">
              $(function () {

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
	</script>

	<!-- ============================================================== -->
	<!-- footer -->
	<!-- ============================================================== -->
	<!--<footer class="footer">-->
	<!--</footer>-->

	@yield('js')
	<!-- ============================================================== -->
	<!-- End footer -->
	<!-- ============================================================== -->

</div>
</body>
</html>
