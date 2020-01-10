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
        $events = Event::where('verified',1)->paginate(10);
        $events = Attending::where('verified',1)->paginate(10);

        return view('events.shows')->with('events',$events);        
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
