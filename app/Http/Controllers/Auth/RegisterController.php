<?php

		  namespace App\Http\Controllers\Auth;

		  use App\User;
		  use App\Http\Controllers\Controller;
		  use Illuminate\Http\Request;
		  use Illuminate\Support\Facades\Hash;
		  use Illuminate\Support\Facades\Validator;
		  use Illuminate\Foundation\Auth\RegistersUsers;

		  class RegisterController extends Controller {
					/*
					|--------------------------------------------------------------------------
					| Register Controller
					|--------------------------------------------------------------------------
					|
					| This controller handles the registration of new users as well as their
					| validation and creation. By default this controller uses a trait to
					| provide this functionality without requiring any additional code.
					|
					*/

					use RegistersUsers;

					/**
					 * Where to redirect users after registration.
					 * @var string
					 */
					protected $redirectTo = '/profiles/create';

					/**
					 * Create a new controller instance.
					 * @return void
					 */
					public function __construct(){
							  $this->middleware('guest');
					}

					/**
					 * Get a validator for an incoming registration request.
					 * @param array $data
					 * @return \Illuminate\Contracts\Validation\Validator
					 */
					protected function validator(array $data){
							  return Validator::make($data, [
										'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
										'password' => ['required', 'string', 'min:8', 'confirmed'],
							  ]);
					}

					/**
					 * Create a new user instance after a valid registration.
					 * @param array $data
					 * @return \App\User
					 */
					protected function create(array $data){
					            
					            $this->welcomeEmail($data['email']);
					            
					            
					            if(isset($data['subscribeuser_chk'])){
					                $this->adminmail_Subscriber($data['email']);
					                $mailnotice = 1;
					            }else{
					                $mailnotice = 0;
					            }
					            
					        
							  return User::create([
										'email'    => $data['email'],
										'password' => Hash::make($data['password']),
										'notification_status'=>$mailnotice,
							  ]);
					}
					
					private function welcomeEmail($email)
					{
					    
					    $from_email = 'donotreply@bidhub.com';
            		    
            			$headers = 'From: '.$from_email.' <'.$from_email.'>' . "\r\n";
            			$headers .= "Content-type: text/html;charset=UTF-8" . "\r\n";
            			$message = view('emails.welcome')->with(compact('email'))->render();
            			
            			mail($email, 'Welcome To The BidHub Community!', $message, $headers);
					}
					
					private function adminmail_Subscriber($email){
					    
					    $adminmailid = 'bob@bidhub.com,jimmalone@bidhub.com';
					    $from_email = 'donotreply@bidhub.com';
            		    
            			$headers = 'From: '.$from_email.' <'.$from_email.'>' . "\r\n";
            			$headers .= "Content-type: text/html;charset=UTF-8" . "\r\n";
            		   $message = 'New User '.$email.' signup and subsribed on bidhub.com';
            			
            			mail($adminmailid, 'New User Subscribed !', $message, $headers);
					}

		  }
