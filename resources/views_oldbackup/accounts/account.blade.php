@extends('layouts.app')

@section('title', 'My Account')

@section('content')
	<div class="page-wrapper" style="min-height: 149px;">
		<div class="container-fluid">
			<div class="row page-titles">
				<div class="col-md-5 align-self-center">
					<h4 class="text-themecolor">Account Settings</h4>
				</div>
				<div class="col-md-7 align-self-center text-right">
					<div class="d-flex justify-content-end align-items-center">
					</div>
				</div>
			</div>
			<div class="row">
			    <div class="col-12 col-sm-12 col-md-6">
			        <div class="row">
			            <div class="col-12">
        			        <div class="card">
        						<div class="card-body">
        						    <form method="POST" action="{{route('account.email_settings')}}">
        						        @csrf
            						    <label style="font-weight:bold!important;color:#fb9678;"><h4>Email Notification Settings:</h4></label>
            						    @if(Session::has('email-status'))
                                        <div class="alert alert-success">
                                          {{ Session::get('email-status')}}
                                        </div>
                                        @endif
            						    <div class="custom-alert">Email Settings Changed!</div>
            	                        <div class="form-group row" style="margin-bottom:0;">
            	                            <div class="col-12" style="margin:auto 0;">
            								    <label for="chat_messages">Do you want to receive chat message notifications through email?</label>
                								<input type="checkbox" name="chat_email_settings" data-id="chat" {{ Auth::user()->profile->chat_message_emails == 1 ? 'checked' : ''}}>
            								</div>
            							</div>
            	                        <div class="form-group row" style="margin-bottom:0;">
            	                            <div class="col-12" style="margin:auto 0;">
            							        <label for="chat_messages">Do you want to receive proposal message notifications through email?</label>
                								<input type="checkbox" name="proposal_email_settings" data-id="proposal" {{ Auth::user()->profile->proposal_emails == 1 ? 'checked' : '' }}>
            								</div>
            							</div>
            							<div class="form-group row">
            							    <div class="col-12" style="margin:auto 0;">
            							        <label for="chat_messages">Do you want to receive resume message notifications through email?</label>
                								<input type="checkbox" name="resume_email_settings" data-id="resume" {{ Auth::user()->profile->resume_emails == 1 ? 'checked' : '' }}>
            								</div>
            							</div>
            							<div class="form-group row">
            							    <div class="col-12" style="margin-top:20px;">
            							        <button type="submit" class="ajax btn btn-primary">Update</button>
            								</div>
            							</div>
        							</form>
        						</div>
        					</div>
			            </div>
			        </div>
			        <div class="row">
        				<div class="col-12">
        					<div class="card">
        						<div class="card-body">
        							<form name="form_myaccount_change_email_address" id="form_myaccount_change_email_address" method="POST" action="{{route('account.email')}}" class="">
        								{{csrf_field()}}
        								@if($errors->any())
        									<h4>{{$errors->first()}}</h4>
        								@endif
                                        @if(Session::has('new-email'))
                                        <div class="alert alert-success">
                                          {{ Session::get('new-email')}}
                                        </div>
                                        @endif
        								<div class="form-group">
        									<label for="exampleInputEmail1">Current Email address</label>
        									<input type="email" class="form-control" id="current_email" name="current_email" placeholder="Current Email Address" value="{{Auth::user()->email}}" disabled>
        								</div>
        								<div class="form-group">
        									<label for="exampleInputEmail1">New Email address</label>
        									<input type="email" class="form-control" id="new_email" name="new_email" placeholder="Enter email" required>
        								</div>
        								<div class="form-group">
        									<label for="exampleInputEmail1">Confirm New Email address</label>
        									<input type="email" class="form-control" id="confirm_new_email" name="confirm_new_email" placeholder="Enter email" required>
        								</div>
        								<div class="form-group">
        									<label for="exampleInputPassword1">Current Password</label>
        									<input type="password" class="form-control" id="current_password" name="current_password" placeholder="Password" required>
        								</div>
        								<button type="submit" class="ajax btn btn-primary">Update</button>
        							</form>
        						</div>
        					</div>
        				</div>
			        </div>
			    </div>
		        <div class="col-12 col-sm-12 col-md-6">
    				<div class="row">
    				    <div class="col-12">
        					<div class="card">
        						<div class="card-body">
        							<form name="form_myaccount_change_password" id="form_myaccount_change_password" method="POST" action="{{route('account.change_password')}}" class="">
        								{{csrf_field()}}
        								@if($errors->any())
        									<h4>{{$errors->first()}}</h4>
        								@endif
        								@if(Session::has('new-password'))
                                        <div class="alert alert-success">
                                          {{ Session::get('new-password')}}
                                        </div>
                                        @endif
        								<div class="form-group">
        									<label for="">Current Password</label>
        									<input type="password" class="form-control" id="current_password" name="current_password" placeholder="">
        								</div>
        								<div class="form-group">
        									<label for="">New Password</label>
        									<input type="password" class="form-control" id="new_password" name="new_password" placeholder="">
        								</div>
        								<div class="form-group">
        									<label for="">Confirm New Password</label>
        									<input type="password" class="form-control" id="confirm_new_password" name="confirm_new_password" laceholder="">
        								</div>
        
        								<button type="submit" class="ajax btn btn-primary">Update</button>
        							</form>
        						</div>
        					</div>
    				    </div>
    				</div>
				</div>
			</div>
		</div>
	</div>
@endsection
@section('js')
<script>
    $(document).ready(function($) {
        $('.custom-checkbox').click(function() {
            var option = $(this).find('.box');
            var type = $(this).next().data('id');
            if(option.hasClass('checkmark')) {
                option.removeClass('fa-check checkmark');
                option.addClass('fa-times times');
            }
            else if(option.hasClass('times')) {
                option.removeClass('fa-times times');
                option.addClass('fa-check checkmark');
            }
            $.ajax({
    			type: 'post',
    			url: '/account/email-settings',
    			data: {
    			    '_token': $('meta[name="csrf-token"]').attr('content'),
    			    type: type
    			},
    			success: function(data) {
    			    $('.custom-alert').slideDown(300);
    			    setTimeout(function() {
    			        $('.custom-alert').slideUp(300);
    			    },3000);
    			}
            });
        });
    });
</script>
@endsection