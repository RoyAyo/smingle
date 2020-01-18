<?php

namespace App\Http\Controllers;
use App\Profile;
use Illuminate\Http\Request;
use Auth;

class ProfileController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }

    public function index(){
        $user_id = Auth::user()->id;

    	return view('profile.index')->with('profile',Profile::find($user_id));
    }

    public function update(Request $request,$id){

        $user = Profile::find($id);
    	$age = $request->age;
        $country = $request->country;
    	$state = $request->state;
    	$r_status = $request->r_status;
    	$m_status= $request->m_status;
    	$student = $request->student || 0;
    	$religion = $request->religion;
        $height = $request->height;
        $body_shape = $request->body_shape;
        $skin_colour = $request->skin_colour;
    	$jobs = $request->jobs;
        $model = $request->model;
    	$need = $request->need;

        if ($student != 0) {
            $level = $request->level;
            $course = $request->course;
            $school = $request->school;
        }

        $user->country = $country;
		$user->state = $state;
		$user->age = $age;
		$user->r_status = $r_status;
		$user->m_status = $m_status;
		$user->student = $student;
		$user->religion = $religion;
		$user->height = $height;
        $user->need = $need;
        $user->body_shape = $body_shape;
        $user->skin_colour = $skin_colour;
        $user->model = $model;
		$user->jobs = $jobs;

        if ($student != 0) {
            $user->level = $level;
            $user->course = $course;
            $user->school = $school;
        }
        
        $user->save();

        return redirect()->route('cluster');
    }
}
