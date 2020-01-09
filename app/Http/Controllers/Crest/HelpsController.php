<?php

namespace App\Http\Controllers\Crest;

use App\Http\Controllers\Controller;
use App\Http\Requests\HelpsFormRequest;
use App\Models\Crest\help;
use App\Models\Crest\resumes;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Facades\DB;
use App\Models\Crest\fileHelp;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\Crest\ybr_membership5_transaction;
use App\Models\Crest\resume_notifications;
use Cookie;
use IlluminateCookieCookieJar;


class HelpsController extends Controller
{
		  /**
		   * Display a listing of the helps.
		   *
		   * @return Illuminate\View\View
		   */
		  public function admin()
		  {
					$helps = help::with('creator')->paginate(25);
					
					if(Auth::user()->role_id == 1) { 
							    	return view('help-wanted.admin', compact('helps'));
                               } else {
                                   return redirect('/help-wanted');
                               }

					
		  }
		  
		  public function bulk(Request $request)
                        {
                            if(isset($request->help_id)){
                                $ids = $request->help_id;
                            }
                            
                            try {
                                
                                foreach($ids as $id){
                                $help = help::findOrFail($id);
                                $help->delete();
                                
                                }
                    
                                return redirect()->back()
                                    ->with('success_message', trans('Help Wanted Deleted'));
                            } catch (Exception $exception) {
                    
                                return back()->withInput()
                                    ->withErrors(['unexpected_error' => 'Error Deleting']);
                            }
                        }
		  /**
		   * Display a listing of the helps.
		   *
		   * @return Illuminate\View\View
		   */
		  public function public()
		  {
					$helps = help::orderBy('created_at', 'desc')->paginate(25);
					
					

					return view('help-wanted.public', compact('helps'));
					
				
		  }
    /**
     * Display a listing of the helps.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $helps = help::with('creator')->where('created_by',Auth::Id())->paginate(25);
        
        $buys = ybr_membership5_transaction::where('plan_id', 7)->where('created_by',Auth::Id())->get();
        
        if(Auth::user()->role_id == 1 || Auth::user()->help == 1 || Auth::user()->role_id == 8 || Auth::user()->role_id == 13) {

        return view('help-wanted.index', compact('helps', 'buys'));
        
        } else {
                       return redirect('/help-wanted');
        }
    }

    /**
     * Show the form for creating a new help.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        $creators = User::pluck('name','id')->all();
        $files     = array();
        return view('help-wanted.create', compact('creators', 'files'));
        

    }

    /**
     * Store a new help in the storage.
     *
     * @param App\Http\Requests\HelpsFormRequest $request
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
			  
			  $id = DB::table('helps')->insertGetId([
																	'title'		            => $request->title,
																	'description'	        => $request->description,
																	'level_of_experience'	=> $request->level_of_experience,
																	'date_need_resume'		=> $request->date_need_resume,
																	'date_job_start'		=> $request->date_job_start,
																	'location'				=> $request->location,
																	'city'                  => $request->city,
																	'state'                 => $request->state_id,
																	'latitude'              => $request->latitude,
																	'longitude'             => $request->longitude,
																	'trade'					=> $trade,
																	'phone'                 => $request->phone,
																	'email'                 => $request->email,
																	'preferred_contact'     => serialize($request->preferred_contact),
																	'created_by'			=> Auth::Id(),
																	'created_at'			=> date('Y-m-d H:i:s')
														  ]);
														  
            
            
            if(empty($id)){ }else{
                
                $arraylist = array();
                
                $queryarray = DB::table('users')->join('profiles','profiles.user_id','=','users.id')->select('users.notification_status','users.email','profiles.city')->where('users.notification_status','1')->get();
                
                if(count($queryarray) > 0){
                    
                    
                    foreach($queryarray as $key => $queryarraydetail){
                        if(trim($queryarraydetail->city) == trim($request->city)){
                        array_push($arraylist,$queryarraydetail->email);    
                        }
                        
                    }
                    
                    $arraycommaslist = implode(',',$arraylist);
                    $setmailids = $arraycommaslist;
			        $from_email = 'donotreply@bidhub.com';
                    $headers = 'From: '.$from_email.' <'.$from_email.'>' . "\r\n";
            	    $headers .= "Content-type: text/html;charset=UTF-8" . "\r\n";
            	    $message = 'New Job <strong>'.$request->title.'</strong> is created. Please <a href="'.url('help-wanted/show/'.$id).'" target="_blank">click here</a> to view this job.';
            	    mail($setmailids, 'New Job created', $message, $headers);
                    
                }
                
                
            }

			 if($request->hasFile('files')){

										$files = $request->file('files');
										
										$file_info           = $request->get('fileuploader-list-files');
										
										foreach($files as $file){
										    
										            $file_name = $file->getClientOriginalName();
										            $file_type = $file->getMimeType();
										            $extension = \File::extension($file_name);

                            						$file_array = json_decode($file_info, true);
                            						
                            						foreach($file_array as $info) {
                            						    
                            						    $file_i = $info['file'];
                            						    $file_n = str_replace('0:/', '', $file_i);
                            						    
                            						    if($file_n == $file_name && $file_type != 'application/pdf'){
                            						        
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
                                        					$new_image->save('/home/bidhub/public_html/public/storage/helps/images/'.$fileName);
                                        					
                                        					  $project_file             = new fileHelp();
            												  $project_file->project_id = $id;
            												  $project_file->file_name  = $fileName;
            												  $project_file->file_path  = '/public/storage/helps/images/'.$fileName;
            												  $project_file->created_by = Auth::user()->id;
            												  $project_file->file_type  = $extension;
            												  $project_file->save();
                            						        
                            						    } else if($file_n == $file_name && $file_type == 'application/pdf') {
                            						        
                            						        $file->storeAs('/public/storage/projects/files', $file_name, 'uploads');
                            						        
                            						          $project_file             = new fileHelp();
            												  $project_file->project_id = $id;
            												  $project_file->file_name  = $file_name;
            												  $project_file->file_path  = '/public/storage/helps/files/'.$file_name;
            												  $project_file->created_by = Auth::user()->id;
            												  $project_file->file_type  = $extension;
            												  $project_file->save();
            												  
                            						    }
                            						    
                            						   	
        												  
                            						    
                            						}
                            						
                            						

										}

							  }

			  return redirect()->route('help-wanted.help.index')
							   ->with('success_message', trans('helps.model_was_added'));
    }

    /**
     * Display the specified help.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id,Request $request)
    {
        $help = help::with('creator')->findOrFail($id);
        $files = fileHelp::where('project_id', $id)->get();
        if($user = Auth::user()){
            $resume = resumes::where('help_id',$help->id)->where('created_by',Auth::user()->id)->exists() ? true : false;
            $owner = $help->created_by == Auth::user()->id ? true : false;
            if($help->created_by == Auth::user()->id) {
                foreach($help->resumes as $r) {
                    resume_notifications::where('resume_id',$r->id)->update(['opened' => 1]);
                }
            }
        }else{
           $resume = false;
           $owner = false;
           
        }
        
        
        return view('help-wanted.show', compact('help', 'files','resume','owner', 'favorite'));
    }
    
   /* public function viewer($id){
       
      
       $chkhelpown = DB::table('helps')->where('id',$id)->where('created_by',Auth::user()->id)->get();
       if(count($chkhelpown) > 0){
           
           $helps = DB::table('help_wanted_view')->join('helps','helps.id','=','help_wanted_view.help_id')->where('help_wanted_view.help_id',$id)->get();
           
            return view('help-wanted.viewer', compact('helps')); 
           
       }else{
           return redirect('/help-wanted');
       }
       
       
       
    }*/
    
    

    /**
     * Show the form for editing the specified help.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $help = help::findOrFail($id);
        $files     = fileHelp::where('project_id', $id)->get();
        $creators = User::pluck('name','id')->all();
        if(Auth::user()->role_id == 1 || Auth::user()->id == $help->created_by){
        return view('help-wanted.edit', compact('help','creators', 'files'));
        } else{
            
            return redirect('/help-wanted');
        }
    }

    /**
     * Update the specified help in the storage.
     *
     * @param int $id
     * @param App\Http\Requests\HelpsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
			  $trade = '';
			  if(isset($request->trade)) {
			  foreach($request->trade as $k => $val) {
						if($k < count($request->trade) - 1)
								  $trade = $trade.$val.',';
						else
								  $trade = $trade.$val;
			  } }

			  help::find($id)->update([
									    'title'		            => $request->title,
									    'description'	        => $request->description,
									    'level_of_experience'	=> $request->level_of_experience,
									    'date_need_resume'		=> $request->date_need_resume,
									    'date_job_start'		=> $request->date_job_start,
									    'location'				=> $request->location,
									    'city'                  => $request->city,
									    'state'                 => $request->state_id,
									    'latitude'              => $request->latitude,
									    'longitude'             => $request->longitude,
									    'trade'					=> $trade,
									    'phone'                 => $request->phone,
									    'email'                 => $request->email,
									    'preferred_contact'     => serialize($request->preferred_contact),
									  ]);

			  if($request->hasFile('files')){

										$files = $request->file('files');
										
										$file_info           = $request->get('fileuploader-list-files');
										
										foreach($files as $file){
										    
										            $file_name = $file->getClientOriginalName();
										            $file_type = $file->getMimeType();
										            $extension = \File::extension($file_name);

                            						$file_array = json_decode($file_info, true);
                            						
                            						foreach($file_array as $info) {
                            						    
                            						    $file_i = $info['file'];
                            						    $file_n = str_replace('0:/', '', $file_i);
                            						    
                            						    if($file_n == $file_name && $file_type != 'application/pdf'){
                            						        
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
                                        					$new_image->save('/home/bidhub/public_html/public/storage/helps/images/'.$fileName);
                                        					
                                        					  $project_file             = new fileHelp();
            												  $project_file->project_id = $id;
            												  $project_file->file_name  = $fileName;
            												  $project_file->file_path  = '/public/storage/helps/images/'.$fileName;
            												  $project_file->created_by = Auth::user()->id;
            												  $project_file->file_type  = $extension;
            												  $project_file->save();
                            						        
                            						    } else if($file_n == $file_name && $file_type == 'application/pdf') {
                            						        
                            						        $file->storeAs('/public/storage/projects/files', $file_name, 'uploads');
                            						        
                            						          $project_file             = new fileHelp();
            												  $project_file->project_id = $id;
            												  $project_file->file_name  = $file_name;
            												  $project_file->file_path  = '/public/storage/helps/files/'.$file_name;
            												  $project_file->created_by = Auth::user()->id;
            												  $project_file->file_type  = $extension;
            												  $project_file->save();
            												  
                            						    }
                            						    
                            						   	
        												  
                            						    
                            						}
                            						
                            						

										}

							  }
            return redirect()->route('help-wanted.help.index')
                ->with('success_message', trans('helps.model_was_updated'));
    }

    /**
     * Remove the specified help from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $help = help::findOrFail($id);
            $help->delete();
            
            DB::table('help_wanted_view')->where('help_id',$id)->delete();
            return redirect()->route('help-wanted.help.index')
                ->with('success_message', trans('helps.model_was_deleted'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('helps.unexpected_error')]);
        }
    }
    
    public function removeFile(Request $request){
					    
					    $id = $request->id;
					    $file  = fileHelp::findOrFail($id);
					    $file->delete();
					    if($file->file_type != 'pdf'){
					        $path = '/home/bidhub/public_html/public/storage/helps/images/'.$file->file_name;
                            unlink($path);
					        
					    } else {
					       $path = '/home/bidhub/public_html/public/storage/helps/files/'.$file->file_name;
                            unlink($path);
					    }
					    
					    return response()->json(['id' => $id]);
					    
					}



}
