<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs;

class JobsController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }

    public function index(){
    	return view('pages.jobs');
    }

    public function store(Request $request){
    	$job = $request->job;

        $user_id = auth()->user()->id;

        if (Jobs::where('user_id',$user_id)->where('job_type,'$job)->count()>0) {
            Session::flash('jobunallowed','You already added this as a job');

            return redirect()->back();
        }
        Jobs::create([
            'user_id'=>$user_id,
            'job_type'=> $job
        ]);

        return redirect()->route('home');
    	
    }
}
