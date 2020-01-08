<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class MatchesController extends Controller
{
	public function __construct(){
    	$this->middleware('auth');
    }

    public function check(Request $request){
    	$user_id = json_encode(Auth::user()->id);
    	$filter = [];

    	array_push($filter,$request->age);
    	array_push($filter,$request->location);
    	array_push($filter,$request->religion);
    	array_push($filter,$request->height);
    	array_push($filter,$request->r_status);
    	array_push($filter,$request->m_status);
    	array_push($filter,$request->need);
    	array_push($filter,$request->student);
    	array_push($filter,$request->school);
    	array_push($filter,$request->course);
    	array_push($filter,$request->level);
    	$based_on = $request->based_on;

    	$filter = json_encode($filter); 

    	$process = new Process('python ../public/python/matches.py '.$user_id.' '.$based_on.' '.$filter);
		$process->run();

		if (!$process->isSuccessful()) {
			return new ProcessFailedException($process);
		}

		$best_match = $process->getOutput();

		$d = json_decode($best_match);

		$best_id = $d->id;
		$score = $d->match;

		$match = User::find($best_id);
		return $match;
    }
}
