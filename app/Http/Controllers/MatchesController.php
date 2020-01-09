<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Filled;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class MatchesController extends Controller
{
	public function __construct(){
    	$this->middleware('auth');
    }

    public function check(Request $request){
    	$user_id = Auth::user()->id;
    	$user_gender = Auth::user()->gender;
    	$filter = [];


    	$loc = isset($request->location) ? $request->location : "0";
    	$school = isset($request->school) ? $request->school : "0";
    	$course = isset($request->course) ? $request->course : "0";


    	array_push($filter,$user_gender);
    	array_push($filter,$request->age);
    	array_push($filter,$loc);
    	array_push($filter,$request->religion);
    	array_push($filter,$request->height);
    	array_push($filter,$request->r_status);
    	array_push($filter,$request->m_status);
    	array_push($filter,$request->need);
    	array_push($filter,$request->student);
    	array_push($filter,$school);
    	array_push($filter,$course);
    	array_push($filter,$request->level);
    	$based_on = $request->based_on;


    	$check = $this->check_filled($based_on,$user_id);
    	if (!$check) {
    		return "Please Go To The About You Page To Fill the ". strtoupper($based_on) ." Category";
    	}

    	$user_id = json_encode($user_id);
    	$filter = json_encode($filter);

    	$process = new Process('python ../public/python/matches.py '.$user_id.' '.$based_on.' '.$filter);
		$process->run();

		if (!$process->isSuccessful()) {
			return new ProcessFailedException($process);
		}

		$best_match = $process->getOutput();

		$d = json_decode($best_match);
		if ($d === 0) {
			if ($user_gender == 2) {
				return "Nobody Matches Your Perfect Self, Please Edit Your Filters Or Try Again Later";
			}else{
				return "Nobody Found For Now, Please Edit Your Filters or Try Again Later";
			}
		}
		$best_id = $d->id;
		$score = $d->match;

		$match = User::find($best_id);
		return $match->name;
    }

    protected function check_filled($based_on,$user_id){
    	switch ($based_on) {
    		case 'generals':
    			$f = Filled::Where('user_id',$user_id)->first()->general;
    			break;
    		case 'relationships':
    			$f = Filled::Where('user_id',$user_id)->first()->relationship;
    			break;
    		case 'careers':
    			$f = Filled::Where('user_id',$user_id)->first()->career;
    			break;
    		case 'musics':
    			$f = Filled::Where('user_id',$user_id)->first()->situation;
    			break;
    		case 'movies':
    			$f = Filled::Where('user_id',$user_id)->first()->movie;
    			break;
    		case 'generals':
    			$f = Filled::Where('user_id',$user_id)->first()->music;
    			break;    		
    		default:
    			$f = Filled::Where('user_id',$user_id)->first()->random;
    			break;
    	}

		if ($f == 0) {
			return False;
		}else{
			return True;
		}
    }
}
