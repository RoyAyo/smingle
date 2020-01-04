<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

class EventsController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }

    public function index(){
    	$events = Event::where('verified',1)->paginate(10);

    	return view('events.index')->with('events',$events);
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
