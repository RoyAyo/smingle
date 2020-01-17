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

    public function event($id){
        $user_id = auth()->user()->id;
        $event = Event::find($id);
        if (is_null($event)) {
            return redirect()->route('home');
        }
        $attend = Attending::Where('user_id',$user_id)->where('event_id',$id);

        if ($attend->count() > 0) {
            $att = $attend->first()->attending == '1' ? 1 : 0;
        }else{
            $att = 0;
        }


        if ($event->category == 1) {
           $e = 'Party';
        }elseif($event->category == 2){
            $e = 'Show';
        }else{
            $e = 'Movie';
        }

        return view('events.event')->with('event',$event)
                                  ->with('att',$att)
                                    ->with('e',$e);
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
            $attendv = Attending::Where('user_id',$user_id)->where('event_id',$event_id)->first();
            $attendv->attending = $a;
            $attendv->save();
        }

        $going = $event->users_going;

        $attending_message = $a == '1' ? 'You are Now Attending' : 'You have Been Removed From';

        $message = $attending_message.' '. $event->event_name;

        $a == '1' ? $going += 1 : $going -= 1;

        $event->users_going = $going;
        $event->save();

        Session::flash('attendVerified',$message);

        return $going;
    }

    public function show(){
        $events = Event::where('verified',1)->where('category',2)->where('public',1)->paginate(10);

        return view('events.events')->with('events',$events)
                                    ->with('e','Shows');
    }
    public function party(){
        $events = Event::where('verified',1)->where('category',1)->where('public',1)->paginate(10);

        return view('events.events')->with('events',$events)
                                    ->with('e','Parties');
    }

    public function movie(){
        $events = Event::where('verified',1)->where('category',3)->where('public',1)->paginate(10);

        return view('events.events')->with('events',$events)   
                                    ->with('e','Movies');
    }

    public function createshow(){    
    	return view('events.createshow');
    }
    
    public function createparty(){
        return view('events.createparty');
    }

    public function storeparty(Request $request){
    	Event::create([
            'event_name'=> $request->event_name,
            'host_name'=> $request->host_name,
            'venue' => $request->venue,
            'event_date' => $request->event_date,
            'about' => $request->about,
            'public' => $request->private,
            'host_contact' => $request->contact,
            'category'=>1
        ]);

        return redirect()->route('events');
    }

    public function storeshow(Request $request){
        Event::create([
            'event_name'=> $request->event_name,
            'host_name'=> $request->host_name,
            'venue' => $request->venue,
            'event_date' => $request->event_date,
            'about' => $request->about,
            'public' => $request->private,
            'host_contact' => $request->contact,
            'category'=>2
        ]);

        return redirect()->route('events');
    }
    
    public function view(){

    }
}
