<?php

namespace App\Http\Controllers\Crest;

use App\Http\Controllers\Controller;
use App\Http\Requests\YbrMembership4AffiliatesFormRequest;
use App\Models\Crest\ybr_membership4_affiliate;
use App\User;
use Illuminate\Support\Facades\Auth;
use Exception;

class YbrMembership4AffiliatesController extends Controller
{

    /**
     * Display a listing of the ybr membership4 affiliates.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $ybrMembership4Affiliates = ybr_membership4_affiliate::with('creator')->where('created_by',Auth::Id())->paginate(25);

        return view('membership-affiliates.index', compact('ybrMembership4Affiliates'));
    }

    /**
     * Show the form for creating a new ybr membership4 affiliate.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $creators = User::pluck('name','id')->all();
        
        return view('membership-affiliates.create', compact('creators'));
    }

    /**
     * Store a new ybr membership4 affiliate in the storage.
     *
     * @param App\Http\Requests\YbrMembership4AffiliatesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(YbrMembership4AffiliatesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            $data['created_by'] = Auth::Id();
            ybr_membership4_affiliate::create($data);

            return redirect()->route('membership-affiliates.ybr_membership4_affiliate.index')
                ->with('success_message', trans('ybr_membership4_affiliates.model_was_added'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('ybr_membership4_affiliates.unexpected_error')]);
        }
    }

    /**
     * Display the specified ybr membership4 affiliate.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $ybrMembership4Affiliate = ybr_membership4_affiliate::with('creator')->findOrFail($id);

        return view('membership-affiliates.show', compact('ybrMembership4Affiliate'));
    }

    /**
     * Show the form for editing the specified ybr membership4 affiliate.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $ybrMembership4Affiliate = ybr_membership4_affiliate::findOrFail($id);
        $creators = User::pluck('name','id')->all();

        return view('membership-affiliates.edit', compact('ybrMembership4Affiliate','creators'));
    }

    /**
     * Update the specified ybr membership4 affiliate in the storage.
     *
     * @param int $id
     * @param App\Http\Requests\YbrMembership4AffiliatesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, YbrMembership4AffiliatesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $ybrMembership4Affiliate = ybr_membership4_affiliate::findOrFail($id);
            $ybrMembership4Affiliate->update($data);

            return redirect()->route('membership-affiliates.ybr_membership4_affiliate.index')
                ->with('success_message', trans('ybr_membership4_affiliates.model_was_updated'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('ybr_membership4_affiliates.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified ybr membership4 affiliate from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $ybrMembership4Affiliate = ybr_membership4_affiliate::findOrFail($id);
            $ybrMembership4Affiliate->delete();

            return redirect()->route('membership-affiliates.ybr_membership4_affiliate.index')
                ->with('success_message', trans('ybr_membership4_affiliates.model_was_deleted'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('ybr_membership4_affiliates.unexpected_error')]);
        }
    }



}
