<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
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

        if (is_null($user->avatar)) {
            $this->validate($request,[
                'pics' => 'required|image|max:20000',
                'cluster' => 'required',
                'about' => 'required|max:400' 
            ]);               

            $upload_name = time().$request->pics->getClientOriginalName();

            $request->pics->move('images/uploads',$upload_name);

            $user->avatar = "images/uploads/".$upload_name; 
        }else{
            $this->validate($request,[
                'cluster' => 'required',
                'about' => 'required|min:15|max:400' 
            ]);
        }


        $user->about = $request->about;

        $user->cluster = $request->cluster;

        $user->save();

        return redirect()->route('home');
    }
}
