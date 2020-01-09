<?php

namespace App\Http\Controllers\Crest;

use App\Http\Controllers\Controller;
use App\Http\Requests\FilesFormRequest;
use App\Models\Crest\file;
use App\User;
use Illuminate\Support\Facades\Auth;
use Exception;

class FilesController extends Controller
{

    /**
     * Display a listing of the files.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $files = file::paginate(25);

        return view('files.index', compact('files'));
    }

    /**
     * Show the form for creating a new file.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $creators = User::pluck('name','id')->all();
        
        return view('files.create', compact('creators'));
    }

    /**
     * Store a new file in the storage.
     *
     * @param App\Http\Requests\FilesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(FilesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            $data['created_by'] = Auth::Id();
            file::create($data);

            return redirect()->route('files.file.index')
                ->with('success_message', trans('files.model_was_added'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('files.unexpected_error')]);
        }
    }

    /**
     * Display the specified file.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $file = file::with('creator')->findOrFail($id);

        return view('files.show', compact('file'));
    }

    /**
     * Show the form for editing the specified file.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $file = file::findOrFail($id);
        $creators = User::pluck('name','id')->all();

        return view('files.edit', compact('file','creators'));
    }

    /**
     * Update the specified file in the storage.
     *
     * @param int $id
     * @param App\Http\Requests\FilesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, FilesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $file = file::findOrFail($id);
            $file->update($data);

            return redirect()->route('files.file.index')
                ->with('success_message', trans('files.model_was_updated'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('files.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified file from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $file = file::findOrFail($id);
            $file->delete();

            return redirect()->route('files.file.index')
                ->with('success_message', trans('files.model_was_deleted'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('files.unexpected_error')]);
        }
    }



}
