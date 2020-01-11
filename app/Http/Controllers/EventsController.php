<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Attending;

class EventsController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }

    public function index(){
        return view('events.index');
    }

    public function show(){
        $events = Event::where('verified',1)->where('category',1)->where('public',1)->paginate(10);

        return view('events.event')->with('events',$events);
    }
    public function party(){
        $events = Event::where('verified',1)->where('category',2)->where('public',1)->paginate(10);

        return view('events.event')->with('events',$events);
    }

    public function movie(){
        $events = Event::where('verified',1)->where('category',3)->where('public',1)->paginate(10);

        return view('events.event')->with('events',$events);   
    }

    public function createshow(){    
    	return view('events.createshow');
    }
    
    public function createshow(){
        return view('events.createparty');
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
