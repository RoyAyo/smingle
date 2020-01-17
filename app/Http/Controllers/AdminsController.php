<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use Session;

class AdminsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    	$this->middleware('admin');
    }

    public function index(){
    	$events = Event::paginate(5);

    	return view('admin.index')->with('events',$events);
    }

    public function verify(Request $request,$id){
    	$event = Event::find($id);

    	$message = $event->event_name."Has Been Verified";
    	$event->verified = $request->v;

    	$event->save();

    	Session::flash('eventVerified',$message);

    	return $request->v;
    }

    public function jquest(){
        return view('admin.jquest');
    }
}
