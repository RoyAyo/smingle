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

    public function index($id){
    	$user = User::find($id);

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

        $user_id = auth::user()->id;

        $user = User::find($user_id);

        $upload_name = time().$request->pics->getClientOriginalName();

        $request->pics->move('images/uploads',$upload_name);

        $user->avatar = "images/uploads".$upload_name;

        $user->save();

        return redirect()->back();
   }

    public function search(Request $request){
        $username = $request->username;

        $user = User::Where('username','LIKE','%'.$username.'%')->orWhere('name','LIKE','%'.$username.'%');
        $error = ["Please Search For A Valid User"];
        if($user->count() == 0){
            return json_encode($error);
        }else{
            $search = $user->get();

            return json_encode($search);
        }
    }

    public function inst($Request $request){
        $new_handle = $request->instagram;

        $user_id = auth()->user()->id;

        $user = User::find($user_id);

        $user->instagram = $new_handle;

        $user->save();

        Session::flash('changedig','Your Instagram Handle has been changed');

        return redirect()->back();
    }

public function twit($Request $request){
        $new_handle = $request->twitter;

        $user_id = auth()->user()->id;

        $user = User::find($user_id);

        $user->twitter = $new_handle;

        $user->save();

        Session::flash('changedig','Your Twitter Handle has been changed');

        return redirect()->back();
    }
}
