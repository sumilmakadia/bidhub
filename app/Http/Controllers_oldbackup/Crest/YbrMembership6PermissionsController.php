<?php

namespace App\Http\Controllers\\Crest;

use App\Http\Controllers\\Controller;
use App\Http\Requests\YbrMembership6PermissionsFormRequest;
use App\Models\\Crest\ybr_membership6_permission;
use Exception;

class YbrMembership6PermissionsController extends Controller
{

    /**
     * Display a listing of the ybr membership6 permissions.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $ybrMembership6Permissions = ybr_membership6_permission::paginate(25);

        return view('ybr_membership6_permissions.index', compact('ybrMembership6Permissions'));
    }

    /**
     * Show the form for creating a new ybr membership6 permission.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('ybr_membership6_permissions.create');
    }

    /**
     * Store a new ybr membership6 permission in the storage.
     *
     * @param App\Http\Requests\YbrMembership6PermissionsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(YbrMembership6PermissionsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            ybr_membership6_permission::create($data);

            return redirect()->route('ybr_membership6_permissions.ybr_membership6_permission.index')
                ->with('success_message', trans('ybr_membership6_permissions.model_was_added'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('ybr_membership6_permissions.unexpected_error')]);
        }
    }

    /**
     * Display the specified ybr membership6 permission.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $ybrMembership6Permission = ybr_membership6_permission::findOrFail($id);

        return view('ybr_membership6_permissions.show', compact('ybrMembership6Permission'));
    }

    /**
     * Show the form for editing the specified ybr membership6 permission.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $ybrMembership6Permission = ybr_membership6_permission::findOrFail($id);
        

        return view('ybr_membership6_permissions.edit', compact('ybrMembership6Permission'));
    }

    /**
     * Update the specified ybr membership6 permission in the storage.
     *
     * @param int $id
     * @param App\Http\Requests\YbrMembership6PermissionsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, YbrMembership6PermissionsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $ybrMembership6Permission = ybr_membership6_permission::findOrFail($id);
            $ybrMembership6Permission->update($data);

            return redirect()->route('ybr_membership6_permissions.ybr_membership6_permission.index')
                ->with('success_message', trans('ybr_membership6_permissions.model_was_updated'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('ybr_membership6_permissions.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified ybr membership6 permission from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $ybrMembership6Permission = ybr_membership6_permission::findOrFail($id);
            $ybrMembership6Permission->delete();

            return redirect()->route('ybr_membership6_permissions.ybr_membership6_permission.index')
                ->with('success_message', trans('ybr_membership6_permissions.model_was_deleted'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('ybr_membership6_permissions.unexpected_error')]);
        }
    }



}
