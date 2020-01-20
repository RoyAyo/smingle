<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\MessageSent;
use App\Notifications;
use App\User;
use App\Event;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        broadcast(new MessageSent(""));

        $user_id = auth()->user()->id;

        $Notifications = Notifications::where('user_id',$user_id)->orwhere('involved_id',$user_id)->orderBy('created_at','desc')->get();

        foreach ($Notifications as $Notification) {
            $other_id = $Notification->user_id == $user_id? $Notification->involved_id : $Notification->user_id;
            if ($Notification->event == '1') {
                $event = Event::find($other_id);

                $Notification->event_name = $event->name;
                $Notification->show = $event->show=='1'? 'Show' : 'Party';

            }else{

                $other_user = User::find($other_id);

                $Notification->other_name = $other_user->username;
                $Notification->other_id = $other_id;
                $Notification->notification_type = $Notification->user_id == $user_id ? '2':'1';
            }
        }

        return view('home')->with('Notifications',$Notifications);
    }
}
