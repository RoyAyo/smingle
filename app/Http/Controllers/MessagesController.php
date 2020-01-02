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

       $messages = Messages::where('sender_id','=',$user_id)->orWhere('receiver_id','=',$user_id)->get();

       //get all messages
        foreach ($messages as $message) {
        	echo $message->message;	
        }
    }

    public function message($other_id)
    {
    	$user_id = auth()->user()->id;


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