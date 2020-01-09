<?php

 namespace App\Http\Controllers\Crest;

use App\Http\Controllers\Controller;
use App\Models\Crest\file;
use App\Models\Crest\project;
use App\Models\Crest\proposal;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\Crest\chatroom;
use App\Models\Crest\proposal_notifications;

class ProjectsController extends Controller{
					/**
					 * Display a listing of the projects.
					 *
					 * @return Illuminate\View\View
					 */
					public function admin(){
							  $projects = project::paginate(25);
							  $creators = User::pluck('name', 'id')->all();
							  $is_favorite = 0;
                               if(Auth::user()->role_id == 1) { 
							    return view('project-room.admin', compact('projects', 'creators'));
                               } else {
                                   return redirect('/project-room');
                               }
					}
                    
                    public function bulk(Request $request)
                        {
                            if(isset($request->project_id)){
                                $ids = $request->project_id;
                            }
                            
                            try {
                                
                                foreach($ids as $id){
                                $project = project::findOrFail($id);
                                $project->delete();
                                
                                }
                    
                                return redirect()->back()
                                    ->with('success_message', trans('Project Deleted'));
                            } catch (Exception $exception) {
                    
                                return back()->withInput()
                                    ->withErrors(['unexpected_error' => 'Error Deleting']);
                            }
                        }


					/**
					 * Display a listing of the projects.
					 *
					 * @return Illuminate\View\View
					 */
					public function public(){
							  $projects = project::orderBy('created_at', 'desc')->paginate(25);
							  $creators = User::pluck('name', 'id')->all();
							  $is_favorite = 0;
							  
							   if(Auth::user()->role_id != 2) {
							       return view('project-room.public', compact('projects', 'creators', 'is_favorite'));
							   } else {
                                   return redirect('/directory');
                               }
							  
					}

					public function map(){
							  $projects = DB::table('projects')->select('id', 'title', 'location')->get();
							  return view('project-room.map', compact('projects'));
					}

					/**
					 * Display a listing of the projects.
					 *
					 * @return Illuminate\View\View
					 */
					public function index(){
							  $projects = project::where('created_by', Auth::Id())->paginate(25);
							  $creators = User::pluck('name', 'id')->all();
							  
							  

							  return view('project-room.index', compact('projects', 'creators'));
							  
							 
					}

					/**
					 * Show the form for creating a new project.
					 *
					 * @return Illuminate\View\View
					 */
					public function create(){
							  $creators = User::pluck('name', 'id')->all();
                            $files     = array();
							  return view('project-room.create', compact('creators', 'files'));
					}

					/**
					 * Store a new project in the storage.
					 *
					 * @param App\Http\Requests\ProjectsFormRequest $request
					 * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
					 */
					public function store(Request $request){
					    
		/*			    
	 $haversine = "(3959 * acos(cos(radians(".$request->latitude.")) * cos(radians('profiles.latitude')) * cos(radians('profiles.longitude') - radians(".$request->longitude.")) + sin(radians(".$request->latitude.")) * sin(radians('profiles.latitude'))))";
    
    $distancemess = 'ABS(profiles.latitude - '.(float)$request->latitude.') + ABS(profiles.longitude - '.(float)$request->longitude.')';
    $radius = 50;
    
    $userdata   = DB::table('users')->join('profiles','profiles.user_id','=','users.id')->select('users.*', 'profiles.*')->where('profiles.longitude','<>','')->selectRaw("{$haversine} AS distance")->whereRaw("{$haversine} <= ?", [$radius])->get();
                    
                    	  
                    		  
                    		    foreach($userdata as $keyu => $uderdetail){
                    		       echo $uderdetail->distance.'<br>';
                    		    }
                    		    
                    		     
                    		    dd($userdata);
                    		    exit();	*/
            
          
					    
							  $this->validate($request, [
										'image' => 'image|mimes:jpeg,png,jpg,bmp,gif,svg',
							  ]);

							  $trade = '';
                			  foreach($request->trade as $k => $val) {
                						if($k < count($request->trade) - 1)
                								  $trade = $trade.$val.',';
                						else
                								  $trade = $trade.$val;
                			  }
                			  
                			  $type = '';
                			  foreach($request->job_type as $k => $val) {
                						if($k < count($request->job_type) - 1)
                								  $type = $type.$val.',';
                						else
                								  $type = $type.$val;
                			  }
                			  

							  $id = DB::table('projects')->insertGetId([
																				 'title'                  => $request->title,
																				 'description'            => $request->description,
																				 'status'                 => 'active',
																				 'starts_on'              => $request->starts_on,
																				 'need_bid_by_date'       => $request->need_bid_by_date,
																				 'how_many_units'         => $request->how_many_units,
																				 'job_type'               => $type,
																				 'location'               => $request->location,
																				 'trade'				  => $trade,
																				 'city'                   => $request->city,
																				 'state'                  => $request->state_id,
																				 'latitude'               => $request->latitude,
																				 'longitude'              => $request->longitude,
																				 'postal_code'            => $request->postal_code, 
																				 'phone'                  => $request->phone !== null ? $request->phone : '',
																				 'email'                  => $request->email,
																				 'preferred_contact'      => serialize($request->preferred_contact),
																				 'created_by'             => Auth::user()->id,
																				 'created_at'             => date('Y-m-d H:i:s'),
																	   ]);

							

							  if($request->hasFile('files')){

										$files = $request->file('files');
										
										$file_info = $request->get('fileuploader-list-files');
										
										foreach($files as $key => $file){
										    
										            $file_name = $file->getClientOriginalName();
										            $file_type = $file->getMimeType();
										            $extension = \File::extension($file_name);

                            						$file_array = json_decode($file_info, true);
                            						
                            						//foreach($file_array as $info) {
                            						
                            						$info = $file_array[$key];
                            						    
                            						    $file_i = $info['file'];
                            						    $file_n = str_replace('0:/', '', $file_i);
                            						    
                            						    $img_extensions = array('jpg', 'jpeg', 'png', 'gif');
                            						    
                            						    if($file_n == $file_name && in_array($extension, $img_extensions)){
                            						        
                            						        if(isset($info["editor"])) {
                            						            
                            						        $width = $info["editor"]["crop"]["width"];
                                    						$height = $info["editor"]["crop"]["height"];
                                    						$left = $info["editor"]["crop"]["left"];
                                    						$top = $info["editor"]["crop"]["top"];
                                    						$cfWidth = $info["editor"]["crop"]["cfWidth"];
                                    						$cfHeight = $info["editor"]["crop"]["cfHeight"];
                                    						
                                    						if(!isset($info["editor"]["rotation"])) {
                                    						    $rotate = 0;
                                    						} else {
                                    						    $rotate = $info["editor"]["rotation"];
                                    						}
                                    						
                                    						
                                    						    $new_image = Image::make($file)->crop((int)$width, (int)$height, (int)$left, (int)$top)->rotate(-(int)$rotate);
                                    						} else {
                                    						     $new_image = Image::make($file);
                                    						}
                                                         
                                                            
                                                            
                                                            $fileName        = time() . ' ' . $file_name;
                                        					$fileName = str_replace(' ', '_', $fileName);
                                        					$new_image->save('/home/bidhub/public_html/public/storage/projects/images/'.$fileName);
                                        					
                                        					  $project_file             = new file();
            												  $project_file->project_id = $id;
            												  $project_file->file_name  = $fileName;
            												  $project_file->file_path  = '/public/storage/projects/images/'.$fileName;
            												  $project_file->created_by = Auth::user()->id;
            												  $project_file->file_type  = $extension;
            												  $project_file->save();
                            						        
                            						    } else {
                            						        
                            						        $file->storeAs('/public/storage/projects/files', $file_name, 'uploads');
                            						        
                            						          $project_file             = new file();
            												  $project_file->project_id = $id;
            												  $project_file->file_name  = $file_name;
            												  $project_file->file_path  = '/public/storage/projects/files/'.$file_name;
            												  $project_file->created_by = Auth::user()->id;
            												  $project_file->file_type  = $extension;
            												  $project_file->save();
            												  
                            						    }
                            						    
                            						   	
        												  
                            						    
                            						//}
                            						
                            						

										}

							  }
							  
							 /*  $from_email = 'donotreply@bidhub.com';
            		            $headers = 'From: '.$from_email.' <'.$from_email.'>' . "\r\n";
                    			$headers .= "Content-type: text/html;charset=UTF-8" . "\r\n";
                                   $usercus = url('project-room/show/'.$id);
                    			$message = 'New Project room created please <a href="'.$usercus.'" style="font-weight:bold;">click here</a> to view';
                    			$emailset = array();
                    	
                    		    
                    		    
            $latitude = $request->latitude;
            $longitude = $request->longitude;
            $miles = 50;
             $userdata = DB::table('profiles')->join('users','profiles.user_id','=','users.id')->where('users.role_id','<>','2')->where('users.id','<>', Auth::user()->id)->orderBy(DB::raw('ABS(profiles.latitude - '.(float)$latitude.') + ABS(profiles.longitude - '.(float)$longitude.')'),'ASC' )->get();
												 	    foreach($userdata as $keyw => $project) {
												 	        $distance = $this->haversineGreatCircleDistance($latitude,$longitude,$project->latitude,$project->longitude);
												 	        if($distance > $miles) {
												 	            $userdata->forget($keyw);
												 	        }
												 	    }       		   
					    
					     foreach($userdata as $keyu => $uderdetail){
                    		        if(mail($uderdetail->email , 'New Project created', $message, $headers)){}
                    		    }*/
                    		    
                    		   
                    			
                       
							  return redirect()->route('project-room.project.index')
											   ->with('success_message', trans('projects.model_was_added'));
					}

					/**
					 * Display the specified project.
					 *
					 * @param int $id
					 * @return Illuminate\View\View
					 */
					public function show($id){
							  $project   = project::findOrFail($id);
							  $files     = file::where('project_id', $id)->get();
							  //$user_project   = project::where('created_by', Auth::Id())->findOrFail($id);
							  $proposals = proposal::where('project_id', $id)->where('project_owner', Auth::Id())->get();
							  if(($chatroom_id = chatroom::where('owner_id',$project->created_by)->where('guest_id',Auth::user()->id))->exists()) {
							      $chatroom_id = $chatroom_id->first()->id;
							  }
							  else {
							      $chatroom_id = 'new';
							  }
							  
                              if($project->created_by == Auth::user()->id) {
                                foreach($proposals as $proposal) {
                                    proposal_notifications::where('proposal_id',$proposal->id)->update(['opened' => 1]);
                                }  
                              }
							    return view('project-room.show', compact('project', 'files', 'proposals','chatroom_id'));
					}

					/**
					 * Show the form for editing the specified project.
					 *
					 * @param int $id
					 * @return Illuminate\View\View
					 */
					public function edit($id){
							  $project  = project::findOrFail($id);
							  $creators = User::pluck('name', 'id')->all();
                              $files     = file::where('project_id', $id)->get();
                              if(Auth::user()->role_id == 1 || Auth::user()->id == $project->created_by){
							  return view('project-room.edit', compact('project', 'creators', 'files'));
                              } else{
            
                                    return redirect('/project-room');
                                }
					}

					/**
					 * Update the specified project in the storage.
					 *
					 * @param int                                   $id
					 * @param App\Http\Requests\ProjectsFormRequest $request
					 * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
					 */
					public function update($id, Request $request){
							  $this->validate($request, [
										'image' => 'image|mimes:jpeg,png,jpg,bmp,gif,svg',
							  ]);
							  
							  $trade = '';
                			  foreach($request->trade as $k => $val) {
                						if($k < count($request->trade) - 1)
                								  $trade = $trade.$val.',';
                						else
                								  $trade = $trade.$val;
                			  }
                			  
                			  $type = '';
                			  foreach($request->job_type as $k => $val) {
                						if($k < count($request->job_type) - 1)
                								  $type = $type.$val.',';
                						else
                								  $type = $type.$val;
                			  }
                			  
                			
							  project::find($id)->update([
    										                 'title'                  => $request->title,
    														 'description'            => $request->description,
    														 'status'                 => 'active',
    														 'starts_on'              => $request->starts_on,
    														 'need_bid_by_date'       => $request->need_bid_by_date,
    														 'how_many_units'         => $request->how_many_units,
    														 'job_type'               => $type,
    														 'location'               => $request->location,
    														 'trade'				  => $trade,
    														 'city'                   => $request->city,
    														 'state'                  => $request->state_id,
    														 'latitude'               => $request->latitude,
    														 'longitude'              => $request->longitude,
    														 'postal_code'            => $request->postal_code, 
    														 'phone'                  => $request->phone !== null ? $request->phone : '',
    														 'email'                  => $request->email,
    														 'preferred_contact'      => serialize($request->preferred_contact),
    														 //'created_by'             => Auth::user()->id,
    														 'created_at'             => date('Y-m-d H:i:s'),
    								                      ]);

							  if($request->hasFile('files')){

										$files = $request->file('files');
										
										$file_info           = $request->get('fileuploader-list-files');
										
										foreach($files as $key => $file){
										    
										            $file_name = $file->getClientOriginalName();
										            $file_type = $file->getMimeType();
										            $extension = \File::extension($file_name);

                            						$file_array = json_decode($file_info, true);
                            						
                            						//foreach($file_array as $info) {
                            						
                            						$info = $file_array[$key];
                            						    
                            						    $file_i = $info['file'];
                            						    $file_n = str_replace('0:/', '', $file_i);
                            						    
                            						    $img_extensions = array('jpg', 'jpeg', 'png', 'gif');
                            						    
                            						    if($file_n == $file_name && in_array($extension, $img_extensions)){
                            						        
                            						        if(isset($info["editor"])) {
                            						            
                            						        $width = $info["editor"]["crop"]["width"];
                                    						$height = $info["editor"]["crop"]["height"];
                                    						$left = $info["editor"]["crop"]["left"];
                                    						$top = $info["editor"]["crop"]["top"];
                                    						$cfWidth = $info["editor"]["crop"]["cfWidth"];
                                    						$cfHeight = $info["editor"]["crop"]["cfHeight"];
                                    						
                                    						if(!isset($info["editor"]["rotation"])) {
                                    						    $rotate = 0;
                                    						} else {
                                    						    $rotate = $info["editor"]["rotation"];
                                    						}
                                    						
                                    						
                                    						    $new_image = Image::make($file)->crop((int)$width, (int)$height, (int)$left, (int)$top)->rotate(-(int)$rotate);
                                    						} else {
                                    						     $new_image = Image::make($file);
                                    						}
                                                            
                                                            $fileName        = time() . ' ' . $file_name;
                                        					$fileName = str_replace(' ', '_', $fileName);
                                        					$new_image->save('/home/bidhub/public_html/public/storage/projects/images/'.$fileName);
                                        					
                                        					  $project_file             = new file();
            												  $project_file->project_id = $id;
            												  $project_file->file_name  = $fileName;
            												  $project_file->file_path  = '/public/storage/projects/images/'.$fileName;
            												  $project_file->created_by = Auth::user()->id;
            												  $project_file->file_type  = $extension;
            												  $project_file->save();
                            						        
                            						    } else {
                            						        
                            						        $file->storeAs('/public/storage/projects/files', $file_name, 'uploads');
                            						        
                            						          $project_file             = new file();
            												  $project_file->project_id = $id;
            												  $project_file->file_name  = $file_name;
            												  $project_file->file_path  = '/public/storage/projects/files/'.$file_name;
            												  $project_file->created_by = Auth::user()->id;
            												  $project_file->file_type  = $extension;
            												  $project_file->save();
            												  
                            						    }
                            						    
                            						   	
        												  
                            						    
                            						//}
                            						
                            						

										}

							  }

							  return redirect()->route('project-room.project.index')
											   ->with('success_message', trans('projects.model_was_added'));
					}

					/**
					 * Remove the specified project from the storage.
					 *
					 * @param int $id
					 * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
					 */
					public function destroy($id){
							  try{
										$project = project::findOrFail($id);
										$project->delete();

										return redirect()->route('project-room.project.index')
														 ->with('success_message', trans('projects.model_was_deleted'));
							  }catch(Exception $exception){

										return back()->withInput()
													 ->withErrors(['unexpected_error' => trans('projects.unexpected_error')]);
							  }
					}
					
					public function removeFile(Request $request){
					    
					    $id = $request->id;
					    $file  = file::findOrFail($id);
					    $file->delete();
					    if($file->file_type != 'pdf'){
					        $path = '/home/bidhub/public_html/public/storage/projects/images/'.$file->file_name;
                            unlink($path);
					        
					    } else {
					       $path = '/home/bidhub/public_html/public/storage/projects/files/'.$file->file_name;
                            unlink($path);
					    }
					    
					    return response()->json(['id' => $id]);
					    
					}
					
					public function downloadAllFiles($project)
					{
					    $files = File::where('project_id',$project)->pluck('file_path')->toArray();
					    foreach($files as $i => $file) {
					        $files[$i] = '/home/bidhub/public_html' . $file;
					    }
					   // print_r($files);
					   // return;
					    $zipper = new \Chumper\Zipper\Zipper;
					    $zipper->make('/home/bidhub/public_html/public/storage/projects/project-zips/' . $project . '.zip')->add($files)->close();
					    return response()->download('/home/bidhub/public_html/public/storage/projects/project-zips/' . $project . '.zip');
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
