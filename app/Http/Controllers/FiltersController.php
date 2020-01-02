<?php

namespace App\Http\Controllers;
use Auth;
use App\Required;
use App\User;
use App\Filled;
use Session;

use Illuminate\Http\Request;

class FiltersController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }

    public function index(){
    	$user_id = Auth::user()->id;

        $req = Required::all()->where('user_id',$user_id)->first();
        if ($req) {
            $filter = User::find($user_id)->required()->first();

    		return view('pages.filter')->with('filter',$filter)
    		 						   ->with('user_id',$user_id);
    	}
    	return view('pages.filter')->with('user_id',$user_id);
    }

    public function store(Request $request,$id){
    	//check if the user has submitted a file
    	$age = $request->age;
    	$location = isset($request->location) ? $request->location : "0";
    	$r_status = $request->r_status;
    	$m_status= $request->m_status;
    	$student = $request->student;
    	$religion = $request->religion;
    	$height = $request->height;
    	$need = $request->need;
    	$level = $request->level;
    	$course = isset($request->course) ? $request->course : "0";
    	$school = isset($request->school) ? $request->school : "0";

    	
        $req = Required::all()->where('user_id',$id)->first();
        if ($req) {
			$req->location = $location;
			$req->age = $age;
			$req->r_status = $r_status;
			$req->m_status = $m_status;
			$req->student = $student;
			$req->religion = $religion;
			$req->height = $height;
			$req->need = $need;
        	$req->level = $level;
        	$req->course = $course;
        	$req->school = $school;

	        $req->save();
    		
    	}else{
    		Required::create([
	            'user_id' => $id,
				'age' => $age,
				'location' => $location,
				'r_status' => $r_status,
				'm_status' => $m_status,
				'student' => $student,
				'religion' => $religion,
				'height' => $height,
				'need' => $need,
	        	'level' => $level,
	        	'course' => $course,
	        	'school' => $school,
        	]);

            Filled::create([
                'user_id' => $id
            ]);
    	}

    	Session::flash('created','Your Match Filters has been updated');

    	return redirect()->route('home');
    }
}
