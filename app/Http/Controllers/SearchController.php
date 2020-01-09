<?php

		  namespace App\Http\Controllers;

		  use App\Models\Crest\directories;
		  use App\Models\Crest\help;
		  use App\Models\Crest\profile;
		  use App\Models\Crest\project;
		  use App\Models\Crest\property;
		  use App\Models\Crest\equipment;
		  use App\User;
		  use Illuminate\Http\Request;
		  use Illuminate\Support\Facades\Auth;
		  use App\Models\Crest\DirectoryUploads;
		  use Illuminate\Support\Collection;
		  use App\Models\Crest\marketplace;
		  use Illuminate\Pagination\LengthAwarePaginator;
		  use DB;
		  use App\Models\Crest\Claim;

		  class SearchController extends Controller
		  {
					// USE THIS FOR EACH POST TYPE (DIRECTORIES,PROPERTIES,HELPS,PROJECTS)

					public function directory(Request $request) {
							  $company_name = $request->company_name;
							  $trade        = $request->trade;
							  $type         = $request->account_type;
							  $miles        = $request->distance ? (int)$request->distance : 100;
							  $location     = $request->location;
							  $postal_code  = $request->postal_code;
							  $city         = $request->city;
							  $state_id     = $request->state_id;
							  $state        = $request->state;
							  $latitude     = $request->latitude;
							  $longitude    = $request->longitude;
							  
							  
							  if($trade == null){
							     $trade = '';
							  } else {
							      if (is_array($trade)) {
							           $trade = implode("|",$trade);
							      }
							  }
							  
							  if($type == null){
							     $type = '';
							  } else {
							    if (is_array($type)) {
							           $type = implode("|",$type);
							      }
							  }
							
							 $trade_esc = str_replace("(","[(]",$trade);
							 $trade_esc = str_replace(")","[)]",$trade_esc);
							  
							  $directoriesObjects = directories::with('creator')->where('approved', 1)->where('paid','one')->where('show_listing',1)
															   ->when($company_name, function($q) use ($company_name) {
																		 return $q->where('company_name', 'like', '%'.$company_name.'%');
															   })->when($trade_esc, function($q) use ($trade_esc) {
																		 return $q->whereRaw('CONCAT(",", trade, ",") REGEXP ",('.$trade_esc.'),"');
															   })->when($type, function($q) use ($type) {
																		 return $q->whereRaw('CONCAT(",", account_type, ",") REGEXP ",('.$type.'),"');
															   })->when($state_id, function($q) use ($state_id) {
																		 return $q->where('state', 'like', '%'.$state_id.'%');
															   });
												   if($city !== null && $latitude !== null && $longitude !== null) {
												       $directoriesObjects = $directoriesObjects->orderBy(DB::raw('ABS(latitude - '.(float)$latitude.') + ABS(longitude - '.(float)$longitude.')'),'ASC' )->get();
    											 	    foreach($directoriesObjects as $key => $upload) {
    											 	        $distance = $this->haversineGreatCircleDistance($latitude,$longitude,$upload->latitude,$upload->longitude);
    											 	        if($distance > $miles) {
    											 	            $directoriesObjects->forget($key);
    											 	        }
    											 	    }
												 	    $currentPage = LengthAwarePaginator::resolveCurrentPage();
												 	    $per_page = 20;
												 	    $currentPageResults = $directoriesObjects->slice(($currentPage-1) * $per_page, $per_page)->all();
												 	    $directoriesObjects = new LengthAwarePaginator($currentPageResults, count($directoriesObjects), $per_page);
												 	    $directoriesObjects->setPath($request->url());
												 	}
												 	else {
												 	    $directoriesObjects = $directoriesObjects->paginate(20);
												 	}
															   
							 $uploaded = DirectoryUploads::where('approved', 1)->where('paid', 0)->where('show_listing',1)->when($company_name, function($q) use ($company_name) {
																		 return $q->where('businessName', 'like', '%'.$company_name.'%');
															   })
															   ->when($trade_esc, function($q) use ($trade_esc) {
																		 return $q->whereRaw('CONCAT(",", category, ",") REGEXP ",('.$trade_esc.'),"');
															   })->when($state_id, function($q) use ($state_id) {
																		 return $q->where('state', 'like', '%'.$state_id.'%');
															   });
												   if($city !== null && $latitude !== null && $longitude !== null) {
												       $uploaded = $uploaded->orderBy(DB::raw('ABS(latitude - '.(float)$latitude.') + ABS(longitude - '.(float)$longitude.')'),'ASC' )->get();
												 	    foreach($uploaded as $key => $upload) {
												 	        $distance = $this->haversineGreatCircleDistance($latitude,$longitude,$upload->latitude,$upload->longitude);
												 	        if($distance > $miles) {
												 	            $uploaded->forget($key);
												 	        }
												 	    }
												 	    $currentPage = LengthAwarePaginator::resolveCurrentPage();
												 	    $per_page = 20;
												 	    $currentPageResults = $uploaded->slice(($currentPage-1) * $per_page, $per_page)->all();
												 	    $uploaded = new LengthAwarePaginator($currentPageResults, count($uploaded), $per_page);
												 	    $uploaded->setPath($request->url());
												 	}
												 	else {
												 	    $uploaded = $uploaded->paginate(20);
												 	}
												 	
								$claims = Claim::where('approved', 0)->get();
								$pending = array();
            					foreach($claims as $claim){
            					    $pending[] = $claim->directory_id;
            					}
            					
            					$claims_app = Claim::where('approved', 1)->get();
            					$claimed_listing = array();
            					foreach($claims_app as $app){
            					    $claimed_listing[] = $app->directory_id;
            					}
            					
							
							
							
							return view('directory.public', compact('pending','claimed_listing', 'directoriesObjects', 'request', 'uploaded', 'company_name', 'postal_code', 'trade', 'type', 'miles', 'city', 'state_id', 'state', 'location','latitude','longitude'));
					}

					public function project(Request $request) {
					    
					   
					    
							  $title        = $request->title;
							  $location     = $request->location;
							  $trade        = $request->trade;
							  $type         = $request->type;
							  $sort_by      = $request->sort_by;
							  $miles        = (int)$request->distance;
							  $location     = $request->location;
							  $postal_code  = $request->postal_code;
							  $city         = $request->city;
							  $state_id     = $request->state_id;
							  $state        = $request->state;
							  $latitude     = $request->latitude;
							  $longitude    = $request->longitude;
							  
							  $all = 0;
							  if(isset($trade)) {
    							  if (in_array("All", $trade))
                                  {
                                      $all = 1;
                                  }
							  }
							  
							  if(!isset($sort_by)){
							      $sort_by = 'ASC';
							  }
							  
							  if($miles == null){
							     $miles = 100;
							  } else {
							    $miles = $request->distance;
							  }
							  
							  if($all == 1) {
							      $trade_all = DB::table('categories_projects')->select('title')->get()->toArray();
							      foreach($trade_all as $titles) {
							          $trade[] = $titles->title;
							      }
							  }
							  
							  if($trade == null){
							     $trade = '';
							  } else {
							      if (is_array($trade)) {
							           $trade = implode("|",$trade);
							      }
							  }
							 
							  if($type == null){
							     $type = '';
							  } else {
							    if (is_array($type)) {
							           $type = implode("|",$type);
							      }
							  }
							  
							 $trade_esc = str_replace("(","[(]",$trade);
							 $trade_esc = str_replace(")","[)]",$trade_esc);
							 
							 $trade_esc = $trade_esc."|All";
							 
							 
							 $projects = project::join('profiles','profiles.user_id','=','projects.created_by')->select('profiles.id AS profiledID','profiles.user_id','projects.*')->when($title, function($q) use ($title) {
																		 return $q->where('profiles.company', 'like', '%'.$title.'%');
															   });
							  
							 /* $projects = project::when($title, function($q) use ($title) {
																		 return $q->where('title', 'like', '%'.$title.'%');
															   });*/
															   
														
														
													if($trade != '') {
													    $projects = $projects->when($trade_esc, function($q) use ($trade_esc) {
																		 return $q->whereRaw('CONCAT(",", projects.trade, ",") REGEXP ",('.$trade_esc.'),"');
															   });
															   
															  
													    }
													    
												 	    $projects = $projects->when($type, function($q) use ($type) {
												 						 return $q->whereRaw('CONCAT(",", projects.job_type, ",") REGEXP ",('.$type.'),"');
												 			   })->when($state_id, function($q) use ($state_id) {
												 						 return $q->where('projects.state', 'like', '%'.$state_id.'%');
												 			   });
												 			 
												 			  
														
												 	if($city !== null && $latitude !== null && $longitude !== null) {
												 	    $projects = $projects->orderBy(DB::raw('ABS(projects.latitude - '.(float)$latitude.') + ABS(projects.longitude - '.(float)$longitude.')'),'ASC' )->get();
												 	    foreach($projects as $key => $project) {
												 	        $distance = $this->haversineGreatCircleDistance($latitude,$longitude,$project->latitude,$project->longitude);
												 	        if($distance > $miles) {
												 	            $projects->forget($key);
												 	        }
												 	    }
												 	    
												 	    
														
												 	    $currentPage = LengthAwarePaginator::resolveCurrentPage();
												 	    $per_page = 20;
												 	    $currentPageResults = $projects->slice(($currentPage-1) * $per_page, $per_page)->all();
												 	    $projects = new LengthAwarePaginator($currentPageResults, count($projects), $per_page);
												 	    $projects->setPath($request->url());
												 	    
												 	}
												 	else {
												 	    
												 	  $projects = $projects->orderBy('projects.need_bid_by_date',$sort_by)->paginate(20);
												 	  
												 	  
												 	}
															   //->orderBy(DB::raw('ABS(latitude - '.$latitude.') + ABS(longitude - '.$longitude.')'),'ASC' )
															   
															 

							  $creators = User::pluck('name', 'id')->all();

							  return view('project-room.public', compact('projects', 'creators', 'request', 'title', 'postal_code', 'trade', 'type', 'miles', 'city', 'si', 'state', 'location', 'sort_by'));
					}

					public function property(Request $request) {
							  $property_title   = $request->property_title;
							  $trade            = $request->trade;
							  $type             = $request->type;
							  $miles            = (int)$request->distance;
							  $sort_by          = $request->sort_by;
							  $by               = 'property_cost';
							  $order            = 'DESC';
							  $location         = $request->location;
							  $postal_code      = $request->postal_code;
							  $city             = $request->city;
							  $state_id         = $request->state_id;
							  $state            = $request->state;
							  $latitude         = $request->latitude;
							  $longitude        = $request->longitude;
							  
							  if(isset($sort_by)){
							      if($sort_by == 'price_high'){ $by = 'property_cost'; $order = 'DESC';}
							      if($sort_by == 'price_low'){ $by = 'property_cost'; $order = 'ASC';}
							      if($sort_by == 'acres_high'){ $by = 'property_acres'; $order = 'DESC';}
							      if($sort_by == 'acres_low'){ $by = 'property_acres'; $order = 'ASC';}
							      if($sort_by == 'newest'){ $by = 'created_at'; $order = 'DESC';}
							      if($sort_by == 'oldest'){ $by = 'created_at'; $order = 'ASC';}
							  }
							  
							  if($miles === null){
							     $miles = 100;
							  } else {
							    $miles = $request->distance;
							  }
							  
							  if($trade == null){
							     $trade = '';
							  } else {
							      if (is_array($trade)) {
							           $trade = implode("|",$trade);
							      }
							  }
							  
							  if($type == null){
							     $type = '';
							  } else {
							    if (is_array($type)) {
							           $type = implode("|",$type);
							      }
							  }
							  
							  $properties = property::when($property_title, function($q) use ($property_title) {
																		 return $q->where('property_title', 'like', '%'.$property_title.'%');
															   })->when($latitude, function($q) use ($latitude, $miles) {
																		 return $q->whereRaw('latitude BETWEEN ('.$latitude.' - ('.$miles.'*0.018)) AND ('.$latitude.' + ('.$miles.'*0.018))');
															   })->when($longitude, function($q) use ($longitude, $miles) {
																		 return $q->whereRaw('longitude BETWEEN ('.$longitude.' - ('.$miles.'*0.018)) AND ('.$longitude.' + ('.$miles.'*0.018))');
															   })->when($state_id, function($q) use ($state_id) {
																		 return $q->where('state', 'like', '%'.$state_id.'%');
															   });
															   
												   if($city !== null && $latitude !== null && $longitude !== null) {
													    $properties = $properties->orderBy(DB::raw('ABS(latitude - '.(float)$latitude.') + ABS(longitude - '.(float)$longitude.')'),'ASC' )->get();
												 	    foreach($properties as $key => $property) {
												 	        $distance = $this->haversineGreatCircleDistance($latitude,$longitude,$property->latitude,$property->longitude);
												 	        if($distance > $miles) {
												 	            $properties->forget($key);
												 	        }
												 	    }
												 	    $currentPage = LengthAwarePaginator::resolveCurrentPage();
												 	    $per_page = 20;
												 	    $currentPageResults = $properties->slice(($currentPage-1) * $per_page, $per_page)->all();
												 	    $properties = new LengthAwarePaginator($currentPageResults, count($properties), $per_page);
												 	    $properties->setPath($request->url());
												 	}
												 	else {
												 	    $properties = $properties->orderBy($by,$order)->paginate(20);
												 	}

							  $creators = User::pluck('name', 'id')->all();

							  return view('property-for-sale.public', compact('properties', 'creators', 'request', 'title', 'postal_code', 'trade', 'type', 'miles', 'city', 'si', 'state', 'location', 'sort_by'));
					}



	public function equipment(Request $request) {
	    
							  $equipment_title   = $request->equipment_title;
							  $trade            = $request->trade;
							  $category            = $request->category;
							 
							  $type             = $request->type;
							  $miles            = (int)$request->distance;
							  $sort_by          = $request->sort_by;
							  $by               = 'equipment_cost';
							  $order            = 'DESC';
							  $location         = $request->location;
							  $postal_code      = $request->postal_code;
							  $city             = $request->city;
							  $state_id         = $request->state_id;
							  $state            = $request->state;
							  $latitude         = $request->latitude;
							  $longitude        = $request->longitude;
							  
							  if(isset($sort_by)){
							      if($sort_by == 'price_high'){ $by = 'equipment_cost'; $order = 'DESC';}
							      if($sort_by == 'price_low'){ $by = 'equipment_cost'; $order = 'ASC';}
							      if($sort_by == 'acres_high'){ $by = 'equipment_acres'; $order = 'DESC';}
							      if($sort_by == 'acres_low'){ $by = 'equipment_acres'; $order = 'ASC';}
							      if($sort_by == 'newest'){ $by = 'created_at'; $order = 'DESC';}
							      if($sort_by == 'oldest'){ $by = 'created_at'; $order = 'ASC';}
							  }
							  
							  if($miles === null){
							     $miles = 100;
							  } else {
							    $miles = $request->distance;
							  }
							  
							  if($trade == null){
							     $trade = '';
							  } else {
							      if (is_array($trade)) {
							           $trade = implode("|",$trade);
							      }
							  }
							  
							  if($type == null){
							     $type = '';
							  } else {
							    if (is_array($type)) {
							           $type = implode("|",$type);
							      }
							  }
							  
							  $equipments = equipment::when($equipment_title, function($q) use ($equipment_title) {
																		 return $q->where('equipment_title', 'like', '%'.$equipment_title.'%');
															   })->when($latitude, function($q) use ($latitude, $miles) {
																		 return $q->whereRaw('latitude BETWEEN ('.$latitude.' - ('.$miles.'*0.018)) AND ('.$latitude.' + ('.$miles.'*0.018))');
															   })->when($longitude, function($q) use ($longitude, $miles) {
																		 return $q->whereRaw('longitude BETWEEN ('.$longitude.' - ('.$miles.'*0.018)) AND ('.$longitude.' + ('.$miles.'*0.018))');
															   })->when($state_id, function($q) use ($state_id) {
																		 return $q->where('state', 'like', '%'.$state_id.'%');
															   })->when($category, function($q) use ($category) {
																		 return $q->where('category', 'like', '%'.$category.'%');
															   });
															   
												   if($city !== null && $latitude !== null && $longitude !== null) {
													    $equipments = $equipments->orderBy(DB::raw('ABS(latitude - '.(float)$latitude.') + ABS(longitude - '.(float)$longitude.')'),'ASC' )->get();
												 	    foreach($equipments as $key => $equipment) {
												 	        $distance = $this->haversineGreatCircleDistance($latitude,$longitude,$equipment->latitude,$equipment->longitude);
												 	        if($distance > $miles) {
												 	            $equipments->forget($key);
												 	        }
												 	    }
												 	    $currentPage = LengthAwarePaginator::resolveCurrentPage();
												 	    $per_page = 20;
												 	    $currentPageResults = $equipments->slice(($currentPage-1) * $per_page, $per_page)->all();
												 	    $equipments = new LengthAwarePaginator($currentPageResults, count($equipments), $per_page);
												 	    $equipments->setPath($request->url());
												 	}
												 	else {
												 	    $equipments = $equipments->orderBy($by,$order)->paginate(20);
												 	}

							  $creators = User::pluck('name', 'id')->all();

							  return view('equipment-for-sale.public', compact('equipments', 'creators', 'request', 'title', 'postal_code', 'trade', 'type', 'miles', 'city', 'si', 'state', 'location', 'sort_by'));
					}
					public function profile(Request $request) {
							  $name = $request->name;
							  $location = $request->location;

							  $profiles = profile::when($name, function($q) use ($name) {
										return $q->where('first_name', 'like', '%'.$name.'%')->orWhere('last_name', 'like', '%'.$name.'%');
							  })
													->when($location, function($q) use ($location) {
															  return $q->where('location', 'like', '%'.$location.'%');
													})->paginate(10);

							  return view('profiles.general', compact('profiles', 'request'));
					}
					
					public function marketplace(Request $request) {
							  $name = $request->name;
							  $category = $request->category;
					
							  $marketplaces = marketplace::when($name, function($q) use ($name) {
										return $q->where('company_name', 'like', '%'.$name.'%')->orWhere('company_description', 'like', '%'.$name.'%');
							  })
								->when($category, function($q) use ($category) {
									return $q->where('company_category', 'like', '%'.$category.'%');
								})->paginate(10);

							  return view('market-place.public', compact('marketplaces', 'category', 'name'));
					}

				    public function help(Request $request) {
					    $title        = $request->title;
					    $trade        = $request->trade;
					    $type         = $request->type;
					    $miles        = (int)$request->distance;
					    $sort_by      = $request->sort_by;
					    $location     = $request->location;
					    $postal_code  = $request->postal_code;
					    $city         = $request->city;
					    $state_id     = $request->state_id;
					    $state        = $request->state;
					    $latitude     = $request->latitude;
					    $longitude    = $request->longitude;
					    
					    if(!isset($sort_by)){
					        $sort_by = 'ASC';
					    }
					    if($miles == null){
					        $miles = 100;
					    } else {
					        $miles = $request->distance;
					    }
					    
					    if($trade == null){
					        $trade = '';
					    } else {
					        if (is_array($trade)) {
					          $trade = implode("|",$trade);
					        }
					    }
					    
					    if($type == null){
					        $type = '';
					    } else {
					        if (is_array($type)) {
					            $type = implode("|",$type);
					        }
					    }
					    
                        $helps = help::when($title, function($q) use ($title) {
											 return $q->where('title', 'like', '%'.$title.'%');
								   })->when($trade, function($q) use ($trade) {
											 return $q->whereRaw('CONCAT(",", trade, ",") REGEXP ",('.$trade.'),"');
								   })->when($type, function($q) use ($type) {
											 return $q->whereRaw('CONCAT(",", job_type, ",") REGEXP ",('.$type.'),"');
								   })->when($latitude, function($q) use ($latitude, $miles) {
											 return $q->whereRaw('latitude BETWEEN ('.$latitude.' - ('.$miles.'*0.018)) AND ('.$latitude.' + ('.$miles.'*0.018))');
								   })->when($longitude, function($q) use ($longitude, $miles) {
											 return $q->whereRaw('longitude BETWEEN ('.$longitude.' - ('.$miles.'*0.018)) AND ('.$longitude.' + ('.$miles.'*0.018))');
								   })->when($state_id, function($q) use ($state_id) {
											 return $q->where('state', 'like', '%'.$state_id.'%');
								   });
					  if($city !== null && $latitude !== null && $longitude !== null) {
					      $helps = $helps->orderBy(DB::raw('ABS(latitude - '.(float)$latitude.') + ABS(longitude - '.(float)$longitude.')'),'ASC' )->get();
					 	    foreach($helps as $key => $help) {
					 	        $distance = $this->haversineGreatCircleDistance($latitude,$longitude,$help->latitude,$help->longitude);
					 	        if($distance > $miles) {
					 	            $helps->forget($key);
					 	        }
					 	    }
					 	    $currentPage = LengthAwarePaginator::resolveCurrentPage();
					 	    $per_page = 20;
					 	    $currentPageResults = $helps->slice(($currentPage-1) * $per_page, $per_page)->all();
					 	    $helps = new LengthAwarePaginator($currentPageResults, count($helps), $per_page);
					 	    $helps->setPath($request->url());
					 	}
					 	else {
					 	    $helps = $helps->paginate(20);
					 	}


							  $creators = User::pluck('name', 'id')->all();

							  return view('help-wanted.public', compact('helps', 'creators', 'request', 'title', 'postal_code', 'trade', 'type', 'miles', 'city', 'state_id', 'state', 'location', 'sort_by'));
					}
					
	private function haversineGreatCircleDistance($latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $earthRadius = 3958.8)
    {
      // convert from degrees to radians
      $latFrom = deg2rad((float)$latitudeFrom);
      $lonFrom = deg2rad((float)$longitudeFrom);
      $latTo = deg2rad((float)$latitudeTo);
      $lonTo = deg2rad((float)$longitudeTo);
    
      $latDelta = $latTo - $latFrom;
      $lonDelta = $lonTo - $lonFrom;
    
      $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
        cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
      return $angle * $earthRadius;
    }
}
