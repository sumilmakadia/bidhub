<?php

namespace App\Http\Controllers\Crest;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfilesFormRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\Crest\DirectoryUploads;
use App\Models\Crest\Claim;
use App\Models\Crest\proposal;
use App\Models\Crest\property;
use App\Models\Crest\project;
use App\Models\Crest\directories;
use App\Models\Crest\profile;
use App\Models\Crest\chatroom;
use App\Models\Crest\chatroom_message;
use App\Models\Crest\resume;
use App\Models\Crest\fileResumes;
use App\Models\Crest\proposal_notifications;
use App\Models\Crest\portfolios_profile_photo;
use App\Models\Crest\ybr_membership5_transaction;
use App\Models\Crest\resumes;

class ProfilesController extends Controller
{
		  /**
		   * Display a listing of the profiles.
		   *
		   * @return Illuminate\View\View
		   */
		  public function admin()
		  {
					$users = User::all();
					
					if(Auth::user()->role_id == 1) { 
							    	return view('profiles.index', compact('users'));
                    } else {
                                   return redirect('/directory');
                    }

					
		  }
		  
		  public function bulk(Request $request)
                        {
                            if(isset($request->user_id)){
                                $ids = $request->user_id;
                            }
                            
                            try {
                                
                                foreach($ids as $id){
                                $user = user::findOrFail($id);
										$user->delete();
										
										  proposal::where('created_by', $id)->delete();
                                		  property::where('created_by', $id)->delete();
                                		  project::where('created_by', $id)->delete();
                                		  directories::where('created_by', $id)->delete();
                                          DirectoryUploads::where('user_id', $id)->delete();
                                          profile::where('user_id', $id)->delete();
                                          Claim::where('user_id', $id)->delete();
                                          chatroom_message::where('created_by', $id)->delete();
                                          chatroom::where('owner_id', $id)->delete();
                                          DB::table('chatroom_messages_files')->where('created_by', $id)->delete();
                                          resumes::where('created_by', $id)->delete();
                                          fileResumes::where('created_by', $id)->delete();
                                          DB::table('files')->where('created_by', $id)->delete();
                                          DB::table('files_galery')->where('created_by', $id)->delete();
                                          DB::table('files_help')->where('created_by', $id)->delete();
                                          DB::table('files_properties')->where('created_by', $id)->delete();
                                          DB::table('files_proposals')->where('created_by', $id)->delete();
                                          DB::table('portfolios_photos')->where('created_by', $id)->delete();
                                          proposal_notifications::where('user_id', $id)->delete();
                                          ybr_membership5_transaction::where('created_by', $id)->delete();
                                
                                }
                    
                                return redirect()->back()
                                    ->with('success_message', 'Users Deleted');
                            } catch (Exception $exception) {
                    
                                return back()->withInput()
                                    ->withErrors(['unexpected_error' => 'Error Deleting']);
                            }
                        }

		  public function contractor()
		  {
					$profiles = profile::where('user_id', Auth::Id())->paginate(25);

					return view('profiles.contractor', compact('profiles'));
		  }
		  /**
		   * Display a listing of the profiles.
		   *
		   * @return Illuminate\View\View
		   */
		  public function advertiser()
		  {
					$profiles = profile::paginate(25);

					return view('profiles.advertiser', compact('profiles'));
		  }
		  /**
		   * Display a listing of the profiles.
		   *
		   * @return Illuminate\View\View
		   */
		  public function general()
		  {
					$profiles = profile::where('user_id', Auth::Id())->paginate(25);

					return view('profiles.general', compact('profiles'));
		  }
    /**
     * Display a listing of the profiles.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $profiles = profile::where('user_id', Auth::Id())->paginate(25);
        
        $users = User::paginate(25);

        return view('profiles.index', compact('profiles', 'users'));
    }

    /**
     * Show the form for creating a new profile.
     *
     * @return Illuminate\View\View
     */
    public function create(Request $request)
    {
       
			$roles = DB::table('roles')->get();
			  $profile = new profile();
			  if($request->id) {
			  	$profile->user_id = $request->id;
			  } else {
			  	$profile->user_id = Auth::Id();
			  }

			  return view('profiles.create', compact('roles', 'profile','plans'));
    }


		  public function createUser()
		  {
		            $plans = DB::table('ybr_membership2_plans')->get();
			        $addons = DB::table('addons')->get();
					$roles = DB::table('roles')->get();
				    return view('profiles.admin', compact('roles', 'plans', 'addons'));
		  }


		  public function saveUser(Request $request)
		  {
					$request->validate([
							 'email' => 'required|unique:users'
				   ]);
				   
				   $plan = 2;
				   if(isset($request->plan)){
				       $plan = $request->plan;
				   }
				   
				   $help = 0;
				   if(isset($request->help)){
				       $help = $request->help;
				   }
				   
				   $property = 0;
				   if(isset($request->property)){
				       $property = $request->property;
				   }
				   
				   if($request->role == 'Administrator') {
				       $plan = 1;
				   }
				   
				   if($request->role == 'User') {
				       $plan = 2;
				   }

                    if(Auth::user()->role_id == 1) {
					$user = new User();
					$user->role_id = $plan;
					$user->name = $request->name;
					$user->email = $request->email;
					$user->help =  $help;
					$user->property = $property;
					$user->password = Hash::make($request->password);
					$user->avatar = '/public/storage/users/default.png';
					$user->admin_created = 1;
					$user->save();
					
					$user = User::where('email', $request->email)->first();
					
					if($plan == 8) {
					    User::updateOrCreate(['id' => $user->id],
        				 [
        				'free_trial'               => 1
        				]);
					}
					
						profile::updateOrCreate(['user_id' => $user->id],
        				 [
        				'user_id'               => $user->id,
        				'type'                  => $request->role
        				]);
        				directories::updateOrCreate(['user_id' => $user->id],
        				                            [
        				                                'user_id' => $user->id,
        				                                'paid' => 'one',
        				                                'approved' => '1'
        				                            ]);
        				DirectoryUploads::updateOrCreate(['user_id' => $user->id],
        				                            [
        				                                'user_id' => $user->id,
        				                                'paid' => '1',
        				                                'approved' => '1'
        				                            ]);
					
                    } else {
                         $user = new User();
    					$user->name = $request->name;
    					$user->email = $request->email;
    					$user->password = Hash::make($request->password);
    					$user->avatar = '/storage/users/default.png';
    					$user->save();
                    }
					
					$this->welcomeEmail($request->email);
					
					if(Auth::user()->role_id == 1) { 
							    return redirect('/profiles/admin');
                    } else {
                                   return redirect('/profile');
                    }
					
		  }
		  
		  private function welcomeEmail($email)
		{
		    
		    $from_email = 'donotreply@bidhub.com';
	
			$headers = 'From: '.$from_email.' <'.$from_email.'>' . "\r\n";
			$headers .= "Content-type: text/html;charset=UTF-8" . "\r\n";
			$message = view('emails.welcome')->with(compact('email'))->render();
			
			mail($email, 'Welcome To The BidHub Community!', $message, $headers);
		}



        public function removeFile(Request $request){
        
        print_r($request-all());
        exit();
        
    }

    /**
     * Store a new profile in the storage.
     *
     * @param App\Http\Requests\ProfilesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
			  $trade = '';
			  if($request->trade) {
    			  foreach($request->trade as $k => $val) {
    						if($k < count($request->trade) - 1)
    							$trade = $trade.$val.',';
    						else
    							$trade = $trade.$val;
    			  }
			  }

			  $id = DB::table('profiles')->insertGetId([
																 'user_id'		    => Auth::user()->id,
																 'first_name'	    => $request->first_name,
																 'last_name'	    => $request->last_name,
																 'bio'			    => $request->bio,
																 'location'		    => $request->location,
																 'city'             => $request->city,
                												 'state'            => $request->state_id,
                												 //'postal_code'    => isset($request->postal_code) ? $request->postal_code : '',
																 'latitude'         => $request->latitude,
																 'longitude'        => $request->longitude,
																 'type'			    => $request->role,
																 'company'		    => $request->company,
																 'phone'		    => $request->phone,
																 'mobile'		    => $request->mobile,
																 'website'	        => $request->website,
																 'trade'	        => $trade,
																 'license_number'   => $request->license_number,
																 'created_at'	=> date('Y-m-d H:i:s'),
																 'directory_listing' => $request->directory_listing
													   ]);

			  $profile = profile::findOrFail($id);
				
	
				// User::find($profile->user->id)->update(['role_id' => $profile->roles->id]);
			    
			  if($request->hasFile('file')) {
						$image           = $request->file('file');
						$file_info           = $request->get('fileuploader-list-file');
						$file_array = json_decode($file_info, true);
						$width = $file_array[0]["editor"]["crop"]["width"];
						$height = $file_array[0]["editor"]["crop"]["height"];
						$left = $file_array[0]["editor"]["crop"]["left"];
						$top = $file_array[0]["editor"]["crop"]["top"];
						$cfWidth = $file_array[0]["editor"]["crop"]["cfWidth"];
						$cfHeight = $file_array[0]["editor"]["crop"]["cfHeight"];
						
						if(!isset($file_array[0]["editor"]["rotation"])) {
						    $rotate = 0;
						} else {
						    $rotate = $file_array[0]["editor"]["rotation"];
						}
						
						$width = 300;
                        $height = 300;
                        
                        $canvas = Image::canvas($width, $height);
                        // and you are ready to go ...
                        //$new_image = Image::make($image)->crop((int)$width, (int)$height, (int)$left, (int)$top)->rotate(-(int)$rotate);
                        
                        // pass the right full path to the file. Remember that $path is a path inside app/public !
                        $new_image = Image::make($image)->resize($width, $height, 
                            function ($constraint) {
                                $constraint->aspectRatio();
                        });
                        
                        $canvas->insert($new_image, 'center');
						
						$fileName        = time() . ' ' . $image->getClientOriginalName();
						$fileName = str_replace(' ', '_', $fileName);
						$canvas->save('/home/bidhub/public_html/public/storage/users/avatars/'.$fileName);
						//$request->file('file')->storeAs('/public/storage/users/avatars', $new_image, 'uploads');
						$profile = profile::find($id);
						$profile ->update(['avatar'=> '/public/storage/users/avatars/'.$fileName]);
						$user = User::find($profile->user->id);
						$user->avatar = '/public/storage/users/avatars/'.$fileName;
						$user->save();
			  }
			  
			  //$directory = directories::where('user_id', $profile->user->id)->first();
			  
			  
			  
			  DirectoryUploads::updateOrCreate(['user_id' => $profile->user->id],
        				 [
        				'businessName'		    => $request->company,
        				'phoneNumber'		    => $request->phone,
        				'webSite'		        => $request->website,
        				'contactName'		    => $request->first_name .' '. $request->last_name,
        				'category'			    => $trade,
        				'user_id'               => $profile->user->id,
        				'claimed'               => 1,
        				'show_listing'          => $request->directory_listing,
        				'email'                 => $profile->user->email,
        				'location'              => $request->location,
        				'city'                  => $request->city,
        				'state'                 => $request->state_id,
        				'postal'                => $request->postal_code,
        				'latitude'              => $request->latitude,
        				'longitude'             => $request->longitude,
        				//'account_type'          => $request->role,
        				'show_listing'          => $request->directory_listing
        				]);
			      
		            directories::updateOrCreate(['user_id' => $profile->user->id],
        				 [
        				'company_name'		    => $request->company,
        				'company_phone'		    => $request->phone,
        				'company_email'		    => $profile->user->email,
        				'company_website'		=> $request->website,
        				'company_contact'		=> $request->first_name .' '. $request->last_name,
        				'trade'			        => $trade,
        				'location'				=> $request->location,
        				'created_by'			=> $profile->user->id,
        				'created_at'			=> date('Y-m-d H:i:s'),
        				'user_id'               =>  $profile->user->id,
        				'company_description'   => $request->bio,
        				'city'                  => $request->city,
        				'state'                 => $request->state_id,
        				'postal_code'           => $request->postal_code,
        				'latitude'              => $request->latitude,
        				'longitude'             => $request->longitude,
        				'show_listing'          => $request->directory_listing
        				]);
        				
			  if($request->directory_listing == 1) {
			      
			      $uploaded = DirectoryUploads::where('user_id', $profile->user->id)->first();
			      
			      $contact_name = $request->first_name .' '. $request->last_name;
			      $emailout = new DirectoriesController();
			      $emailout->confirmEmail($contact_name, $request->company, $request->phone, $profile->user->email, $uploaded);
        				
        				if($request->hasFile('ad')) {
        						$image_two           = $request->file('ad');
        						$file_info           = $request->get('fileuploader-list-ad');
        						$file_array = json_decode($file_info, true);
        						$width = $file_array[0]["editor"]["crop"]["width"];
        						$height = $file_array[0]["editor"]["crop"]["height"];
        						$left = $file_array[0]["editor"]["crop"]["left"];
        						$top = $file_array[0]["editor"]["crop"]["top"];
        						$cfWidth = $file_array[0]["editor"]["crop"]["cfWidth"];
        						$cfHeight = $file_array[0]["editor"]["crop"]["cfHeight"];
        						
        						if(!isset($file_array[0]["editor"]["rotation"])) {
        						    $rotate = 0;
        						} else {
        						    $rotate = $file_array[0]["editor"]["rotation"];
        						}
        						
                                $png = Image::make($image_two);
                                $jpg = Image::canvas($png->width(), $png->height(), '#ffffff');
                                $jpg->insert($png);
                                $jpg->crop((int)$width, (int)$height, (int)$left, (int)$top)->rotate(-(int)$rotate);
                                
        						
        						$fileName_two        = time() . ' ' . $image_two->getClientOriginalName();
        						$fileName_two = str_replace(' ', '_', $fileName_two);
        						$jpg->save('/home/bidhub/public_html/public/storage/company/images/'.$fileName_two);
        						//$request->file('file')->storeAs('/public/storage/users/avatars', $new_image, 'uploads');
                                directories::where('user_id', $profile->user->id)->update(['company_image'=> 'company/images/'.$fileName_two]);
        					
        			  }
        			  
			            Claim::updateOrCreate(['user_id' => $profile->user->id],
        				 [
        				  'directory_id' => $uploaded->id,
        				  'contact_name' => $request->first_name .' '. $request->last_name,
        				  'phone' => $request->phone,
        				  'email' => $profile->user->email,
        				  'approved'   => 0,
        				  'company_name'		    => $request->company
        				]);
			     return view('directory.message-listing');
			    
			  }

			
			 return redirect('pricing');
    }

    /**
     * Display the specified profile.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
//    	$profile = profile::where('user_id', $id)->first();
        $profile = profile::findOrFail($id);
        
        		  
		$admin = User::where('role_id',1)->get();
							  
		$admin_profile = profile::whereNotIn('user_id', $admin)->get();
        
        if(Auth::user()->role_id != 1) { 
            
            $profile = profile::findOrFail($id);
            
                /*$admin = User::where('role_id',1)->get();
		        $profile = profile::where('id',$id)->whereNotIn('user_id', $admin)->first();
		        if(!isset($profile)){
		            return redirect('/directory');
		        }*/
            } else {
                                  
                   $profile = profile::findOrFail($id);                 
         
            }
         
        return view('profiles.show', compact('profile'));
        
    }

    /**
     * Show the form for editing the specified profile.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        
        $profile = profile::findOrFail($id);
    
		$roles = DB::table('roles')->get();
		
		$profile_role = DB::table('roles')->where('id', $profile->user->role_id)->first();
		
		if(Auth::user()->role_id == 1 || Auth::user()->id == $profile->user_id){
         $files = portfolios_profile_photo::where('profile_id', $id)->get();
        return view('profiles.edit', compact('profile', 'roles', 'profile_role','files'));
        
        } else{
            
            return redirect('/directory');
        }
    }

    /**
     * Update the specified profile in the storage.
     *
     * @param int $id
     * @param App\Http\Requests\ProfilesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        
         
				
				
			  $trade = '';
			  if($request->trade) {
    			  foreach($request->trade as $k => $val) {
    						if($k < count($request->trade) - 1)
    								  $trade = $trade.$val.',';
    						else
    								  $trade = $trade.$val;
    			  }
			  }

			 $profile = profile::find($id);
			 $profile->update([
												  'first_name'	        => $request->first_name,
												  'last_name'	        => $request->last_name,
												  'bio'			        => $request->bio,
												  'location'	        => $request->location,
												  'city'                => $request->city,
												  'state'               => $request->state_id,
												  //'postal_code'         => isset($request->postal_code) ? $request->postal_code : '',
												  'latitude'            => $request->latitude,
												  'longitude'           => $request->longitude,
												  'type'		        => $request->role,
												  'company'		        => $request->company,
												  'phone'		        => $request->phone,
												  'mobile'		        => $request->mobile,
												  'website'		        => $request->website,
												  'trade'	            => $trade,
												  'license_number'      => $request->license_number,
												  'directory_listing'   => $request->directory_listing,
												  'created_at'	=> date('Y-m-d H:i:s')
								 ]);
								 
				if(($directory = $profile->directory) !== null) {
				$directory->update([
				                                'account_type'          => $request->role,
				                                'company_trade'         => $trade,
				                                'company_name'          => $request->company,
				                                'company_description'   => $request->bio,
				                                'company_phone'         => $request->phone,
				                                'company_website'       => $request->website,
				                                'company_contact'       => $request->first_name . $request->last_name,
				                                'trade'                 => $trade,
				                                'location'	            => $request->location,
				                                'city'                  => $request->city,
											    'state'                 => $request->state_id,
											    //'postal_code'         => isset($request->postal_code) ? $request->postal_code : '',
											    'latitude'              => $request->latitude,
											    'longitude'             => $request->longitude
				                            ]);
				}
				                            
				if(($directory_upload = $profile->directory_upload) !== null) {
				$directory_upload->update([
				                                'businessName'          => $request->company,
				                                'contactName'           => $request->first_name . ' ' . $request->last_name,
				                                'category'              => $trade,
				                                'location'	            => $request->location,
				                                'city'                  => $request->city,
											    'state'                 => $request->state_id,
											    //'postal'              => isset($request->postal_code) ? $request->postal_code : '',
											    'latitude'              => $request->latitude,
											    'longitude'             => $request->longitude,
				                                'phoneNumber'           => $request->phone,
				                                'webSite'               => $request->website
				                            ]);
				}
				
	
				// User::find($profile->user->id)->update(['role_id' => $profile->roles->id]);
				
				$user = $profile->user;
				
				
					
			if($request->hasFile('files')){
			    
			     $chkalimg = DB::table('userprofile_images')->where('profile_id',$id)->get();
			     if(count($chkalimg) > 0){
			         
			         foreach($chkalimg as $imagdata){
			         
			         $path = public_path() . "/storage/portfolios/images/" . $imagdata->file_name;
			         unlink($path);
			         
			        }
			     
			        DB::table('userprofile_images')->where('profile_id',$id)->delete();
			     }
			     

			      $files = $request->file('files');
			      $file_info = $request->get('fileuploader-list-files');
			

			      foreach($files as $file){
			          $file_name = $file->getClientOriginalName();
			          $file_type = $file->getMimeType();
			          $extension = \File::extension($file_name);
			          $file_array = json_decode($file_info, true);

			          foreach($file_array as $info) {

			              $file_i = $info['file'];
			              $file_n = str_replace('0:/', '', $file_i);

			              if($file_n == $file_name && $file_type != 'application/pdf')

			              {
			                  

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
			                  
			                  

			                  $fileName = time() . ' ' . $file_name;
			                  $fileName = str_replace(' ', '_', $fileName);
			             //     $new_image->save('/home/bidhub/public_html/public/storage/portfolios/images/'.$fileName);  /*this is just for live*/
                          
                            $path = public_path() . "/storage/portfolios/images/" . $fileName;
                             $new_image->save($path);
                             //$new_image->save('/public/storage/portfolios/images/'.$fileName);
                             
                             
			                  $project_file = new portfolios_profile_photo();
			                  
			                  
			                  
			                  $project_file->profile_id = $id;
			                  $project_file->file_name  = $fileName;
			                  $project_file->file_path  = '/public/storage/portfolios/images/'.$fileName;
			                  $project_file->created_by = $profile->user->id;
			                  $project_file->file_type  = $extension;
			                  $project_file->save();
			                  
			                /*   DB::table('userprofile_images')->insertGetId([
    			  				'profile_id' => $request->title,
    			  				'file_name'	=> $request->description,
    			  				'file_path'	=> Auth::user()->id,
    			  				'created_by' =>$profile->user->id,
    			  				'file_type' => $extension
    			  				
    			  				
    						]);*/

			              }

			          }
			      }
			      
			  }
				
			  if($request->hasFile('file')) {
						$image = $request->file('file');
						$file_info = $request->get('fileuploader-list-file');
						$file_array = json_decode($file_info, true);
						$width = $file_array[0]["editor"]["crop"]["width"];
						$height = $file_array[0]["editor"]["crop"]["height"];
						$left = $file_array[0]["editor"]["crop"]["left"];
						$top = $file_array[0]["editor"]["crop"]["top"];
						$cfWidth = $file_array[0]["editor"]["crop"]["cfWidth"];
						$cfHeight = $file_array[0]["editor"]["crop"]["cfHeight"];
						
						if(!isset($file_array[0]["editor"]["rotation"])) {
						    $rotate = 0;
						} else {
						    $rotate = $file_array[0]["editor"]["rotation"];
						}
						
                        // and you are ready to go ...
                        //$new_image = Image::make($image)->crop((int)$width, (int)$height, (int)$left, (int)$top)->rotate(-(int)$rotate);
                        
                        $width = 300;
                        $height = 300;
                        
                        $canvas = Image::canvas($width, $height);
                        // and you are ready to go ...
                        //$new_image = Image::make($image)->crop((int)$width, (int)$height, (int)$left, (int)$top)->rotate(-(int)$rotate);
                        
                        // pass the right full path to the file. Remember that $path is a path inside app/public !
                        $new_image = Image::make($image)->resize($width, $height, 
                            function ($constraint) {
                                $constraint->aspectRatio();
                        });
                        
                        $canvas->insert($new_image, 'center');
                        
						
						$fileName        = time() . ' ' . $image->getClientOriginalName();
						$fileName = str_replace(' ', '_', $fileName);
						$canvas->save('/home/bidhub/public_html/public/storage/users/avatars/'.$fileName);
						//$request->file('file')->storeAs('/public/storage/users/avatars', $new_image, 'uploads');
						$profile = profile::find($id);
						$profile ->update(['avatar'=> '/public/storage/users/avatars/'.$fileName]);
						$user = User::find($profile->user->id);
						$user->avatar = '/public/storage/users/avatars/'.$fileName;
						$user->save();
			  }
			 // else {
			 //     $user->avatar = '/public/storage/users/default.png';
				//   $user->save();
				//   $user->profile->update(['avatar' => '/public/storage/users/default.png']);
			 // }
			  
			  $directory = directories::where('user_id', $profile->user->id)->first();
			  
		      DirectoryUploads::updateOrCreate(['user_id' => $profile->user->id],
    				 [
    				    'businessName'		    => $request->company,
        				'phoneNumber'		    => $request->phone,
        				'webSite'		        => $request->website,
        				'contactName'		    => $request->first_name .' '. $request->last_name,
        				'category'			    => $trade,
        				'user_id'               => $profile->user->id,
        				'show_listing'          => $request->directory_listing,
        				'email'                 => $profile->user->email,
        				'location'              => $request->location,
        				'city'                  => $request->city,
        				'state'                 => $request->state_id,
        				'postal'                => $request->postal_code,
        				'latitude'              => $request->latitude,
        				'longitude'             => $request->longitude,
        				'show_listing'          => $request->directory_listing,
        				'claimed'               => 1
    				]);
    				
    		  directories::updateOrCreate(['user_id' => $profile->user->id],
        				 [
        				'company_name'		    => $request->company,
        				'company_phone'		    => $request->phone,
        				'company_website'		=> $request->website,
        				'company_contact'		=> $request->first_name .' '. $request->last_name,
        				'trade'			        => $trade,
        				'company_email'         => $user->email,
        				'location'				=> $request->location,
        				'created_by'			=> $profile->user->id,
        				'created_at'			=> date('Y-m-d H:i:s'),
        				'user_id'               =>  $profile->user->id,
        				'company_description'   => $request->bio,
        				'account_type'          => $request->role,
        				'show_listing'          => $request->directory_listing
        				]);
    				
			  if($request->directory_listing == 1) {
        				// if($directory->approved == 0) {
        				//     $uploaded = DirectoryUploads::where('user_id', $profile->user->id)->first();
            // 			    $contact_name = $request->first_name .' '. $request->last_name;
            // 			    $emailout = new DirectoriesController();
            // 			    $emailout->confirmEmail($contact_name, $request->company, $request->phone, $profile->user->email, $uploaded);
        				// }
        				
        				if($request->hasFile('ad')) {
        						$image_two           = $request->file('ad');
        						$file_info           = $request->get('fileuploader-list-ad');
        						$file_array = json_decode($file_info, true);
        						$width = $file_array[0]["editor"]["crop"]["width"];
        						$height = $file_array[0]["editor"]["crop"]["height"];
        						$left = $file_array[0]["editor"]["crop"]["left"];
        						$top = $file_array[0]["editor"]["crop"]["top"];
        						$cfWidth = $file_array[0]["editor"]["crop"]["cfWidth"];
        						$cfHeight = $file_array[0]["editor"]["crop"]["cfHeight"];
        						
        						if(!isset($file_array[0]["editor"]["rotation"])) {
        						    $rotate = 0;
        						} else {
        						    $rotate = $file_array[0]["editor"]["rotation"];
        						}
        						
        						$png = Image::make($image_two);
                                $jpg = Image::canvas($png->width(), $png->height(), '#ffffff');
                                $jpg->insert($png);
                                $jpg->crop((int)$width, (int)$height, (int)$left, (int)$top)->rotate(-(int)$rotate);
                             
        						
        						$fileName_two        = time() . ' ' . $image_two->getClientOriginalName();
        						$fileName_two = str_replace(' ', '_', $fileName_two);
        						$jpg->save('/home/bidhub/public_html/public/storage/company/images/'.$fileName_two);
        						//$request->file('file')->storeAs('/public/storage/users/avatars', $new_image, 'uploads');
        						directories::where('user_id', $profile->user_id)->update(['company_image'=> 'company/images/'.$fileName_two]);
        					
        			    }
			        
			            $uploaded = DirectoryUploads::where('user_id', $profile->user_id)->first();
			            $dir = directories::where('user_id', $profile->user_id)->first();
			            
			            $has_claim = Claim::where('user_id', $profile->user->id)->first();
			            
			            if(!isset($has_claim)) {
			            
			            Claim::updateOrCreate(['user_id' => $profile->user_id],
        				 [
        				  'directory_id' => $uploaded->id,
        				  'contact_name' => $request->first_name .' '. $request->last_name,
        				  'phone' => $request->phone,
        				  'email' => $profile->user->email,
        				  'approved'   => 0,
        				  'company_name'		    => $request->company
        				]);
        				
        				$uploaded->update(['approved' => 0, 'show_listing' => 0]);
        				$dir->update(['approved' => 0, 'show_listing' => 0]);
        				
        				return view('directory.message-listing');
        				
			            }
			    
				
			  } 
			  
			 // if($request->directory_listing == 0) {
			      
			 //     $uploaded = DirectoryUploads::where('user_id', $profile->user_id)->first();
			 //     $dir = directories::where('user_id', $profile->user_id)->first();
			      
			 //     $uploaded->update(['show_listing' => 0]);
    //     		  $dir->update(['show_listing' => 0]);
			 // }
			  
			  //else {
			 //     directories::updateOrCreate(['user_id' => $profile->user->id],
    //     				 [
    //     				'company_name'		    => $request->company,
    //     				'company_phone'		    => $request->phone,
    //     				'company_website'		=> $request->website,
    //     				'company_contact'		=> $request->first_name .' '. $request->last_name,
    //     				'trade'			        => $trade,
    //     				'company_email'         => $user->email,
    //     				'location'				=> $request->location,
    //     				'created_by'			=> $profile->user->id,
    //     				'created_at'			=> date('Y-m-d H:i:s'),
    //     				'user_id'               =>  $profile->user->id,
    //     				'company_description'   => $request->bio,
    //     				'account_type'          => $request->role,
    //     				'show_listing'          => 0
    //     				]);
        				
        				
        				// if($request->hasFile('ad')) {
        				// 		$image_two           = $request->file('ad');
        				// 		$file_info           = $request->get('fileuploader-list-ad');
        				// 		$file_array = json_decode($file_info, true);
        				// 		$width = $file_array[0]["editor"]["crop"]["width"];
        				// 		$height = $file_array[0]["editor"]["crop"]["height"];
        				// 		$left = $file_array[0]["editor"]["crop"]["left"];
        				// 		$top = $file_array[0]["editor"]["crop"]["top"];
        				// 		$cfWidth = $file_array[0]["editor"]["crop"]["cfWidth"];
        				// 		$cfHeight = $file_array[0]["editor"]["crop"]["cfHeight"];
        						
        				// 		if(!isset($file_array[0]["editor"]["rotation"])) {
        				// 		    $rotate = 0;
        				// 		} else {
        				// 		    $rotate = $file_array[0]["editor"]["rotation"];
        				// 		}
        						
            // //                     // and you are ready to go ...
            //                      $new_image_two = Image::make($image_two)->crop((int)$width, (int)$height, (int)$left, (int)$top)->rotate(-(int)$rotate);
                                
        						
        				// 		$fileName_two        = time() . ' ' . $image_two->getClientOriginalName();
        				// 		$fileName_two = str_replace(' ', '_', $fileName_two);
        				// 		$new_image_two->save('/home/bidhub/public_html/public/storage/company/images/'.$fileName_two);
        				// 		//$request->file('file')->storeAs('/public/storage/users/avatars', $new_image, 'uploads');
        				// 		$profile = directories::where('user_id', $profile->user->id)->first();
        				// 		$profile ->update(['company_image'=> 'company/images/'.$fileName_two]);
        					
        			 //   }
			  //}
			  
			return redirect()->back();
			  
            // return redirect()->route('profiles.profile.edit')
            //     ->with('success_message', trans('profiles.model_was_updated'));
    }

    /**
     * Remove the specified profile from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
				  profile::where('user_id', $id)->delete();
				  User::find($id)->delete();

            return redirect()->route('profiles.profile.admin')
                ->with('success_message', 'User was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('profiles.unexpected_error')]);
        }
    }

}

