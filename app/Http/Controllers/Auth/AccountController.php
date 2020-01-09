<?php

		  namespace App\Http\Controllers\Auth;

		  use App\Models\User;
		  use Illuminate\Http\Request;
		  use App\Http\Controllers\Controller;
		  use Illuminate\Support\Facades\Auth;
		  use Illuminate\Support\Facades\DB;
		  use Illuminate\Support\Facades\Hash;
		  use Illuminate\Mail\Message;
          use Illuminate\Support\Facades\Password;

		  class AccountController extends Controller
		  {
					public function index() {
							  return view('accounts.account');
					}
					
					public function emailSettings(Request $request) {
					    $chat = isset($request->chat_email_settings) ? 1 : 0;
					    $proposal = isset($request->proposal_email_settings) ? 1 : 0;
					    $resume = isset($request->resume_email_settings) ? 1 : 0;
					    
					    $profile = Auth::user()->profile;
					    
					    $profile->update(['chat_message_emails' => $chat,'proposal_emails' => $proposal,'resume_emails' => $resume]);
					    
					    $request->session()->flash('email-status', 'Settings have been updated!');
					    
					    return back();
					}

					public function changeEmail(Request $request) {

							  $password = $request->current_password;
							  $new_email = $request->new_email;
							  $new_confirm_email = $request->confirm_new_email;
							  
							  if(User::where('email',$new_email)->exists()) {
							      return back()->withErrors('This email is already in use!');
							  }
							  
							  if($new_email != $new_confirm_email) {
									return back()->withErrors('New email and Confirm email does not match');
							  }

							  if(Hash::check($password, Auth::user()->password)) {
									$user = User::find(Auth::user()->id)->update(['email' => $new_email]);
									$request->session()->flash('new-email', 'New email has been updated!');
									return back();
							  }
							  return back()->withErrors('Invalid Password');
					}

					public function changePassword(Request $request) {

							  $pass = $request->current_password;
							  $new_password = $request->new_password;
							  if($request->new_password != $request->confirm_new_password) {
										return back()->withErrors('New Password and Confirm New Password does not match!');
							  }
                                
							  if(Hash::check($pass, Auth::user()->password)) {
										$user = User::find(Auth::user()->id)->update(['password' => Hash::make($new_password)]);	
										$request->session()->flash('new-password', 'New password has been updated!');
										return back();
							  }
							  return back()->withErrors('Invalid Password!');
					}
					
					public function sendEmail(Request $request)
                        {
                            $email_address = $request->email;
                            $credentials = ['email' => $email_address];
                            $response = Password::sendResetLink($credentials, function (Message $message) {
                                $message->subject($this->getEmailSubject());
                            });
                    
                            switch ($response) {
                                case Password::RESET_LINK_SENT:
                                   return redirect()->back()->with('status', trans($response));
                                case Password::INVALID_USER:
                                    return redirect()->back()->with(['email' => trans($response)]);
                            }
                        }

		  }
