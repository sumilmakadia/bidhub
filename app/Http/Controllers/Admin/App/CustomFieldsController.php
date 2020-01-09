<?php

namespace App\Http\Controllers\Admin\App;

use App\Http\Controllers\Controller;
use App\Models\Admin\App\custom_field;
use Illuminate\Http\Request;
use Exception;

class CustomFieldsController extends Controller
{

    /**
     * Display a listing of the custom fields.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $customFields = custom_field::paginate(25);

        return view('admin.app.custom-fields.index', compact('customFields'));
    }

    /**
     * Show the form for creating a new custom field.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('admin.app.custom-fields.create');
    }

    /**
     * Store a new custom field in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            custom_field::create($data);

            return redirect()->route('admin.app.custom-fields.custom_field.index')
                ->with('success_message', trans('custom_fields.model_was_added'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('custom_fields.unexpected_error')]);
        }
    }

    /**
     * Display the specified custom field.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $customField = custom_field::findOrFail($id);

        return view('admin.app.custom-fields.show', compact('customField'));
    }

    /**
     * Show the form for editing the specified custom field.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $customField = custom_field::findOrFail($id);
        

        return view('admin.app.custom-fields.edit', compact('customField'));
    }

    /**
     * Update the specified custom field in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            $customField = custom_field::findOrFail($id);
            $customField->update($data);

            return redirect()->route('admin.app.custom-fields.custom_field.index')
                ->with('success_message', trans('custom_fields.model_was_updated'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('custom_fields.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified custom field from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $customField = custom_field::findOrFail($id);
            $customField->delete();

            return redirect()->route('admin.app.custom-fields.custom_field.index')
                ->with('success_message', trans('custom_fields.model_was_deleted'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('custom_fields.unexpected_error')]);
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
                'custom_field' => 'required|string|min:1|max:100',
            'value' => 'required',
            'created_on' => 'required|date_format:j/n/Y g:i A',
            'updated_on' => 'required|date_format:j/n/Y g:i A', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
