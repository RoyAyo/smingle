<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

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
}
