<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\User;
use App\Filled;
use App\Required;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class ClustersController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }

    public function index(){
        $user = User::find(auth()->user()->id);

    	return view('pages.cluster')->with('user',$user);
    }


    public function cluster(Request $request){
        $user_id = auth::user()->id;

        $user = User::find($user_id);

        $this->validate($request,[
            'cluster' => 'required',
            'about' => 'required|max:200' 
        ]);

        if (is_null($user->avatar)) {
            if (auth()->user()->gender == 1) {
                $user->avatar = "images/mdefault.jpg";
            }else{   
                $user->avatar = "images/fdefault.jpg";
            }
        }

        $user->about = $request->about;

        $user->cluster = $request->cluster;

        $user->save();

	if(Filled::find($user_id)->general=='0'){
		Session::flash('about_info','Registration successful, please go to the about you on the left sidebar to complete registration');
	}

        return redirect()->route('home');
    }
}
