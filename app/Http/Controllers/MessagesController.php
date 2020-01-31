<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Messages;
use App\User;
use App\Events\MessageSent;

class MessagesController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }

    public function index()
    {
        $user_id = auth()->user()->id;
        $messages = Messages::where('sender_id','=',$user_id)->orWhere('receiver_id','=',$user_id)->orderBy('created_at','desc')->paginate(6);

        $check = [];

        $f_messages = [];
        
        //get all messages

        foreach ($messages as $message) {
        	$a = $message->sender_id + $message->receiver_id;
            if(!in_array($a, $check)) {
                $id = $message->sender_id == $user_id ? $message->receiver_id : $message->sender_id;
                $user = User::find($id);
                $message->name = $user->name;
                $message->username = $user->username;
                $message->avatar = $user->avatar;
                $message->other_id = $user->id;
                array_push($f_messages, $message);
                array_push($check, $a);
            }
        }

        return view('message.index')->with('messages',$f_messages);
    }

    public function message($other_user)
    {
    	$user_id = auth()->user()->id;

        $other = User::where('username',$other_user);

        if ($other->count() == 0) {
            return redirect()->route('home');
        }
        $other_id = User::where('username',$other_user)->first()->id;

        $messages = Messages::where(function($query) use ($user_id,$other_id) {
        	$query->where('sender_id','=',$user_id)
        	->where('receiver_id','=',$other_id);
        })
        ->orWhere(function($query) use ($user_id,$other_id){
        	$query->where('sender_id','=',$other_id)
        	->where('receiver_id','=',$user_id);
        })->orderBy('created_at')->get();

        $other_name = User::find($other_id)->username;

        return view('message.chat')->with('messages',$messages)
                                   ->with('other_id',$other_id)
                                   ->with('other_name',$other_name);
    }

      public function store(Request $request,$receiver_id)
    {
        $sender_id = auth()->user()->id;

        $this->validate($request,[
            'message'=>['filled']
        ]);

        $message = Messages::create([
            'sender_id'   => $sender_id,
            'receiver_id' => $receiver_id,
            'message'     => $request->message
        ]);

        broadcast(new MessageSent($message));

        return $message->fresh();
    }
}