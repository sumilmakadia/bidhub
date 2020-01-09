<?php

namespace App\Http\Controllers\Crest;

use App\Http\Controllers\Controller;
use App\Http\Requests\RolesFormRequest;
use App\Models\Crest\role;
use Exception;

class RolesController extends Controller
{

    /**
     * Display a listing of the roles.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $roles = role::with('creator')->where('created_by',Auth::Id())->paginate(25);

        return view('site-roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new role.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('site-roles.create');
    }

    /**
     * Store a new role in the storage.
     *
     * @param App\Http\Requests\RolesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(RolesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            role::create($data);

            return redirect()->route('site-roles.role.index')
                ->with('success_message', trans('roles.model_was_added'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('roles.unexpected_error')]);
        }
    }

    /**
     * Display the specified role.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $role = role::findOrFail($id);

        return view('site-roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified role.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $role = role::findOrFail($id);
        

        return view('site-roles.edit', compact('role'));
    }

    /**
     * Update the specified role in the storage.
     *
     * @param int $id
     * @param App\Http\Requests\RolesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, RolesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $role = role::findOrFail($id);
            $role->update($data);

            return redirect()->route('site-roles.role.index')
                ->with('success_message', trans('roles.model_was_updated'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('roles.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified role from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $role = role::findOrFail($id);
            $role->delete();

            return redirect()->route('site-roles.role.index')
                ->with('success_message', trans('roles.model_was_deleted'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('roles.unexpected_error')]);
        }
    }



}
