<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\MessageSent;
use App\Notifications;

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

        $Notification = Notifications::where('user_id',$user_id)->orwhere('involved_id',$user_id)->get();

        foreach ($Notifications as $Notification) {
            $other_id = $Notification->user_id == $user_id? $Notification->involved_id : $Notification->user_id;

            $other_user = User::find($other_id);

            $Notification->other_name = $other_user->username;
            $Notification->other_id = $other_id;
            $Notification->notification_type = $Notification->user_id == $user_id ? '1':'2';
        }

        return view('home2')->with('Notifications',$Notification);
    }
}
