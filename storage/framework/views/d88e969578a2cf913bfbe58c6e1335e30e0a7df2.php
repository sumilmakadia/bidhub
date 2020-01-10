<?php $__env->startSection('title', 'Checkout'); ?>

<?php $__env->startSection('content'); ?>
<div class="card" style="max-width: 700px; margin: 20px auto; padding: 20px;">
<style>
        .side-body {
            padding-left:30px;
        }
input, select {
    margin-top: 15px;
}
.help-block {
    display:none!important;
}
.error{
    color: #f00;
}
</style>
    <div class="col-md-12" style="background-color: #03a9f3;margin-bottom: 10px;">
        <?php if(isset($plan)): ?>
        <?php if($plan->id == 10): ?>

        <center><h3 style="padding: 15px 0 5px!important;font-weight: bold;color: #ffffff;"><?php echo e($plan->plan_name); ?> - $<?php echo e($plan->plan_amount); ?> <span style="font-size:14px;">per year</span></h3></center>

        <?php else: ?>

        <center><h3 style="padding: 15px 0 5px!important;font-weight: bold;color: #ffffff;"><?php echo e($plan->plan_name); ?> - $<?php echo e($plan->plan_amount); ?> <span style="font-size:14px;">per <?php echo strtolower($plan->plan_interval); ?></span></h3></center>

        <?php endif; ?>
        

        
        <?php
        if(isset($plan->plan_interval_count)) {
        
            $next = \Carbon\Carbon::now()->addDays($plan->plan_interval_count)->format("m-d-Y");
            //$next = format($next,"m-d-Y");
        }
        ?>
        
        <?php if($plan->id == 10): ?>
        <?php else: ?>
        <center><h6 style="padding: 0 0 5px!important;font-weight: bold;color: #ffffff;"><?php echo e($plan->plan_interval_count); ?> day free trial (billing begins <?php echo e($next); ?>)</h6></center>
        <?php endif; ?>

        <?php endif; ?>
        
        <?php if(isset($help)): ?>
        <center><h4 style="padding: 15px 0 5px!important;font-weight: bold;color: #ffffff;"><?php echo e($help->title); ?> - $<?php echo e($help->amount); ?> <span style="font-size:14px;">per month</span></h4></center>
        
        <?php
        if(isset($help->days)) {
            $next = 12;
            $next = \Carbon\Carbon::now()->addDays($help->days)->format("m-d-Y");
        }
        ?>
        
        <?php if($plan->id == 10): ?>
        <?php else: ?>
        <center><h6 style="padding: 0 0 5px!important;font-weight: bold;color: #ffffff;"><?php echo e($help->days); ?> day free trial (billing begins <?php echo e($next); ?>)</h6></center>
        <?php endif; ?>
        
        <?php endif; ?>
        
        <?php if(isset($property)): ?>
        <center><h4 style="padding: 15px 0 5px!important;font-weight: bold;color: #ffffff;"><?php echo e($property->title); ?> - $<?php echo e($property->amount); ?> <span style="font-size:14px;">per month</span></h4></center>
        
        <?php
        if(isset($property->days)) {
            $next = 12;
            $next = \Carbon\Carbon::now()->addDays($property->days)->format("m-d-Y");
        }
        ?>
        
         <?php if($plan->id == 10): ?>
        <?php else: ?>
        <center><h6 style="padding: 0 0 5px!important;font-weight: bold;color: #ffffff;"><?php echo e($property->days); ?> day free trial (billing begins <?php echo e($next); ?>)</h6></center>
         <?php endif; ?>

        <?php endif; ?>
        
        <?php if($buy == 1): ?>
        <center><h3 style="padding: 15px 0 5px!important;font-weight: bold;color: #ffffff;">1 Help Wanted Post - $50.00</h3></center>
        
        <?php
        $buy_total = '50.00';
        ?>
        
        <center><h6 style="padding: 0 0 5px!important;font-weight: bold;color: #ffffff;">One Time Purchase</h6></center>
        <?php endif; ?>
        
        <?php
        $planamount = 0;
        if(isset($plan->plan_amount)) {$planamount = $plan->plan_amount; }
        $hamount = 0;
        if(isset($help->amount)) {$hamount = $help->amount; }
        $pamount = 0;
        if(isset($property->amount)) {$pamount = $property->amount; }
        $total = $planamount + $pamount + $hamount;
        ?>
        <center><h4 style="padding: 15px 0 5px!important;font-weight: bold;color: #ffffff;">Total - $<?php if($buy == 1): ?><?php echo e($buy_total); ?><?php else: ?><?php echo e($total); ?><?php endif; ?></h4></center>
        <?php
        
        $plan_amount_today = 0.00;
        $plan_days = 0;
        if(isset($plan)) {
         $plan_days = $plan->plan_interval_count;
         if($plan_days > 0) {
            $plan_amount_today = 0.00; 
         }
        }
        
        $property_amount_today = 0.00;
        $property_days = 0;
        if(isset($property)) {
         $property_days = $property->days;
         if($property_days > 0) {
            $property_amount_today = 0.00; 
         }
        }
        
        $help_amount_today = 0;
        $help_days = 0;
        if(isset($help)) {
         $help_days = $help->days;
         if($help_days > 0) {
            $help_amount_today = 0.00; 
         }
        }
        
        $total = $plan_amount_today + $property_amount_today + $help_amount_today;
        
        ?>
        <?php if($plan->id == 8 && Auth::user()->free_trial != 1): ?>
            <center><u style="color:white;"><h3 style="padding: 15px 0 5px!important;font-weight: bold;color: #ffffff;">Total Amount Owed Today - $<?php echo e(money_format('%i', $total)); ?></h3></u></center>
        <?php endif; ?>
        
    </div>
    
    <?php if(Session::has('error')): ?>
        <div class="alert alert-danger">
            <?php echo e(Session::get('error')); ?>

        </div>
    <?php endif; ?>
    <form id="member-charge" method="POST" action="">
        <?php echo e(csrf_field()); ?>

        <?php if($buy == 1): ?>
        <input id="buy-amount" type="hidden" name="buy_amount" value="50.00">
        <input id="buy-id" type="hidden" name="buy_id" value="7">
        <?php else: ?>
        <input id="amount" type="hidden" name="amount" value="<?php if(isset($plan)): ?><?php echo e($plan->plan_amount); ?><?php else: ?> 0 <?php endif; ?>">
        <input id="help-amount" type="hidden" name="help_amount" value="<?php if(isset($help)): ?><?php echo e($help->amount); ?><?php else: ?> 0 <?php endif; ?>">
        <input id="property-amount" type="hidden" name="property_amount" value="<?php if(isset($property)): ?><?php echo e($property->amount); ?><?php else: ?> 0 <?php endif; ?>">
        <input id="plan-id" type="hidden" name="plan_id" value="<?php if(isset($plan)): ?><?php echo e($plan->id); ?><?php else: ?> 0 <?php endif; ?>">
        <input id="help-id" type="hidden" name="help_id" value="<?php if(isset($help)): ?><?php echo e($help->id); ?><?php else: ?> 0 <?php endif; ?>">
        <input id="property-id" type="hidden" name="property_id" value="<?php if(isset($property)): ?><?php echo e($property->id); ?><?php else: ?> 0 <?php endif; ?>">
        <?php endif; ?>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <center><h3>Billing Information</h3></center>
                    </div>
                </div>
                <input type="hidden" name="cart-id">
                <div class="row">
                    <div class="col-md-6">
                        <input id="first-name" type="text" class="full-size form-control" required="required" name="first_name" placeholder="First Name">
                    </div>
                    <div class="col-md-6">
                        <input id="last-name" type="text" class="full-size form-control" required="required" name="last_name" placeholder="Last Name">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input id="company-name" type="text" class="full-size form-control" name="company_name" placeholder="Company Name">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input id="email" type="text" class="full-size form-control" required="required" name="email" placeholder="Email Address">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input id="address-main" type="text" class="full-size form-control" required="required" name="address_main" placeholder="Street Address">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input id="address-unit" type="text" class="full-size form-control" name="address_unit" placeholder="Unit">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <input id="cust-city" type="text" class="full-size form-control" required="required" name="cust_city" placeholder="City">
                    </div>
                    <div class="col-md-4">
                        <input id="cust-state" type="text" class="full-size form-control" required="required" name="cust_state" placeholder="State">
                    </div>
                    <div class="col-md-4">
                        <input id="cust-zip" type="text" class="full-size form-control" required="required" name="cust_zip" placeholder="Zip Code">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
        <div class="row" style="width: 100%;margin: 20px auto 0;">
            <div id="cards-block"  style="margin: 0 auto;">
                <div class="credit-cards">
                    <span>Accepted credit cards: </span>
                    <img src="<?php echo e(asset('storage/company/images/amex.svg')); ?>" style="height:35px; border:1px solid black; border-radius:3px;" alt="American Express">
                    <img src="<?php echo e(asset('storage/company/images/visa.svg')); ?>" style="height:35px; border:1px solid black; border-radius:3px;" alt="Visa Card">
                    <img src="<?php echo e(asset('storage/company/images/mastercard.svg')); ?>" style="height:35px; border:1px solid black; border-radius:3px;" alt="Master Card">
                    <img src="<?php echo e(asset('storage/company/images/discover.svg')); ?>" style="height:35px; border:1px solid black; border-radius:3px;" alt="Discover Card">
                    <img src="<?php echo e(asset('storage/company/images/diners.svg')); ?>" style="height:35px; border:1px solid black; border-radius:3px;" alt="Dinners Card">
                    <img src="<?php echo e(asset('storage/company/images/jcb.svg')); ?>" style="height:35px; border:1px solid black; border-radius:3px;" alt="JCB">
                </div>
            </div>
        </div>
    </div>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <input id="card-number" class="form-control" name="card_number" required="required" placeholder="Card Number" value="<?php echo e(old('card-number')); ?>">
                    <?php if($errors->has("card-number")): ?>
                        <div class="alert alert-danger">
                            <span><?php echo e($errors->first('card-number')); ?></span>
                        </div>
                    <?php endif; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <select id="exp-month" name="exp_month" class="full-size form-control" required="required" value="<?php echo e(old('exp-month')); ?>">
                            <option value="">Expiration Month</option>
                            <option value="01">01 - January</option>
                            <option value="02">02 - February</option>
                            <option value="03">03 - March</option>
                            <option value="04">04 - April</option>
                            <option value="05">05 - May</option>
                            <option value="06">06 - June</option>
                            <option value="07">07 - July</option>
                            <option value="08">08 - August</option>
                            <option value="09">09 - September</option>
                            <option value="10">10 - October</option>
                            <option value="11">11 - November</option>
                            <option value="12">12 - December</option>
                        </select>
                    </div>
                
                    <div class="col-md-6">
                        <select id="exp-year" name="exp_year" class="full-size form-control" required="required" value="<?php echo e(old('exp-year')); ?>">
                            <option value="">Expiration Year</option>
                            <option value="19">2019</option>
                            <option value="20">2020</option>
                            <option value="21">2021</option>
                            <option value="22">2022</option>
                            <option value="23">2023</option>
                            <option value="24">2024</option>
                            <option value="25">2025</option>
                            <option value="26">2026</option>
                            <option value="27">2027</option>
                            <option value="28">2028</option>
                            <option value="29">2029</option>
                            <option value="30">2030</option>
                            <option value="31">2031</option>
                            <option value="32">2032</option>
                            <option value="33">2033</option>
                            <option value="34">2034</option>
                            <option value="35">2035</option>
                            <option value="36">2036</option>
                            <option value="37">2037</option>
                        </select>
                       
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input id="card-cvv" type="text" name="card_cvv" class="full-size form-control" required="required" placeholder="CVV" value="<?php echo e(old('card-cvv')); ?>">
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div id="message" class="col-md-12">
                <center><div id="card-message"></div></center>
            </div>
        </div>
        <div class="row">
            <div id="submit-button" class="col-md-12">
                <center><input class="btn btn-success" type="submit" value="PURCHASE MEMBERSHIP"></center>
            </div>
        </div>
        <div class="row">
            <div id="blue-loader" class="col-md-12" style="text-align: center;display:none;margin-top:15px;">
                 <img src="<?php echo e(asset('storage/company/images/loader-blue.gif')); ?>" style="height:50px;">   
            </div>
        </div>
    </form>
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script>
$("#member-charge").validate({
      rules: {
          name: {required: true},
          email: {required: true},
          subject: {requred: true}
      },
      submitHandler: function(form) {
          $('#blue-loader').show();
          $('#submit-button').hide();
          $('#card-message').hide();
                $.ajax({
                    type: 'post',
                    url: '/checkout/purchase',
                    data: {
                        '_token': $('meta[name="csrf-token"]').attr('content'),
                        'first_name': $("#first-name").val(),
                        'last_name': $("#last-name").val(),
                        'company_name': $("#company-name").val(),
                        'email': $("#email").val(),
                        'card_number': $("#card-number").val(),
                        'exp_month': $("#exp-month").val(),
                        'exp_year': $("#exp-year").val(),
                        'card_cvv': $("#card-cvv").val(),
                        'card_name': $("#card-name").val(),
                        'address_main': $("#address-main").val(),
                        'card_unit': $("#address-unit").val(),
                        'cust_city': $("#cust-city").val(),
                        'cust_state': $("#cust-state").val(),
                        'cust_zip': $("#cust-zip").val(),
                        'plan_id': $("#plan-id").val(),
                        'help_id': $("#help-id").val(),
                        'property_id': $("#property-id").val(),
                        'amount': $("#amount").val(),
                        'help_amount': $("#help-amount").val(),
                        'property_amount': $("#property-amount").val(),
                        'buy_amount': $("#buy-amount").val(),
                        'buy_id': $("#buy-id").val(),
                    },
                   success: function(data) {
                       
                       if(data.error == 1) {
                           $('#card-message').show();
                           $('#card-message').html('<div class="alert alert-danger" style="margin-top: 20px;color:#000;">'+data.success+'</div>');
                           $('#blue-loader').hide();
                           $('#submit-button').show();
                       } else {
                           window.location.replace("https://bidhub.com/transactions");
                           $('#blue-loader').hide();
                           $('#submit-button').show();
                       }       
                          
                     
                    } 
                }).done(function(data) {
                    
                });
        
            }   
        });     
    </script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bidhub/bidhub/resources/views/pages/member/shopping/shopping_checkout.blade.php ENDPATH**/ ?>