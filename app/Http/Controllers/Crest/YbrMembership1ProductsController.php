<?php

namespace App\Http\Controllers\Crest;

use App\Http\Controllers\Controller;
use App\Http\Requests\YbrMembership1ProductsFormRequest;
use App\Models\Crest\ybr_membership1_product;
use Exception;

class YbrMembership1ProductsController extends Controller
{

    /**
     * Display a listing of the ybr membership1 products.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $ybrMembership1Products = ybr_membership1_product::with('creator')->where('created_by',Auth::Id())->paginate(25);

        return view('membership-products.index', compact('ybrMembership1Products'));
    }

    /**
     * Show the form for creating a new ybr membership1 product.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('membership-products.create');
    }

    /**
     * Store a new ybr membership1 product in the storage.
     *
     * @param App\Http\Requests\YbrMembership1ProductsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(YbrMembership1ProductsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            ybr_membership1_product::create($data);

            return redirect()->route('membership-products.ybr_membership1_product.index')
                ->with('success_message', trans('ybr_membership1_products.model_was_added'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('ybr_membership1_products.unexpected_error')]);
        }
    }

    /**
     * Display the specified ybr membership1 product.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $ybrMembership1Product = ybr_membership1_product::findOrFail($id);

        return view('membership-products.show', compact('ybrMembership1Product'));
    }

    /**
     * Show the form for editing the specified ybr membership1 product.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $ybrMembership1Product = ybr_membership1_product::findOrFail($id);
        

        return view('membership-products.edit', compact('ybrMembership1Product'));
    }

    /**
     * Update the specified ybr membership1 product in the storage.
     *
     * @param int $id
     * @param App\Http\Requests\YbrMembership1ProductsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, YbrMembership1ProductsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $ybrMembership1Product = ybr_membership1_product::findOrFail($id);
            $ybrMembership1Product->update($data);

            return redirect()->route('membership-products.ybr_membership1_product.index')
                ->with('success_message', trans('ybr_membership1_products.model_was_updated'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('ybr_membership1_products.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified ybr membership1 product from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $ybrMembership1Product = ybr_membership1_product::findOrFail($id);
            $ybrMembership1Product->delete();

            return redirect()->route('membership-products.ybr_membership1_product.index')
                ->with('success_message', trans('ybr_membership1_products.model_was_deleted'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('ybr_membership1_products.unexpected_error')]);
        }
    }



}
