<?php

		  namespace App\Http\Controllers\Crest;

		  use App\Http\Controllers\Controller;
		  use App\Http\Requests\UsersFormRequest;
		  use App\Models\Crest\role;
		  use App\Models\user;
		  use Exception;
		  use App\Models\Crest\proposal;
		  use App\Models\Crest\property;
		  use App\Models\Crest\project;
		  use App\Models\Crest\directories;
          use App\Models\Crest\DirectoryUploads;
          use App\Models\Crest\profile;
          use App\Models\Crest\Claim;
          use App\Models\Crest\chatroom;
          use App\Models\Crest\chatroom_message;
          use App\Models\Crest\fileResumes;
          use App\Models\Crest\proposal_notifications;
          use App\Models\Crest\ybr_membership5_transaction;
          use App\Models\Crest\resumes;

		  class UsersController extends Controller{
					/**
					 * Display a listing of the users.
					 *
					 * @return Illuminate\View\View
					 */
					public function public(){
							  $users = user::with('role')->paginate(25);

							  return view('members.public', compact('users'));
					}

					/**
					 * Display a listing of the users.
					 *
					 * @return Illuminate\View\View
					 */
					public function index(){
							  $users = user::with('role')->paginate(25);

							  return view('members.index', compact('users'));
					}

					/**
					 * Show the form for creating a new user.
					 *
					 * @return Illuminate\View\View
					 */
					public function create(){
							  $Roles = Role::pluck('id', 'id')->all();

							  return view('members.create', compact('Roles'));
					}

					/**
					 * Store a new user in the storage.
					 *
					 * @param App\Http\Requests\UsersFormRequest $request
					 * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
					 */
					public function store(UsersFormRequest $request){
							  try{

										$data = $request->getData();

										user::create($data);

										return redirect()->route('members.user.index')
														 ->with('success_message', trans('users.model_was_added'));
							  }catch(Exception $exception){

										return back()->withInput()
													 ->withErrors(['unexpected_error' => trans('users.unexpected_error')]);
							  }
					}

					/**
					 * Display the specified user.
					 *
					 * @param int $id
					 * @return Illuminate\View\View
					 */
					public function show($id){
							  $user = user::with('role')->findOrFail($id);

							  return view('members.show', compact('user'));
					}

					/**
					 * Show the form for editing the specified user.
					 *
					 * @param int $id
					 * @return Illuminate\View\View
					 */
					public function edit($id){
							  $user  = user::findOrFail($id);
							  $Roles = Role::pluck('id', 'id')->all();

							  return view('members.edit', compact('user', 'Roles'));
					}

					/**
					 * Update the specified user in the storage.
					 *
					 * @param int                                $id
					 * @param App\Http\Requests\UsersFormRequest $request
					 * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
					 */
					public function update($id, UsersFormRequest $request){
							  try{

										$data = $request->getData();

										$user = user::findOrFail($id);
										$user->update($data);

										return redirect()->route('members.user.index')
														 ->with('success_message', trans('users.model_was_updated'));
							  }catch(Exception $exception){

										return back()->withInput()
													 ->withErrors(['unexpected_error' => trans('users.unexpected_error')]);
							  }
					}

					/**
					 * Remove the specified user from the storage.
					 *
					 * @param int $id
					 * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
					 */
					public function destroy($id){
							  try{
										$user = user::findOrFail($id);
										$user->delete();
										
										  proposal::where('created_by', $id)->delete();
                                		  property::where('created_by', $id)->delete();
                                		  project::where('created_by', $id)->delete();
                                		  directories::where('created_by', $id)->delete();
                                          DirectoryUploads::where('user_id', $id)->delete();
                                          profile::where('user_id', $id)->delete();
                                          Claim::where('user_id', $id)->delete();
                                          chatroom_message_file::where('created_by',$id)->delete();
                                          chatroom_message::where('created_by', $id)->orWhere('sent_to',$id)->delete();
                                          chatroom::where('owner_id', $id)->orWhere('guest_id', $id)->delete();
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

										return redirect()->route('members.user.index')
														 ->with('success_message', 'User Deleted');
							  }catch(Exception $exception){

										return back()->withInput()
													 ->withErrors(['unexpected_error' => trans('users.unexpected_error')]);
							  }
					}

		  }
