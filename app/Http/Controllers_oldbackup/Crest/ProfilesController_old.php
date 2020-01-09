<?php

namespace App\Http\Controllers\Crest;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfilesFormRequest;
use App\Models\Crest\profile;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\Crest\directories;
use App\Models\Crest\DirectoryUploads;
use App\Models\Crest\Claim;
use App\Models\Crest\resume;

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
					$user->save();
					
					$user = User::where('email', $request->email)->first();
					
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
			
			mail($email, 'Welcome to Bid Hub', $message, $headers);
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
                        
                        $new_image = Image::make($image)->resize($width, $height, 
                            function ($constraint) {
                                $constraint->aspectRatio();
                        });
                        
                        $canvas->insert($new_image, 'center');
						
						$fileName        = time() . ' ' . $image->getClientOriginalName();
						$fileName = str_replace(' ', '_', $fileName);
						$canvas->save('/home/bidhub/public_html/public/storage/users/avatars/'.$fileName);
						$profile = profile::find($id);
						$profile ->update(['avatar'=> '/public/storage/users/avatars/'.$fileName]);
						$user = User::find($profile->user->id);
						$user->avatar = '/public/storage/users/avatars/'.$fileName;
						$user->save();
			  }
			  
		
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
        						
                                 $new_image_two = Image::make($image_two)->crop((int)$width, (int)$height, (int)$left, (int)$top)->rotate(-(int)$rotate);
        						
        						$fileName_two        = time() . ' ' . $image_two->getClientOriginalName();
        						$fileName_two = str_replace(' ', '_', $fileName_two);
        						$new_image_two->save('/home/bidhub/public_html/public/storage/company/images/'.$fileName_two);
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
			    
			  } else {

			 return redirect('pricing');
			 
			  }
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
				$admin = User::where('role_id',1)->get();
		        $profile = profile::where('id',$id)->whereNotIn('user_id', $admin)->first();
		        if(!isset($profile)){
		            return redirect('/directory');
		        }
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

        return view('profiles.edit', compact('profile', 'roles', 'profile_role'));
        
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
				
	
				$user = $profile->user;
				
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
					
                        
                        $width = 300;
                        $height = 300;
                        
                        $canvas = Image::canvas($width, $height);
                        
                        $new_image = Image::make($image)->resize($width, $height, 
                            function ($constraint) {
                                $constraint->aspectRatio();
                        });
                        
                        $canvas->insert($new_image, 'center');
                        
						
						$fileName        = time() . ' ' . $image->getClientOriginalName();
						$fileName = str_replace(' ', '_', $fileName);
						$canvas->save('/home/bidhub/public_html/public/storage/users/avatars/'.$fileName);
						$profile = profile::find($id);
						$profile ->update(['avatar'=> '/public/storage/users/avatars/'.$fileName]);
						$user = User::find($profile->user->id);
						$user->avatar = '/public/storage/users/avatars/'.$fileName;
						$user->save();
			  }
			 
			  
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
        						
                            
                                 $new_image_two = Image::make($image_two)->crop((int)$width, (int)$height, (int)$left, (int)$top)->rotate(-(int)$rotate);
                                
        						
        						$fileName_two        = time() . ' ' . $image_two->getClientOriginalName();
        						$fileName_two = str_replace(' ', '_', $fileName_two);
        						$new_image_two->save('/home/bidhub/public_html/public/storage/company/images/'.$fileName_two);
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
			  

			return redirect()->back();
		
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
