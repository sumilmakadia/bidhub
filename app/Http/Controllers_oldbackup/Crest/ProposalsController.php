<?php

		  namespace App\Http\Controllers\Crest;

		  use App\Http\Controllers\Controller;
		  use App\Http\Requests\ProposalsFormRequest;
		  use App\Models\Crest\proposal;
		  use App\User;
		  use Illuminate\Http\Request;
		  use Illuminate\Support\Facades\Auth;
		  use Exception;
		  use Illuminate\Support\Facades\DB;
		  use App\Models\Crest\project;
		  use App\Models\Crest\chatroom;
		  use App\Models\Crest\chatroom_message;
		  use Intervention\Image\ImageManagerStatic as Image;
		  use App\Models\Crest\fileProposal;
		  use App\Models\Crest\proposal_notifications;
		  use App\Models\Crest\profile;

		  class ProposalsController extends Controller
		  {

					/**
					 * Display a listing of the proposals.
					 *
					 * @return Illuminate\View\View
					 */
					public function index()
					{
							  $proposals = proposal::where('created_by', Auth::Id())->paginate(25);

							  return view('proposals.index', compact('proposals'));
					}


					public function admin()
					{
							  $proposals = proposal::paginate(25);
							  
							  if(Auth::user()->role_id == 1) { 
							    return view('proposals.admin', compact('proposals'));
                               } else if(Auth::user()->role_id != 2) {
                                   return redirect('/proposals');
                                } else {
                                    return redirect('/project-room');
                                }

							  
					}
					/**
					 * Show the form for creating a new proposal.
					 *
					 * @return Illuminate\View\View
					 */
					public function create($id)
					{
							  $creators = User::pluck('name','id')->all();
                              $files     = array(); 
							  return view('proposals.create', compact('creators', 'id', 'files'));
					}

					/**
					 * Store a new proposal in the storage.
					 *
					 * @param App\Http\Requests\ProposalsFormRequest $request
					 *
					 * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
					 */
					public function store(Request $request)
					{
					       $user_id = Auth::user()->id;
							  $trade = '';
							  foreach($request->trade as $k => $val) {
										if($k < count($request->trade) - 1)
												  $trade = $trade.$val.',';
										else
												  $trade = $trade.$val;
							  }
							  
							  $project = project::where('id', $request->project_id)->first();

							  $id = DB::table('proposals')->insertGetId([
																				  'bid_title'            => $request->bid_title,
																				  'bid_description'      => $request->bid_description,
																				  'bid_status'           => 'active',
																				  'project_id'        => $request->project_id,
																				  'created_by'       => Auth::user()->id,
																				  'project_owner'    => $project->created_by,
																				  'trade'	=> $trade,
																				  'created_at' => date('Y-m-d H:i:s'),
																		]);
																		
							$project = project::where('id', $request->project_id)->first(); 											
																		
							 $chat_id = DB::table('chatrooms')->insertGetId([
																				  'project_id'       => $request->project_id,
																				  'proposal_id'      => $id,
																				  'owner_id'         => $project->created_by,
																				  'guest_id'         => Auth::user()->id,
																				  'created_at' => date('Y-m-d H:i:s'),
																		]);	
																		
								
								
							 $message_id = DB::table('chatroom_messages')->insertGetId([
																				  'chatroom_id'       => $chat_id,
																				  'created_by'      => Auth::user()->id,
																				  'sent_to'         => $project->created_by,
																				  'message'         => $request->bid_description,
																				  'created_at' => date('Y-m-d H:i:s'),
																		]);
																
																		
							$message_notification_id = DB::table('proposal_notifications')->insertGetId([
																				  'user_id'     => $project->user->id,
																				  'message'     => $request->bid_description,
																				  'proposal_id' => $id,
																				  'opened'      => 0
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
                                        					$new_image->save('/home/bidhub/public_html/public/storage/proposal/images/'.$fileName);
                                        					
                                        					  $project_file             = new fileProposal();
            												  $project_file->proposal_id = $id;
            												  $project_file->file_name  = $fileName;
            												  $project_file->file_path  = '/public/storage/proposal/images/'.$fileName;
            												  $project_file->created_by = Auth::user()->id;
            												  $project_file->file_type  = $extension;
            												  $project_file->save();
            												  
            												  DB::table('chatroom_messages_files')->insertGetId([
																				  'message_id'     => $message_id,
																				  'file_name'      => $file_name,
																				  'file_path'           => 'public/storage/proposal/images/'.$fileName,
																				  'file_type'        => $file_type,
																				  'created_by'        => Auth::user()->id,
																				  'created_at' => date('Y-m-d H:i:s'),
																		]);
                            						        
                            						    } else if($file_n == $file_name && $file_type == 'application/pdf') {
                            						        
                            						        $file->storeAs('/public/storage/proposal/files', $file_name, 'uploads');
                            						        
                            						          $project_file             = new fileProposal();
            												  $project_file->proposal_id = $id;
            												  $project_file->file_name  = $file_name;
            												  $project_file->file_path  = '/public/storage/proposal/files/'.$file_name;
            												  $project_file->created_by = Auth::user()->id;
            												  $project_file->file_type  = $extension;
            												  $project_file->save();
            												  
            												  DB::table('chatroom_messages_files')->insertGetId([
																				  'message_id'     => $message_id,
																				  'file_name'      => $file_name,
																				  'file_path'           => 'public/storage/proposal/files/'.$file_name,
																				  'file_type'        => $file_type,
																				  'created_by'        => Auth::user()->id,
																				  'created_at' => date('Y-m-d H:i:s'),
																		]);
                            						    }
                            						}
										}
							  } 
							  
						$profile = profile::where('user_id', $project->created_by)->first();
        
                        if($profile->proposal_emails == 1 ){	  
						    $this->proposalEmail($id);
                        }
							 
						return redirect('/project-room');
					}
					
					private function proposalEmail($proposal_id)
					{
					    $proposal = proposal::find($proposal_id);
					    $from_email = 'donotreply@bidhub.com';
					    $email = $proposal->project->email;
            		    
            			$headers = 'From: '.$from_email.' <'.$from_email.'>' . "\r\n";
            			$headers .= "Content-type: text/html;charset=UTF-8" . "\r\n";
            			$message = view('emails.proposal')->with(compact('proposal'))->render();
            			
            			mail($email, 'New Project Proposal', $message, $headers);
					}
					
					public function testEmail()
					{
					    $proposal = proposal::find(70);
					    return view('emails.proposal')->with(compact('proposal'));
					    
					   // $from_email = 'donotreply@bidhub.com';
        //     		    $email = 'jake@codeandsilver.com';
            		    
        //     			$headers = 'From: '.$from_email.' <'.$from_email.'>' . "\r\n";
        //     			$headers .= "Content-type: text/html;charset=UTF-8" . "\r\n";
        //     			$message = view('emails.proposal')->with(compact('proposal'))->render();
            			
        //     			mail($email, 'New Project Proposal', $message, $headers);
					}

					/**
					 * Display the specified proposal.
					 *
					 * @param int $id
					 *
					 * @return Illuminate\View\View
					 */
					public function show($id)
					{
							$proposal = proposal::with('user')->findOrFail($id);
                            if($proposal->project_owner == Auth::user()->id) {
                                $files = DB::table('files_proposals')->where('proposal_id', $id)->get();
                                proposal_notifications::where('user_id',Auth::user()->id)->where('proposal_id',$proposal->id)->update(['opened' => true]);
							    return view('proposals.show', compact('proposal', 'files'));
                            }
                            else {
                                return redirect('/project-room');
                            }
					}

					/**
					 * Show the form for editing the specified proposal.
					 *
					 * @param int $id
					 *
					 * @return Illuminate\View\View
					 */
					public function edit($id)
					{
							  $proposal = proposal::findOrFail($id);
							  $creators = User::pluck('name','id')->all();
                              $files     = DB::table('files_proposals')->where('proposal_id', $id)->get(); 
							  return view('proposals.edit', compact('proposal','creators', 'files'));
					}

					/**
					 * Update the specified proposal in the storage.
					 *
					 * @param int $id
					 * @param App\Http\Requests\ProposalsFormRequest $request
					 *
					 * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
					 */
					public function update($id, ProposalsFormRequest $request)
					{
							  $trade = '';
							  foreach($request->trade as $k => $val) {
										if($k < count($request->trade) - 1)
												  $trade = $trade.$val.',';
										else
												  $trade = $trade.$val;
							  }
                                
                            $project = project::where('id', $request->project_id)->first();
                                
							  proposal::find($id)->update([
																	'bid_title'            => $request->bid_title,
																	'bid_description'      => $request->bid_description,
																	'bid_status'           => 'active',
																	'created_by'       => Auth::user()->id,
																	'trade'	=> $trade,
																	'project_owner'    => $project->created_by,
																	'created_at' => date('Y-m-d H:i:s'),
														  ]);

							//  DB::table('files_proposals')->where('proposal_id', $id)->delete();

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
                                        					$new_image->save('/home/bidhub/public_html/public/storage/proposal/images/'.$fileName);
                                        					
                                        					  $project_file             = new fileProposal();
            												  $project_file->proposal_id = $id;
            												  $project_file->file_name  = $fileName;
            												  $project_file->file_path  = '/public/storage/proposal/images/'.$fileName;
            												  $project_file->created_by = Auth::user()->id;
            												  $project_file->file_type  = $extension;
            												  $project_file->save();
            												  
            												  
                            						        
                            						    } else if($file_n == $file_name && $file_type == 'application/pdf') {
                            						        
                            						        $file->storeAs('/public/storage/proposal/files', $file_name, 'uploads');
                            						        
                            						          $project_file             = new fileProposal();
            												  $project_file->proposal_id = $id;
            												  $project_file->file_name  = $file_name;
            												  $project_file->file_path  = '/public/storage/proposal/files/'.$file_name;
            												  $project_file->created_by = Auth::user()->id;
            												  $project_file->file_type  = $extension;
            												  $project_file->save();
            												  
            											
                            						    }
                            						    
                            						   	
        												  
                            						    
                            						}
                            						
                            						

										}

							  }  
							  
							  return redirect('/proposals');
					}

					/**
					 * Remove the specified proposal from the storage.
					 *
					 * @param int $id
					 *
					 * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
					 */
					public function destroy($id)
					{
							  try {
										$proposal = proposal::findOrFail($id);
										$proposal->delete();

										return redirect()->back()
														 ->with('success_message', 'Proposal Deleted');
							  } catch (Exception $exception) {

										return back()->withInput()
													 ->withErrors(['unexpected_error' => trans('proposals.unexpected_error')]);
							  }
					}

					public function decline($id, Request $request) {
							  $type = $request->type;
							  $proposal = proposal::find($id);

							  if($type=='decline'){
										$proposal->bid_status = 'declined';
							  } else {
										$proposal->bid_status = 'active';
							  }
							  $proposal->save();
							  return "success";
					}
					
					public function removeFile(Request $request){
					    
					    $id = $request->id;
					    $file  = fileProposal::findOrFail($id);
					    $file->delete();
					    if($file->file_type != 'pdf'){
					        $path = '/home/bidhub/public_html/public/storage/proposal/images/'.$file->file_name;
                            unlink($path);
					        
					    } else {
					       $path = '/home/bidhub/public_html/public/storage/proposal/files/'.$file->file_name;
                            unlink($path);
					    }
					    
					    return response()->json(['id' => $id]);
					    
					}

		  }
