<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Notifications;
use Session;

class AdminsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    	$this->middleware('admin');
    }

    public function index(){
    	$events = Event::orderBy('event_date','desc')->paginate(5);

        $total = Event::count();

        $unverified = Event::where('verified',0)->count();

    	return view('admin.index')->with('events',$events)
                                  ->with('total',$total)
                                  ->with('unverified',$unverified);
    }

    public function verify(Request $request,$id){
    	$event = Event::find($id);

        
    	$event->verified = $request->verified;

    	$event->save();

        if ($request->verified == 1) {
    	   $message = $event->event_name." Has Been Verified";
            Notifications::create([
                'user_id' => $event->host_id,
                'notification_type' => 6,
                'event' => $event->id,
                'involved_id' => $event->host_id

            ]);
        }else{
            $message = $event->event_name." Has Been Unverified";
            Notifications::create([
                'user_id' => $event->host_id,
                'notification_type' => 7,
                'event' => $event->id,
                'involved_id' => $event->host_id

            ]);
        }

    	Session::flash('eventVerified',$message);

    	return redirect()->back();
    }
}