<?php

namespace App\Http\Controllers\Crest;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\Crest\portfolios_photo;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;

class PortfoliosPhotosController extends Controller
{

    /**
     * Display a listing of the portfolios photos.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $portfoliosPhotos = portfolios_photo::with('portfolio')->paginate(25);

        return view('portfolios_photos.index', compact('portfoliosPhotos'));
    }

    /**
     * Show the form for creating a new portfolios photo.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $Portfolios = Portfolio::pluck('title','id')->all();
$creators = User::pluck('name','id')->all();
        
        return view('portfolios_photos.create', compact('Portfolios','creators'));
    }

    /**
     * Store a new portfolios photo in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            $data['created_by'] = Auth::Id();
            portfolios_photo::create($data);

            return redirect()->route('portfolios_photos.portfolios_photo.index')
                ->with('success_message', trans('portfolios_photos.model_was_added'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('portfolios_photos.unexpected_error')]);
        }
    }

    /**
     * Display the specified portfolios photo.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $portfoliosPhoto = portfolios_photo::with('portfolio','creator')->findOrFail($id);

        return view('portfolios_photos.show', compact('portfoliosPhoto'));
    }

    /**
     * Show the form for editing the specified portfolios photo.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $portfoliosPhoto = portfolios_photo::findOrFail($id);
        $Portfolios = Portfolio::pluck('title','id')->all();
$creators = User::pluck('name','id')->all();

        return view('portfolios_photos.edit', compact('portfoliosPhoto','Portfolios','creators'));
    }

    /**
     * Update the specified portfolios photo in the storage.
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
            
            $portfoliosPhoto = portfolios_photo::findOrFail($id);
            $portfoliosPhoto->update($data);

            return redirect()->route('portfolios_photos.portfolios_photo.index')
                ->with('success_message', trans('portfolios_photos.model_was_updated'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('portfolios_photos.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified portfolios photo from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $portfoliosPhoto = portfolios_photo::findOrFail($id);
            $portfoliosPhoto->delete();

            return redirect()->route('portfolios_photos.portfolios_photo.index')
                ->with('success_message', trans('portfolios_photos.model_was_deleted'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('portfolios_photos.unexpected_error')]);
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
                'portfolio_id' => 'required',
            'file_name' => 'nullable|string|min:0|max:255',
            'file_path' => 'nullable',
            'file_type' => 'nullable|string|min:0|max:255',
            'created_by' => 'nullable', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
