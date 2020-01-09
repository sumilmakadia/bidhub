<!DOCTYPE html>
<html lang="en">
<head>
	@include('themes.elite.parts.head')
	<style>
	body {
    font-family: raleway!important;
}
</style>
</head>
<body class="skin-blue fix-header @if($sidebar == 'false') single-column  @endif @if($sidebar == 'true') fix-sidebar  @endif card-no-border ">
@if($preloader == true)
	<div class="preloader">
		<div class="loader">
			<div class="loader__figure"></div>
			<p class="loader__label">@yield('title')</p>
		</div>
	</div>
@endif
<div id="main-wrapper">
	@if($nav == 'true')
		{{	Menu('main_menu_left_loggedin','themes.elite.parts.navigation')}}
		{{--		{{	Menu('main_menu_right_loggedin','themes.elite.parts.navigation_right')}}--}}
	@endif
	@if($sidebar == 'true')
		@include('themes.elite.parts.sidebar')
	@endif
	@if($content == 'dashboard_left_sidebar')
		@include('themes.elite.layouts.dashboard_left_sidebar')
	@endif
	@if($content == 'layout_10_mx_auto')
		@include('themes.elite.layouts.layout_10_mx_auto')
	@endif
	@if($content == 'layout_8_mx_auto')
		@include('themes.elite.layouts.layout_6_mx_auto')
	@endif
	@if($content == 'layout_6_mx_auto')
		@include('themes.elite.layouts.layout_6_mx_auto')
	@endif
	@if($content == 'layout_4_mx_auto')
		@include('themes.elite.layouts.layout_6_mx_auto')
	@endif


	@include('modals/directory/modal_edit')



	@include('themes.elite.parts.footer')
</div>
</body>
</html>
