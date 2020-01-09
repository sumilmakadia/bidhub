<?php

namespace App\Http\Controllers\Crest;

use App\Http\Controllers\Controller;
use App\Models\ChatroomMessage;
use App\Models\Crest\chatroom_messages_file;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Facades\DB;

class ChatroomMessagesFilesController extends Controller
{

    /**
     * Display a listing of the chatroom messages files.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $chatroomMessagesFiles = chatroom_messages_file::paginate(25);

        return view('chatroom-messages-files.index', compact('chatroomMessagesFiles'));
    }

    /**
     * Show the form for creating a new chatroom messages file.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $ChatroomMessages = ChatroomMessage::pluck('chatroom_id','id')->all();
$creators = User::pluck('name','id')->all();
        
        return view('chatroom-messages-files.create', compact('ChatroomMessages','creators'));
    }

    /**
     * Store a new chatroom messages file in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
			  $image           = $request->file('file');
			  $fileName        = time() . ' ' . $image->getClientOriginalName();
			  $fileName = str_replace(' ', '_', $fileName);
			  $fileType = $image->getClientOriginalExtension();
			  $request->file('file')->store('toPath', ['disk' => 'messages']);

			  DB::table('chatroom_messages_files')->insert([
			  				'file_name'		=> $fileName,
			  				'file_path'		=> '/messages/files/'.$fileName,
			  				'file_type'		=> $fileType,
			  				'chatroom_id'	=> $request->chatroom_id,
			  				'created_by'	=> Auth::user()->id,
														   ]);

			  return 'messages/files/'.$fileName;
    }

    /**
     * Display the specified chatroom messages file.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $chatroomMessagesFile = chatroom_messages_file::with('chatroommessage','creator')->findOrFail($id);

        return view('chatroom-messages-files.show', compact('chatroomMessagesFile'));
    }

    /**
     * Show the form for editing the specified chatroom messages file.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $chatroomMessagesFile = chatroom_messages_file::findOrFail($id);
        $ChatroomMessages = ChatroomMessage::pluck('chatroom_id','id')->all();
$creators = User::pluck('name','id')->all();

        return view('chatroom-messages-files.edit', compact('chatroomMessagesFile','ChatroomMessages','creators'));
    }

    /**
     * Update the specified chatroom messages file in the storage.
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
            
            $chatroomMessagesFile = chatroom_messages_file::findOrFail($id);
            $chatroomMessagesFile->update($data);

            return redirect()->route('chatroom-messages-files.chatroom_messages_file.index')
                ->with('success_message', trans('chatroom_messages_files.model_was_updated'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('chatroom_messages_files.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified chatroom messages file from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $chatroomMessagesFile = chatroom_messages_file::findOrFail($id);
            $chatroomMessagesFile->delete();

            return redirect()->route('chatroom-messages-files.chatroom_messages_file.index')
                ->with('success_message', trans('chatroom_messages_files.model_was_deleted'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('chatroom_messages_files.unexpected_error')]);
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
                'message_id' => 'required|numeric|min:0',
            'file_name' => 'nullable|string|min:0|max:255',
            'file_path' => 'nullable',
            'file_type' => 'nullable|string|min:0|max:255',
            'created_by' => 'nullable', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
