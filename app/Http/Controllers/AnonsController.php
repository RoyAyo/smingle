<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AnonMessage;
use App\AnonReply;
use App\User;
use Session;

class AnonsController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }

    public function index(){
        $anons = AnonMessage::where('user_id',auth()->user()->id)->orderBy('created_at','desc')->paginate(5);

    	$anonrs = AnonReply::where('receiver_id',auth()->user()->id)->orderBy('created_at','desc')->paginate(5);


        foreach ($anonrs as $anonr) {
            $anon_id = $anonr->anon_message_id;
            $sent = AnonMessage::find($anon_id);
            $anonr->message = $sent->message;
            $anonr->sender_id = $sent->user_id;
            $anonr->from = User::find($sent->user_id)->username;
        }

    	return view('anon.index')->with('anons',$anons)
                                 ->with('anonrs',$anonrs);
    }

    public function create(Request $request){
    	
    	$this->validate($request,[
    		'message'=> ['filled','max:400']
    	]);

    	AnonMessage::create([
    		'user_id' => $request->anonreceiver,
    		'message' => $request->message,
            'sender_id' => auth()->user()->id
    	]);

        Session::flash('anon','Your Anonymous Message has been successfully sent to @'.User::find($request->anonreceiver)->username);

    	return redirect()->back();
    }

    public function reply(Request $request){

        $this->validate($request,[
            'reply'=> ['filled','max:400']
        ]);

        AnonReply::create([
            'anon_message_id' => $request->anon_id,
            'reply' => $request->reply,
            'receiver_id' => $request->receiver_id
        ]);

        Session::flash('anonReply','Anonymous message replied');

        return redirect()->back();
    }
}
