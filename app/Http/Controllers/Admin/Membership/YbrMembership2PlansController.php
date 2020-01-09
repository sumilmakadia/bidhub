<?php

namespace App\Http\Controllers\Admin\Membership;

use App\Http\Controllers\Controller;
//use App\Models\Admin\Membership\YbrMembership1Product;
use App\Models\Admin\Membership\ybr_membership2_plan;
use App\Models\Admin\Membership\ybr_membership1_product;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\Membership\ybr_membership5_transaction;
use Illuminate\Support\Facades\DB;

class YbrMembership2PlansController extends Controller
{

    /**
     * Display a listing of the ybr membership2 plans.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $ybrMembership2Plans = ybr_membership2_plan::paginate(25);
        
        if(Auth::user()->role_id == 1) { 
							    	  return view('admin.membership.plans.index', compact('ybrMembership2Plans'));
                               } else {
                                   return redirect('/project-room');
                               }

       
    }

    /**
     * Show the form for creating a new ybr membership2 plan.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        $YbrMembership1Products = ybr_membership1_product::pluck('product_title','id')->all();
        
        return view('admin.membership.plans.create', compact('YbrMembership1Products'));
    }

    /**
     * Store a new ybr membership2 plan in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
            
            
            ybr_membership2_plan::create([		  
                                                  'product_id' => 2,
                                                  'plan_name'	=> $request->plan_name,
												  'plan_description'	=> $request->plan_description,
												  'extradesc' => $request->plan_description,
												  'plan_amount'			=> $request->plan_amount,
												  'plan_object'			=> '',
												  'plan_billing_scheme' => '',
												  'plan_currency' => '',
												  'plan_interval'		=> $request->plan_interval,
												  'plan_interval_count' => '',
												  'plan_livemode'		=> $request->plan_livemode,
												  'trial_period_days'	=> ($request->trial_period_days != '') ? $request->trial_period_days : null,
								        ]);
            
            
								 
		//	$ybrMembership2Plan = ybr_membership2_plan::findOrFail($id);

            return redirect()->route('admin.membership.plans.ybr_membership2_plan.index')
                ->with('success_message', trans('ybr_membership2_plans.model_was_added'));
         
    }

    /**
     * Display the specified ybr membership2 plan.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $ybrMembership2Plan = ybr_membership2_plan::with('ybrmembership1product')->findOrFail($id);

        return view('admin.membership.plans.show', compact('ybrMembership2Plan'));
    }

    /**
     * Show the form for editing the specified ybr membership2 plan.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $ybrMembership2Plan = ybr_membership2_plan::findOrFail($id);
        $YbrMembership1Products = ybr_membership1_product::pluck('product_title','id')->all();

        return view('admin.membership.plans.edit', compact('ybrMembership2Plan','YbrMembership1Products'));
    }

    /**
     * Update the specified ybr membership2 plan in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        try {
            
            ybr_membership2_plan::find($id)->update([
												  'plan_name'	=> $request->plan_name,
												  'plan_description'		=> $request->plan_description,
												  'extradesc' => $request->plan_description,
												  'plan_amount'			=> $request->plan_amount,
												  'plan_object'			=> $request->plan_object,
												  'plan_interval'			=> $request->plan_interval,
												  'plan_livemode'		=> $request->plan_livemode,
												  'trial_period_days'			=> $request->trial_period_days
								 ]);
								 
			$ybrMembership2Plan = ybr_membership2_plan::findOrFail($id);

            return redirect()->route('admin.membership.plans.ybr_membership2_plan.index')
                ->with('success_message', trans('ybr_membership2_plans.model_was_updated'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('ybr_membership2_plans.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified ybr membership2 plan from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $ybrMembership2Plan = ybr_membership2_plan::findOrFail($id);
            $ybrMembership2Plan->delete();

            return redirect()->route('admin.membership.plans.ybr_membership2_plan.index')
                ->with('success_message', trans('ybr_membership2_plans.model_was_deleted'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('ybr_membership2_plans.unexpected_error')]);
        }
    }

    
    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request 
     * @return array
     */
    protected function getData(Request $request)
    {
        $rules = [
                'product_id' => 'required',
            'plan_name' => 'nullable|string|min:0|max:255',
            'plan_description' => 'nullable',
            'plan_amount' => 'nullable|numeric|min:-99999999.99|max:99999999.99',
            'plan_object' => 'nullable',
            'plan_billing_scheme' => 'nullable|string|min:0|max:100',
            'plan_currency' => 'nullable|string|min:0|max:100',
            'plan_interval' => 'nullable|string|min:0|max:100',
            'plan_interval_count' => 'nullable|numeric|string|min:0|max:100',
            'plan_livemode' => 'nullable|string|min:0|max:100',
            'trial_period_days' => 'nullable|numeric|min:-2147483648|max:2147483647', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }
    
    public function advertisement() {
			  $plans = ybr_membership2_plan::where('plan_livemode','1')->get();
			  
			  return view('pages/guest/advertise', compact('plans'));
    }

    public function pricing() {
			  $plans = ybr_membership2_plan::where('plan_livemode','1')->get();
			  $tran = ybr_membership5_transaction::where('created_by', Auth::id())->where('status', 'SUCCESS')->orderBy('id', 'desc')->first();
			  $addons = DB::table('addons')->get();

			  if(Auth::check()){
						return view('pricing/pricing', compact('plans', 'tran', 'addons'));
			  }else{
						return view('pages/guest/advertise', compact('plans', 'addons'));
			  }
    }
}
