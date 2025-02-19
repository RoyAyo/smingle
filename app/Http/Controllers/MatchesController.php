<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
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

        $country = isset($request->country) ? str_replace(' ', '¬',$request->country) : "0";
    	$state = isset($request->state) ? str_replace(' ', '¬',$request->state) : "0";
    	$school = isset($request->school) ?  str_replace(' ', '¬',$request->school) : "0";
    	$course = isset($request->course) ? str_replace(' ', '¬',$request->course) : "0";

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

    	$process = new Process('python3 ../public/python/matches.py '.$user_id.' '.$based_on.' '.$gen.' '.$age.' '.$country.' '.$state.' '.$rel.' '.$height.' '.$r_status.' '.$m_status.' '.$need.' '.$student.' '.$school.' '.$course.' '.$level. ' '.$skin_colour.' '.$body_shape.' '.$job.' '.$model);

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
        $match->age = Carbon::parse($match->DOB)->age;        
        $match->score = strval(round($score,3) * 100).'%';

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
    public function event(Request $request,$event_id){
        $user_id = Auth::user()->id;
        $user_gender = Auth::user()->gender;
        $filter = [];


        $country = isset($request->country) ? str_replace(' ', '¬',$request->country) : "0";
    	$state = isset($request->state) ? str_replace(' ', '¬',$request->state) : "0";
    	$school = isset($request->school) ?  str_replace(' ', '¬',$request->school) : "0";
    	$course = isset($request->course) ? str_replace(' ', '¬',$request->course) : "0";

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

        $based_on ='generals';


        $check = $this->check_filled($based_on,$user_id);
        if (!$check) {
            return "Please Go To The About You Page To Fill the ". strtoupper($based_on) ." Category";
        }

        $user_id = json_encode($user_id);
        #$event_id = json_encode($event_id);
        $filter = json_encode($filter);

        $process = new Process('python3 ../public/python/event.py '.$user_id.' '.$event_id.' '.$gen.' '.$age.' '.$country.' '.$state.' '.$rel.' '.$height.' '.$r_status.' '.$m_status.' '.$need.' '.$student.' '.$school.' '.$course.' '.$level. ' '.$skin_colour.' '.$body_shape.' '.$job.' '.$model);

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
        $match->age = Carbon::parse($match->DOB)->age; 
        $match->score = strval(round($score,3) * 100).'%';

        Notifications::create([
            'user_id'=>$best_id,
            'notification_type'=>3,
            'involved_id'=>$user_id,
            'event'=>$event_id
        ]);


        return $match;
    }
}
