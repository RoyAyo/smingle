<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Filled;
use App\Notifications;
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


    	$gen = $user_gender;
    	$age = $request->age;
    	$rel = $request->religion;
    	$height = $request->height;
    	$r_status = $request->r_status;
    	$m_status = $request->m_status;
        $need = $request->need;
        $body_shape = $request->body_shape;
        $model = $request->model;
        $skin_colour = $request->skin_colour;
    	$job = $request->job;
    	$student = $request->student;
    	$level = $request->level;
    	$based_on = 'generals';


    	$check = $this->check_filled($based_on,$user_id);
    	if (!$check) {
    		return "Please Go To The About You Page To Fill the ". strtoupper($based_on) ." Category";
    	}

    	$user_id = json_encode($user_id);
    	$filter = json_encode($filter);

    	$process = new Process('python ../public/python/matches.py '.$user_id.' '.$based_on.' '.$gen.' '.$age.' '.$loc.' '.$rel.' '.$height.' '.$r_status.' '.$m_status.' '.$need.' '.$student.' '.$school.' '.$course.' '.$level);
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
        $match->score = strval(round($score,2)).'%';

        Notifications::create([
            'user_id'=>$best_id,
            'notification_type'=>1,
            'involved_id'=>$user_id
        ]);


		return $match;
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
