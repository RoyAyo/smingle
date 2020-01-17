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

        $Notification = Notifications::where('user_id',$user_id)->orwhere('involved_id',$user_id)->get();

        return view('home2')->with('Notifications',$Notification);
    }
}
