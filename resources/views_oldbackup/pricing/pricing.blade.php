@extends('layouts.app')

@section('content')
<style>
.ui-widget-header {
    border: 1px solid #ddd;
    background: #e46a76!important;
    color: #fff!important;
    font-weight: bold;
}
.ui-dialog .ui-dialog-titlebar-close {
    position: absolute;
    right: .3em;
    top: 50%;
    width: 20px;
    margin: -9px 0 0 0;
    padding: 0px 0 1px;
    height: 23px;
}
.pricing-body {
    border-radius: 0px;
    border: 1px solid rgba(120, 130, 140, 0.13);
    border-bottom: 5px solid rgba(120, 130, 140, 0.13);
    vertical-align: middle;
    padding: 30px 0px;
    position: relative;
    margin: 0 10px;
}
.btn-blue{
    background-color:#4281e2;
    border-color: #4281e2!important;
    box-shadow: 0 0 0 0.2rem rgb(66, 129, 226)!important;
}
</style>
	<div class="page-wrapper" style="min-height: 149px;">
		<div class="container-fluid">
			<div class="row page-titles">
				<div class="col-md-5 align-self-center">
					<h4 class="text-themecolor">Manage Membership</h4>
				</div>
				<div class="col-md-7 align-self-center text-right">
					<div class="d-flex justify-content-end align-items-center">

						</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-body">
							<style>
								.text-center {
									text-align: center!important;
									font-weight: bold;
									line-height: 1.5;
									font-size: 1.1em;
								}
							</style>
							<div class="row pricing-plan">
							    <!--<div class="col-md-1 no-padding"></div>-->
								@foreach ($plans as $key => $plan)
									<div class="col-md-4 col-xs-12 col-sm-6 no-padding">
										<div class="pricing-box @if ($key == 2) featured-plan @else b-l @endif">
											<div class="pricing-body" style="min-height: 953px;">
												<div class="pricing-header" style="min-height: 141px;">
													@if ($key == 2)
														<h4 class="price-lable text-white bg-warning" style="width:210px;"> LIMITED TIME OFFER</h4>
													@endif
													@if($plan->id == Auth::user()->role_id )
													<h4 style="border:1px solid red;border: 1px solid red; display: inline-block;padding: 5px 30px;margin-bottom: 0;">CURRENT</h4>
													@endif
													<?php $name = explode(',', $plan->plan_name); $count = count($name); ?>
													<h3 class="text-center">@foreach($name as $key => $n) {{$n}} @if ($key < $count-1)
													    , <br>
													@endif @endforeach</h3>
													@if($plan->plan_amount != 0.00)
													<h5 class="text-center"><span class="price-sign">$</span>{{$plan->plan_amount}}</h5>
													@endif
													<p class="uppercase" style="margin-bottom:12px;">{{$plan->plan_interval}}</p>
													@if($plan->id == 8 && Auth::user()->free_trial != 1)
													<p class="uppercase" style="color:#fb9677;">60 Day Free Trial</p>
													@endif
												</div>
												<div class="price-table-content">
													@php
                    							    $features = explode(',', $plan->plan_description);
                    							    @endphp
                    							    @foreach($features as $feature)
                    								<div class="price-row">{{$feature}}</div>
                    								@endforeach
                    								@if($plan->id == Auth::user()->role_id && $plan->id != 2)
                    								<div class="row pricing-plan" style="padding-top:0;">
                            							 <div class="col-md-12 align-self-center text-center">
                                                            <div class="d-flex justify-content-end align-items-center">
                                                               <a href="" id="cancel-sub{{$plan->id}}" data-id="{{$plan->id}}" style="background-color:#e36a75;border-color: #e36a75;margin: 0 auto;" class="cancel-plan btn btn-info m-l-15" title="{{ trans('ybr_membership5_transactions.create') }}" onclick="ConfirmDialog('Are you sure you would like to cancel your subscription?  You will be downgraded to a Free Subscription and will no longer be billed.', '<?php echo $plan->id;?>');">
                                                                 <i class="fa fa-minus-circle"></i>Cancel Subscription
                                                              </a>
                                                                <div id="blue-loader{{$plan->id}}" class="col-md-12" style="text-align: center;display:none;margin-top:15px;">
                                                                     <img src="{{ asset('storage/company/images/loader-blue.gif')}}" style="height:50px;">   
                                                                </div>
                                                            </div>
                                                        </div>
                            						</div>
                    								@else
                    								@if($plan->id != 2)
                    								@if($plan->id == 6 && Auth::user()->role_id == 8)
                    								<div class="col-md-12 align-self-center text-center">
                                                            <div class="cancel-premium" style="margin:10px 0;color:#36a200;font-weight: 200;display:none;">Selecting This Plan Will Cancel Your Premium Subscription</div>
                                                    </div>
                    								@elseif($plan->id == 8 && Auth::user()->role_id != 2 && Auth::user()->role_id != 1 || Auth::user()->help > 0 && $plan->id != 6 || Auth::user()->property > 0 && $plan->id != 6)
                    								<div class="col-md-12 align-self-center text-center">
                                                            <div class="cancel-all" style="margin:10px 0;color:#36a200;font-weight: 200;display:none;">Selecting this plan will upgrade all current plans and add-ons to Premium pricing and capabilities.</div>
                                                    </div>
                                                    @endif
													<div class="price-row">
														<button id="{{$plan->id}}" class="addon-select btn btn-success waves-effect waves-light m-t-20 ess-select">Select</button>
													</div>
													@endif
													@endif
												</div>
											</div>
										</div>
									</div>
								@endforeach
							</div>
							<div class="price-row row" style="padding-top:30px;">
									<a id="pricing-link" href="" style="margin: 0 auto;font-size: 36px;">
									    <button style="font-size:30px;" class="btn btn-info waves-effect waves-light m-t-20">Proceed To Checkout</button>
									</a>
							</div>
							<div class="section-title" style="margin-top:50px;text-align: center;">
                				<h2>ADD-ONS TO MEMBERSHIP</h2>
                			</div>
							<div class="col-md-1 no-padding"></div>
							<div class="row pricing-plan" style="padding-top:0;">
								
								@foreach($addons as $adds)
									<div class="col-md-3 col-xs-12 col-sm-6 no-padding">
										<div class="pricing-box @if ($key == 2) featured-plan @else b-l @endif">
											<div class="pricing-body ">
												<div class="pricing-header" >
													@if ($key == 2)
														<h4 class="price-lable text-white bg-warning"> Popular</h4>
													@endif
													@if($adds->id == Auth::user()->help )
													<h4 style="border:1px solid red;border: 1px solid red; display: inline-block;padding: 5px 30px;margin-bottom: 0;">CURRENT</h4>
													@endif
												
													@if($adds->id == Auth::user()->property)
													<h4 style="border:1px solid red;border: 1px solid red; display: inline-block;padding: 5px 30px;margin-bottom: 0;">CURRENT</h4>
													@endif
												
													<?php $name = explode(',', $adds->title); $count = count($name); ?>
													<h3 class="text-center">@foreach($name as $key => $n) {{$n}} @if ($key < $count-1)
													    , <br>
													@endif @endforeach</h3>
													@if($adds->amount != 0.00)
													<h5 class="text-center"><span class="price-sign">$</span>{{$adds->amount}} Monthly</h5>
													@endif
												</div>
												<div class="price-table-content">
													@php
                    							    $features = explode(',', $adds->benefits);
                    							    @endphp
                    							    @foreach($features as $feature)
                    								<div class="price-row">{{$feature}}</div>
                    								@endforeach
                    								@if($adds->id == Auth::user()->help )
                    								<div class="row pricing-plan" style="padding-top:0;">
                            							 <div class="col-md-12 align-self-center text-center">
                                                            <div class="d-flex justify-content-end align-items-center">
                                                               <a href="" id="cancel-sub{{$adds->id}}" data-id="{{$plan->id}}" style="background-color:#e36a75;border-color: #e36a75;margin: 0 auto;" class="cancel-plan btn btn-info m-l-15" title="{{ trans('ybr_membership5_transactions.create') }}" onclick="ConfirmDialog('Are you sure you would like to cancel your Help Wanted add-on?', '<?php echo $adds->id;?>');">
                                                                 <i class="fa fa-minus-circle"></i>Cancel Help Wanted Add-On
                                                              </a>
                                                                <div id="blue-loader{{$adds->id}}" class="col-md-12" style="text-align: center;display:none;margin-top:15px;">
                                                                     <img src="{{ asset('storage/company/images/loader-blue.gif')}}" style="height:50px;">   
                                                                </div>
                                                            </div>
                                                        </div>
                            						</div>
                    								@elseif($adds->id == Auth::user()->property)
                    								<div class="col-md-12 align-self-center text-center">
                                                            <div class="cancel-select" style="margin:10px 0;color:#36a200;font-weight: 200;display:none;">Selecting another Property Add-On will cancel this Add-On</div>
                                                    </div>
                    								<div class="row pricing-plan" style="padding-top:0;">
                            							 <div class="col-md-12 align-self-center text-center">
                                                            <div class="d-flex justify-content-end align-items-center">
                                                               <a href="" id="cancel-sub{{$adds->id}}" data-id="{{$plan->id}}" style="background-color:#e36a75;border-color: #e36a75;margin: 0 auto;" class="cancel-plan btn btn-info m-l-15" title="{{ trans('ybr_membership5_transactions.create') }}" onclick="ConfirmDialog('Are you sure you would like to cancel your Property For Sale add-on?', '<?php echo $adds->id;?>');">
                                                                 <i class="fa fa-minus-circle"></i>Cancel Property Add-On
                                                              </a>
                                                                <div id="blue-loader{{$adds->id}}" class="col-md-12" style="text-align: center;display:none;margin-top:15px;">
                                                                     <img src="{{ asset('storage/company/images/loader-blue.gif')}}" style="height:50px;">   
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                            
                            						</div>
                    								@else
                    								<div class="price-row">
														<button id="{{$adds->id}}" class="addon-select btn btn-success waves-effect waves-light m-t-20 @if($adds->type == 1) help-select @endif @if($adds->type == 2) home-select @endif">Select</button>
													</div>
													@endif
												</div>
											</div>
										</div>
									</div>
								@endforeach
							</div>	
							
					</div>
				</div>
			</div>
		</div>
	</div>
	

<script>

function ConfirmDialog(message, id) {
  
    $('<div></div>').appendTo('body')
    .html('<div><h6>'+message+'</h6></div>')
    .dialog({
        modal: true, title: 'Confirm Subscription Cancelation', zIndex: 10000, autoOpen: true,
        width: 'auto', resizable: false,
        buttons: {
            Yes: function () {
                // $(obj).removeAttr('onclick');                                
                // $(obj).parents('.Parent').remove();

                $('body').append('<h1>Confirm Dialog Result: <i>Yes</i></h1>');

                $(this).dialog("close");
                $('#cancel-sub'+id).hide();
                $('#blue-loader'+id).show();
                
                ConfirmCancel(id);
                
            },
            No: function () {                                                                 
                $('body').append('<h1>Confirm Dialog Result: <i>No</i></h1>');

                $(this).dialog("close");
            }
        },
        close: function (event, ui) {
            $(this).remove();
        }
    });
     $('.ui-dialog-titlebar-close').text('X');
};

$( '#cancel-sub' ).click(function(event) {
		    event.preventDefault();
});

$( '.cancel-plan' ).click(function(event) {
		    event.preventDefault();
});

$('.help-select').click(function () {
   $(this).toggleClass("btn-blue");
   $(this).text('Select');

});

$('.ess-select').click(function () {
   $(this).toggleClass("btn-blue");
   $(this).text('Select');
    $('.ess-select').not(this).removeClass("btn-blue");
});

$('.home-select').click(function () {
 
   $(this).toggleClass("btn-blue");
   $('.home-select').not(this).removeClass("btn-blue");
   $(this).text('Select');
   
});

$('.addon-select').click(function () {
   var id = $(this).attr('id');

  
  var home = 0;
  var help = 0;
  var plan = 0;
 
  if ($(".home-select").hasClass("btn-blue")) {
      
      $('.cancel-select').hide();
      
        $(".home-select").each(function() {
            $(this).text('Select');
        if ($(this).hasClass("btn-blue")) {
            home = $(this).attr('id');
            $(this).text('Selected');
            $('.cancel-select').show();
        }
       
        });
    
    }
    
    if ($(".ess-select").hasClass("btn-blue")) {
      
      //$('.cancel-select').hide();
       
        $(".ess-select").each(function() {
            $(this).text('Select');
           
        if ($(this).hasClass("btn-blue")) {
            plan = $(this).attr('id');
            if(plan == 8) {
            $('.cancel-all').show();
            $('#6').text('Select');
            }
            if(plan == 6) {
            $('.cancel-premium').show();
            $('.cancel-all').hide();
            }
            plan = $(this).attr('id');
            $(this).text('Selected');
        }
       
        });
    
    } else {
        $('.cancel-all').hide();
        $('.cancel-premium').hide();
    }
    
    if ($(".help-select").hasClass("btn-blue")) {
      help = $(".help-select").attr('id');
      $(this).text('Selected');
    }
    
    // if ($(".ess-select").hasClass("btn-blue")) {
    //   plan = $(".ess-select").attr('id');
    //   $(this).text('Selected');
    // }

   $("#pricing-link").attr("href", '/checkout?plan='+plan+'&help='+help+'&property='+home);
});


function ConfirmCancel(id) {

	$.ajax({
		type: 'post',
		url: '/subscription/cancel',
		data: {
		    '_token': $('meta[name="csrf-token"]').attr('content'),
		    'id':id
		},
	   success: function(data) {
	       
	      //alert('Your subscription has been canceled.');
	      location.reload();
	     
		} 
	}).done(function(data) {
	    
	});
}		
	</script>	
@endsection