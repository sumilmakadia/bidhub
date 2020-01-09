<?php

namespace App\Http\Controllers\Admin\Membership;

use App\Http\Controllers\Controller;
use App\Models\Admin\Membership\ybr_membership5_transaction;
use App\Models\Admin\Membership\ybr_membership2_plan;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;
use Markroland\Converge;
use Carbon\Carbon;
use App\Models\Crest\directories;
use App\Models\Crest\DirectoryUploads;
use Illuminate\Support\Facades\DB;

class PurchaseController extends Controller
{

    public function checkout(Request $request){
        
        $plan_id = $request->plan;
        $help_id = $request->help;
        $property_id = $request->property;
        $buy = $request->buy;
        
        $help = DB::table('addons')->where('id', $help_id)->first();
        $property = DB::table('addons')->where('id', $property_id)->first();
        
        $plan = ybr_membership2_plan::find($plan_id);
        
        return view('pages/member/shopping/shopping_checkout', compact('plan', 'help', 'property', 'buy'));
    }
    
    public function cancel_property_add_ons($number){
        $PaymentProcessor = new \markroland\Converge\ConvergeApi(
            '011384',
            'webpage',
            'P00QO3',
            false
        );
        // Submit a recurring payment
        $response = $PaymentProcessor->ccdeleterecurring(
            array(
                'ssl_recurring_id' => $number,
            )
        );
        
        ybr_membership5_transaction::where('created_by', Auth::id())->where('ssl_recurring_id', $number)->update(['status' => 'Canceled']);
    }
    
    public function cancel(Request $request){
        
        $id = $request->id;
        
        $tran = ybr_membership5_transaction::where('plan_id', $id)->where('created_by', Auth::id())->where('status', 'SUCCESS')->first();
        
        $number = $tran->ssl_recurring_id;
        
        $PaymentProcessor = new \markroland\Converge\ConvergeApi(
            '820007',
            'bidhubweb',
            'T0XOCP0XC33XX1NWGF5Y9WY79W2SMF2XI0KPDZ19P4PU7CLDQGX62673WZGZ53VV',
            true
        );
        // Submit a recurring payment
        $response = $PaymentProcessor->ccdeleterecurring(
            array(
                'ssl_recurring_id' => $number,
            )
        );
        
        ybr_membership5_transaction::where('created_by', Auth::id())->where('ssl_recurring_id', $number)->update(['status' => 'Canceled']);
        
        if($id == 6 || $id == 8){
            
        User::where('id', Auth::id())->update(['role_id' => 2]);
        
        directories::where('user_id', Auth::id())->update(['paid' => 'zero']);
        DirectoryUploads::where('user_id', Auth::id())->update(['paid' => 0]);
        
        } elseif ($id == 1){
            
            User::where('id', Auth::id())->update(['help' => 0]);
            
        } elseif($id == 2 || $id == 3 || $id == 4) {
            
            User::where('id', Auth::id())->update(['property' => 0]);
            
        }
        
        return response()->json(['success' => $response]);
    }

    /**
     * Process transactions.
     *
     * @return Illuminate\View\View
     */
    public function purchase(Request $request)
    {
        
        $amount = $request->amount;
        $help_amount = $request->help_amount;
        $property_amount = $request->property_amount;
        $buy_amount = $request->buy_amount;
        $buy_id = $request->buy_id;
        $plan_id = $request->plan_id;
        $help_id = $request->help_id;
        $property_id = $request->property_id;
        $first_name = $request->first_name;
        $last_name = $request->last_name;
        $now = Carbon::now();
        $card_number = $request->card_number;
		$exp_month = $request->exp_month;
		$exp_year = $request->exp_year;
		$card_cvv = $request->card_cvv;
		$card_name = $request->card_name;
		$address_main = $request->address_main;
		$card_unit = $request->card_unit;
		$cust_city = $request->cust_city;
		$cust_state = $request->cust_state;
		$cust_zip = $request->cust_zip;
		
		$address = $address_main;
		if(isset($card_unit)) {
		$address = $address_main .' '.$card_unit;
		}
	
        // Test Create new PaymentProcessor object
        //  $PaymentProcessor = new \markroland\Converge\ConvergeApi(
        //     '011384',
        //     'webpage',
        //     'P00QO3',
        //     false
        // );
        
        //Production Create new PaymentProcessor object
        $PaymentProcessor = new \markroland\Converge\ConvergeApi(
            '820007',
            'bidhubweb',
            'T0XOCP0XC33XX1NWGF5Y9WY79W2SMF2XI0KPDZ19P4PU7CLDQGX62673WZGZ53VV',
            true
        );
        
        if($buy_id == 7){
     
                // Submit a purchase
                $response = $PaymentProcessor->ccsale(
                    array(
                        'ssl_amount' => $buy_amount,
                        'ssl_card_number' => $card_number,
                        'ssl_cvv2cvc2' => $card_cvv,
                        'ssl_exp_date' => $exp_month . $exp_year,
                        'ssl_avs_zip' => $cust_zip,
                        'ssl_avs_address' => $address,
                        'ssl_first_name' => $first_name,
                        'ssl_last_name' => $last_name
                    )
                );
                
                if(isset($response['ssl_result_message'])){
                   $resp = $response['ssl_result_message'];
                   $ssl_recurring_id = null;
                } else if(isset($response['errorCode'])){ 
                    $resp = $response['errorMessage'];
                    $now = null;
                    $ssl_recurring_id = null;
                } else {
                   $resp = 'Transaction Error'; 
                   $now = null;
                   $ssl_recurring_id = null;
                }
                $start = Carbon::now();
                $tran = new ybr_membership5_transaction();
                $tran->plan_id = $buy_id; 
                $tran->membership_start = $start;
                $tran->membership_charge_date = $start;
                $tran->membership_charge = $buy_amount; 
                $tran->created_by = Auth::id();
                $tran->status = $resp;
                $tran->ssl_recurring_id = $ssl_recurring_id;
                $tran->save();
            
        } else {
        
        $purchases = array(
                    array('type' => 'plan', 'amount' => $amount, 'id' => $plan_id),
                    array('type' => 'help', 'amount' => $help_amount, 'id' => $help_id),
                    array('type' => 'property', 'amount' => $property_amount, 'id' => $property_id),
                    );
        
        foreach($purchases as $purchase) {
            
            $charge_next_date = $now->addDays(0);
            if($purchase['id'] == 8 && Auth::user()->free_trial != 1){
            $charge_next_date = $now->addDays(60);
            }
            $member_next_date = date_format($charge_next_date,'m/d/Y');
            
                  if($purchase['type'] == 'property' && $purchase['id'] != 0){
                        $trans = ybr_membership5_transaction::where('created_by', Auth::id())->whereIn('plan_id',array(2,3,4))->get();
                        foreach($trans as $tran){
                            $this->cancel_property_add_ons($tran->ssl_recurring_id);
                        }
                    }
                    
                    if($purchase['type'] == 'plan' && $purchase['id'] != 0 && $purchase['id'] == 6){
                        $trans = ybr_membership5_transaction::where('created_by', Auth::id())->whereIn('plan_id',array(6,8))->get();
                        foreach($trans as $tran){
                            $this->cancel_property_add_ons($tran->ssl_recurring_id);
                        }
                    }
                    
                    if($purchase['type'] == 'plan' && $purchase['id'] != 0 && $purchase['id'] == 8){
                        $trans = ybr_membership5_transaction::where('created_by', Auth::id())->get();
                        foreach($trans as $tran){
                            $this->cancel_property_add_ons($tran->ssl_recurring_id);
                        }

                        User::where('id', Auth::id())->update(['help' => 0]);
                        User::where('id', Auth::id())->update(['property' => 0]);
       
                    }
        
        if($purchase['id'] != 0) {    
            
        // Submit a recurring payment
        $response = $PaymentProcessor->ccaddrecurring(
            array(
                'ssl_amount' => $purchase['amount'],
                'ssl_card_number' => $card_number,
                'ssl_cvv2cvc2' => $card_cvv,
                'ssl_exp_date' => $exp_month . $exp_year,
                'ssl_avs_address' => $address,
                'ssl_avs_zip' => $cust_zip,
                'ssl_city' => $cust_city,
                'ssl_state' => $cust_state,
                'ssl_country' => 'US',
                // 'ssl_email' => $email,
                // 'ssl_phone' => $phone,
                'ssl_first_name' => $first_name,
                'ssl_last_name' => $last_name,
                // 'ssl_cardholder_ip' => $signup['data']['ip_address'],
                'ssl_next_payment_date' => $member_next_date,
                'ssl_billing_cycle' => 'MONTHLY'
            )
        );
        // Display Converge API response
        //print_r($response);
        
        
        
        if(isset($response['ssl_result_message'])){
           $error = 0; 
           $resp = $response['ssl_result_message'];
           $ssl_recurring_id = $response['ssl_recurring_id'];
           
            $start = Carbon::now();
            $tran = new ybr_membership5_transaction();
            $tran->plan_id = $purchase['id']; 
            $tran->membership_start = $start;
            $tran->membership_charge_date = $charge_next_date;
            $tran->membership_charge = $purchase['amount']; 
            $tran->created_by = Auth::id();
            $tran->status = $resp;
            $tran->ssl_recurring_id = $ssl_recurring_id;
            $tran->save();
            
            $user = Auth::user();
            
                if($purchase['type'] == 'plan') {
                    
                    try {
            
                      directories::where('user_id', Auth::id())->update(['paid' => 'one']);
                    
                    } catch (\Exception $e) {
                    
                        //return $e->getMessage();
                    }
                
                    try {
            
                      DirectoryUploads::where('user_id', Auth::id())->update(['paid' => 1]);
                    
                    } catch (\Exception $e) {
                    
                        //return $e->getMessage();
                    }
                    
                    User::find($user->id)->update(['role_id' => $plan_id]);
                    
                } elseif($purchase['type'] == 'help'){
                    
                    User::find($user->id)->update(['help' => $help_id]);
                    
                } elseif($purchase['type'] == 'property') {
                    
                   User::find($user->id)->update(['property' => $property_id]);
                    
                }
           
        } else if(isset($response['errorCode'])){
            $error = 1;
            $resp = $response['errorMessage'];
            $now = null;
            $ssl_recurring_id = null;
        } else {
           $error = 1; 
           $resp = 'Transaction Error'; 
           $now = null;
           $ssl_recurring_id = null;
        }
        
        }
        
        }
        
        }
        
        return response()->json(['success' => $resp, 'error' => $error]);

        
    }

    public function cancelOrder(Request $request){
        
        $order_id = $request->id;
        
        
        $tran = ybr_membership5_transaction::find($order_id);
        $id = $tran->plan_id;
        
        $number = $tran->ssl_recurring_id;
        try {
            
        $PaymentProcessor = new \markroland\Converge\ConvergeApi(
            '820007',
            'bidhubweb',
            'T0XOCP0XC33XX1NWGF5Y9WY79W2SMF2XI0KPDZ19P4PU7CLDQGX62673WZGZ53VV',
            true
        );
        // Submit a recurring payment
        $response = $PaymentProcessor->ccdeleterecurring(
            array(
                'ssl_recurring_id' => $number,
            )
        );
        
        ybr_membership5_transaction::where('id', $order_id)->update(['status' => 'Canceled']);
        
        if($id == 6 || $id == 8){
            
        User::where('id', $tran->created_by)->update(['role_id' => 2]);
        
        directories::where('user_id', $tran->created_by)->update(['paid' => 'zero']);
        DirectoryUploads::where('user_id', $tran->created_by)->update(['paid' => 0]);
        
        } elseif ($id == 1){
            
            User::where('id', $tran->created_by)->update(['help' => 0]);
            
        } elseif($id == 2 || $id == 3 || $id == 4) {
            
            User::where('id', $tran->created_by)->update(['property' => 0]);
            
        }
        
             return redirect()->back()
                ->with('success_message', trans('Order Canceled'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('ybr_membership5_transactions.unexpected_error')]);
        }
    }

}
