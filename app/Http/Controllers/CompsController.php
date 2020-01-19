<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\General;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;


class CompsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function check(Request $request){

        $with = $request->using;

        if ($with==3) {
            $check_user = User::where('instagram',$request->username)->first();
        }elseif ($with==2) {
            $check_user = User::where('twitter',$request->username)->first();
        }else{
    	   $check_user = User::where('username',$request->username)->first();
        }

    	$user_id = json_encode(Auth::user()->id);


    	if (is_null($check_user)) {
    		return "Please Input A Valid User";
    	}

        //check if the user has filled the required field

        $check_filled = $check_user->general()->get()->count();

        if ($check_filled == 0) {
            return "Tell ".$check_user->name." to fill the required field";
         } 

    	$check_id = json_encode($check_user->id);

        if ($user_id == $check_id) {
           return "You cannot check with yourself,las las 60%";
        }

    	//$based_on = json_encode($request->based);
    	$based_on = "generals";

    	$process = new Process('python ../public/python/comp.py '.$user_id.' '.$check_id. ' '.$based_on );
		$process->run();

		if (!$process->isSuccessful()) {
			return new ProcessFailedException($process);
		}

		$match = $process->getOutput();


		$m = round(floatval($match) * 100,2);

		
		$match_perc = strval($m). '%';

        $check_user->score = $match_perc; 
		
		return $check_user;
    }
}
