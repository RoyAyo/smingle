<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Notification;
use Session;

class AdminsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    	$this->middleware('admin');
    }

    public function index(){
    	$events = Event::paginate(5);

        $total = Event::count();

        $unverified = Event::where('verified',0)->count();

    	return view('admin.index')->with('events',$events)
                                  ->with('total',$total)
                                  ->with('unverified',$unverified);
    }

    public function verify(Request $request,$id){
    	$event = Event::find($id);

    	$message = $event->event_name." Has Been Verified";
        
    	$event->verified = $request->verified;

    	$event->save();

        if ($request->verified == 1) {
            Notification::create([
                'user_id' => $event->host_id,
                'notification_type' => 6,
                'event' => $event->id,
                'involved_id' => $event->host_id

            ]);
        }else{
            Notification::create([
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
