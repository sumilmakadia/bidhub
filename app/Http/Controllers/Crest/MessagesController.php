<?php

namespace App\Http\Controllers\Crest;

use App\Http\Controllers\Controller;
use App\Http\Requests\MessagesFormRequest;
use App\Models\Crest\message;
use App\User;
use Illuminate\Support\Facades\Auth;
use Exception;

class MessagesController extends Controller
{

    /**
     * Display a listing of the messages.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $messages = message::with('creator')->where('created_by',Auth::Id())->paginate(25);

        return view('messages.index', compact('messages'));
    }

    /**
     * Show the form for creating a new message.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $creators = User::pluck('name','id')->all();
        
        return view('messages.create', compact('creators'));
    }

    /**
     * Store a new message in the storage.
     *
     * @param App\Http\Requests\MessagesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(MessagesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            $data['created_by'] = Auth::Id();
            message::create($data);

            return redirect()->route('messages.message.index')
                ->with('success_message', trans('messages.model_was_added'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('messages.unexpected_error')]);
        }
    }

    /**
     * Display the specified message.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $message = message::with('creator')->findOrFail($id);

        return view('messages.show', compact('message'));
    }

    /**
     * Show the form for editing the specified message.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $message = message::findOrFail($id);
        $creators = User::pluck('name','id')->all();

        return view('messages.edit', compact('message','creators'));
    }

    /**
     * Update the specified message in the storage.
     *
     * @param int $id
     * @param App\Http\Requests\MessagesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, MessagesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $message = message::findOrFail($id);
            $message->update($data);

            return redirect()->route('messages.message.index')
                ->with('success_message', trans('messages.model_was_updated'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('messages.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified message from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $message = message::findOrFail($id);
            $message->delete();

            return redirect()->route('messages.message.index')
                ->with('success_message', trans('messages.model_was_deleted'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('messages.unexpected_error')]);
        }
    }



}
