@extends('layouts.app')

@section('content')
	<aside class="left-sidebar">
		<!-- Sidebar scroll-->
		<div class="scroll-sidebar ps ps--theme_default ps--active-y" data-ps-id="c1dab30b-98bc-d610-0a00-437b86ddb638">
			<!-- Sidebar navigation-->
			<nav class="sidebar-nav">
				<ul id="sidebarnav">
					@php
						$array_admin_menu = array(
							array(
								'title' => 'Manage Users',
								'url' => '/admin-dashboard/users'
							),
							array(
								'title' => 'Manage Pages',
								'url' => '/admin-dashboard/pages'
							),
							array(
								'title' => 'Manage Projects',
								'url' => '/projects/admin'
							),
							array(
								'title' => 'Manage Directory',
								'url' => '/admin-dashboard/directory'
							),
							array(
								'title' => 'Manage Help Wanted',
								'url' => '/help-wanted/admin'
							),
							array(
								'title' => 'Manage Property',
								'url' => '/property-for-sale/admin'
							),

							array(
								'title' => 'Manage Market Place',
								'url' => '/market-place/admin'
							),
							array(
								'title' => 'Manage Pricing',
								'url' => '/admin-dashboard/plans'
							),
							array(
								'title' => 'Manage Custom Fields',
								'url' => '/admin-dashboard/custom-fields'
							),
						)

					@endphp
					@foreach($array_admin_menu as $admin_menu)
					<li>
						<a class="waves-effect waves-dark" href="{{ $admin_menu['url']}}" aria-expanded="false">

							<span class="hide-menu">{{ $admin_menu['title'] }}</span>
						</a>
					</li>
					@endforeach


				</ul>
			</nav>
			<!-- End Sidebar navigation -->
			<div class="ps__scrollbar-x-rail" style="left: 0px; bottom: 0px;"><div class="ps__scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__scrollbar-y-rail" style="top: 0px; height: 832px; right: 0px;"><div class="ps__scrollbar-y" tabindex="0" style="top: 0px; height: 397px;"></div></div></div>
		<!-- End Sidebar scroll-->
	</aside>

	<div class="page-wrapper" style="min-height: 149px;">
		<div class="container-fluid">
			<div class="row page-titles">
				<div class="col-md-5 align-self-center">
					<h4 class="text-themecolor">Admin Dashboard</h4>
				</div>
				<div class="col-md-7 align-self-center text-right">
					<div class="d-flex justify-content-end align-items-center">

					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-body">


						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

