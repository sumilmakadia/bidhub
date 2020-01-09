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
					
					@if(Auth::check() == false)
						    
						    @php
							$menus = array(
								array('title'=> 'Directory',            'url' => '/directory'),
					 			
							);
						@endphp
						    
						    @foreach($menus as $menu)
								<li class=" nav-item">
									<a href="{{$menu['url']}}" target="" style="" class="nav-link d-none d-lg-block d-md-block waves-effect waves-dark">
										<span>{{$menu['title']}}</span>
									</a>
								</li>
							@endforeach
						
						@endif
					<li><a href="/login" class="btn btn btn-outline-light text-uppercase ml-3">Login</a></li>
                    <li class="ml-md-2"><a href="/register" class="btn btn-theme pl-3 pr-3 text-uppercase">Try for free</a></li>
				
				</ul>
			</div><!-- /.navbar-collapse -->
		
        </nav>
	</div>
	<style>
	.navbar-nav {
    display: -webkit-inline-box !important;
}
	li.nav-item {
    display: inline-block;
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
	</style>
</header>