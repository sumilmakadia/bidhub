
<style>	
li.right_hum{
    position: relative;
}

.hamburger{
  background:none;
  
  top:0;
  right:0;
  line-height:45px;
  padding:5px 15px 0px 15px;
  color:#999;
  border:0;
  font-size:1.4em;
  font-weight:bold;
  cursor:pointer;
  outline:none;
  z-index:10000000000000;
}
li.right_hum button {
    width: 50px;
    height: 50px;
        outline: none;
        color:#000;
}
.cross{
    display:none;
  background:none;
  right:0;
      position: relative;
    top: 6px;
    bottom: 0;
  padding:7px 15px 0px 15px;
  color:#999;
  border:0;
  font-size:3em;
  line-height:45px;
  font-weight:bold;
  cursor:pointer;
  outline:none;
  z-index:10000000000000;
}
ul.navbar-nav.pl-5.ml-5.ml-auto {
    position: relative;
}
.menu{display: none;    box-shadow: -1px 0px 6px 0px #0000004d;z-index:1000000; font-weight:bold; font-size:0.8em; width:100%; background:#f1f1f1;  position:absolute; text-align:center; font-size:12px;left: -310px;
    top: 60px;    width: 350px;}
.menu ul {margin: 0; padding: 0; list-style-type: none; list-style-image: none;}
.menu li {    
    display: block;
    padding: 15px;
    border-bottom: #dddddd 1px solid;
    background: #fff;
    font-size: 14px;
    text-align: left;
    text-transform: uppercase;
    font-weight: 300;
    line-height: 1.4;}
.menu ul li a { text-decoration:none;  margin: 0px; color:#666;}
.menu ul li a:hover {  color: #666; text-decoration:none;}
.menu a{text-decoration:none; color:#666;}
.menu a:hover{text-decoration:none; color:#666;}

.glyphicon-home{
  color:white; 
  font-size:1.5em; 
  margin-top:5px; 
  margin:0 auto;
}
	
.cussrchicon{width: 20px;
    position: absolute;
    top: 6px;
    right: 9px;}
    
li.nav-item.mobile_menu{
    display: none;
}
@media only screen and (max-width: 992px){
li.right_hum{
    display: none;
}
li.nav-item.mobile_menu{
    display:block;
}
.carousel-indicators{
    z-index: 1 !important;
}
}
    </style>
@if(Request::path() == '/' || Request::path() == 'about-us' || Request::path() == 'membership' || Request::path() == 'how-it-work' || Request::path() == 'pricing')

@if(Request::path() == 'about-us' || Request::path() == 'membership' || Request::path() == 'how-it-work' || Request::path() == 'pricing')
<style>
.header {
    box-shadow: 0px 0px 9px 0px #ccc;
}</style>
@endif

<header class="header" role="banner"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
 <!--   <div class="nav-item" style="background-color:#000;">-->
	<!--    <div class="nav-link d-none d-lg-block d-md-block waves-effect waves-dark" style="padding: 8px 10px 5px;line-height: 16px;color:#fff;text-align:center;">-->
	<!--        Site is in beta testing.  Please feel free to explore the site, launch will be coming soon.-->
	<!--    </div>-->
	<!--</div>-->
	<div class="col-md-12">
	    <nav class="navbar navbar-expand-lg navbar-light">
	    	
				<a class="navbar-brand" href="/">
				<img src="{{$assets_path_public_eli}}images/bidhub-logo-blue.png" alt="">

				</a>


				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                

			<!--========== Collect the nav links, forms, and other content for toggling ==========-->
			<!--<ul class="nav navbar-nav nav-right navbar-right">-->
			<!--	<li>-->
			<!--		<a href="/app/login" class="btn g-btn">-->
			<!--			Login-->
			<!--		</a>-->
			<!--	</li>-->
			<!--	<li>-->
			<!--		<a href="/app/register" class="btn g-btn">-->
			<!--			Try For Free-->
			<!--		</a>-->
			<!--	</li>-->
			<!--</ul>-->

			
			<div class="collapse navbar-collapse" id="navbarTogglerDemo03" >

				<ul class="navbar-nav pl-5 ml-5">

					<li class="nav-item "><a href="{{url('/about-us')}}" class="nav-link" target="_self"><span>About BidHub</span></a></li>
					
					<li class="nav-item "><a href="{{url('/how-it-work')}}" class="nav-link" target="_self"><span>How it works</span></a></li>
					<li class="nav-item "><a href="{{url('/membership')}}" class="nav-link" target="_self"><span>Membership</span></a></li>
					<li class="nav-item "><a href="{{url('/project-room/create')}}" class="nav-link" target="_self"><span>Add projects</span></a></li>
					<li class="nav-item mobile_menu dropdown"><a  class="nav-link dropdown-toggle" href="{{url('/directory')}}" data-toggle="dropdown">Directory <ul class="dropdown-menu">
        <li><a href="{{url('/directory/search?trade=&account_type=Subcontractor&distance=100&page=1')}}" class="selcusvvv" data-id="Subcontractor" style="padding:7px 10px; display: block;">Subcontractor</a></li>
        <li><a href="{{url('/directory/search?trade=&account_type=General Contractor&distance=100&page=1')}}" class="selcusvvv" data-id="General Contractor" style="padding:7px 10px; display: block;">General Contractor</a></li>
        <!--<li><a href="{{url('/directory/search?trade=&account_type=Homeowner&distance=100&page=1')}}" class="selcusvvvv" data-id="Homeowner" style="padding:7px 10px; display: block;">Homeowner</a></li>-->
        <li><a href="{{url('/directory/search?trade=&account_type=Advertiser&distance=100&page=1')}}" class="" data-id="Advertiser" style="padding:7px 10px; display: block;">Advertiser</a></li>
        <li><a href="{{url('/directory/search?trade=Educational Services&account_type=&distance=100&page=1')}}" style="padding:7px 10px; display: block;">Educational</a></li>
        <li><a href="{{url('/directory/search?trade=Cellulose Manufacturer&account_type=&distance=100&page=1')}}" style="padding:7px 10px; display: block;">Manufacturer</a></li>
        <li><a href="{{url('/directory/search?trade=Supplier&account_type=&distance=100&page=1')}}" style="padding:7px 10px; display: block;">Supplier</a></li>
        <li><a href="{{url('/directory/search?trade=Estimating Tools- Software&account_type=&distance=100&page=1')}}" style="padding:7px 10px; display: block;">Estimating</a></li>
    </ul></a> 
					
				
					</li>
<li class="nav-item mobile_menu"><a  class="nav-link" href="{{url('/help-wanted')}}">Help wanted</a></li>
<li class="nav-item mobile_menu"><a  class="nav-link" href="{{url('/equipment-for-sale')}}">Building materials and equipment</a></li>
<li class="nav-item mobile_menu"><a  class="nav-link" href="{{url('/property-for-sale')}}">Property for sale</a></li>
<li class="nav-item mobile_menu"><a  class="nav-link" href="{{url('/project-room')}}">Project Room</a></li>
<li class="nav-item mobile_menu"><a  class="nav-link" href="{{url('/directory/search?trade=&account_type=General Contractor&distance=100&page=1')}}">Builders</a></li>
<li class="nav-item mobile_menu"><a  class="nav-link" href="{{url('/directory/search?trade=Educational Services&account_type=&distance=100&page=1')}}">Education</a></li>
<li class="nav-item mobile_menu"><a class="nav-link" href="{{url('/directory/search?trade=Estimating Tools- Software&account_type=&distance=100&page=1')}}">Estimating</a></li>
<li class="nav-item mobile_menu"><a  class="nav-link" href="{{url('/admin/login')}}">Login or Signup here </a></li>
				</ul>

				

				<ul class="navbar-nav pl-5 ml-5 ml-auto">

					<li class="nav-item srchlist"> 
						<form action="{{url('/directory/search')}}" class="search-form" method="post">
						    {{csrf_field()}}
							<div class="form-group has-feedback">
								<label for="search" class="sr-only">Search</label>
								<input type="text" class="form-control" name="company_name" id="search" placeholder="search">	
								
								<button type="submit" style="background: transparent; border: none;"><img src="{{asset('public/assets/landings/eli/images/search.png')}}" class="form-control-feedback cussrchicon"></button><!-- <span class="fa fa-search form-control-feedback"></span> -->
							</div>
						</form>
					</li>

					<!--<li><a href="/admin/login" class="btn btn btn-outline-light-custom text-uppercase ml-3">Login &nbsp; <i class="fa fa-user"></i></a></li>-->
<li class="right_hum"> <button class="hamburger">&#9776;</button>
  <button class="cross">&#735;</button>
  <div class="menu">
  <ul>
    <li class="dropdown"> 
    <a href="{{url('/directory')}}" class="dropdown-toggle" data-toggle="dropdown"> Directory  
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
    </a>
    </li>
    <li><a href="{{url('/help-wanted')}}">Help wanted </a></li>
    <li><a href="{{url('/equipment-for-sale')}}">Building materials and equipment </a></li>
    <li><a href="{{url('/property-for-sale')}}">Property for sale </a></li>
    <li><a href="{{url('/project-room')}}">Project Room</a></li>
    <li><a href="{{url('/directory/search?trade=&account_type=General Contractor&distance=100&page=1')}}">Builders</a></li>
    <li><a href="{{url('/directory/search?trade=Educational Services&account_type=&distance=100&page=1')}}">Education</a></li>
    <li><a href="{{url('/directory/search?trade=Estimating Tools- Software&account_type=&distance=100&page=1')}}">Estimating</a></li>
    <li><a href="{{url('/admin/login')}}">Login or Signup here </a></li>
  </ul>
</div> 
</li>
<style>
    .dropdown-menu .dropdown-toggle{display:none;} 
</style>
				</ul>
				

			</div><!-- /.navbar-collapse -->


		
        </nav>
	</div>
	<style>

.search-form .form-group {
  float: right !important;
  transition: all 0.35s, border-radius 0s;
  width: 32px;
  height: 32px;
  border-radius: 25px;
  
}
.search-form .form-group input.form-control {
  padding-right: 20px;
  border: 0 none;
  background: transparent;
  box-shadow: none;
  display:block;
  padding-top:0px !important; 
}
.search-form .form-group:hover,
.search-form .form-group.hover {
  width: 100%;
  border-radius: 4px 25px 25px 4px;
   background-color: #fff;
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
  border: 1px solid #ccc;
}

form.search-form {
    margin: 5px;
    position: relative;
}

.search-form .form-group span.form-control-feedback {
  position: absolute;
  top: -1px;
  right: -2px;
  z-index: 2;
  display: block;
  width: 34px;
  height: 34px;
  line-height: 34px;
  text-align: center;
  color: #1e1e1c;
  left: initial;
  font-size: 20px;
}



	    .header.fadeInDown .navbar {
	        background-color:white!important;
	    }
	    header .navbar-light .navbar-nav .nav-link {
	        text-transform: uppercase;
	    }
	    .navbar-light .navbar-nav .active>.nav-link, .navbar-light .navbar-nav .nav-link.active, .navbar-light .navbar-nav .nav-link.show, .navbar-light .navbar-nav .show>.nav-link {
    color: #fff;
}
.btn-outline-light-custom{ border:2px solid #000;  font-size: 14px;     position: relative; top: 7px;}
.btn-outline-light-custom .fa {
    border-radius: 90px;
    width: 20px;
    height: 20px;
    border: 1px solid #9f9f9f;
    padding: 2px;
    color: #9f9f9f;
}
.hb .carousel-caption{z-index: 1;}
.srchlist{position: relative; top:7px;}
.srchlist .fa-search{font-size: 24px; }


@import url("https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700|Ubuntu:300,400,500,700&display=swap");body{background:#fff;font-family:'Montserrat', sans-serif}p{font-size:15px}.text-blue{color:#517fdb}h1{font-size:4rem;font-weight:300}.bg-red{background:#ff0000}.bg-dark{background:#282828}.btn{border-radius:2rem}.btn-theme{background:#ed9a7c;color:#fff;font-weight:500}.btn-theme:hover{color:#fff;background:#282828}a{position:relative}a .link{padding-top:10px}a .link:before{left:0;bottom:0;width:100%;height:2px;background:#0883a4;-webkit-transform:scaleX(0);transform:scaleX(0)}a .link:hover:before{-webkit-transform:scaleX(1);transform:scaleX(1)}.ptb-5{padding-top:5rem;padding-bottom:5rem}.p-10{padding:5rem !important}.mb-10{margin-bottom:5rem}header{background:transparent;}header .navbar-light .navbar-nav .nav-link{color:#000;padding-right:1rem;padding-left:1rem}header nav{color:#fff;font-size:14px}header nav:hover{color:#ff0000}.hb{position:relative}.hb .carousel-caption{left:15%;right:15%;bottom:30%}.hb .carousel-caption p{font-size:16px}.hb .carousel-caption a.link{color:#fff;text-transform:uppercase;font-size:13px;padding:10px}footer{background:#333;color:#fff;padding-top:15px;padding-bottom:15px;font-size:13px}footer a{color:#fff;margin:10px}

	</style>
</header>



@else

<header class="header" role="banner">
 <!--   <div class="nav-item" style="background-color:#000;">-->
	<!--    <div class="nav-link d-none d-lg-block d-md-block waves-effect waves-dark" style="padding: 8px 10px 5px;line-height: 16px;color:#fff;text-align:center;">-->
	<!--        Site is in beta testing.  Please feel free to explore the site, launch will be coming soon.-->
	<!--    </div>-->
	<!--</div>-->
	<div class="container">
	    <nav class="navbar navbar-expand-lg navbar-light">
	    	
				<a class="navbar-brand" href="/">
				<img src="{{$assets_path_public_eli}}images/bidhub.png" alt="">

				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

			<!--========== Collect the nav links, forms, and other content for toggling ==========-->
			<!--<ul class="nav navbar-nav nav-right navbar-right">-->
			<!--	<li>-->
			<!--		<a href="/app/login" class="btn g-btn">-->
			<!--			Login-->
			<!--		</a>-->
			<!--	</li>-->
			<!--	<li>-->
			<!--		<a href="/app/register" class="btn g-btn">-->
			<!--			Try For Free-->
			<!--		</a>-->
			<!--	</li>-->
			<!--</ul>-->
			<div class="collapse navbar-collapse" id="navbarTogglerDemo03">

				<ul class="navbar-nav ml-auto">
					@php

						if (Voyager::translatable($items)) {
						    $items = $items->load('translations');
						}

					@endphp

					@foreach ($items as $item)
                        
                        @if($item->title != 'About Us')
                        
						@php
						
						    

							$originalItem = $item;
							if (Voyager::translatable($item)) {
							    $item = $item->translate($options->locale);
							}

							$isActive = null;
							$styles = null;
							$icon = null;

							// Background Color or Color
							if (isset($options->color) && $options->color == true) {
							    $styles = 'color:'.$item->color;
							}
							if (isset($options->background) && $options->background == true) {
							    $styles = 'background-color:'.$item->color;
							}

							// Check if link is current
							if(url($item->link()) == url()->current()){
							    $isActive = 'active';
							}

							// Set Icon
							if(isset($options->icon) && $options->icon == true){
							    $icon = '<i class="' . $item->icon_class . '"></i>';
							}

						@endphp

						<li class="nav-item {{ $isActive }}">
							<a href="{{ url($item->link()) }}" class="nav-link" target="{{ $item->target }}" style="{{ $styles }}">
								{!! $icon !!}
								<span>{{ $item->title }}</span>
							</a>
							@if(!$originalItem->children->isEmpty())
								@include('voyager::menu.default', ['items' => $originalItem->children, 'options' => $options])
							@endif
						</li>
						
						@endif
						
					@endforeach
					<li><a href="/login" class="btn btn btn-outline-light text-uppercase ml-3">Login</a></li>
                    <li class="ml-md-2"><a href="/register" class="btn btn-theme pl-3 pr-3 text-uppercase">Try for free</a></li>
				
				</ul>
			</div><!-- /.navbar-collapse -->
		
        </nav>
	</div>
	<style>
	
	    .header.fadeInDown .navbar {
	        background-color:white!important;
	    }
	    header .navbar-light .navbar-nav .nav-link {
	        text-transform: uppercase;
	    }
	    .navbar-light .navbar-nav .active>.nav-link, .navbar-light .navbar-nav .nav-link.active, .navbar-light .navbar-nav .nav-link.show, .navbar-light .navbar-nav .show>.nav-link {
    color: #fff;
}



@import url("https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700|Ubuntu:300,400,500,700&display=swap");body{background:#fff;font-family:'Montserrat', sans-serif}p{font-size:15px}.text-blue{color:#517fdb}h1{font-size:4rem;font-weight:300}.bg-red{background:#ff0000}.bg-dark{background:#282828}.btn{border-radius:2rem}.btn-theme{background:#ed9a7c;color:#fff;font-weight:500}.btn-theme:hover{color:#fff;background:#282828}a{position:relative}a .link{padding-top:10px}a .link:before{left:0;bottom:0;width:100%;height:2px;background:#0883a4;-webkit-transform:scaleX(0);transform:scaleX(0)}a .link:hover:before{-webkit-transform:scaleX(1);transform:scaleX(1)}.ptb-5{padding-top:5rem;padding-bottom:5rem}.p-10{padding:5rem !important}.mb-10{margin-bottom:5rem}header{background:#517fdb}header .navbar-light .navbar-nav .nav-link{color:#fff;padding-right:1rem;padding-left:1rem}header nav{color:#fff;font-size:14px}header nav:hover{color:#ff0000}.hb{position:relative}.hb .carousel-caption{left:15%;right:15%;bottom:30%}.hb .carousel-caption p{font-size:16px}.hb .carousel-caption a.link{color:#fff;text-transform:uppercase;font-size:13px;padding:10px}footer{background:#333;color:#fff;padding-top:15px;padding-bottom:15px;font-size:13px}footer a{color:#fff;margin:10px}
	</style>
	
		
	
</header>

@endif
