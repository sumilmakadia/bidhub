<?php

namespace App\Http\Controllers\Crest;

use App\Http\Controllers\Controller;
use App\Models\Crest\chatroom;
use App\Models\Crest\chatroom_message;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Facades\DB;
use Storage;
use App\Models\Crest\profile;

class ChatroomMessagesController extends Controller
{

    /**
     * Display a listing of the chatroom messages.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $chatroomMessages = chatroom_message::with('chatroom','creator')->paginate(25);
        
        

        return view('chatroom-messages.index', compact('chatroomMessages'));
    }

    /**
     * Show the form for creating a new chatroom message.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $Chatrooms = Chatroom::pluck('project_id','id')->all();
        $creators = User::pluck('name','id')->all();
        
        return view('chatroom-messages.create', compact('Chatrooms','creators'));
    }

    /**
     * Store a new chatroom message in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $message = $request->message;
        $chatroom_id = $request->chatroom_id;
        $chatroom = chatroom::where('id', $chatroom_id)->first();
        $sent_to = Auth::user()->id == $chatroom->owner_id?$chatroom->guest_id: $chatroom->owner_id;
        $chat_message = chatroom_message::create([
        		'chatroom_id'	=> $chatroom_id,
        		'created_by'	=> Auth::user()->id,
        		'sent_to'		=> $sent_to,
        		'message'		=> $message,
		]);
		
		$profile = profile::where('user_id', $sent_to)->first();
        
        if($profile->chat_message_emails == 1 ){
		
		$from_email = 'donotreply@bidhub.com';
        $email = $chat_message->recipient->email;
		   
        $headers = 'From: '.$from_email.' <'.$from_email.'>' . "\r\n";
        $headers .= "Content-type: text/html;charset=UTF-8" . "\r\n";
        $message = view('emails.chatroom')->with(compact('chat_message', 'message'))->render();
           			
        mail($email, 'New Chat Message', $message, $headers);
        
        }

		if($request->has('file')) {
				  $image           = $request->file('file');
				  $originName        = $image->getClientOriginalName();
				  $fileName = str_replace(' ', '_', time() . ' ' .$originName);
				  $fileType = $image->getClientOriginalExtension();
				  //$request->file('file')->store('files', ['disk' => 'messages']);
				  Storage::disk('messages')->put($fileName, file_get_contents($image));
				  $filePath = 'public/storage/messages/files/'.$fileName;

				  DB::table('chatroom_messages_files')->insert([
																 'file_name'		=> $originName,
																 'file_path'		=> $filePath,
																 'file_type'		=> $fileType,
																 'message_id'		=> $chat_message->id,
																 'created_by'		=> Auth::user()->id,
															   ]);
				$data = [
					'name'	=> $originName,
					'path'	=> $filePath
				];
				return $data;
		}

		return 'success';
    }
    
    public function test()
	{
	    $chatroom = chatroom_message::find(107);
	    return view('emails.chatroom')->with(compact('chatroom'));
	    
	    $from_email = 'donotreply@bidhub.com';
        $email = 'windspar.jake@gmail.com';
		   
        $headers = 'From: '.$from_email.' <'.$from_email.'>' . "\r\n";
        $headers .= "Content-type: text/html;charset=UTF-8" . "\r\n";
        $message = view('emails.resume')->with(compact('resume'))->render();
           			
        mail($email, 'New Chat Message', $message, $headers);
	}

    /**
     * Display the specified chatroom message.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $chatroomMessage = chatroom_message::with('chatroom','creator')->findOrFail($id);

        return view('chatroom-messages.show', compact('chatroomMessage'));
    }

    /**
     * Show the form for editing the specified chatroom message.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $chatroomMessage = chatroom_message::findOrFail($id);
        $Chatrooms = Chatroom::pluck('project_id','id')->all();
        $creators = User::pluck('name','id')->all();

        return view('chatroom-messages.edit', compact('chatroomMessage','Chatrooms','creators'));
    }

    /**
     * Update the specified chatroom message in the storage.
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
            
            $chatroomMessage = chatroom_message::findOrFail($id);
            $chatroomMessage->update($data);

            return redirect()->route('chatroom-messages.chatroom_message.index')
                ->with('success_message', trans('chatroom_messages.model_was_updated'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('chatroom_messages.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified chatroom message from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $chatroomMessage = chatroom_message::findOrFail($id);
            $chatroomMessage->delete();

            return redirect()->route('chatroom-messages.chatroom_message.index')
                ->with('success_message', trans('chatroom_messages.model_was_deleted'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('chatroom_messages.unexpected_error')]);
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
                'chatroom_id' => 'required',
            'created_by' => 'required',
            'sent_to' => 'required|string|min:1',
            'message' => 'required|numeric',
            'updated_date' => 'nullable|date_format:j/n/Y', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
