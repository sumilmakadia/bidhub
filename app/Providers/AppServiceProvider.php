<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider {
	/**
	* Register any application services.
	* @return void
	*/
	public function register(){
		//
	}
					

	/**
	* Bootstrap any application services.
	* @return void
	 */
	public function boot(){
	    View::share('assets_path', asset('public/') . '/');
		View::share('assets_path_public', asset('public/assets/landings/ino'));
		View::share('assets_path_public_bidhub', asset('public/assets/bidhub/') . '/');
		View::share('assets_path_public_eli', asset('public/assets/landings/eli') . '/');
		View::share('assets_path_s3', asset('public/assets/landings/ino'));

		View::share('site_copy_right', 'Copyright © 2019 BidHub Inc. All rights reserved.');
		View::share('site_created_by_url', 'https://bidHub.com');
		View::share('site_domain_name', 'BidHub.com');
		View::share('site_nice_name', 'BidHub.com');
		View::share('site_created_by', 'BidHub.com');

		View::share('sidebar', 'false');
		View::share('preloader', 'true');
		View::share('nav', 'true');
		View::share('content', 'layout_10_mx_auto');
		
		Schema::defaultStringLength(191);
		date_default_timezone_set('America/New_York');
	}
}
