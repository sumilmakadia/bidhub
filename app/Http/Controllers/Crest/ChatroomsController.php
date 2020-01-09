<?php

namespace App\Http\Controllers\Crest;

use App\Http\Controllers\Controller;
use App\Models\Crest\project;
use App\Models\Proposal;
use App\Models\Crest\chatroom;
use App\Models\Crest\chatroom_message;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Models\Crest\profile;

class ChatroomsController extends Controller
{
	public function table() {
        $user_id = Auth::user()->id;
        if(($chatroom_id = chatroom_message::where('created_by',$user_id)->orWhere('sent_to',$user_id)->orderBy('updated_date','desc'))->exists()) {
            $chatroom_id = $chatroom_id->first()->chatroom_id;
        }
        else {
            $chatroom_id = 'null';
        }
        return redirect('/chat-rooms/' . $chatroom_id);
	}

    /**
     * Display a listing of the chatrooms.
     *
     * @return Illuminate\View\View
     */
    public function index($id)
    {
        $user_id    = Auth::user()->id;
        $chatroom   = chatroom::where('id', $id)->exists() ? chatroom::where('id', $id)->first() : 'null';
    	if($chatroom == 'null') {
    	    $chats = [];
    	    $files = [];
    	    $project = null;
    	    $contacts = [];
    	    return view('chat-rooms.index', compact( 'id', 'chats', 'chatroom', 'files', 'project','contacts'));
    	}
    	$id         = $chatroom->id;
        $proposal   = DB::table('proposals')->where('id', $chatroom->proposal_id)->first();
        
        $guest_rooms = chatroom::where('owner_id',$user_id)->get();
        foreach($guest_rooms as $room) {
            $contacts[] = [
                            'id'            => $room->id,
                            'name'          => $room->guest->profile->first_name . ' ' . $room->guest->profile->last_name,
                            'picture'       => $room->guest->avatar,
                            'last_updated'  => isset($room->lastMessage) ? strtotime($room->lastMessage->created_at . '+3 hours') : ''
                          ];
        }
        
        $owned_rooms = chatroom::where('guest_id',$user_id)->get();
        foreach($owned_rooms as $room) {
            $contacts[] = [
                            'id'            => $room->id,
                            'name'          => $room->owner->profile->first_name . ' ' . $room->owner->profile->last_name,
                            'picture'       => $room->owner->avatar,
                            'last_updated'  => isset($room->lastMessage) ? strtotime($room->lastMessage->created_at . '+3 hours') : ''
                          ];
        }
            
        $files = DB::table('chatroom_messages_files')->get();
    	$chats = chatroom_message::where('chatroom_id', $chatroom->id)->get();
        
        DB::table('chatroom_messages')
        ->where('chatroom_id', $id)->where('sent_to', Auth::user()->id)
        ->update(array('viewed' => 1)); 
        

        // if($chatroom) {
//         } else {
//         	$id = DB::table('chatrooms')->insertGetId([
//         					'project_id'	=> $proposal->project_id,
//         					'proposal_id'	=> $proposal->id,
//         					'owner_id'		=> $project->created_by,
//         					'guest_id'		=> Auth::user()->id,
//         					'created_at'	=> date('Y-m-d H:i:s'),
// 												]);
// 			$chats = null;
// 			$chatroom = chatroom::find($id);
//         }

        usort($contacts, function($a, $b) {
            return strtotime($b["last_updated"]) <=> strtotime($a["last_updated"]);
        });
        
        if(Auth::user()->id == $chatroom->owner_id || Auth::user()->id == $chatroom->guest_id) { 
				return view('chat-rooms.index', compact( 'id', 'chats', 'chatroom', 'files', 'project','contacts'));
         } else {
               return redirect('/project-room');
        }
        
    }
    
    /**
     * Show the form for creating a new chatroom.
     *
     * @return Illuminate\View\View
     */
    public function refresh(Request $request)
    {
        if(($chats = chatroom_message::where('chatroom_id', $request->id)->where('sent_to',Auth::user()->id)->where('created_at','>',date('Y-m-d H:i:s',strtotime('+4 hours,-5 seconds'))))->exists()) {
            $chats = $chats->get();
            foreach($chats as $chat) {
                $chat->created_at = strtotime($chat->created_at . '+3 hours');
            }
        }
        else {
            $chats = null;
        }
        
        return response()->json(['chats' => $chats]); 
    }

    /**
     * Show the form for creating a new chatroom.
     *
     * @return Illuminate\View\View
     */
    public function create($project_id,$proposal_id,$project_owner)
    {
        $room_id = chatroom::updateOrCreate([
                                                'project_id'    => $project_id == 'null' ? null : $project_id,
                                                'proposal_id'   => $proposal_id == 'null' ? null : $proposal_id,
                                                'owner_id'      => $project_owner,
                                                'guest_id'      => Auth::user()->id
                                            ])->id;
        
        return redirect('/chat-rooms/' . $room_id);
    }
    
    /**
     * Show the form for creating a new chatroom.
     *
     * @return Illuminate\View\View
     */
    public function createNew(Request $request)
    {
     
        $new_room = chatroom::where('project_id', $request->project_id)->where('owner_id', $request->user_id)->where('guest_id', $request->project_by)->first();
        
        if(!isset($new_room)) {
     
        $room = new chatroom;
        $room->project_id = $request->project_id;
        $room->proposal_id = null;
        $room->owner_id = $request->user_id;
        $room->guest_id = $request->project_by;
        $room->save();
        
        
        
        $new_room = chatroom::where('project_id', $request->project_id)->where('owner_id', $request->user_id)->where('guest_id', $request->project_by)->first();
        
        $message = new chatroom_message;
    
        // $message->chatroom_id = $new_room->id;
        // $message->created_by = $request->user_id;
        // $message->sent_to = $request->project_by;
        // $message->message = 'Chat Started';
        // $message->viewed = 0;
        // $message->save();
        
        $chat_message = chatroom_message::create([
        		'chatroom_id'	=> $new_room->id,
        		'created_by'	=> $request->user_id,
        		'sent_to'		=> $request->project_by,
        		'message'		=> 'Chat Started',
		]);
        
        $profile = profile::where('user_id', $request->project_by)->first();
        
            if($profile->chat_message_emails == 1 ){
                
                $from_email = 'donotreply@bidhub.com';
                $email = $chat_message->recipient->email;;
        		   
                $headers = 'From: '.$from_email.' <'.$from_email.'>' . "\r\n";
                $headers .= "Content-type: text/html;charset=UTF-8" . "\r\n";
                $message = view('emails.chatroom')->with(compact('chat_message'))->render();
                   			
                mail($email, 'New Chat Message', $message, $headers);
            
            }
        
        }
        
 
        return redirect('/chat-rooms/'.$new_room->id);
    }

    /**
     * Store a new chatroom in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            chatroom::create($data);

            return redirect()->route('chat-rooms.chatroom.index')
                ->with('success_message', trans('chatrooms.model_was_added'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('chatrooms.unexpected_error')]);
        }
    }

    /**
     * Display the specified chatroom.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $chatroom = chatroom::with('proposal')->findOrFail($id);
        
        if(Auth::user()->id == $chatroom->owner_id || Auth::user()->id == $chatroom->guest_id) { 
				return view('chat-rooms.show', compact('chatroom'));
         } else {
               return redirect('/project-room');
        }

        
    }

    /**
     * Show the form for editing the specified chatroom.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $chatroom = chatroom::findOrFail($id);
        $Proposals = Proposal::pluck('bid_title','id')->all();

        return view('chat-rooms.edit', compact('chatroom','Proposals'));
    }

    /**
     * Update the specified chatroom in the storage.
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
            
            $chatroom = chatroom::findOrFail($id);
            $chatroom->update($data);

            return redirect()->route('chat-rooms.chatroom.index')
                ->with('success_message', trans('chatrooms.model_was_updated'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('chatrooms.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified chatroom from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $chatroom = chatroom::findOrFail($id);
            $chatroom->delete();

            return redirect()->route('chat-rooms.chatroom.index')
                ->with('success_message', trans('chatrooms.model_was_deleted'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('chatrooms.unexpected_error')]);
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
                'project_id' => 'required|string|min:1',
            'proposal_id' => 'required',
            'owner_id' => 'required|string|min:1',
            'guest_id' => 'required|string|min:1', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
