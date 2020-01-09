@extends('themes.elite.app_elite')

@section('title', 'My Account')

@section('content')
<div class="row">
        <div class="col-6">
	        <div class="card">
		        <div class="card-body">
			        <form name="form_myaccount_change_email_address" id="form_myaccount_change_email_address" method="POST" action="/" class="">
				        <div class="form-group">
					        <label for="exampleInputEmail1">Current Email address</label>
					        <input type="email" class="form-control" id="current_email" name="current_email" placeholder="Current Email Address" value="" disabled>
				        </div>
				        <div class="form-group">
					        <label for="exampleInputEmail1">New Email address</label>
					        <input type="email" class="form-control" id="new_email" name="new_email" placeholder="Enter email">
				        </div>
				        <div class="form-group">
					        <label for="exampleInputEmail1">Confirm New Email address</label>
					        <input type="email" class="form-control" id="confirm_new_email" name="confirm_new_email" placeholder="Enter email">
				        </div>
				        <div class="form-group">
					        <label for="exampleInputPassword1">Current Password</label>
					        <input type="password" class="form-control" id="current_password" name="current_password" placeholder="Password">
				        </div>

				        <button type="submit" class="ajax btn btn-primary">Submit</button>
			        </form>


		        </div>
	        </div>
        </div>
        <div class="col-6">
	        <div class="card">
		        <div class="card-body">
			        <form name="form_myaccount_change_password" id="form_myaccount_change_password" method="POST" action="/" class="">
				        <div class="form-group">
					        <label for="">Current Password</label>
					        <input type="password" class="form-control" id="current_password" name ="current_password" placeholder="">
				        </div>
				        <div class="form-group">
					        <label for="">New Password</label>
					        <input type="password" class="form-control" id="new_password" name ="new_password"placeholder="">
				        </div>
				        <div class="form-group">
					        <label for="">Confirm New Password</label>
					        <input type="password" class="form-control" id="confirm_new_password" name ="confirm_new_password"laceholder="">
				        </div>

				        <button type="submit" class="ajax btn btn-primary">Submit</button>
			        </form>


		        </div>
	        </div>
        </div>
</div>
@endsection
