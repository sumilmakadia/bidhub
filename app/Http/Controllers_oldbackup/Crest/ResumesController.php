<?php

		  namespace App\Http\Controllers\Crest;

		  use App\Http\Controllers\Controller;
		  use App\Http\Requests\resumesFormRequest;
		  use App\Models\Crest\resumes;
		  use App\Models\Crest\fileResumes;
		  use App\User;
		  use Illuminate\Http\Request;
		  use Illuminate\Support\Facades\Auth;
		  use Exception;
		  use Illuminate\Support\Facades\DB;
		  use App\Models\Crest\resume;
		  use App\Models\Crest\chatroom;
		  use App\Models\Crest\chatroom_message;
		  use Intervention\Image\ImageManagerStatic as Image;
		  use App\Models\Crest\fileproposal;
		  use App\Models\Crest\profile;

		  class ResumesController extends Controller
		  {

					/**
					 * Display a listing of the resumes.
					 *
					 * @return Illuminate\View\View
					 */
					public function index()
					{
					        
							 $resumes = resumes::where('created_by', Auth::Id())->paginate(25);
                           
							  return view('resumes.index', compact('resumes'));
					}


					public function admin()
					{
					    $this->testEmail();
							  $resumes = resumes::paginate(25);
							  
							  if(Auth::user()->role_id == 1) { 
							    return view('resumes.admin', compact('resumes'));
                               } else if(Auth::user()->role_id != 2) {
                                   return redirect('/resumes');
                                } else {
                                    return redirect('/resume-room');
                                }

							  
					}
					/**
					 * Show the form for creating a new resume.
					 *
					 * @return Illuminate\View\View
					 */
					public function create($id)
					{
							  $creators = User::pluck('name','id')->all();
                              $files     = array(); 
							  return view('resumes.create', compact('creators', 'id', 'files'));
					}

					/**
					 * Store a new resume in the storage.
					 *
					 * @param App\Http\Requests\resumesFormRequest $request
					 *
					 * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
					 */
					public function store(Request $request)
					{
							  $resume = resumes::where('id', $request->resume_id)->first();

							  $resume_table = resumes::create([
																				  'job_title'   => $request->job_title,
																				  'message'     => $request->message,
																				  'help_id'     => $request->help_id,
																				  'created_by'  => Auth::user()->id
																		]);
																		
							
																		
							$id = $resume_table->id;
																		
							$resume = resumes::where('id', $request->resume_id)->first();
							
							$message_id = DB::table('resume_notifications')->insertGetId([
																				  'user_id'     => $resume_table->help->created_by,
																				  'message'     => $request->message,
																				  'resume_id'   => $id,
																				  'opened'      => 0
																		]);				
																	
                              if($request->hasFile('files')){

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
                            					$new_image->save('/home/bidhub/public_html/public/storage/resumes/images/'.$fileName);
												  
												  fileResumes::insertGetId([
												                      'help_id'  => $resume_table->help_id,
																	  'resume_id'   => $id,
																	  'file_name'   => $file_name,
																	  'file_path'   => 'public/storage/resumes/images/'.$fileName,
																	  'file_type'   => $file_type,
																	  'created_by'  => Auth::user()->id
															]);
                						        
                						    } else if($file_n == $file_name && $file_type == 'application/pdf') {
                						        
                						        $file->storeAs('/public/storage/resumes/files', $file_name, 'uploads');
                						        
                						          fileResumes::insertGetId([
                						                              'help_id'  => $resume_table->help_id,
																	  'resume_id'     => $id,
																	  'file_name'      => $file_name,
																	  'file_path'           => 'public/storage/resumes/files/'.$file_name,
																	  'file_type'        => $file_type,
																	  'created_by'        => Auth::user()->id
															]);
                						    }
                						}
									}
							  } 
							  
					  
							  
						$profile = profile::where('user_id', $resume_table->help->created_by)->first();
						
				
                        if($profile->resume_emails == 1 ){	  
						    $this->resumeEmail($id);
                        }
                        
						return redirect('/help-wanted');
					}
					
					private function resumeEmail($resume_id)
					{
					    $resume = resumes::find($resume_id);
					    $from_email = 'donotreply@bidhub.com';
					    $email = $resume->help->creator->email;
            		    
            			$headers = 'From: '.$from_email.' <'.$from_email.'>' . "\r\n";
            			$headers .= "Content-type: text/html;charset=UTF-8" . "\r\n";
            			$message = view('emails.resume')->with(compact('resume'))->render();
            			
            			mail($email, 'New resume resume', $message, $headers);
					}
					
					public function testEmail()
					{
					    $resume = resumes::find(3);
					    
					    $from_email = 'donotreply@bidhub.com';
                        $email = 'mj@codeandsilver.com';
                		   
                        $headers = 'From: '.$from_email.' <'.$from_email.'>' . "\r\n";
                        $headers .= "Content-type: text/html;charset=UTF-8" . "\r\n";
                        $message = view('emails.resume')->with(compact('resume'))->render();
                           			
                        return mail($email, 'New resume resume', $message, $headers);
					}

					/**
					 * Display the specified resume.
					 *
					 * @param int $id
					 *
					 * @return Illuminate\View\View
					 */
					public function show($id)
					{
							  $resume   = resumes::with('user')->findOrFail($id);
                              $files    = DB::table('files_resumes')->where('resume_id', $id)->get();
                              
							  return view('resumes.show', compact('resume', 'files'));
					}

					/**
					 * Show the form for editing the specified resume.
					 *
					 * @param int $id
					 *
					 * @return Illuminate\View\View
					 */
					public function edit($id)
					{
							  $resume = resumes::findOrFail($id);
							  $creators = User::pluck('name','id')->all();
                              $files     = DB::table('files_resumes')->where('resume_id', $id)->get(); 
							  return view('resumes.edit', compact('resume','creators', 'files'));
					}

					/**
					 * Update the specified resume in the storage.
					 *
					 * @param int $id
					 * @param App\Http\Requests\resumesFormRequest $request
					 *
					 * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
					 */
					public function update($id, resumesFormRequest $request)
					{
							  $trade = '';
							  foreach($request->trade as $k => $val) {
										if($k < count($request->trade) - 1)
												  $trade = $trade.$val.',';
										else
												  $trade = $trade.$val;
							  }
                                
                            $resume = resumes::where('id', $request->resume_id)->first();
                                
							  resumes::find($id)->update([
																	'bid_title'            => $request->bid_title,
																	'bid_description'      => $request->bid_description,
																	'bid_status'           => 'active',
																	'created_by'       => Auth::user()->id,
																	'trade'	=> $trade,
																	'resume_owner'    => $resume->created_by,
																	'created_at' => date('Y-m-d H:i:s'),
														  ]);

							//  DB::table('files_resumes')->where('resume_id', $id)->delete();

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
                                        					$new_image->save('/home/bidhub/public_html/public/storage/resumes/images/'.$fileName);
                                        					
                                        					  $resume_file             = new fileresume();
            												  $resume_file->resume_id = $id;
            												  $resume_file->file_name  = $fileName;
            												  $resume_file->file_path  = '/public/storage/resumes/images/'.$fileName;
            												  $resume_file->created_by = Auth::user()->id;
            												  $resume_file->file_type  = $extension;
            												  $resume_file->save();
            												  
            												  
                            						        
                            						    } else if($file_n == $file_name && $file_type == 'application/pdf') {
                            						        
                            						        $file->storeAs('/public/storage/resumes/files', $file_name, 'uploads');
                            						        
                            						          $resume_file             = new fileresume();
            												  $resume_file->resume_id = $id;
            												  $resume_file->file_name  = $file_name;
            												  $resume_file->file_path  = '/public/storage/resumes/files/'.$file_name;
            												  $resume_file->created_by = Auth::user()->id;
            												  $resume_file->file_type  = $extension;
            												  $resume_file->save();
            												  
            											
                            						    }
                            						    
                            						   	
        												  
                            						    
                            						}
                            						
                            						

										}

							  }  
							  
							  return redirect('/resumes');
					}

					/**
					 * Remove the specified resume from the storage.
					 *
					 * @param int $id
					 *
					 * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
					 */
					public function destroy($id)
					{
							  try {
										$resume = resumes::findOrFail($id);
										$resume->delete();

										return redirect()->back()
														 ->with('success_message', 'Resume Deleted');
							  } catch (Exception $exception) {

										return back()->withInput()
													 ->withErrors(['unexpected_error' => trans('resumes.unexpected_error')]);
							  }
					}

					public function decline($id, Request $request) {
							  $type = $request->type;
							  $resume = resumes::find($id);

							  if($type=='decline'){
										$resume->bid_status = 'declined';
							  } else {
										$resume->bid_status = 'active';
							  }
							  $resume->save();
							  return "success";
					}
					
					public function removeFile(Request $request){
					    
					    $id = $request->id;
					    $file  = fileresumes::findOrFail($id);
					    $file->delete();
					    if($file->file_type != 'pdf'){
					        $path = '/home/bidhub/public_html/public/storage/resumes/images/'.$file->file_name;
                            unlink($path);
					        
					    } else {
					       $path = '/home/bidhub/public_html/public/storage/resumes/files/'.$file->file_name;
                            unlink($path);
					    }
					    
					    return response()->json(['id' => $id]);
					    
					}
					
					public function favorite(Request $request)
                    {
                        $type = $request->type;
                        $id = $request->id;
                        $is_favorite = $request->is_favorite;
						
						$resume = resumes::where('id', $id)->update(['is_favorite' => $is_favorite]);
 
						if($is_favorite == 1){
						    $favorite = 0;
						} elseif ($is_favorite == 0){
						    $favorite = 1;
						}
                        
                        return response()->json(['id' => (int)$id, 'favorite' => $favorite]);
                    }

		  }
