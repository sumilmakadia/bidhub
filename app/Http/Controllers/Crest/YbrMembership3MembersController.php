<?php

namespace App\Http\Controllers\Crest;

use App\Http\Controllers\Controller;
use App\Http\Requests\YbrMembership3MembersFormRequest;
use App\Models\Crest\ybr_membership3_member;
use Exception;

class YbrMembership3MembersController extends Controller
{

    /**
     * Display a listing of the ybr membership3 members.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $ybrMembership3Members = ybr_membership3_member::with('creator')->where('created_by',Auth::Id())->paginate(25);

        return view('membership-member.index', compact('ybrMembership3Members'));
    }

    /**
     * Show the form for creating a new ybr membership3 member.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('membership-member.create');
    }

    /**
     * Store a new ybr membership3 member in the storage.
     *
     * @param App\Http\Requests\YbrMembership3MembersFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(YbrMembership3MembersFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            ybr_membership3_member::create($data);

            return redirect()->route('membership-member.ybr_membership3_member.index')
                ->with('success_message', trans('ybr_membership3_members.model_was_added'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('ybr_membership3_members.unexpected_error')]);
        }
    }

    /**
     * Display the specified ybr membership3 member.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $ybrMembership3Member = ybr_membership3_member::findOrFail($id);

        return view('membership-member.show', compact('ybrMembership3Member'));
    }

    /**
     * Show the form for editing the specified ybr membership3 member.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $ybrMembership3Member = ybr_membership3_member::findOrFail($id);
        

        return view('membership-member.edit', compact('ybrMembership3Member'));
    }

    /**
     * Update the specified ybr membership3 member in the storage.
     *
     * @param int $id
     * @param App\Http\Requests\YbrMembership3MembersFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, YbrMembership3MembersFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $ybrMembership3Member = ybr_membership3_member::findOrFail($id);
            $ybrMembership3Member->update($data);

            return redirect()->route('membership-member.ybr_membership3_member.index')
                ->with('success_message', trans('ybr_membership3_members.model_was_updated'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('ybr_membership3_members.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified ybr membership3 member from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $ybrMembership3Member = ybr_membership3_member::findOrFail($id);
            $ybrMembership3Member->delete();

            return redirect()->route('membership-member.ybr_membership3_member.index')
                ->with('success_message', trans('ybr_membership3_members.model_was_deleted'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('ybr_membership3_members.unexpected_error')]);
        }
    }



}
