@extends('themes.elite.app_elite')

@section('title', 'Messages')

@section('content')


<div class="row">
    <div class="col-lg-12">
        <div class="card">
	  <div class="row">
	      <!-- <div class="col-lg-3 col-md-4">
		<div class="card-body inbox-panel"><a href="app-compose.html" class="btn btn-danger m-b-20 p-10 btn-block waves-effect waves-light">Compose</a>
		    <ul class="list-group list-group-full">
		        <li class="list-group-item active"> <a href="javascript:void(0)"><i class="mdi mdi-gmail"></i> Inbox </a><span class="badge badge-success ml-auto">6</span></li>
		        <li class="list-group-item">
			        <a href="javascript:void(0)"> <i class="mdi mdi-star"></i> Starred </a>
		        </li>
		        <li class="list-group-item">
			  <a href="javascript:void(0)"> <i class="mdi mdi-send"></i> Draft </a><span class="badge badge-danger ml-auto">3</span></li>
		        <li class="list-group-item ">
			  <a href="javascript:void(0)"> <i class="mdi mdi-file-document-box"></i> Sent Mail </a>
		        </li>
		        <li class="list-group-item">
			  <a href="javascript:void(0)"> <i class="mdi mdi-delete"></i> Trash </a>
		        </li>
		    </ul>
		    <h3 class="card-title m-t-40">Labels</h3>
		    <div class="list-group b-0 mail-list"> <a href="javascript:void(0)" class="list-group-item"><span class="fa fa-circle text-info m-r-10"></span>Work</a> <a href="javascript:void(0)" class="list-group-item"><span class="fa fa-circle text-warning m-r-10"></span>Family</a> <a href="javascript:void(0)" class="list-group-item"><span class="fa fa-circle text-purple m-r-10"></span>Private</a> <a href="javascript:void(0)" class="list-group-item"><span class="fa fa-circle text-danger m-r-10"></span>Friends</a> <a href="javascript:void(0)" class="list-group-item"><span class="fa fa-circle text-success m-r-10"></span>Corporate</a> </div>
		</div>
	      </div> -->
	      <div class="col-12 ">
		<div class="card-body">
		    <!-- <div class="btn-group m-b-10 m-r-10" role="group" aria-label="Button group with nested dropdown">
		        <button type="button" class="btn btn-secondary font-18"><i class="mdi mdi-inbox-arrow-down"></i></button>
		        <button type="button" class="btn btn-secondary font-18"><i class="mdi mdi-alert-octagon"></i></button>
		        <button type="button" class="btn btn-secondary font-18"><i class="mdi mdi-delete"></i></button>
		    </div> -->
		    <!-- <div class="btn-group m-b-10 m-r-10" role="group" aria-label="Button group with nested dropdown">
		        <div class="btn-group" role="group">
			  <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-folder font-18 "></i> </button>
			  <div class="dropdown-menu" aria-labelledby="btnGroupDrop1"> <a class="dropdown-item" href="javascript:void(0)">Dropdown link</a> <a class="dropdown-item" href="javascript:void(0)">Dropdown link</a> </div>
		        </div>
		        <div class="btn-group" role="group">
			  <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-label font-18"></i> </button>
			  <div class="dropdown-menu" aria-labelledby="btnGroupDrop1"> <a class="dropdown-item" href="javascript:void(0)">Dropdown link</a> <a class="dropdown-item" href="javascript:void(0)">Dropdown link</a> </div>
		        </div>
		    </div> -->
		    <!-- <button type="button " class="btn btn-secondary m-r-10 m-b-10"><i class="mdi mdi-reload font-18"></i></button> -->
{{--		    <div class="btn-group" role="group">--}}
{{--		        <button id="btnGroupDrop1" type="button" class="btn m-b-10 btn-secondary font-18 dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> More </button>--}}
{{--		        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1"> <a class="dropdown-item" href="javascript:void(0)">Dropdown link</a> </div>--}}
{{--		    </div>--}}
		</div>
		<div class="card-body p-t-0">
		    <div class="card b-all shadow-none">
		        <div class="inbox-center table-responsive">
			  <table class="table table-hover no-wrap">
				  <thead>
				  <tr>
					  <th></th>
					  <th>From</th>
					  <th>Message</th>
					  <th>Date</th>
					  <th class="text-center">Edit</th>
					  <th class="text-center">Delete</th>
				  </tr>
				  </thead>
			      <tbody>
			          <tr class="unread">
				    <td style="width:40px">
				        <div class="custom-control custom-checkbox mr-sm-2">
					  <input type="checkbox" class="custom-control-input" id="checkbox0" value="check">
					  <label class="custom-control-label" for="checkbox0"></label>
				        </div>
				    </td>
{{--				    <td style="width:40px" class="hidden-xs-down"><i class="fa fa-star-o"></i></td>--}}
				    <td class="hidden-xs-down">Hritik Roshan</td>
				    <td class="max-texts"> <a href="/dashboard/message/view" />Lorem ipsum perspiciatis unde omnis iste natus error sit voluptatem</td>
{{--				    <td class="hidden-xs-down"><i class="fa fa-paperclip"></i></td>--}}
				    <td class="text-center"> 12:30 PM </td>
				          <td class="text-center">Edit</td>
				          <td class="text-center">Delete</td>
			          </tr>
			          <tr class="unread">
				    <td>
				        <div class="custom-control custom-checkbox mr-sm-2">
					  <input type="checkbox" class="custom-control-input" id="checkbox1" value="check">
					  <label class="custom-control-label" for="checkbox1"></label>
				        </div>
				    </td>
{{--				    <td class="hidden-xs-down"><i class="fa fa-star text-warning"></i></td>--}}
				    <td class="hidden-xs-down">Genelia Roshan</td>
				    <td class="max-texts"><a href="/dashboard/message/view">Lorem ipsum perspiciatis unde omnis iste natus error sit voluptatem</a></td>
{{--				    <td class="hidden-xs-down"><i class="fa fa-paperclip"></i></td>--}}
				    <td class="text-center"> May 13 </td>
				          <td class="text-center">Edit</td>
				          <td class="text-center">Delete</td>
			          </tr>
			          <tr class="unread">
				    <td>
				        <div class="custom-control custom-checkbox mr-sm-2">
					  <input type="checkbox" class="custom-control-input" id="checkbox2" value="check">
					  <label class="custom-control-label" for="checkbox2"></label>
				        </div>
				    </td>
{{--				    <td class="hidden-xs-down"><i class="fa fa-star-o"></i></td>--}}
				    <td class="hidden-xs-down">Ritesh Deshmukh</td>
				    <td class="max-texts"><a href="/dashboard/message/view">Lorem ipsum perspiciatis unde omnis iste natus error sit voluptatem</a></td>
{{--				    <td class="hidden-xs-down"><i class="fa fa-paperclip"></i></td>--}}
				    <td class="text-center"> May 12 </td>
				          <td class="text-center">Edit</td>
				          <td class="text-center">Delete</td>
			          </tr>
			          <tr>
				    <td>
				        <div class="custom-control custom-checkbox mr-sm-2">
					  <input type="checkbox" class="custom-control-input" id="checkbox3" value="check">
					  <label class="custom-control-label" for="checkbox3"></label>
				        </div>
				    </td>
{{--				    <td class="hidden-xs-down"><i class="fa fa-star-o"></i></td>--}}
				    <td class="hidden-xs-down">Akshay Kumar</td>
				    <td class="max-texts"><a href="/dashboard/message/view">Lorem ipsum perspiciatis unde omnis iste natus error sit voluptatem</a></td>
{{--				    <td class="hidden-xs-down"><i class="fa fa-paperclip"></i></td>--}}
				    <td class="text-center"> May 12 </td>
				          <td class="text-center">Edit</td>
				          <td class="text-center">Delete</td>
			          </tr>
			          <tr>
				    <td>
				        <div class="custom-control custom-checkbox mr-sm-2">
					  <input type="checkbox" class="custom-control-input" id="checkbox4" value="check">
					  <label class="custom-control-label" for="checkbox4"></label>
				        </div>
				    </td>
{{--				    <td class="hidden-xs-down"><i class="fa fa-star-o"></i></td>--}}
				    <td class="hidden-xs-down">Hritik Roshan</td>
				    <td class="max-texts"><a href="/dashboard/message/view">Lorem ipsum perspiciatis unde omnis iste natus error sit voluptatem</a></td>
{{--				    <td class="hidden-xs-down"><i class="fa fa-paperclip"></i></td>--}}
				    <td class="text-center"> May 12 </td>
				          <td class="text-center">Edit</td>
				          <td class="text-center">Delete</td>
			          </tr>
			          <tr>
				    <td>
				        <div class="custom-control custom-checkbox mr-sm-2">
					  <input type="checkbox" class="custom-control-input" id="checkbox5" value="check">
					  <label class="custom-control-label" for="checkbox5"></label>
				        </div>
				    </td>
{{--				    <td class="hidden-xs-down"><i class="fa fa-star text-warning"></i></td>--}}
				    <td class="hidden-xs-down">Genelia Roshan</td>
				    <td class="max-texts"><a href="/dashboard/message/view">Lorem ipsum perspiciatis unde omnis iste natus error sit voluptatem</a></td>
{{--				    <td class="hidden-xs-down"><i class="fa fa-paperclip"></i></td>--}}
				    <td class="text-center"> May 11 </td>
				          <td class="text-center">Edit</td>
				          <td class="text-center">Delete</td>
			          </tr>
			          <tr>
				    <td>
				        <div class="custom-control custom-checkbox mr-sm-2">
					  <input type="checkbox" class="custom-control-input" id="checkbox6" value="check">
					  <label class="custom-control-label" for="checkbox6"></label>
				        </div>
				    </td>
{{--				    <td class="hidden-xs-down"><i class="fa fa-star-o"></i></td>--}}
				    <td class="hidden-xs-down">Ritesh Deshmukh</td>
				    <td class="max-texts"><a href="/dashboard/message/view">Lorem ipsum perspiciatis unde omnis iste natus error sit voluptatem</a></td>
{{--				    <td class="hidden-xs-down"><i class="fa fa-paperclip"></i></td>--}}
				    <td class="text-center"> May 11 </td>
				          <td class="text-center">Edit</td>
				          <td class="text-center">Delete</td>
			          </tr>
			       
			        
			      </tbody>
			  </table>
		        </div>
		    </div>
		</div>
	      </div>
	  </div>
        </div>
    </div>
</div>
@endsection
