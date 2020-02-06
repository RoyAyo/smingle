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
        $user_id = auth()->user()->id;

        $Notifications = Notifications::where('user_id',$user_id)->orwhere('involved_id',$user_id)->orderBy('created_at','desc')->paginate(8);

        foreach ($Notifications as $Notification) {
            $other_id = $Notification->user_id == $user_id? $Notification->involved_id : $Notification->user_id;

            if ($Notification->event != '0') {
                $event = Event::find($Notification->event);

                if (is_null($event)){

                }else{
                    $Notification->event_name = $event->event_name;
                    $Notification->show = $event->show== '1'? 'Show' : 'Party';
                    if ($other_id != $user_id) {
                        $Notification->notification_type = $Notification->user_id == $user_id ? '4':'3';
                    }
                }
            }else{
                $Notification->notification_type = $Notification->user_id == $user_id ? '2':'1';
            }
                $other_user = User::find($other_id);

                $Notification->other_name = $other_user->username;
                $Notification->other_id = $other_id;
        }

        return view('home')->with('Notifications',$Notifications);
    }

    public function help(){
        return view('pages.help');
    }
}
