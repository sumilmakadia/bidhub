<?php

namespace App\Http\Controllers\Crest;

use App\Http\Controllers\Controller;
use App\Http\Requests\DirectoriesFormRequest;
use App\Models\Crest\directories;
use App\Models\Crest\DirectoryUploads;
use App\Models\Crest\Trades;
use App\Models\Crest\TradesDirectory;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Facades\DB;
use Mail;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception as MailException;
use App\Models\Crest\profile;
use App\Models\Crest\Claim;
use App\Imports\UploadDirectoriesImport;
use Maatwebsite\Excel\Facades\Excel;

class DirectoriesController extends Controller
{
        public function test()
        {
            $directories = directories::whereNotNull('city')->whereNotNull('state')->whereNull('latitude')->whereNull('longitude')->get()->count();
            print_r($directories);
            return;
            foreach($directories as $key => $directory) {
                $city = DB::table('city_info')->where('city',$directory->city)->where('state_id',$directory->state)->first();
                $latitude = $city->lat;
                $longitude = $city->lng;
                $directories->get($key)->update(['latitude' => $latitude, 'longitude' => $longitude]);
            }
        }
            
        public function synctrades() {
            
            $uploads = DirectoryUploads::select('category')->groupBy('category')->get();
            
            foreach($uploads as $upload){
                
                TradesDirectory::updateOrCreate(['title' => $upload->category],
				 [
				'title'		=> $upload->category,
				]);
                    
            }        
            
        }    
            public function bulk(Request $request)
                        {
                            if(isset($request->claim_id)){
                                $ids = $request->claim_id;
                            }
                            
                            try {
                                
                                foreach($ids as $id){
                                $Claim = Claim::findOrFail($id);
                                $Claim->delete();
                                
                                }
                    
                                return redirect()->back()
                                    ->with('success_message', trans('Claim Deleted'));
                            } catch (Exception $exception) {
                    
                                return back()->withInput()
                                    ->withErrors(['unexpected_error' => 'Error Deleting']);
                            }
                        }
            
		  /**
		   * Display a listing of the directories.
		   *
		   * @return Illuminate\View\View
		   */
		  public function map()
		  {
					$directoriesObjects = DB::table('directories')->where('created_by', Auth::Id())->select('id', 'company_name', 'location')->get();
					return view('directory.map', ['directories' => ($directoriesObjects)]);
		  }


		  /**
		   * Display a listing of the directories.
		   *
		   * @return Illuminate\View\View
		   */
		  public function public()
		  {
		      
		            $company_name = '';
					$postal_code = '';
					$trade = '';
					$type = '';
					$miles = '';
					$city = '';
					$state_id = '';
					$state = '';
					$location = '';
					$latitude = '';
					$longitude = '';
							  
				// 	if(Auth::user()->role_id == 1) {
					
					$directoriesObjects = directories::with('creator')->where('paid','one')->where('approved', 1)->where('show_listing',1)->orderBy('created_at', 'desc')->paginate(20, ['*'], 'paid');
		            
				// 	} else {
					    
				// 	$admin = User::where('role_id',1)->get();
							  
		  //          $directoriesObjects = directories::with('creator')->where('paid','one')->where('approved', 1)->where('show_listing',1)->whereNotIn('user_id', $admin)->orderBy('created_at', 'desc')->get(); 
		           	
		           	
				// 	}
					
					$uploaded = DirectoryUploads::where('paid', 0)->where('approved', 1)->where('show_listing', 1)->orderBy('businessName')->paginate(20, ['*'], 'unpaid');
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
					
					$seachprocess = array();
					
					return view('directory.public', compact('directoriesObjects', 'uploaded'
					, 'company_name', 'postal_code', 'trade', 'type', 'miles', 'city', 'state_id', 'seachprocess', 'state', 'location','latitude','longitude', 'pending', 'claimed_listing'));
		  }
    /**
     * Display a listing of the directories.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $directoriesObjects = directories::paginate(10);
        
        $uploaded = DirectoryUploads::where('claimed', 0)->orderBy('businessName')->paginate(25);
        
        if(Auth::user()->role_id == 1) { 

        return view('directory.index', compact('directoriesObjects', 'uploaded'));
        
        } else {
                                   return redirect('/directory');
                               }
    }


		  public function admin()
		  {
					$claims = Claim::orderBy('created_at', 'desc')->get();
					
				 if(Auth::user()->role_id == 1) { 
							    	return view('directory.admin', compact('claims'));
                               } else {
                                   return redirect('/directory');
                               }

					
		  }
		  
		  public function freeAdmin(Request $request)
		  {
		            $search = $request->search;
					$uploaded = DirectoryUploads::when($search, function($q) use ($search) {
																		 return $q->orWhere('businessName', 'like', '%'.$search.'%');
															   })->when($search, function($q) use ($search) {
																		 return $q->orWhere('category', 'like', '%'.$search.'%');
															   })->when($search, function($q) use ($search) {
																		 return $q->orWhere('city', 'like', '%'.$search.'%');
															   })->when($search, function($q) use ($search) {
																		 return $q->orWhere('state', 'like', '%'.$search.'%');
															   })
															   ->paginate(10);
                    
                    if(Auth::user()->role_id == 1) { 
							    	return view('directory.free-admin', compact('uploaded','search'));
                               } else {
                                   return redirect('/directory');
                               }
					
		  }

    /**
     * Show the form for creating a new directories.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        //$creators = User::pluck('name','id')->all();
        
        return view('directory.create');
    }

    /**
     * Store a new directories in the storage.
     *
     * @param App\Http\Requests\DirectoriesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
	    $trade = '';
			  foreach($request->trade as $k => $val) {
						if($k < count($request->trade) - 1)
							$trade = $trade.$val.',';
						else
							$trade = $trade.$val;
		}
	
	
			  $directory = DirectoryUploads::create([
													   'businessName'	=> $request->company_name,
													   'phoneNumber'    => $request->company_phone,
													   'email'		    => $request->company_email,
													   'webSite'		=> $request->company_website,
													   'contactName'	=> $request->company_contact,
													   'category'		=> $trade,
													   'location'		=> $request->location,
													   'city'           => $request->city,
													   'state'          => $request->state_id,
													   'latitude'       => $request->latitude,
													   'longitude'      => $request->longitude,
													   'postal'         => $request->postal_code
													 ]);

		return redirect()->route('directory.free-directories.admin')->with('success_message', trans('directories.model_was_added'));
    }

    /**
     * Display the specified directories.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $directories = directories::with('creator')->findOrFail($id);

        return view('directory.show', compact('directories'));
    }

    /**
     * Show the form for editing the specified directories.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $directories = DirectoryUploads::findOrFail($id);
        $creators = User::pluck('name','id')->all();

        return view('directory.edit', compact('directories','creators'));
    }

    /**
     * Update the specified directories in the storage.
     *
     * @param int $id
     * @param App\Http\Requests\DirectoriesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        
        
        $trade = '';
			  foreach($request->trade as $k => $val) {
						if($k < count($request->trade) - 1)
							$trade = $trade.$val.',';
						else
							$trade = $trade.$val;
		}
			  DirectoryUploads::find($id)->update([
													   'businessName'		=> $request->company_name,
													   'contactName'		=> $request->company_contact,
													   'phoneNumber'		=> $request->company_phone,
													   'email'		        => $request->company_email,
													   'webSite'		    => $request->company_website,
													   'category'			=> $trade,
													   'location'			=> $request->location,
													   'city'               => $request->city,
													   'state'              => $request->state_id,
													   'latitude'           => $request->latitude,
													   'longitude'          => $request->longitude,
													   'postal'             => $request->postal_code
														  ]);

			 

            return redirect()->route('directory.free-directories.admin')
                ->with('success_message', trans('directories.model_was_updated'));

    }

    /**
     * Remove the specified directories from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            
             $claim = Claim::findOrFail($id);
             
            DirectoryUploads::updateOrCreate(['user_id' => $claim->user_id],
        				 [
            				'user_id'           => null,
		                ]);
            // $directories = directories::findOrFail($id);
            
            // if(isset($directories->upload_id)){
            
            // DirectoryUploads::find($directories->upload_id)->update(['claimed' => 0, 'user_id' => 0,]);
            
            // } 
            
            // $directories->delete();
            
            $claim->delete();

            return redirect()->route('directory.directories.admin')
                ->with('success_message', 'Claim has been denied and removed.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('directories.unexpected_error')]);
        }
    }
    
    public function freeDestroy($id)
    {
        
       
        try {
            $directories = DirectoryUploads::findOrFail($id);
            $directories->delete();

            return redirect()->route('directory.free-directories.admin')
                ->with('success_message', 'Directory deleted');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('directories.unexpected_error')]);
        }
    }

    public function claim(Request $request)
    {
        $contact_name = $request->contact_name;
        $company_name = $request->company_name;
        $phone = $request->phone;
        $email = $request->email;
        $dir_id = $request->dir_id;
        $user_id = $request->user_id;
        
        $claim = Claim::create([
                        'user_id'       => $user_id,
                        'directory_id'  => $dir_id,
                        'contact_name'  => $contact_name,
                        'company_name'  => $company_name,
                        'phone'         => $phone,
                        'email'         => $email
                      ]);
		
		$this->confirmEmail($contact_name, $company_name, $phone, $email, $claim->directory);
        
        return view('directory.message');
    }
    
    public function approve(Request $request)
    {
        $is_approved = $request->is_approved;
        $id = $request->id;
        $user_id = $request->user_id;
				
	    $directory = DirectoryUploads::find($id);
	    $directory->update(['approved' => (int)$is_approved]);
				
        $profile = 	profile::where('user_id', (int)$user_id)->first();
        
          Claim::updateOrCreate(['user_id' => $user_id],
        				 [
        				  'approved'   => $is_approved,
        				]);
        				
        	$claim = Claim::where('user_id', $user_id)->first();			
 
        if($is_approved == 1) {
             
        if(isset($profile->company)) {
        
        directories::updateOrCreate(['user_id' => (int)$user_id],
        				 [
            				'approved'          => (int)$is_approved,
            				'user_id'           => (int)$user_id,
            				'created_by'        => (int)$user_id,
        				    'company_name'		=> $profile->company,
        				    'company_phone'		=> $profile->phone,
        				    'company_website'	=> $profile->website,
        				    'company_contact'	=> $profile->first_name .' '. $profile->last_name,
        				    'trade'			    => $profile->trade,
        				    'location'			=> $profile->location,
        				    'city'              => $directory->city,
        				    'state'             => $directory->state,
        				    'latitude'          => $directory->latitude,
        				    'longitude'         => $directory->longitude,
        				    'show_listing'      =>  1
		                ]);
		                
		                $directory->update([
			                        'user_id'       => $profile->user_id,
                				    'businessName'	=> $profile->company,
                				    'phoneNumber'	=> $profile->phone,
                				    'webSite'		=> $profile->website,
                				    'contactName'	=> $profile->first_name .' '. $profile->last_name,
                				    'email'         => $profile->user->email,
                				    'location'		=> $profile->location,
                				    'category'      => $profile->trade,
                                    'city'          =>$profile->city,
                                    'state'         =>$profile->state,
                                    'show_listing'      =>  1,
                                    'approved'          => (int)$is_approved
                                    //'postal'        =>$profile->postal
                			   ]);
		                
        } else {
            directories::updateOrCreate(['user_id' => (int)$user_id],
        				 [
            				'approved'          => (int)$is_approved,
            				'user_id'           => (int)$user_id,
            				'created_by'        => (int)$user_id,
        				    'company_phone'		=> $profile->phone,
        				    'company_contact'	=> $profile->first_name .' '. $profile->last_name,
        				    'location'			=> $profile->location,
        				    'show_listing'      =>  1
		                ]);
		                
		    $directory->update([
			                        'user_id'       => $profile->user_id,
                				    'phoneNumber'	=> $profile->phone,
                				    'contactName'	=> $profile->first_name .' '. $profile->last_name,
                				    'email'         => $profile->user->email,
                				    'location'		=> $profile->location,
                				    'show_listing'      =>  1
                			   ]);            
        }
				
            
            $contact_name = $profile->first_name .' '. $profile->last_name;
            
            $this->approveEmail($contact_name, $profile->company, $profile->id, $profile->user->email);
            
        } elseif ($is_approved == 0){
           Claim::where('user_id', $user_id)->delete();
           directories::updateOrCreate(['user_id' => (int)$user_id],
        				 [
            				'approved'          => (int)$is_approved,
            				'user_id'           => null,
            				'show_listing'      =>  0
		                ]);
		    $directory->updateOrCreate(['user_id' => (int)$user_id],
        				 [
            				'approved'          => (int)$is_approved,
            				'user_id'           => null,
            				'show_listing'      =>  0
		                ]);            
           
        }
        
       return response()->json(['id' => $claim->id, 'approved' => $is_approved]);
    }
    
    public function confirmEmail($contact_name, $company_name, $phone, $email, $uploaded) {
		
		    $from_email = 'review@bidhub.com';
		    $to_email = 'review@bidhub.com';
		    
			$headers = 'From: '.$from_email.' <'.$from_email.'>' . "\r\n";
			$headers .= "Content-type: text/html;charset=UTF-8" . "\r\n";
			

				$message = view('emails.claimed')->with(compact('contact_name', 'company_name', 'phone', 'email', 'uploaded'))->render();

			
			return mail($to_email, 'Claim Listing Request for Company', $message, $headers);
		
	}
	
	public function approveEmail($contact_name, $company_name, $profile_id, $email) {
		
		    $from_email = 'review@bidhub.com';

		
			$headers = 'From: '.$from_email.' <'.$from_email.'>' . "\r\n";
			$headers .= "Content-type: text/html;charset=UTF-8" . "\r\n";
			

				$message = view('emails.claim-accepted')->with(compact('contact_name', 'company_name', 'profile_id'))->render();

			
			return mail($email, 'Claimed Listing Accepted', $message, $headers);
		
	}
	
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function importExport()
    {
        return view('directory.importExport');
    }
 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function downloadExcel($type)
    {
        $data = Item::get()->toArray();
            
        return Excel::create('itsolutionstuff_example', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function importExcel(Request $request)
    {
        
        ini_set('max_execution_time', 30000);
        ini_set('memory_limit', -1);
        
        $request->validate([
            'import_file' => 'required'
        ]);
 
 
        Excel::import(new UploadDirectoriesImport,request()->file('import_file'));
 
        return back()->with('success', 'Insert Record successfully.');
    }
    
    public function cliImportExcel()
    {
     
        Excel::import(new UploadDirectoriesImport,'/app/storage/hb-and-contractor-1.xlsx')->chunkSize()->batchSize();
 
        return back()->with('success', 'Insert Record successfully.');
    }
    
    public function syncLocation() {
        
        ini_set('max_execution_time', 30000);
        ini_set('memory_limit', -1);
        
        $uploads = DirectoryUploads::all();
        
        //$uploads = DirectoryUploads::where('id', 513)->get();
        
        foreach($uploads as $upload){
        
        $state = $upload->state;
        if(strlen($upload->state) > 2) {
			$state = DirectoriesController::fullStateToID($upload->state);
		}
		
		if(strlen((string)$upload->postal) < 5){
		    $upload->postal = str_pad($upload->postal, 5, '0', STR_PAD_LEFT);
		}
        
        $lat_long = DB::table('zip_lat_long')->where('zip', $upload->postal)->first();
        
        if($lat_long == null){
        
        $i = 0;
        do {
           if ($i > 3000) {
            break;
            }     
          $i++;    
          $upload->postal++;
          $lat_long = DB::table('zip_lat_long')->where('zip', $upload->postal)->first();
        } while ($lat_long == null);
        
        }
     
							  
		$latitude = '';
		$longitude = '';
							  
		if(isset($lat_long)){
			$latitude = $lat_long->latitude;
			$longitude = $lat_long->longitude;
		}
        
        
            DirectoryUploads::where('id', $upload->id)->update([
				'state'          => $state,
				'latitude'      => $latitude,
				'longitude'     => $longitude
            ]);
            
        }    
        
    }
    
    public static function fullStateToID($state_full){
        
        
        switch($state_full) {
            case "District of Columbia":
                $state = "DC";
                break;
            case "Alaska":
                $state = "AK";
                break;
            case "Alabama":
                $state = "AL";
                break;
            case "Arkansas":
                $state = "AR";
                break;
            case "Arizona":
                $state = "AZ";
                break;
            case "California":
                $state = "CA";
                break;
            case "Colorado":
                $state = "CO";
                break;
            case "Connecticut":
                $state = "CT";
                break;
            case "Delaware":
                $state = "DE";
                break;
            case "Florida":
                $state = "FL";
                break;
            case "Georgia":
                $state = "GA";
                break;
            case "Hawaii":
                $state = "HI";
                break;
            case "Iowa":
                $state = "IA";
                break;
            case "Idaho":
                $state = "ID";
                break;
            case "Illinois":
                $state = "IL";
                break;
            case "Indiana":
                $state = "IN";
                break;
            case "Kansas":
                $state = "KS";
                break;
            case "Kentucky":
                $state = "KY";
                break;
            case "Louisiana":
                $state = "LA";
                break;
            case "Massachusetts":
                $state = "MA";
                break;
            case "Maryland":
                $state = "MD";
                break;
            case "Maine":
                $state = "ME";
                break;
            case "Michigan":
                $state = "MI";
                break;
            case "Minnesota":
                $state = "MN";
                break;
            case "Missouri":
                $state = "MO";
                break;
            case "Mississippi":
                $state = "MS";
                break;
            case "Montana":
                $state = "MT";
                break;
            case "North Carolina":
                $state = "NC";
                break;
            case "North Dakota":
                $state = "ND";
                break;
            case "Nebraska":
                $state = "NE";
                break;
            case "New Hampshire":
                $state = "NH";
                break;
            case "New Jersey":
                $state = "NJ";
                break;
            case "New Mexico":
                $state = "NM";
                break;
            case "Nevada":
                $state = "NV";
                break;
            case "New York":
                $state = "NY";
                break;
            case "Ohio":
                $state = "OH";
                break;
            case "Oklahoma":
                $state = "OK";
                break;
            case "Oregon":
                $state = "OR";
                break;
            case "Pennsylvania":
                $state = "PA";
                break;
            case "Rhode Island":
                $state = "RI";
                break;
            case "South Carolina":
                $state = "SC";
                break;
            case "South Dakota":
                $state = "SD";
                break;
            case "Tennessee":
                $state = "TN";
                break;
            case "Texas":
                $state = "TX";
                break;
            case "Utah":
                $state = "UT";
                break;
            case "Virginia":
                $state = "VA";
                break;
            case "Vermont":
                $state = "VT";
                break;
            case "Washington":
                $state = "WA";
                break;
            case "Wisconsin":
                $state = "WI";
                break;
            case "West Virginia":
                $state = "WV";
                break;
            case "Wyoming":
                $state = "WY";
                break;
            default: 
                $state = NULL;
        }
        
       return $state;
        
    }
 

}
