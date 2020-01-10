<?php $__env->startSection('content'); ?>
<style>

.checkoutcssbtn{
    font-weight: 700;
    letter-spacing: 1.4px;
    border: 1px solid #1aabec;
    display: inline-block;
    padding: 10px 47px;
    border-radius: 3px;
    transition: all 0.4s linear;
    line-height: 50px;
    text-transform: uppercase;
}

.redbtncss{
    font-weight: 700;
    letter-spacing: 1.4px;
    display: inline-block;
    border-radius: 3px;
    transition: all 0.4s linear;
    text-transform: uppercase;
}
.purchasecs-btn{
    font-weight: 700;
    letter-spacing: 1.4px;
    border: 1px solid #1aabec;
    display: inline-block;
    padding: 0px 90px;
    border-radius: 3px;
    transition: all 0.4s linear;
    line-height: 50px;
    text-transform: uppercase;
}
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
					<h4 class="text-themecolor">Manage Membership  <?php if(isset(Auth::user()->id)): ?>
                                <?php if(Auth::user()->role_id == 2): ?>
                                <small style="color:red; padding:0px 20px;"> You are currently a free user</small>
                                <?php endif; ?>
                                <?php endif; ?></h4> 
					
				</div>
				<div class="col-md-7 align-self-center text-right">
					<div class="d-flex justify-content-end align-items-center">

						</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					
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
							    
								<?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<div class="col-md-4 col-xs-12 col-sm-6">
										<div class="pricing-box <?php if($key == 2): ?> featured-plan <?php else: ?> b-l <?php endif; ?>">
											<div class="pricing-body card" <?php if($plan->id != 10): ?> style="min-height: 141px;" <?php endif; ?>>
												<div class="card-header" style="min-height: 141px;">
													<?php if($key == 2): ?>
														<h4 class="price-lable text-white bg-warning" style="width:210px; top:0px !important;"> LIMITED TIME OFFER</h4>
													<?php endif; ?>
													<?php if($plan->id == Auth::user()->role_id ): ?>
													<h4 style="border:1px solid red;border: 1px solid red; display: inline-block;padding: 5px 30px;margin-bottom: 0;">CURRENT</h4>
													<?php endif; ?>
													<?php $name = explode(',', $plan->plan_name); $count = count($name); ?>
													<h3 class="text-center "><?php $__currentLoopData = $name; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($n); ?> <?php if($key < $count-1): ?>
													    , <br>
													<?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></h3>
													<?php if($plan->plan_amount != 0.00): ?>
													<h5 class="text-center"><span class="price-sign">$</span><?php echo e($plan->plan_amount); ?></h5>
													<?php endif; ?>
													<p class="uppercase" style="margin-bottom:12px;"><?php echo e($plan->plan_interval); ?></p>
													<?php if($plan->id == 8 && Auth::user()->free_trial != 1): ?>
													<p class="uppercase" style="color:#fb9677;">60 Day Free Trial</p>
													<?php endif; ?>
												</div>
												<div class="price-table-content">
													<?php
                    							    $features = explode(',', $plan->plan_description);
                    							    ?>
                    							    <?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    								<div class="price-row"><?php echo e($feature); ?></div>
                    								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    								<?php if($plan->id == Auth::user()->role_id && $plan->id != 2): ?>
                    								<div class="row pricing-plan" style="padding-top:0;">
                            							 <div class="col-md-12 align-self-center text-center">
                                                            <div class="d-flex justify-content-end align-items-center">
                                                               <a href="" id="cancel-sub<?php echo e($plan->id); ?>" data-id="<?php echo e($plan->id); ?>" style="background-color:#e36a75;border-color: #e36a75;margin: 0 auto;" class="redbtncss cancel-plan btn btn-info m-l-15" title="<?php echo e(trans('ybr_membership5_transactions.create')); ?>" onclick="ConfirmDialog('Are you sure you would like to cancel your subscription?  You will be downgraded to a Free Subscription and will no longer be billed.', '<?php echo $plan->id;?>');">
                                                                 <i class="fa fa-minus-circle"></i>Cancel Subscription
                                                              </a>
                                                                <div id="blue-loader<?php echo e($plan->id); ?>" class="col-md-12" style="text-align: center;display:none;margin-top:15px;">
                                                                     <img src="<?php echo e(asset('storage/company/images/loader-blue.gif')); ?>" style="height:50px;">   
                                                                </div>
                                                            </div>
                                                        </div>
                            						</div>
                    								<?php else: ?>
                    								<?php if($plan->id != 2): ?>
                    								<?php if($plan->id == 6 && Auth::user()->role_id == 8): ?>
                    								<div class="col-md-12 align-self-center text-center">
                                                            <div class="cancel-premium" style="margin:10px 0;color:#36a200;font-weight: 200;display:none;">Selecting This Plan Will Cancel Your Premium Subscription</div>
                                                    </div>
                    								<?php elseif($plan->id == 8 && Auth::user()->role_id != 2 && Auth::user()->role_id != 1 || Auth::user()->help > 0 && $plan->id != 6 || Auth::user()->property > 0 && $plan->id != 6): ?>
                    								<?php if($plan->id != 10): ?>
                    								<div class="col-md-12 align-self-center text-center">
                                                            <div class="cancel-all" style="margin:10px 0;color:#36a200;font-weight: 200;display:none;">Selecting this plan will upgrade all current plans and add-ons to Premium pricing and capabilities.</div>
                                                    </div>
                                                    <?php endif; ?>
                                                    
                                                    <?php endif; ?>
													<div class="price-row">
														<button id="<?php echo e($plan->id); ?>" class="purchasecs-btn addon-select btn btn-success waves-effect waves-light m-t-20 ess-select">Select</button>
													</div>
													<?php endif; ?>
													<?php endif; ?>
												</div>
											</div>
										</div>
									</div>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</div>
							<div class="price-row row" style="padding-top:30px;">
									<a id="pricing-link" href="" style="margin: 0 auto;font-size: 36px;">
									    <button style="font-size:24px;" class="checkoutcssbtn btn btn-info waves-effect waves-light m-t-20">Proceed To Checkout</button>
									</a>
							</div>
							<div class="section-title" style="margin-top:50px;text-align: center;">
                				<h2>ADD-ONS TO MEMBERSHIP</h2>
                			</div>
							<div class="col-md-1 no-padding"></div>
							<div class="row pricing-plan" style="padding-top:0;">
								
								<?php $__currentLoopData = $addons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $adds): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<div class="col-md-3 col-xs-12 col-sm-6">
										<div class="pricing-box <?php if($key == 2): ?> featured-plan <?php else: ?> b-l <?php endif; ?>">
											<div class="pricing-body card">
												<div class="pricing-header" >
													<?php if($key == 2): ?>
														<h4 class="price-lable text-white bg-warning"> Popular</h4>
													<?php endif; ?>
													<?php if($adds->id == Auth::user()->help ): ?>
													<h4 style="border:1px solid red;border: 1px solid red; display: inline-block;padding: 5px 30px;margin-bottom: 0;">CURRENT</h4>
													<?php endif; ?>
												
													<?php if($adds->id == Auth::user()->property): ?>
													<h4 style="border:1px solid red;border: 1px solid red; display: inline-block;padding: 5px 30px;margin-bottom: 0;">CURRENT</h4>
													<?php endif; ?>
												
													<?php $name = explode(',', $adds->title); $count = count($name); ?>
													<h3 class="text-center"><?php $__currentLoopData = $name; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($n); ?> <?php if($key < $count-1): ?>
													    , <br>
													<?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></h3>
													<?php if($adds->amount != 0.00): ?>
													<h5 class="text-center"><span class="price-sign">$</span><?php echo e($adds->amount); ?> Monthly</h5>
													<?php endif; ?>
												</div>
												<div class="price-table-content">
													<?php
                    							    $features = explode(',', $adds->benefits);
                    							    ?>
                    							    <?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    								<div class="price-row"><?php echo e($feature); ?></div>
                    								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    								<?php if($adds->id == Auth::user()->help ): ?>
                    								<div class="row pricing-plan" style="padding-top:0;">
                            							 <div class="col-md-12 align-self-center text-center">
                                                            <div class="d-flex justify-content-end align-items-center">
                                                               <a href="" id="cancel-sub<?php echo e($adds->id); ?>" data-id="<?php echo e($plan->id); ?>" style="background-color:#e36a75;border-color: #e36a75;margin: 0 auto;" class="redbtncss cancel-plan btn btn-info m-l-15" title="<?php echo e(trans('ybr_membership5_transactions.create')); ?>" onclick="ConfirmDialog('Are you sure you would like to cancel your Help Wanted add-on?', '<?php echo $adds->id;?>');">
                                                                 <i class="fa fa-minus-circle"></i>Cancel Help Wanted Add-On
                                                              </a>
                                                                <div id="blue-loader<?php echo e($adds->id); ?>" class="col-md-12" style="text-align: center;display:none;margin-top:15px;">
                                                                     <img src="<?php echo e(asset('storage/company/images/loader-blue.gif')); ?>" style="height:50px;">   
                                                                </div>
                                                            </div>
                                                        </div>
                            						</div>
                    								<?php elseif($adds->id == Auth::user()->property): ?>
                    								<div class="col-md-12 align-self-center text-center">
                                                            <div class="cancel-select" style="margin:10px 0;color:#36a200;font-weight: 200;display:none;">Selecting another Property Add-On will cancel this Add-On</div>
                                                    </div>
                    								<div class="row pricing-plan" style="padding-top:0;">
                            							 <div class="col-md-12 align-self-center text-center">
                                                            <div class="d-flex justify-content-end align-items-center">
                                                               <a href="" id="cancel-sub<?php echo e($adds->id); ?>" data-id="<?php echo e($plan->id); ?>" style="background-color:#e36a75;border-color: #e36a75;margin: 0 auto;" class="redbtncss cancel-plan btn btn-info m-l-15" title="<?php echo e(trans('ybr_membership5_transactions.create')); ?>" onclick="ConfirmDialog('Are you sure you would like to cancel your Property For Sale add-on?', '<?php echo $adds->id;?>');">
                                                                 <i class="fa fa-minus-circle"></i>Cancel Property Add-On
                                                              </a>
                                                                <div id="blue-loader<?php echo e($adds->id); ?>" class="col-md-12" style="text-align: center;display:none;margin-top:15px;">
                                                                     <img src="<?php echo e(asset('storage/company/images/loader-blue.gif')); ?>" style="height:50px;">   
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                            
                            						</div>
                    								<?php else: ?>
                    								<div class="price-row">
														<button id="<?php echo e($adds->id); ?>" class="purchasecs-btn addon-select btn btn-success waves-effect waves-light m-t-20 <?php if($adds->type == 1): ?> help-select <?php endif; ?> <?php if($adds->type == 2): ?> home-select <?php endif; ?>">Select</button>
													</div>
													<?php endif; ?>
												</div>
											</div>
										</div>
									</div>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
	
	
	
	
	
	
	
	
	
	

	
	
	
	
	
	
	
	
	
	
	
	<style type="text/css">
 
 .navbar-light .navbar-toggler{border:none !important;     outline: none;}
 
 
 
 .admaintab{margin:20px 0px;}
 
 .card.text-xs-center {
    text-align: center;
}
 .card {
	 border: 0;
	 border-radius: 0px;
	 -webkit-box-shadow: 0 3px 0px 0 rgba(0, 0, 0, 0.08);
	 box-shadow: 0 3px 0px 0 rgba(0, 0, 0, 0.08);
	 transition: all 0.3s ease-in-out;
	 position: relative;
	 will-change: transform;
	 padding: .75rem 1.25rem;
	 box-shadow: 0 20px 35px 0 rgba(0, 0, 0, 0.08);
	 min-height: 423px;
	 margin: 20px 0px;
}
 .card:after {
	 content: "";
	 position: absolute;
	 top: 0;
	 left: 0;
	 width: 0%;
	 height: 5px;
	 background-color: #517fdb;
	 transition: 0.5s;
}
 .card:hover {
	 transform: scale(1.05);
	 -webkit-box-shadow: 0 20px 35px 0 rgba(0, 0, 0, 0.08);
	 box-shadow: 0 20px 35px 0 rgba(0, 0, 0, 0.08);
}
 .card:hover:after {
	 width: 100%;
}
 .card .card-header {
	 background-color: white;
	 padding-left: 2rem;
	 border-bottom: 0px;
}
 .card .card-title {
	 margin-bottom: 1rem;
}
 .card .card-block {
	 padding-top: 0;
	 min-height: 274px;
}
 
 .display-2 {
	 font-size: 2.5rem;
	 letter-spacing: -0.1rem;
}
 .display-2 .currency {
	 font-size: 2.2rem;
	 position: relative;
	 font-weight: 400;
	 top: -2px;
	 letter-spacing: 0px;
}
 .display-2 .period {
	 font-size: 1rem;
	 color: #b3b3b3;
	 letter-spacing: 0px;
}
 
 .abouttem .text-left {
    text-align: left!important;
    border-bottom: 1px solid #ccc;
    margin-bottom: 25px;
    box-shadow: 0px 0px 11px 3px #ccc;
    padding: 25px;
}
 .mainimgclas img{width:50%; margin:0px auto;}
 .cuscontent{margin:20px 0px;}
    h2{font-size: 30px;}
    body{font-family: erbaum, sans-serif; font-weight: 200;font-style: normal;}
    
    .whiteaft_yellow{font-size: 20px; padding:60px 0px; }
    .whiteaft_yellow p{font-size: 14px;     line-height: 25px;}
    




    @media  only screen and (max-width:780px){
        
           #navbarTogglerDemo03 {
    border-top: 0px;
    box-shadow: none;
    background: #fff;
    padding: 11px;
    position: absolute;
    width: 100%;
    left: 0px;
    top: 56px;
}

#navbarTogglerDemo03 li a{color:#000;}



        .advertisecon.whiteaft_yellow{padding:0px;}
        body,html{overflow-x:hidden;}
        .get_touch .right_inner_content .th-h2{line-height:37px;}
        .sliderdata .lscbtn {margin-top:0px;}
        .carousel button.lscbtn,.sliderdata .lscbtn {
          padding: 5px 7px;
          font-weight: bold;
          text-transform: uppercase;
          font-size: 10px;
          
      }

      .btnimg {
          width: 11px;
          margin: 0px 6px;
      }

      .mobilesearc{background-color: #000;  padding: 24px 60px; width: 100%; margin: 0px auto;}
        .srchlist{display: none;}
        .mobilesearc{display: block;}
       .search-form .form-group:hover,.search-form .form-group.hover, .search-form .form-group {
          width: 90%;
          border-radius: 4px 25px 25px 4px;
          margin-right: 14px;
          margin-bottom: 8px;
           background-color: #fff;
        }

        .search-form .form-group span.form-control-feedback{right: 14px;}
        .srchlist{order: 2;}
        .header{position: relative;}
        
        .btn-outline-light-custom{border: none; color: #fff; margin-left: 4px !important;      }
        .btn-outline-light-custom .fa{display: none;}
        .sliderdata h1,.sliderdata p{font-size: 14px !important; line-height: 19px !important;}
        .img-w-42{width: 80%;}
        .hb .carousel-caption { bottom: 30px !important; font-size: 14px !important; }
        #navbarTogglerDemo03 .navbar-nav{padding-left: 0px !important;  margin-left: 0px !important;}
    }
  
    @media  only screen and (max-width:480px){
        
        .yellow-area li, .graybox-area li {font-size: 18px; line-height: 30px;}

        .hb{     background: #000; }
        .sliderdata h1, .sliderdata p{color:#fff; text-shadow: 1px 1px 2px #525252;}
        .carousel-item img{opacity:0.8;}
        .carousel-indicators{ bottom: -17px;}
      .hb .carousel-caption { bottom: -31px !important; font-size: 14px !important; }
      .carousel button.lscbtn,.sliderdata .lscbtn {text-shadow: 1px 1px 3px #fff; padding: 5px 7px 2px 7px;}
    
    }

     
 </style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bidhub/bidhub/resources/views/pricing/pricing.blade.php ENDPATH**/ ?>