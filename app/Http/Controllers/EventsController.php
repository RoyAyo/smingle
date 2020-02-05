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
        $user_id = auth()->user()->id;

        $hosted = Event::where('host_id',$user_id)->where('verified',1);

        return view('events.index')->with('hosted',$hosted);
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

        if ($attend->count() == 0) {
            Attending::create([
                'user_id' => $user_id,
                'event_id'=> $event_id,
                'attending'=> 1
            ]);
            $a = 1;
        }else{
            $attendv = Attending::Where('user_id',$user_id)->where('event_id',$event_id)->first();

            $a = $attendv->attending == 1? '0' : '1';
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

        return redirect()->back();
    }

    public function show(){
        $events = Event::where('verified',1)->where('category',2)->orderBy('users_going','desc')->paginate(6);

        return view('events.events')->with('events',$events)
                                    ->with('e','Shows');
    }
    public function party(){
        $events = Event::where('verified',1)->where('category',1)->orderBy('users_going','desc')->paginate(6);

        return view('events.events')->with('events',$events)
                                    ->with('e','Parties');
    }

    public function createshow(){    
    	return view('events.createshow');
    }
    
    public function createparty(){
        return view('events.createparty');
    }

    public function storeparty(Request $request){
        $this->validate($request,[
            'event_avatar' => 'required|image|max:20000',
            'about' => 'required|min:20'
        ]);

        $upload_name = time().$request->event_avatar->getClientOriginalName();

        $request->event_avatar->move('images/uploads/event',$upload_name);

    	Event::create([
            'event_name'=> $request->event_name,
            'host_name'=> $request->host_name,
            'venue' => $request->venue,
            'event_date' => $request->event_date,
            'about' => $request->about,
            'public' => $request->private,
            'host_contact' => $request->host_contact,
            'host_id' => auth()->user()->id,
            'category'=>1,
            'verified'=>0,
            'event_avatar'=> "images/uploads/event/".$upload_name,
        ]);

        Session::flash('partyStored','Your party has been saved and can now be found in the parties in event,tell users to join so they can be matched');

        return redirect()->route('events');
    }

    public function storeshow(Request $request){
        $this->validate($request,[
            'event_avatar' => 'required|image|max:20000',
            'about' => 'required|min:20'
        ]);

        $upload_name = time().$request->event_avatar->getClientOriginalName();

        $request->event_avatar->move('images/uploads/event',$upload_name);
        Event::create([
            'event_name'=> $request->event_name,
            'host_name'=> $request->host_name,
            'venue' => $request->venue,
            'event_date' => $request->event_date,
            'about' => $request->about,
            'public' => $request->private,
            'host_contact' => $request->host_contact,
            'host_id' => auth()->user()->id,
            'category'=>2,
            'verified'=>0,
            'event_avatar'=> "images/uploads/event/".$upload_name,
        ]);

        Session::flash('showStored','Your party has been saved and can now be found in the shows in event,tell users to attend so they can be matched');

        return redirect()->route('events');
    }


    public function edit($id){
        $event = Event::find($id);

        return view('events.edit')->with('event',$event);
    }

    public function update(Request $request,$id){
        $event = Event::find($id);

        $event->event_name = $request->event_name; 
        $event->host_name = $request->host_name; 
        $event->host_contact = $request->host_contact; 
        $event->venue = $request->venue; 
        $event->event_date = $request->event_date; 
        $event->about = $request->about;

        $event->save();

        Session::flash('edited_event','Your event is successfully updated');
        
        return redirect()->route('events');
    }

    public function updatedp(Request $request,$id){
        $this->validate($request,[
            'avatar' => 'required|image|max:20000',
        ]);

        $upload_name = time().$request->avatar->getClientOriginalName();

        $request->avatar->move('images/uploads/event',$upload_name);

        $event = Event::find($id);

        $event->event_avatar = "images/uploads/event/".$upload_name;

        $event->save();

        Session::flash('edited_eventdp','Your display picture for '.$event->event_name .' is updated');
        
        return redirect()->route('events');
    }
}
