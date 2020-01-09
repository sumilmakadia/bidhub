<?php

namespace App\Http\Controllers\Crest;

use App\Http\Controllers\Controller;
use App\Http\Requests\YbrMembership5AddonsFormRequest;
use App\Models\Crest\ybr_membership5_addon;
use Exception;

class YbrMembership5AddonsController extends Controller
{

    /**
     * Display a listing of the ybr membership5 addons.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $ybrMembership5Addons = ybr_membership5_addon::paginate(25);

        return view('ybr_membership5_addons.index', compact('ybrMembership5Addons'));
    }

    /**
     * Show the form for creating a new ybr membership5 addon.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('ybr_membership5_addons.create');
    }

    /**
     * Store a new ybr membership5 addon in the storage.
     *
     * @param App\Http\Requests\YbrMembership5AddonsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(YbrMembership5AddonsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            ybr_membership5_addon::create($data);

            return redirect()->route('ybr_membership5_addons.ybr_membership5_addon.index')
                ->with('success_message', trans('ybr_membership5_addons.model_was_added'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('ybr_membership5_addons.unexpected_error')]);
        }
    }

    /**
     * Display the specified ybr membership5 addon.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $ybrMembership5Addon = ybr_membership5_addon::findOrFail($id);

        return view('ybr_membership5_addons.show', compact('ybrMembership5Addon'));
    }

    /**
     * Show the form for editing the specified ybr membership5 addon.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $ybrMembership5Addon = ybr_membership5_addon::findOrFail($id);
        

        return view('ybr_membership5_addons.edit', compact('ybrMembership5Addon'));
    }

    /**
     * Update the specified ybr membership5 addon in the storage.
     *
     * @param int $id
     * @param App\Http\Requests\YbrMembership5AddonsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, YbrMembership5AddonsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $ybrMembership5Addon = ybr_membership5_addon::findOrFail($id);
            $ybrMembership5Addon->update($data);

            return redirect()->route('ybr_membership5_addons.ybr_membership5_addon.index')
                ->with('success_message', trans('ybr_membership5_addons.model_was_updated'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('ybr_membership5_addons.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified ybr membership5 addon from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $ybrMembership5Addon = ybr_membership5_addon::findOrFail($id);
            $ybrMembership5Addon->delete();

            return redirect()->route('ybr_membership5_addons.ybr_membership5_addon.index')
                ->with('success_message', trans('ybr_membership5_addons.model_was_deleted'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('ybr_membership5_addons.unexpected_error')]);
        }
    }



}
