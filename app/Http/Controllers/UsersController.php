<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;

class UsersController extends Controller
{
	public function __construct(){
        $this->middleware('auth');
	}

    public function index($username){
    	$user = User::where('username',$username)->first();

        if(is_null($user)){
            return redirect()->route('home');
        }

        if (is_null($user->profile()->first()->country)) {
            return redirect()->route('profile');
        }

    	if ($user->id == auth()->user()->id) {
    		$owner = 1;
    	}else{
    		$owner = 0;
    	}

    	return view('user.profile')->with('user',$user)
									->with('owner',$owner);
   }

    public function pics(Request $request){
        $this->validate($request,[
            'pics' => 'required|image'
        ]);


        $user_id = auth()->user()->id;

        $user = User::find($user_id);

        $upload_name = time().$request->pics->getClientOriginalName();

	    $upload_name = str_replace(' ','_',$upload_name);

        $request->pics->move('images/uploads',$upload_name);

        $user->avatar = "images/uploads/".$upload_name;

        $user->save();

        Session::flash('changedp','Your display picture has been changed');

        return redirect()->back();
   }

    public function inst(Request $request){
        $new_handle = $request->instagram;

        $user_id = auth()->user()->id;

        $user = User::find($user_id);

        $user->instagram = $new_handle;

        $user->save();

        Session::flash('changedig','Your Instagram Handle has been changed');

        return redirect()->back();
    }

    public function twit(Request $request){
        $new_handle = $request->twitter;

        $user_id = auth()->user()->id;

        $user = User::find($user_id);

        $user->twitter = $new_handle;

        $user->save();

        Session::flash('changedtwit','Your Twitter Handle has been changed');

        return redirect()->back();
    }

    public function settings(){
        $t = is_null(auth()->user()->twitter) ? '' : auth()->user()->twitter;
        $i = is_null(auth()->user()->instagram) ? '' : auth()->user()->instagram;
        return view('settings')->with('ig_handle',$i)
                               ->with('twitter_handle',$t);
    }
}
