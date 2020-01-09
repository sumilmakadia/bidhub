<?php

namespace App\Http\Controllers\Crest;

use App\Http\Controllers\Controller;
use App\Http\Requests\YbrMembership2PlansFormRequest;
use App\Models\Crest\ybr_membership2_plan;
use Exception;
use Illuminate\Http\Request;

class YbrMembership2PlansController extends Controller
{
		  /**
		   * Display a listing of the ybr membership2 plans.
		   *
		   * @return Illuminate\View\View
		   */
		  public function contractor(){
					$ybrMembership2Plans = ybr_membership2_plan::paginate(25);

					return view('membership-plans.contractor', compact('ybrMembership2Plans'));
		  }

		  /**
		   * Display a listing of the ybr membership2 plans.
		   *
		   * @return Illuminate\View\View
		   */
		  public function general(){
					$ybrMembership2Plans = ybr_membership2_plan::paginate(25);

					return view('membership-plans.general', compact('ybrMembership2Plans'));
		  }

		  /**
		   * Display a listing of the ybr membership2 plans.
		   *
		   * @return Illuminate\View\View
		   */
		  public function advertiser(){
					$ybrMembership2Plans = ybr_membership2_plan::paginate(25);

					return view('membership-plans.advertiser', compact('ybrMembership2Plans'));
		  }
    /**
     * Display a listing of the ybr membership2 plans.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
			  $ybrMembership2Plans = ybr_membership2_plan::paginate(25);
			  
			  if(Auth::user()->role_id == 1) { 
							    	 return view('membership-plans.index', compact('ybrMembership2Plans'));
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
        
        
        return view('membership-plans.create');
    }

    /**
     * Store a new ybr membership2 plan in the storage.
     *
     * @param App\Http\Requests\YbrMembership2PlansFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(YbrMembership2PlansFormRequest $request)
    {
        try {
            
            ybr_membership2_plan::updateOrCreate([
												  'plan_name'	=> $request->plan_name,
								 ],[
												  'plan_name'	=> $request->plan_name,
												  'plan_description'		=> $request->plan_description,
												  'plan_amount'			=> $request->plan_amount,
												  'plan_object'			=> $request->plan_object,
												  'plan_interval'			=> $request->plan_interval,
												  'plan_livemode'		=> $request->plan_livemode,
												  'trial_period_days'			=> $request->trial_period_days
								 ]);
								 
			$ybrMembership2Plan = ybr_membership2_plan::findOrFail($id);

            return redirect()->route('membership-plans.ybr_membership2_plan.index')
                ->with('success_message', trans('ybr_membership2_plans.model_was_added'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('ybr_membership2_plans.unexpected_error')]);
        }
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
        $ybrMembership2Plan = ybr_membership2_plan::findOrFail($id);

        return view('membership-plans.show', compact('ybrMembership2Plan'));
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
        

        return view('membership-plans.edit', compact('ybrMembership2Plan'));
    }

    /**
     * Update the specified ybr membership2 plan in the storage.
     *
     * @param int $id
     * @param App\Http\Requests\YbrMembership2PlansFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        
        
        try {
            
           
            
            ybr_membership2_plan::find($id)->update([
												  'plan_name'	=> $request->plan_name,
												  'plan_description'		=> $request->plan_description,
												  'plan_amount'			=> $request->plan_amount,
												  'plan_object'			=> $request->plan_object,
												  'plan_interval'			=> $request->plan_interval,
												  'plan_livemode'		=> $request->plan_livemode,
												  'trial_period_days'			=> $request->trial_period_days
								 ]);
								 
			$ybrMembership2Plan = ybr_membership2_plan::findOrFail($id);					 

            return redirect()->route('membership-plans.ybr_membership2_plan.index')
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

            return redirect()->route('membership-plans.ybr_membership2_plan.index')
                ->with('success_message', trans('ybr_membership2_plans.model_was_deleted'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('ybr_membership2_plans.unexpected_error')]);
        }
    }



}
