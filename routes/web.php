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

		  /*-------------------------------------------------------------------------
		  |	 Web Routes
		  |--------------------------------------------------------------------------  */

		  //Debugbar::info('router fired');
		  //Debugbar::addMessage('Another message', 'mylabel');
		  Route::get('/password/reset', 'Auth\AccountController@index');
		  Route::post('/contact-send', 'Crest\PagesController@sendContact');
		  
		  
		  Auth::routes();
		  
		  Route::get('/serverSide', [
                'as'   => 'serverSide',
                'uses' => function () {
                    $users = App\Models\Crest\project::all();
                    return DataTables::of($users)->make();
                }
            ])->name('serverSide');;
		  
		  Route::get('/', function(){
					if(Auth::check()){
							  return redirect()->route('project-room.project.public');
					}else{
							  return view('pages/guest/home');
					}
		  });

		  Route::get('/pricing', 'Admin\Membership\YbrMembership2PlansController@pricing');
		  
		  Route::post('/password/reset/email', 'Auth\AccountController@sendEmail');
		  
		  Route::get('/test','Crest\DirectoriesController@test');
		  
		  
								  
					
		  Route::post('/checkout/purchase', 'Admin\Membership\PurchaseController@purchase');
		  Route::post('/subscription/cancel', 'Admin\Membership\PurchaseController@cancel');

		  Route::get('/contact-us', function(){
					return view('pages/guest/contact_us');
		  });
		  Route::get('/about-us', function(){
					return view('pages/guest/about_us');
		  });
		  
		
		  
		  Route::get('/membership', 'Admin\Membership\YbrMembership2PlansController@advertisement');
		  
		  Route::get('/how-it-work', function(){
					return view('pages/guest/how_it_work');
		  });
		  
		  
		  Route::get('/features', function(){
					return view('pages/guest/features');
		  });
		  Route::group(['middleware' => 'guest'], function(){

					Route::get('/register', function(){
							  return view('pages/auth/auth_register');
					})->name('register');

					Route::get('/login', function(){
							  return redirect('/admin/login');
					})->name('login');

					Route::get('/forgot-password', function(){
							  return view('pages.auth.auth_forgot_password')->with([
																							 'preloader' => 'true',
																							 'nav'       => 'true',
																							 'sidebar'   => 'none',
																							 'content'   => 'dashboard_left_sidebar'
																				   ]);
					});
					Route::get('/terms-and-conditions', function(){
							  return view('pages/guest/terms_and_conditions')->with([
																							  'preloader' => 'true',
																							  'nav'       => 'true',
																							  'sidebar'   => 'false',
																							  'content'   => 'layout_10_mx_auto'
																					]);
					});
					Route::get('/privacy-policy', function(){
							  return view('pages/guest/privacy_policy')->with([
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


		  Route::group(['middleware' => 'auth'], function(){
					Route::get('/logout', function(){
							  Auth::logout();

							  return redirect('/');
					});
                    
                    Route::get('/checkout', 'Admin\Membership\PurchaseController@checkout');
                    
					Route::get('profiles/create', 'Crest\ProfilesController@create')
						 ->name('profiles.profile.create');

					Route::post('profiles/manage', 'Crest\ProfilesController@store')
						 ->name('profiles.profile.store');

		  });

    Route::get('/directory', 'Crest\DirectoriesController@public')->name('directory.directories.public');
     Route::match(['get', 'post'], '/directory/search', 'SearchController@directory')->name('directory.directories.search');
     Route::get('/profiles/show/{profile}', 'Crest\ProfilesController@show')->name('profiles.profile.show');
     Route::post('/equipment-for-sale/search', 'SearchController@equipment')->name('equipment-for-sale.property.search');
	 Route::get('/equipment-for-sale', 'Crest\EquipmentsController@public')->name('equipment-for-sale.property.public');
	  Route::get('/equipment-for-sale/show/{property}', 'Crest\EquipmentsController@show')->name('equipment-for-sale.property.show')->where('id', '[0-9]+');
    Route::get('/help-wanted', 'Crest\HelpsController@public')->name('help-wanted.help.public');
	Route::post('/help-wanted/search', 'SearchController@help')->name('help-wanted.help.search');
	Route::get('/help-wanted/show/{help}', 'Crest\HelpsController@show')->name('help-wanted.help.show');
	Route::get('/project-room', 'Crest\ProjectsController@public')->name('project-room.project.public');
	Route::get('/property-for-sale', 'Crest\PropertiesController@public')->name('property-for-sale.property.public');
	Route::post('/property-for-sale/search', 'SearchController@property')->name('property-for-sale.property.search');
	Route::get('/show/{property}', 'Crest\PropertiesController@show')->name('property-for-sale.property.show')->where('id', '[0-9]+');
								   
		  Route::group(['middleware' => ['auth', 'profile']], function(){

					Route::group(['prefix'	=> 'account'], function() {
							  Route::get('/', 'Auth\AccountController@index')
							  	->name('account.index');
							  Route::post('/email_change', 'Auth\AccountController@changeEmail')
								   ->name('account.email');
							  Route::post('/change_password', 'Auth\AccountController@changePassword')
								   ->name('account.change_password');
							  Route::post('/email-settings','Auth\AccountController@emailSettings')
							  ->name('account.email_settings');
					});

					Route::group(['prefix' => 'calendar'], function(){
							  Route::get('/', 'Crest\CalendarController@index');
							  Route::get('/admin', 'Crest\CalendarController@admin')->name('calendar.admin');
							  Route::get('/show/{id}', 'Crest\CalendarController@show')->name('calendar.show');
							  Route::post('/event', 'Crest\CalendarController@event')->name('calendar.event');
							  Route::get('/delete/{id}', 'Crest\CalendarController@delete')->name('calendar.delete');
					});

					Route::group([
										   'prefix' => 'directory',
								 ], function(){
							  Route::get('/admin', 'Crest\DirectoriesController@admin')
								   ->name('directory.directories.admin');
							  Route::get('/free-admin', 'Crest\DirectoriesController@freeAdmin')
								   ->name('directory.free-directories.admin');	   
							  Route::get('/map', 'Crest\DirectoriesController@map')
								   ->name('directory.directories.map');
							 /* Route::get('/', 'Crest\DirectoriesController@public')
								   ->name('directory.directories.public');*/
							  Route::get('/manage', 'Crest\DirectoriesController@index')
								   ->name('directory.directories.index');
							  Route::get('/create', 'Crest\DirectoriesController@create')
								   ->name('directory.directories.create');
							  Route::get('/free-create', 'Crest\DirectoriesController@freeCreate')
								   ->name('directory.free-directories.create');  	   
							  Route::get('/show/{directories}', 'Crest\DirectoriesController@show')
								   ->name('directory.directories.show');
							  Route::get('/{directories}/edit', 'Crest\DirectoriesController@edit')
								   ->name('directory.directories.edit');
							  Route::post('/manage', 'Crest\DirectoriesController@store')
								   ->name('directory.directories.store');
							 // Route::post('/search', 'SearchController@directory')
								//   ->name('directory.directories.search');
							  Route::put('directories/{directories}', 'Crest\DirectoriesController@update')
								   ->name('directory.directories.update');
							  Route::delete('/directories/{directories}', 'Crest\DirectoriesController@destroy')
								   ->name('directory.directories.destroy');
							  Route::delete('/free-directories/{directories}', 'Crest\DirectoriesController@freeDestroy')
								   ->name('directory.free-directories.destroy');
							  Route::post('/free-directories/sync-trades', 'Crest\DirectoriesController@syncTrades')
								   ->name('directory.free-directories.sync-trades');	   
							  Route::post('/claim', 'Crest\DirectoriesController@claim')
								   ->name('directory.directories.claim');
							  Route::post('admin/bulk','Crest\DirectoriesController@bulk')
						        ->name('directory.directories.bulk');   
							  Route::post('/approve', 'Crest\DirectoriesController@approve')
								   ->name('directory.directories.approve');
							  Route::get('/importExport', 'Crest\DirectoriesController@importExport')->name('directory.free-directories.excel'); 
                              Route::get('/downloadExcel/{type}', 'Crest\DirectoriesController@downloadExcel');
                              Route::post('/importExcel', 'Crest\DirectoriesController@importExcel');
                             
                        });

					Route::group([
										   'prefix' => 'budget-planner',
								 ], function(){
							  Route::get('/admin', 'Crest\BudgetsController@admin')
								   ->name('budgets.budget.admin');
							  Route::get('/', 'Crest\BudgetsController@index')
								   ->name('budgets.budget.index');
							  Route::get('/create', 'Crest\BudgetsController@create')
								   ->name('budgets.budget.create');
							  Route::get('/show/{budget}', 'Crest\BudgetsController@show')
								   ->name('budgets.budget.show');
							  Route::get('/{budget}/edit', 'Crest\BudgetsController@edit')
								   ->name('budgets.budget.edit');
							  Route::post('/store/{id}', 'Crest\BudgetsController@store')
								   ->name('budgets.budget.store');
							  Route::post('/budget/{id}', 'Crest\BudgetsController@update')
								   ->name('budgets.budget.update');
							  Route::delete('/budget/{budget}', 'Crest\BudgetsController@destroy')
								   ->name('budgets.budget.destroy');
					});

					Route::group([
										   'prefix' => 'favorites',
								 ], function(){
							  Route::get('/manage', 'Crest\FavoritesController@index')
								   ->name('favorites.favorite.index');
							  Route::get('/favorite', 'Crest\FavoritesController@favorite')
								  ->name('favorites.favorite.favorite');
							  Route::get('/show/{favorite}', 'Crest\FavoritesController@show')
								   ->name('favorites.favorite.show')->where('id', '[0-9]+');
							  Route::get('/{favorite}/edit', 'Crest\FavoritesController@edit')
								   ->name('favorites.favorite.edit')->where('id', '[0-9]+');
							  Route::post('/manage', 'Crest\FavoritesController@store')
								   ->name('favorites.favorite.store');
							  Route::post('/favorite', 'Crest\FavoritesController@favorite')
								   ->name('favorites.favorite.favorite');	   
							  Route::put('favorite/{favorite}', 'Crest\FavoritesController@update')
								   ->name('favorites.favorite.update')->where('id', '[0-9]+');
							  Route::delete('/favorite/{favorite}', 'Crest\FavoritesController@destroy')
								   ->name('favorites.favorite.destroy')->where('id', '[0-9]+');
					});

					Route::group([
										   'prefix' => 'help-wanted',
								 ], function(){
								     
							  
							  Route::get('/admin', 'Crest\HelpsController@admin')
								   ->name('help-wanted.help.admin');
							  Route::get('/manage', 'Crest\HelpsController@index')
								   ->name('help-wanted.help.index');
							  Route::get('/create', 'Crest\HelpsController@create')
								   ->name('help-wanted.help.create');
							  
							  Route::get('/{help}/edit', 'Crest\HelpsController@edit')
								   ->name('help-wanted.help.edit');
							  Route::post('/manage', 'Crest\HelpsController@store')
								   ->name('help-wanted.help.store');
							 
							  Route::post('remove-file', 'Crest\HelpsController@removeFile')
								   ->name('help-wanted.help.remove-file');	   
							  Route::put('help/{help}', 'Crest\HelpsController@update')
								   ->name('help-wanted.help.update');
							  Route::delete('/help/{help}', 'Crest\HelpsController@destroy')
								   ->name('help-wanted.help.destroy');
							    Route::post('/admin/bulk','Crest\HelpsController@bulk')
						    ->name('help-wanted.help.bulk');	   
					});

					Route::group([
										   'prefix' => 'market-place',
								 ], function(){
							  Route::get('/admin', 'Crest\MarketplacesController@admin')
								   ->name('market-place.marketplace.admin');
							 /* Route::get('/categories', 'Crest\MarketplacesController@category')
								   ->name('market-place.marketplace.categories');
							  Route::get('/create-category', 'Crest\MarketplacesController@createCategory')
								   ->name('market-place.marketplace.create-category');
							  Route::get('/{marketplace}/edit-category', 'Crest\MarketplacesController@editCategory')
								   ->name('market-place.marketplace.edit-category');	   
							  Route::get('/', 'Crest\MarketplacesController@public')
								   ->name('market-place.marketplace.public');
							  Route::get('/manage', 'Crest\MarketplacesController@index')
								   ->name('market-place.marketplace.index');
							  Route::get('/create', 'Crest\MarketplacesController@create')
								   ->name('market-place.marketplace.create');
							  Route::get('/show/{marketplace}', 'Crest\MarketplacesController@show')
								   ->name('market-place.marketplace.show');
							  Route::get('/{marketplace}/edit', 'Crest\MarketplacesController@edit')
								   ->name('market-place.marketplace.edit');
							  Route::post('/manage', 'Crest\MarketplacesController@store')
								   ->name('market-place.marketplace.store');
							  Route::post('/manage-category', 'Crest\MarketplacesController@storeCategory')
								   ->name('market-place.marketplace.store-category');	   
							  Route::put('marketplace/{marketplace}', 'Crest\MarketplacesController@update')
								   ->name('market-place.marketplace.update');
							  Route::put('marketplace-category/{marketplace}', 'Crest\MarketplacesController@updateCategory')
								   ->name('market-place.marketplace.update-category');	   
							  Route::delete('/marketplace/{marketplace}', 'Crest\MarketplacesController@destroy')
								   ->name('market-place.marketplace.destroy');
							  Route::delete('/marketplace-category/{marketplace}', 'Crest\MarketplacesController@destroyCategory')
								   ->name('market-place.marketplace.destroy-category');
							 // Route::post('/search', 'SearchController@marketplace')
								//   ->name('market-place.marketplace.search');
							 Route::match(['get', 'post'], '/search', 'SearchController@marketplace')->name('market-place.marketplace.search');
							 Route::post('/admin/bulk','Crest\MarketplacesController@bulk')
						        ->name('market-place.marketplace.bulk');*/
					});


					Route::group([
										   'prefix' => 'projects',
								 ], function(){
							  Route::get('/admin', 'Crest\ProjectsController@admin')
								   ->name('projects.project.admin');
							  Route::post('/admin/bulk','Crest\ProjectsController@bulk')
						    ->name('projects.project.bulk');  	   
							  Route::get('/', 'Crest\ProjectsController@public')
								   ->name('projects.project.public');
							  Route::get('/manage', 'Crest\ProjectsController@index')
								   ->name('projects.project.index');
							  Route::get('/create', 'Crest\ProjectsController@create')
								   ->name('projects.project.create');
							  Route::get('/show/{project}', 'Crest\ProjectsController@show')
								   ->name('projects.project.show');
							  Route::get('/map', 'Crest\ProjectsController@map')
								   ->name('projects.project.map');
							  Route::get('/{project}/edit', 'Crest\ProjectsController@edit')
								   ->name('projects.project.edit');
							  Route::post('/manage', 'Crest\ProjectsController@store')
								   ->name('projects.project.store');
							  Route::post('/search', 'SearchController@project')
								   ->name('projects.project.search');
							  Route::put('project/{project}', 'Crest\ProjectsController@update')
								   ->name('projects.project.update');
							  Route::delete('/project/{project}', 'Crest\ProjectsController@destroy')
								   ->name('projects.project.destroy');
					});
					
					

					Route::group([
										   'prefix' => 'property-for-sale',
								 ], function(){
							  Route::get('/admin', 'Crest\PropertiesController@admin')
								   ->name('property-for-sale.property.admin');
							  Route::get('/manage', 'Crest\PropertiesController@index')
								   ->name('property-for-sale.property.index');
							  Route::get('/create', 'Crest\PropertiesController@create')
								   ->name('property-for-sale.property.create');
							  
							  Route::get('/{property}/edit', 'Crest\PropertiesController@edit')
								   ->name('property-for-sale.property.edit')->where('id', '[0-9]+');
							  Route::post('/manage', 'Crest\PropertiesController@store')
								   ->name('property-for-sale.property.store');
							  Route::post('remove-file', 'Crest\PropertiesController@removeFile')
								   ->name('property-for-sale.property.remove-file');
							   Route::post('remove-galery', 'Crest\PropertiesController@removeGalery')
								   ->name('property-for-sale.property.remove-galery'); 	   
							  Route::put('property/{property}', 'Crest\PropertiesController@update')
								   ->name('property-for-sale.property.update')->where('id', '[0-9]+');
							  Route::delete('/property/{property}', 'Crest\PropertiesController@destroy')
								   ->name('property-for-sale.property.destroy')->where('id', '[0-9]+');
							    Route::post('/admin/bulk','Crest\PropertiesController@bulk')
						        ->name('property-for-sale.property.bulk');	 
					});
					
					
					
							Route::group([
										   'prefix' => 'equipment-for-sale',
								 ], function(){
							  Route::get('/admin', 'Crest\EquipmentsController@admin')
								   ->name('equipment-for-sale.property.admin');
							  
							  Route::get('/manage', 'Crest\EquipmentsController@index')
								   ->name('equipment-for-sale.property.index');
							  Route::get('/create', 'Crest\EquipmentsController@create')
								   ->name('equipment-for-sale.property.create');
							 
							  Route::get('/{equipment}/edit', 'Crest\EquipmentsController@edit')
								   ->name('equipment-for-sale.property.edit')->where('id', '[0-9]+');
							  Route::post('/manage', 'Crest\EquipmentsController@store')
								   ->name('equipment-for-sale.property.store');
							  Route::post('remove-file', 'Crest\EquipmentsController@removeFile')
								   ->name('equipment-for-sale.property.remove-file');
							   Route::post('remove-galery', 'Crest\EquipmentsController@removeGalery')
								   ->name('equipment-for-sale.property.remove-galery'); 	   
							  Route::put('equipment/{property}', 'Crest\EquipmentsController@update')
								   ->name('equipment-for-sale.property.update')->where('id', '[0-9]+');
							  Route::delete('/equipment/{property}', 'Crest\EquipmentsController@destroy')
								   ->name('equipment-for-sale.property.destroy')->where('id', '[0-9]+');
							    Route::post('/admin/bulk','Crest\EquipmentsController@bulk')
						        ->name('equipment-for-sale.property.bulk');	   
					});




					Route::group([
										   'prefix' => 'files',
								 ], function(){
							  Route::get('/', 'Crest\FilesController@index')
								   ->name('files.file.index');
							  Route::get('/create', 'Crest\FilesController@create')
								   ->name('files.file.create');
							  Route::get('/show/{file}', 'Crest\FilesController@show')
								   ->name('files.file.show');
							  Route::get('/{file}/edit', 'Crest\FilesController@edit')
								   ->name('files.file.edit');
							  Route::post('/', 'Crest\FilesController@store')
								   ->name('files.file.store');
							  Route::put('file/{file}', 'Crest\FilesController@update')
								   ->name('files.file.update');
							  Route::delete('/file/{file}', 'Crest\FilesController@destroy')
								   ->name('files.file.destroy');
					});





					Route::group([
										   'prefix' => 'project-room',
								 ], function(){
							  Route::get('/admin', 'Crest\ProjectsController@admin')
								   ->name('project-room.project.admin');
							  Route::get('/manage', 'Crest\ProjectsController@index')
								   ->name('project-room.project.index');
							  Route::get('/create', 'Crest\ProjectsController@create')
								   ->name('project-room.project.create');
							  Route::get('/show/{project}', 'Crest\ProjectsController@show')
								   ->name('project-room.project.show');
							  Route::get('/{project}/edit', 'Crest\ProjectsController@edit')
								   ->name('project-room.project.edit');
							  Route::post('/', 'Crest\ProjectsController@store')
								   ->name('project-room.project.store');
							  Route::post('remove-file', 'Crest\ProjectsController@removeFile')
								   ->name('project-room.project.remove-file');  
							  Route::get('download-all/{project}','Crest\ProjectsController@downloadAllFiles')
							       ->name('project-room.project.download-all');
							  Route::put('project/{project}', 'Crest\ProjectsController@update')
								   ->name('project-room.project.update');
							  Route::delete('/project/{project}', 'Crest\ProjectsController@destroy')
								   ->name('project-room.project.destroy');
					});

					Route::group([
										   'prefix' => 'proposals',
								 ], function(){
							  Route::get('/', 'Crest\ProposalsController@index')
								   ->name('proposals.proposal.index');
							  Route::get('/admin', 'Crest\ProposalsController@admin')
								   ->name('proposals.proposal.admin');
							  Route::get('/create/{id}', 'Crest\ProposalsController@create')
								   ->name('proposals.proposal.create');
							  Route::get('/show/{proposal}', 'Crest\ProposalsController@show')
								   ->name('proposals.proposal.show');
							  Route::get('/{proposal}/edit', 'Crest\ProposalsController@edit')
								   ->name('proposals.proposal.edit');
							  Route::post('/', 'Crest\ProposalsController@store')
								   ->name('proposals.proposal.store');
							  Route::put('proposal/{proposal}', 'Crest\ProposalsController@update')
								   ->name('proposals.proposal.update');
							  Route::delete('/proposal/{proposal}', 'Crest\ProposalsController@destroy')
								   ->name('proposals.proposal.destroy');
							  Route::get('/decline/{id}', 'Crest\ProposalsController@decline')
								   ->name('proposals.proposal.decline');
							  Route::post('remove-file', 'Crest\ProposalsController@removeFile')
								   ->name('proposals.proposal.remove-file');	   
					});


					Route::group([
										   'prefix' => 'profiles',
								 ], function(){
							  
							  Route::get('/viewer/{viewer}', 'Crest\ProfilesController@viewer')->name('profiles.profile.viewer');
							  Route::get('/admin', 'Crest\ProfilesController@admin')
								   ->name('profiles.profile.admin');
							  Route::get('/admin/create', 'Crest\ProfilesController@createUser')
								  ->name('profiles.profile.create_user');
							  Route::post('/admin/create', 'Crest\ProfilesController@saveUser')
								   ->name('profiles.profile.save_user');
							  Route::get('/contractors', 'Crest\ProfilesController@contractor')
								   ->name('profiles.profile.contractor');
							  Route::get('/advertisers', 'Crest\ProfilesController@advertiser')
								   ->name('profiles.profile.advertiser');
							  Route::get('/', 'Crest\ProfilesController@general')
								   ->name('profiles.profile.general');
							  Route::get('/manage', 'Crest\ProfilesController@index')
								   ->name('profiles.profile.index');
								   
							  	   
							 
							  Route::get('/edit/{profile}', 'Crest\ProfilesController@edit')
								   ->name('profiles.profile.edit');
							  Route::post('/search', 'SearchController@profile')
								   ->name('profiles.profile.search');
							  Route::post('/profile/{profile}', 'Crest\ProfilesController@update')
								   ->name('profiles.profile.update');
							  Route::delete('/profile/{profile}', 'Crest\ProfilesController@destroy')
								   ->name('profiles.profile.destroy');
							Route::post('admin/bulk','Crest\ProfilesController@bulk')
						    ->name('profiles.profile.bulk');
						    
					});


					Route::group([
										   'prefix' => 'budget-items',
								 ], function () {

							  Route::get('/', 'Crest\BudgetItemsController@index')
								   ->name('budget-items.budget_item.index');
							  Route::get('/create','Crest\BudgetItemsController@create')
								   ->name('budget-items.budget_item.create');
							  Route::get('/show/{budgetItem}','Crest\BudgetItemsController@show')
								   ->name('budget-items.budget_item.show');
							  Route::get('/{budgetItem}/edit','Crest\BudgetItemsController@edit')
								   ->name('budget-items.budget_item.edit');
							  Route::post('/', 'Crest\BudgetItemsController@store')
								   ->name('budget-items.budget_item.store');
							  Route::put('budget_item/{budgetItem}', 'Crest\BudgetItemsController@update')
								   ->name('budget-items.budget_item.update');
							  Route::delete('/budget_item/{budgetItem}','Crest\BudgetItemsController@destroy')
								   ->name('budget-items.budget_item.destroy');
					});

					Route::group([
										   'prefix' => 'chat-rooms',
								 ], function () {
							  Route::get('/', 'Crest\ChatroomsController@table')
								   ->name('chat-rooms.chatroom.table');
							  Route::get('/create/{project_id}/{proposal_id}/{project_owner}','Crest\ChatroomsController@create')
								   ->name('chat-rooms.chatroom.create');
							  Route::get('/{id}', 'Crest\ChatroomsController@index')
								   ->name('chat-rooms.chatroom.index');
							  Route::get('/create-new','Crest\ChatroomsController@createNew')
								   ->name('chat-rooms.chatroom.create-new');	   
							  Route::get('/show/{chatroom}','Crest\ChatroomsController@show')
								   ->name('chat-rooms.chatroom.show');
							  Route::get('/{chatroom}/edit','Crest\ChatroomsController@edit')
								   ->name('chat-rooms.chatroom.edit');
							  Route::post('/', 'Crest\ChatroomsController@store')
								   ->name('chat-rooms.chatroom.store');
							    Route::post('/refresh', 'Crest\ChatroomsController@refresh')
								   ->name('chat-rooms.chatroom.refresh');	   
							  Route::put('chatroom/{chatroom}', 'Crest\ChatroomsController@update')
								   ->name('chat-rooms.chatroom.update');
							  Route::delete('/chatroom/{chatroom}','Crest\ChatroomsController@destroy')
								   ->name('chat-rooms.chatroom.destroy');
					});
					
					Route::group([
										   'prefix' => 'chat-rooms-new',
								 ], function () {
							  Route::get('/create-new','Crest\ChatroomsController@createNew')
								   ->name('chat-rooms.chatroom.create-new');
					});

					Route::group([
										   'prefix' => 'chatroom-messages',
								 ], function () {
							  Route::get('/', 'Crest\ChatroomMessagesController@index')
								   ->name('chatroom-messages.chatroom_message.index');
							  Route::get('/create','Crest\ChatroomMessagesController@create')
								   ->name('chatroom-messages.chatroom_message.create');
							  Route::get('/show/{chatroomMessage}','Crest\ChatroomMessagesController@show')
								   ->name('chatroom-messages.chatroom_message.show');
							  Route::get('/{chatroomMessage}/edit','Crest\ChatroomMessagesController@edit')
								   ->name('chatroom-messages.chatroom_message.edit');
							  Route::post('/', 'Crest\ChatroomMessagesController@store')
								   ->name('chatroom-messages.chatroom_message.store');
							  Route::put('chatroom_message/{chatroomMessage}', 'Crest\ChatroomMessagesController@update')
								   ->name('chatroom-messages.chatroom_message.update');
							  Route::delete('/chatroom_message/{chatroomMessage}','Crest\ChatroomMessagesController@destroy')
								   ->name('chatroom-messages.chatroom_message.destroy');
					});

					Route::group([
										   'prefix' => 'chatroom-messages-files',
								 ], function () {
							  Route::get('/', 'Crest\ChatroomMessagesFilesController@index')
								   ->name('chatroom-messages-files.chatroom_messages_file.index');
							  Route::get('/create','Crest\ChatroomMessagesFilesController@create')
								   ->name('chatroom-messages-files.chatroom_messages_file.create');
							  Route::get('/show/{chatroomMessagesFile}','Crest\ChatroomMessagesFilesController@show')
								   ->name('chatroom-messages-files.chatroom_messages_file.show');
							  Route::get('/{chatroomMessagesFile}/edit','Crest\ChatroomMessagesFilesController@edit')
								   ->name('chatroom-messages-files.chatroom_messages_file.edit');
							  Route::post('/', 'Crest\ChatroomMessagesFilesController@store')
								   ->name('chatroom-messages-files.chatroom_messages_file.store');
							  Route::put('chatroom_messages_file/{chatroomMessagesFile}', 'Crest\ChatroomMessagesFilesController@update')
								   ->name('chatroom-messages-files.chatroom_messages_file.update');
							  Route::delete('/chatroom_messages_file/{chatroomMessagesFile}','Crest\ChatroomMessagesFilesController@destroy')
								   ->name('chatroom-messages-files.chatroom_messages_file.destroy');
					});

					Route::group([
										   'prefix' => 'portfolios',
								 ], function () {
							  Route::get('/', 'Crest\PortfoliosController@index')->name('portfolios.portfolio.index');
							  Route::get('/create','Crest\PortfoliosController@create')->name('portfolios.portfolio.create');
							  Route::get('/show/{portfolio}','Crest\PortfoliosController@show')->name('portfolios.portfolio.show');
							  Route::get('/{portfolio}/edit','Crest\PortfoliosController@edit')->name('portfolios.portfolio.edit');
							  Route::post('/', 'Crest\PortfoliosController@store')->name('portfolios.portfolio.store');
							  Route::put('portfolio/{portfolio}', 'Crest\PortfoliosController@update')->name('portfolios.portfolio.update');
							  Route::delete('/portfolio/{portfolio}','Crest\PortfoliosController@destroy')->name('portfolios.portfolio.destroy');
							  Route::post('remove-file', 'Crest\PortfoliosController@removeFile')
								   ->name('portfolios.portfolio.remove-file');
							 Route::post('remove-file-profile', 'Crest\PortfoliosController@removeFile_Profile')
								   ->name('portfolios.portfolio.remove-file-profile');
					});

					Route::group([
										   'prefix' => 'portfolios_photos',
								 ], function () {
							  Route::get('/', 'Crest\PortfoliosPhotosController@index')
								   ->name('portfolios_photos.portfolios_photo.index');
							  Route::get('/create','Crest\PortfoliosPhotosController@create')
								   ->name('portfolios_photos.portfolios_photo.create');
							  Route::get('/show/{portfoliosPhoto}','Crest\PortfoliosPhotosController@show')
								   ->name('portfolios_photos.portfolios_photo.show');
							  Route::get('/{portfoliosPhoto}/edit','Crest\PortfoliosPhotosController@edit')
								   ->name('portfolios_photos.portfolios_photo.edit');
							  Route::post('/', 'Crest\PortfoliosPhotosController@store')
								   ->name('portfolios_photos.portfolios_photo.store');
							  Route::put('portfolios_photo/{portfoliosPhoto}', 'Crest\PortfoliosPhotosController@update')
								   ->name('portfolios_photos.portfolios_photo.update');
							  Route::delete('/portfolios_photo/{portfoliosPhoto}','Crest\PortfoliosPhotosController@destroy')
								   ->name('portfolios_photos.portfolios_photo.destroy');
					});
					
					Route::group([
										   'prefix' => 'resumes',
								 ], function(){
							  Route::get('/', 'Crest\ResumesController@index')
								   ->name('resumes.resume.index');
							  Route::get('/create/{id}', 'Crest\ResumesController@create')
								   ->name('resumes.resume.create');
							  Route::get('/show/{id}', 'Crest\ResumesController@show')
								   ->name('resumes.resume.show');
							  Route::get('/{resume}/edit', 'Crest\ResumesController@edit')
								   ->name('resumes.resume.edit');
							  Route::post('/', 'Crest\ResumesController@store')
								   ->name('resumes.resume.store');
							  Route::put('resume/{resume}', 'Crest\ResumesController@update')
								   ->name('resumes.resume.update');
							  Route::delete('/resume/{resume}', 'Crest\ResumesController@destroy')
								   ->name('resumes.resume.destroy');
							  Route::post('/favorite', 'Crest\ResumesController@favorite')
								   ->name('resumes.resume.favorite');	   
					});

		  });



		  Route::get('/admin-dashboard', function(){
					return view('admin.index');
		  });

		  Route::group([
								 'prefix' => '/admin-dashboard/plans',
					   ], function () {
					Route::get('/', 'Admin\Membership\YbrMembership2PlansController@index')
						 ->name('admin.membership.plans.ybr_membership2_plan.index');
					Route::get('/create','Admin\Membership\YbrMembership2PlansController@create')
						 ->name('admin.membership.plans.ybr_membership2_plan.create');
					Route::get('/show/{ybrMembership2Plan}','Admin\Membership\YbrMembership2PlansController@show')
						 ->name('admin.membership.plans.ybr_membership2_plan.show');
					Route::get('/{ybrMembership2Plan}/edit','Admin\Membership\YbrMembership2PlansController@edit')
						 ->name('admin.membership.plans.ybr_membership2_plan.edit');
					Route::post('/', 'Admin\Membership\YbrMembership2PlansController@store')
						 ->name('admin.membership.plans.ybr_membership2_plan.store');
					Route::put('ybr_membership2_plan/{ybrMembership2Plan}', 'Admin\Membership\YbrMembership2PlansController@update')
						 ->name('admin.membership.plans.ybr_membership2_plan.update');
					Route::delete('/ybr_membership2_plan/{ybrMembership2Plan}','Admin\Membership\YbrMembership2PlansController@destroy')
						 ->name('admin.membership.plans.ybr_membership2_plan.destroy');
		  });

		  Route::group([
								 'prefix' => 'transactions',
					   ], function () {
					Route::get('/admin-dashboard/orders', 'Admin\Membership\YbrMembership5TransactionsController@admin')
						 ->name('admin.membership.orders.index');
				// 	Route::post('/admin-dashboard/cancel','Admin\Membership\YbrMembership5TransactionsController@cancel')
				// 		 ->name('admin.membership.transactions.cancel');
					Route::post('/admin-dashboard/bulk','Admin\Membership\YbrMembership5TransactionsController@bulk')
						 ->name('admin.membership.transactions.bulk');	 
					Route::post('/admin-dashboard/destroy','Admin\Membership\YbrMembership5TransactionsController@destroy')
						 ->name('admin.membership.transactions.destroy');
					Route::post('/admin-dashboard/cancel','Admin\Membership\PurchaseController@cancelOrder')
						 ->name('admin.membership.transactions.destroy');	 
					Route::get('/', 'Admin\Membership\YbrMembership5TransactionsController@index')
						 ->name('admin.membership.transactions.index');	 
					Route::get('/create','Admin\Membership\YbrMembership5TransactionsController@create')
						 ->name('admin.membership.transactions.create');
					Route::get('/show/{ybrMembership5Transaction}','Admin\Membership\YbrMembership5TransactionsController@show')
						 ->name('admin.membership.transactions.show')->where('id', '[0-9]+');
					Route::get('/{ybrMembership5Transaction}/edit','Admin\Membership\YbrMembership5TransactionsController@edit')
						 ->name('admin.membership.transactions.edit')->where('id', '[0-9]+');
					Route::post('/', 'Admin\Membership\YbrMembership5TransactionsController@store')
						 ->name('admin.membership.transactions.store');
					Route::put('ybr_membership5_transaction/{ybrMembership5Transaction}', 'Admin\Membership\YbrMembership5TransactionsController@update')
						 ->name('admin.membership.transactions.update')->where('id', '[0-9]+');
					Route::delete('/ybr_membership5_transaction/{ybrMembership5Transaction}','Admin\Membership\YbrMembership5TransactionsController@destroy')
						 ->name('admin.membership.transactions.destroy')->where('id', '[0-9]+');
		  });

		  Route::group([
								 'prefix' => '/admin-dashboard/custom-fields',
					   ], function () {
					Route::get('/', 'Admin\App\CustomFieldsController@index')
						 ->name('admin.app.custom-fields.index');
					Route::get('/create','Admin\App\CustomFieldsController@create')
						 ->name('admin.app.custom-fields.create');
					Route::get('/show/{customField}','Admin\App\CustomFieldsController@show')
						 ->name('admin.app.custom-fields.show')->where('id', '[0-9]+');
					Route::get('/{customField}/edit','Admin\App\CustomFieldsController@edit')
						 ->name('admin.app.custom-fields.edit')->where('id', '[0-9]+');
					Route::post('/', 'Admin\App\CustomFieldsController@store')
						 ->name('admin.app.custom-fields.store');
					Route::put('custom_field/{customField}', 'Admin\App\CustomFieldsController@update')
						 ->name('admin.app.custom-fields.update')->where('id', '[0-9]+');
					Route::delete('/custom_field/{customField}','Admin\App\CustomFieldsController@destroy')
						 ->name('admin.app.custom-fields.destroy')->where('id', '[0-9]+');
		  });

		  Route::group([
								 'prefix' => '/admin-dashboard/pages',
					   ], function () {
					Route::get('/', 'Admin\App\PagesController@index')
						 ->name('admin.app.pages.index');
					Route::get('/create','Admin\App\PagesController@create')
						 ->name('admin.app.pages.create');
					Route::get('/show/{page}','Admin\App\PagesController@show')
						 ->name('admin.app.pages.show')->where('id', '[0-9]+');
					Route::get('/{page}/edit','Admin\App\PagesController@edit')
						 ->name('admin.app.pages.edit')->where('id', '[0-9]+');
					Route::post('/', 'Admin\App\PagesController@store')
						 ->name('admin.app.pages.store');
					Route::put('page/{page}', 'Admin\App\PagesController@update')
						 ->name('admin.app.pages.update')->where('id', '[0-9]+');
					Route::delete('/page/{page}','Admin\App\PagesController@destroy')
						 ->name('admin.app.pages.destroy')->where('id', '[0-9]+');
		  });

		  Route::group([
								 'prefix' => '/admin-dashboard/users',
					   ], function () {
					Route::get('/', 'Admin\App\UsersController@index')
						 ->name('admin.app.users.user.index');
					Route::get('/create','Admin\App\UsersController@create')
						 ->name('admin.app.users.user.create');
					Route::get('/show/{user}','Admin\App\UsersController@show')
						 ->name('admin.app.users.user.show');
					Route::get('/{user}/edit','Admin\App\UsersController@edit')
						 ->name('admin.app.users.user.edit');
					Route::post('/', 'Admin\App\UsersController@store')
						 ->name('admin.app.users.user.store');
					Route::put('user/{user}', 'Admin\App\UsersController@update')
						 ->name('admin.app.users.user.update');
					Route::delete('/user/{user}','Admin\App\UsersController@destroy')
						 ->name('admin.app.users.user.destroy');
		  });

		  Route::group([
								 'prefix' => '/admin-dashboard/notification-types',
					   ], function () {
					Route::get('/', 'Admin\App\YbrNotificationTypesController@index')
						 ->name('admin.app.notification-types.ybr_notification_type.index');
					Route::get('/create','Admin\App\YbrNotificationTypesController@create')
						 ->name('admin.app.notification-types.ybr_notification_type.create');
					Route::get('/show/{ybrNotificationType}','Admin\App\YbrNotificationTypesController@show')
						 ->name('admin.app.notification-types.ybr_notification_type.show')->where('id', '[0-9]+');
					Route::get('/{ybrNotificationType}/edit','Admin\App\YbrNotificationTypesController@edit')
						 ->name('admin.app.notification-types.ybr_notification_type.edit')->where('id', '[0-9]+');
					Route::post('/', 'Admin\App\YbrNotificationTypesController@store')
						 ->name('admin.app.notification-types.ybr_notification_type.store');
					Route::put('ybr_notification_type/{ybrNotificationType}', 'Admin\App\YbrNotificationTypesController@update')
						 ->name('admin.app.notification-types.ybr_notification_type.update')->where('id', '[0-9]+');
					Route::delete('/ybr_notification_type/{ybrNotificationType}','Admin\App\YbrNotificationTypesController@destroy')
						 ->name('admin.app.notification-types.ybr_notification_type.destroy')->where('id', '[0-9]+');
		  });
