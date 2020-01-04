<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use Session;

class AdminsController extends Controller
{
    public function __construct(){
    	$this->middleware('admin');
    }

    public function index(){
    	$events = Event::paginate(10);

    	return view('admin.index')->with('events',$events);
    }

    public function verify(Request $request,$id){
    	$event = Event::find($id);

    	$message = $request->v == 1 ? $event->event_name."has been unverified" : $event->event_name."has been verified";
    	$event->verified = $request->v;

    	$event->save();

    	Session::flash('eventVerified',$message);

    	return redirect()->back();
    }
}
