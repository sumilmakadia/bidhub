<?php

namespace App\Http\Controllers\\Crest;

use App\Http\Controllers\\Controller;
use App\Http\Requests\YbrMembership7FeaturesFormRequest;
use App\Models\\Crest\ybr_membership7_feature;
use Exception;

class YbrMembership7FeaturesController extends Controller
{

    /**
     * Display a listing of the ybr membership7 features.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $ybrMembership7Features = ybr_membership7_feature::paginate(25);

        return view('ybr_membership7_features.index', compact('ybrMembership7Features'));
    }

    /**
     * Show the form for creating a new ybr membership7 feature.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('ybr_membership7_features.create');
    }

    /**
     * Store a new ybr membership7 feature in the storage.
     *
     * @param App\Http\Requests\YbrMembership7FeaturesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(YbrMembership7FeaturesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            ybr_membership7_feature::create($data);

            return redirect()->route('ybr_membership7_features.ybr_membership7_feature.index')
                ->with('success_message', trans('ybr_membership7_features.model_was_added'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('ybr_membership7_features.unexpected_error')]);
        }
    }

    /**
     * Display the specified ybr membership7 feature.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $ybrMembership7Feature = ybr_membership7_feature::findOrFail($id);

        return view('ybr_membership7_features.show', compact('ybrMembership7Feature'));
    }

    /**
     * Show the form for editing the specified ybr membership7 feature.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $ybrMembership7Feature = ybr_membership7_feature::findOrFail($id);
        

        return view('ybr_membership7_features.edit', compact('ybrMembership7Feature'));
    }

    /**
     * Update the specified ybr membership7 feature in the storage.
     *
     * @param int $id
     * @param App\Http\Requests\YbrMembership7FeaturesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, YbrMembership7FeaturesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $ybrMembership7Feature = ybr_membership7_feature::findOrFail($id);
            $ybrMembership7Feature->update($data);

            return redirect()->route('ybr_membership7_features.ybr_membership7_feature.index')
                ->with('success_message', trans('ybr_membership7_features.model_was_updated'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('ybr_membership7_features.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified ybr membership7 feature from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $ybrMembership7Feature = ybr_membership7_feature::findOrFail($id);
            $ybrMembership7Feature->delete();

            return redirect()->route('ybr_membership7_features.ybr_membership7_feature.index')
                ->with('success_message', trans('ybr_membership7_features.model_was_deleted'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('ybr_membership7_features.unexpected_error')]);
        }
    }



}
