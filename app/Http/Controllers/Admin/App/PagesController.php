<?php

namespace App\Http\Controllers\Admin\App;

use App\Http\Controllers\Controller;
use App\Models\Admin\App\page;
use Illuminate\Http\Request;
use Exception;

class PagesController extends Controller
{

    /**
     * Display a listing of the pages.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $pages = page::paginate(25);

        return view('admin.app.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new page.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('admin.app.pages.create');
    }

    /**
     * Store a new page in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            page::create($data);

            return redirect()->route('admin.app.pages.index')
                ->with('success_message', trans('pages.model_was_added'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('pages.unexpected_error')]);
        }
    }

    /**
     * Display the specified page.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $page = page::findOrFail($id);

        return view('admin.app.pages.show', compact('page'));
    }

    /**
     * Show the form for editing the specified page.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $page = page::findOrFail($id);
        

        return view('admin.app.pages.edit', compact('page'));
    }

    /**
     * Update the specified page in the storage.
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
            
            $page = page::findOrFail($id);
            $page->update($data);

            return redirect()->route('admin.app.pages.index')
                ->with('success_message', trans('pages.model_was_updated'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('pages.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified page from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $page = page::findOrFail($id);
            $page->delete();

            return redirect()->route('admin.app.pages.index')
                ->with('success_message', trans('pages.model_was_deleted'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('pages.unexpected_error')]);
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
                'author_id' => 'required|numeric|min:0|max:4294967295',
            'title' => 'required|string|min:1|max:255',
            'excerpt' => 'nullable',
            'body' => 'nullable',
            'image' => 'nullable|numeric|string|min:0|max:255',
            'slug' => 'required|string|min:1|max:255',
            'meta_description' => 'nullable',
            'meta_keywords' => 'nullable',
            'status' => 'required', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
