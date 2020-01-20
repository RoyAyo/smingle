<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AnonMessage;
use App\User;
use Session;

class AnonsController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }

    public function index(){
    	$anons = AnonMessage::where('user_id',auth()->user()->id)->orderBy('created_at','desc')->get();

    	return view('anon.index')->with('anons',$anons);
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
}
