<?php

		  /*
		  |--------------------------------------------------------------------------
		  | Web Routes
		  |--------------------------------------------------------------------------
		  |
		  | Here is where you can register web routes for your application. These
		  | routes are loaded by the RouteServiceProvider within a group which
		  | contains the "web" middleware group. Now create something great!
		  |
		  */

		  Route::post('drop_ajax_call', 'builder\drag_and_drop\DragAndDropController@drag_and_drop_ajax');
		  Route::post('actions_ajax_call', 'builder\drag_and_drop\DragAndDropActionsController@drag_and_drop_actions_ajax');
		  /*-------------------------------------------------------------------------
		  |	 Web Routes
		  |--------------------------------------------------------------------------  */

		  Route::get('/', function(){
					if(Auth::check()){
							  return view('pages.loggedin.dashboard.dashboard')->with([
										'preloader' => 'true',
										'nav'       => 'true',
										'sidebar'   => 'false',
										'content'   => 'layout_10_mx_auto'
							  ]);
					}else{
							  return view('pages/guest/main/home');
					}
		  });
		  Route::get('/pricing', function(){
					return view('pages/guest/main/pricing');
		  });
		  Route::get('/contact-us', function(){
					return view('pages/guest/main/contact_us');
		  });
		  Route::get('/about-us', function(){
					return view('pages/guest/main/about_us');
		  });
		  Route::get('/features', function(){
					return view('pages/guest/main/features');
		  });
		  Route::get('/directory ', function(){
					return view('pages.loggedin.dashboard.dashboard_directory')->with([
							  'preloader' => 'true',
							  'nav'       => 'true',
							  'sidebar'   => 'false',
							  'content'   => 'layout_10_mx_auto'
					]);
		  });

		  Route::group(['middleware' => 'guest'], function(){

					Route::get('/register', function(){
							  return view('pages/auth/auth_register');
					})->name('register');

					Route::get('/login', function(){
							  return redirect('/admin/login');
					})->name('login');

					Route::get('/logout', function(){
							  Auth::logout();
							  return redirect('/');
					});

					Route::get('/forgot-password', function(){
							  return view('pages.auth.auth_forgot_password')->with([
										'preloader' => 'true',
										'nav'       => 'true',
										'sidebar'   => 'none',
										'content'   => 'dashboard_left_sidebar'
							  ]);
					});
					Route::get('/terms-and-conditions', function(){
							  return view('pages/guest/main/terms_and_conditions')->with([
										'preloader' => 'true',
										'nav'       => 'true',
										'sidebar'   => 'false',
										'content'   => 'layout_10_mx_auto'
							  ]);
					});
					Route::get('/privacy-policy', function(){
							  return view('pages/guest/main/privacy_policy')->with([
										'preloader' => 'true',
										'nav'       => 'true',
										'sidebar'   => 'false',
										'content'   => 'layout_10_mx_auto'
							  ]);
					});
		  });

		  Route::group(['middleware' => 'auth'], function(){
					Route::get('/dashboard', function(){
							  return view('pages.loggedin.dashboard.dashboard')->with([
										'preloader' => 'true',
										'nav'       => 'true',
										'sidebar'   => 'false',
										'content'   => 'layout_10_mx_auto'
							  ]);
					});
					Route::get('/projects', function(){
							  return view('pages.loggedin.dashboard.dashboard_projects')->with([
										'preloader' => 'true',
										'nav'       => 'true',
										'sidebar'   => 'false',
										'content'   => 'layout_10_mx_auto'
							  ]);
					});
					Route::get('/companies', function(){
							  return view('pages.loggedin.dashboard.dashboard_companies')->with([
										'preloader' => 'true',
										'nav'       => 'true',
										'sidebar'   => 'false',
										'content'   => 'layout_10_mx_auto'
							  ]);
					});
					Route::get('/jobs', function(){
							  return view('pages.loggedin.dashboard.dashboard_jobs')->with([
										'preloader' => 'true',
										'nav'       => 'true',
										'sidebar'   => 'false',
										'content'   => 'layout_10_mx_auto'
							  ]);
					});
					Route::get('/general-contractors', function(){
							  return view('pages.loggedin.dashboard.dashboard_subcontractors')->with([
										'preloader' => 'true',
										'nav'       => 'true',
										'sidebar'   => 'false',
										'content'   => 'layout_10_mx_auto'
							  ]);
					});
					Route::get('/subcontractors', function(){
							  return view('pages.loggedin.dashboard.dashboard_subcontractors')->with([
										'preloader' => 'true',
										'nav'       => 'true',
										'sidebar'   => 'false',
										'content'   => 'layout_10_mx_auto'
							  ]);
					});
					Route::get('/market-place', function(){
							  return view('pages.loggedin.dashboard.dashboard_marketplace')->with([
										'preloader' => 'true',
										'nav'       => 'true',
										'sidebar'   => 'false',
										'content'   => 'layout_10_mx_auto'
							  ]);
					});
					Route::get('/land-for-sale', function(){
							  return view('pages.loggedin.dashboard.dashboard_land_for_sale')->with([
										'preloader' => 'true',
										'nav'       => 'true',
										'sidebar'   => 'false',
										'content'   => 'layout_10_mx_auto'
							  ]);
					});
					Route::get('/calendar', function(){
							  return view('pages.loggedin.dashboard.dashboard_calendar')->with([
										'preloader' => 'true',
										'nav'       => 'true',
										'sidebar'   => 'false',
										'content'   => 'layout_10_mx_auto'
							  ]);
					});
					Route::get('/budget-planner', function(){
							  return view('pages.loggedin.dashboard.dashboard_budget_planner')->with([
										'preloader' => 'true',
										'nav'       => 'true',
										'sidebar'   => 'false',
										'content'   => 'layout_10_mx_auto'
							  ]);
					});
					Route::get('/tutorials', function(){
							  return view('pages.loggedin.dashboard.dashboard_tutorials')->with([
										'preloader' => 'true',
										'nav'       => 'true',
										'sidebar'   => 'false',
										'content'   => 'layout_10_mx_auto'
							  ]);
					});

					Route::get('/profile/view/', function(){
							  return view('pages.loggedin.dashboard.dashboard_profile')->with([
										'preloader' => 'true',
										'nav'       => 'true',
										'sidebar'   => 'false',
										'content'   => 'layout_10_mx_auto'
							  ]);
					});
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// CATEGORY PAGES
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					Route::get('/account', function(){
							  return view('pages.loggedin.account.account')->with([
										'preloader' => 'true',
										'nav'       => 'true',
										'sidebar'   => 'false',
										'content'   => 'layout_10_mx_auto'
							  ]);
					});
					Route::get('/account/membership', function(){
							  return view('pages.loggedin.account.account_membership')->with([
										'preloader' => 'true',
										'nav'       => 'true',
										'sidebar'   => 'false',
										'content'   => 'layout_10_mx_auto'
							  ]);
					});
					Route::get('/account/notifications', function(){
							  return view('pages.loggedin.account.account_notifications')->with([
										'preloader' => 'true',
										'nav'       => 'true',
										'sidebar'   => 'false',
										'content'   => 'layout_10_mx_auto'
							  ]);
					});
					Route::get('/account/referrals', function(){
							  return view('pages.loggedin.account.account_referrals')->with([
										'preloader' => 'true',
										'nav'       => 'true',
										'sidebar'   => 'false',
										'content'   => 'layout_10_mx_auto'
							  ]);
					});

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// CATEGORY PAGES
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

					Route::get('/market-place/automotive', function(){
							  return view('pages.loggedout.category_automotive')->with([
										'preloader' => 'true',
										'nav'       => 'true',
										'sidebar'   => 'false',
										'content'   => 'layout_10_mx_auto'
							  ]);
					});
					Route::get('/market-place/baby-and-kids', function(){
							  return view('pages.loggedout.category_baby_kids')->with([
										'preloader' => 'true',
										'nav'       => 'true',
										'sidebar'   => 'false',
										'content'   => 'layout_10_mx_auto'
							  ]);
					});
					Route::get('/market-place/beauty	', function(){
							  return view('pages.loggedout.category_beauty')->with([
										'preloader' => 'true',
										'nav'       => 'true',
										'sidebar'   => 'false',
										'content'   => 'layout_10_mx_auto'
							  ]);
					});
					Route::get('/market-place/food-and-drink', function(){
							  return view('pages.loggedout.category_food_drink')->with([
										'preloader' => 'true',
										'nav'       => 'true',
										'sidebar'   => 'false',
										'content'   => 'layout_10_mx_auto'
							  ]);
					});
					Route::get('/market-place/footwear-accessories', function(){
							  return view('pages.loggedout.category_footwear_accessories')->with([
										'preloader' => 'true',
										'nav'       => 'true',
										'sidebar'   => 'false',
										'content'   => 'layout_10_mx_auto'
							  ]);
					});
					Route::get('/market-place/health-wellness', function(){
							  return view('pages.loggedout.category_health_wellness')->with([
										'preloader' => 'true',
										'nav'       => 'true',
										'sidebar'   => 'false',
										'content'   => 'layout_10_mx_auto'
							  ]);
					});
					Route::get('/market-place/home-and-improvement', function(){
							  return view('pages.loggedout.category_home_and_improvement')->with([
										'preloader' => 'true',
										'nav'       => 'true',
										'sidebar'   => 'false',
										'content'   => 'layout_10_mx_auto'
							  ]);
					});
					Route::get('/market-place/home-decor', function(){
							  return view('pages.loggedout.category_home_decor')->with([
										'preloader' => 'true',
										'nav'       => 'true',
										'sidebar'   => 'false',
										'content'   => 'layout_10_mx_auto'
							  ]);
					});
					Route::get('/market-place/outdoor-and-hunting', function(){
							  return view('pages.loggedout.category_outdoor_and_hunting')->with([
										'preloader' => 'true',
										'nav'       => 'true',
										'sidebar'   => 'false',
										'content'   => 'layout_10_mx_auto'
							  ]);
					});
					Route::get('/market-place/pets', function(){
							  return view('pages.loggedout.category_pets')->with([
										'preloader' => 'true',
										'nav'       => 'true',
										'sidebar'   => 'false',
										'content'   => 'layout_10_mx_auto'
							  ]);
					});
					Route::get('/market-place/sports-and-collectibles', function(){
							  return view('pages.loggedout.category_sports_collectibles')->with([
										'preloader' => 'true',
										'nav'       => 'true',
										'sidebar'   => 'false',
										'content'   => 'layout_10_mx_auto'
							  ]);
					});
		  });

		  Route::group(['prefix' => 'admin'], function(){
					Voyager::routes();
		  });