<div class="side-menu sidebar-inverse">
    <nav class="navbar navbar-default" role="navigation">
        <div class="side-menu-container">
	  <div class="navbar-header">
          <a class="navbar-brand" href="index.html">
              <!-- Logo icon --><b>
                  <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                  <!-- Dark Logo icon -->
{{--                  <img src="{{ asset('assets/images/logo-icon.png') }}" alt="homepage" class="dark-logo">--}}
                  <!-- Light Logo icon -->
{{--                  <img src="{{ asset('assets/images/logo-light-icon.png') }}" alt="homepage" class="light-logo">--}}
              </b>
              <!--End Logo icon -->
              <!-- Logo text --><span>
                 <!-- dark Logo text -->
                 <img src="{{ asset('assets/images/logo-text.png') }}" alt="homepage" class="dark-logo">
                  <!-- Light Logo text -->
                 <img src="{{ asset('assets/images/logo-light-text.png') }}" class="light-logo" alt="homepage"></span> </a>
	  </div><!-- .navbar-header -->

	  <div class="panel widget center bgimage"
	       style="background-image:url({{ Voyager::image( Voyager::setting('admin.bg_image'), voyager_asset('images/bg.jpg') ) }}); background-size: cover; background-position: 0px;">
	      <div class="dimmer"></div>
	      <div class="panel-content">
{{--		<img src="{{ $user_avatar }}" class="avatar" alt="{{ app('VoyagerAuth')->user()->name }} avatar">--}}
		<h4>{{ ucwords(app('VoyagerAuth')->user()->name) }}</h4>
		<p>{{ app('VoyagerAuth')->user()->email }}</p>

		<a href="{{ route('voyager.profile') }}" class="btn btn-primary">{{ __('voyager::generic.profile') }}</a>
		<div style="clear:both"></div>
	      </div>
	  </div>

        </div>
        <div id="adminmenu">
	  <admin-menu :items="{{ menu('admin', '_json') }}"></admin-menu>
        </div>
    </nav>
</div>
