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

    public function check(){
    	$user_id = json_encode(Auth::user()->id);

    	//$based_on = json_encode($request->based);
    	$based_on = "generals";

    	$process = new Process('python ../public/python/matches.py '.$user_id.' '.$based_on );
		$process->run();

		if (!$process->isSuccessful()) {
			return new ProcessFailedException($process);
		}

		$best_match = $process->getOutput();

		$d = json_decode($best_match);

		$best_id = $d->id;
		$score = $d->match;

		return $best_id;
    }
}
