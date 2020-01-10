<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Attending;
use Session;

class EventsController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }

    public function index(){
        return view('events.index');
    }

    public function attend(Request $request,$event_id){
        $user_id = auth()->user()->id;
        $event = Event::find($event_id);

        $attend = Attending::Where('user_id',$user_id)->where('event_id',$event_id);

        $a = $request->a;
        if ($attend->count() == 0) {
            Attending::create([
                'user_id' => $user_id,
                'event_id'=> $event_id,
                'attending'=> $a
            ]);
        }else{
            $attend->first()->attending = $a;
            $attend->first()->save();
        }

        $attending_message = $a == '1' ? 'You are Now Attending' : 'You have Been Removed From';

        $message = $attending_message.' '. $event->event_name;
        $a == '1' ? $event->users_going += 1 : $event->users_going -= 1;

        $event->save();

        Session::flash('attendVerified',$message);

        return $event->users_going;
    }

    public function show(){
        $user_id = auth()->user()->id;

        $events = Event::where('verified',1)->paginate(10);
        $attend = Attending::where('user_id',$user_id);

        return view('events.shows')->with('events',$events)
                                  ->with('attend',$attend);
    }

    public function movies(){
        $events = Event::where('verified',1)->paginate(10);

        return view('events.movies')->with('events',$events);        
    }

    public function clubs(){
        $events = Event::where('verified',1)->paginate(10);

        return view('events.clubs')->with('events',$events);        
    }

    public function create(){

    	return view('events.create');
    }

    public function store(Request $request){
    	Event::create([
            'event_name'=> $request->event_name,
            'host_name'=> $request->host_name,
            'venue' => $request->venue,
            'event_time' => $request->event_time,
            'about' => $request->about
        ]);

        return redirect()->route('events');
    }
    
    public function view(){

    }
}
