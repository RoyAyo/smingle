<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use App\Attending;

use Illuminate\Http\Request;

class FiltersController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }

    public function index(){
    	$user_id = Auth::user()->id;

    	return view('pages.filter')->with('user_id',$user_id);
    }

    public function event($event_id){
    	$user_id = auth()->user()->id;

    	$c = Attending::where('event_id',$event_id)->where('user_id',$user_id)->count();

    	if ($c == 0) {
    		return redirect()->route('home');
    	}
    	return view('events.filter')->with('user_id',$user_id)
                                    ->with('event_id',$event_id);
    }
}