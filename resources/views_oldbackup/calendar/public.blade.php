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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">

	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.2/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />

	<style>
		ul {
			list-style-type: none;
			margin: 0;
			padding: 0;
			overflow: hidden;
		}

		li {
			float: left;
		}

		li a {
			display: block;
			color: white;
			text-align: center;
			padding: 14px 16px;
			text-decoration: none;
		}

		.custom_head {
			background-color: #03A9F3;
		}
		.custom_logo {
			width: 57%;
			height: 57%;
			margin: 10px 0px 10px 22px;
		}
		li > a {
			color: #79DAFF;
			text-decoration: none;
			font-size: 17px;
			font-family: "Poppins", sans-serif;
		}
		li > a:hover {
			color: white;
		}

		#add_event {
			position: fixed;
			bottom: 40px;
			right: 30px;
			border-radius: 50%;
			z-index: 10000 !important;
		}

		#dropdown_menu {
			display: none;
			position: fixed;
			top: 65px;
			right: 5px;
			z-index: 10000 !important;
			background-color: white;
			width: 150px;
			border-radius: 3px;
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
			padding: 0px !important;
		}
		.dropdown_item {
			display: block;
			width: 100%;
			padding: 5px 1.5rem;
			clear: both;
			color: #212529;
			text-align: inherit;
			background-color: transparent;
			border: 0;
			font-weight: 400;
			font-size: 15px;
			text-decoration: none !important;
		}
		.dropdown_item:hover {
			background-color: #F9FCFC;
			color: #212529;
		}
		.dropdown_item:active {
			background-color: #fb9678;
			color: white;
		}

	</style>
</head>
<body class="skin-blue fix-header @if($sidebar == 'true') fix-sidebar  @endif @if($sidebar == 'false') single-column  @endif card-no-border ">
<div class="custom_head" style="z-index: 10000 !important;">
	<ul>
		@php
			$menus = array(
				array('title'=> 'Projects',             'url' => '/project-room'),
				array('title'=> 'Directory',            'url' => '/directory'),
				array('title'=> 'Help Wanted',          'url' => '/help-wanted'),
				array('title'=> 'Property For Sale',    'url' => '/property-for-sale'),
				array('title'=> 'Market Place',          'url' => '/market-place'),
				array('title'=> 'Find Contractor',      'url' => '/profiles/contractors'),
				array('title'=> 'Calendar',             'url' => '/calendar'),
				array('title'=> 'Budget Planner',       'url' => '/budget-planner')
			);
		@endphp
		<li style="background-color: #039FE7;"><img src="{{$assets_path_public_eli}}images/bidhub.png" alt="homepage" class="dark-logo custom_logo"></li>

		@foreach($menus as $menu)
			<li><a href="{{url('').$menu['url']}}" style="text-decoration: none; margin-top: 5px">{{$menu['title']}}</a></li>
		@endforeach

		<li style="float: right">
			<a href="javascript:void(0)" style="text-decoration: none; margin-top: 5px" id="dropdown_button">
				<img src="{{$assets_path_public_eli}}images/users/1.jpg" style="border-radius: 50%; width: 30px" alt > {{Auth::user()->name}} &nbsp;<i class="fa fa-angle-down"></i>
			</a>
		</li>
		<li style="float: right"><a href="{{url('/admin-dashboard')}}" style="text-decoration: none; margin-top: 5px">Admin</a></li>
		<li style="float: right"><a href="{{url('/project-room/manage')}}" style="text-decoration: none; margin-top: 5px">Project Room</a></li>

	</ul>

</div>
<div id="main-wrapper">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					<div>
						{!! $calendar->calendar() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="dropdown_menu">
		<a href="/profiles/show/16 " class="dropdown_item">View Profile</a>
		<a href="/project-room/manage" class="dropdown_item">Projects</a>
		<a href="/proposals" class="dropdown_item">Proposals</a>
		<a href="/favorites/manage" class="dropdown_item">Favorites</a>
		<a href="/chat-rooms" class="dropdown_item">Messages</a>
		<a href="/transactions" class="dropdown_item">Membership</a>
		<a href="/pricing" class="dropdown_item">Pricing</a>
		<a href="/account" class="dropdown_item"> Account </a>
		<a href="/logout" class="dropdown_item">Logout</a>
	</div>
	<button id="add_event" class="btn btn-lg btn-info" data-toggle="modal" data-target="#eventModal"><i class="fa fa-plus"></i> </button>

	<div class="modal fade bs-example-modal-lg" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
		<form method="POST" action="{{ route('calendar.event') }}" accept-charset="UTF-8" id="create_proposal_form" name="create_proposal_form" class="form-horizontal" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="modal-dialog modal-xl" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title" id="exampleModalLabel1">Event</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="title" class="col-md-12 control-label">Title</label>
							<div class="col-md-12">
								<input class="form-control" name="title" type="text" id="title" maxlength="255" placeholder="Title" required>
							</div>
						</div>

						<div class="form-group">
							<label for="bid_decription" class="col-md-12 control-label">Description</label>
							<div class="col-md-12">
								<textarea class="form-control" name="description" cols="50" rows="10" id="bid_decription" placeholder="Description"></textarea>
							</div>
						</div>

						<div class="form-group">
							<label for="event_file" class="col-md-12 control-label">Image</label>
							<div class="col-md-12">
								<input class="form-control" type="file" name="event_file" id="event_file" />
							</div>
						</div>
						<div class="row">
							<div class="col-6">
								<div class="form-group">
									<label for="date" class="col-md-12 control-label">Date</label>
									<div class="col-md-12">
										<input class="form-control" name="date" type="date" id="date" placeholder="Date" required>
									</div>
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
									<label for="link" class="col-md-12 control-label">Link</label>
									<div class="col-md-12">
										<input class="form-control" name="link" type="text" id="link" maxlength="255" placeholder="Link" required>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</div>
			</div>
		</form>
	</div>
	<!-- ============================================================== -->
	<!-- All Jquery -->
	<!-- ============================================================== -->

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.2/js/fileinput.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<!-- ============================================================== -->
	<!-- footer -->
	<!-- ============================================================== -->
	<footer class="footer">  © 2019 YourBusinessRocket.com
	</footer>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
	<!-- the main fileinput plugin file -->

{!! $calendar->script() !!}
<!-- ============================================================== -->
	<!-- End footer -->
	<!-- ============================================================== -->


	<script>

              $("#event_file").fileinput({
                  allowedFileTypes: ["image"],
                  browseClass: "btn btn-secondary btn-block",
                  showCaption: false,
                  showRemove: false,
                  showUpload: false
              });

              $('#dropdown_button').click(function () {
                  $('#dropdown_menu').fadeIn(300);
              });

              $('#main-wrapper').click(function () {
                  $('#dropdown_menu').fadeOut(100)
              });

	</script>




</div>
</body>
</html>