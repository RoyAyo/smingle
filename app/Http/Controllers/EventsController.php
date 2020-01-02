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
    	$events = Event::paginate(10);

    	return view('events.index')->with('events',$events);
    }

    public function create(){

    	return view('events.create');
    }

    public function store(Request $request){
    	dd($request);
    }
    
    public function view(){

    }
}
