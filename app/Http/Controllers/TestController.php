<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Required;
use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class TestController extends Controller
{
	public function index(){
		//get the user id
		$user_id = json_encode(Auth::user()->id);

		
		return $user_id;
		// #filters
		// $filters = [];

		// ##get the filters
		// $gender = User::find($user_id)->gender;
		// $req = Required::all()->where('user_id',$user_id)->first();
		// if (!$req) {
		// 	return "please fill out the filter page do we can provide better matches based on your condition";
		// }
		// array_push($filters, $gender);
		// array_push($filters, $req->age);
		// array_push($filters, $req->location);
		// array_push($filters, $req->religion);
		// array_push($filters, $req->height);
		// array_push($filters, $req->student);
		// array_push($filters, $req->r_status);
		// array_push($filters, $req->m_status);
		// array_push($filters, $req->need);
		// array_push($filters, $req->school);
		// array_push($filters, $req->course);
		// array_push($filters, $req->level);
		// array_push($filters, $req->degree);

		// //encode the filters
		// $f = json_encode($filters);

		// $process = new Process('python ../public/python/test1.py '.$user_id.' '.$f);
		// $process->run();

		// if (!$process->isSuccessful()) {
		// 	return new ProcessFailedException($process);
		// }

		// $o = $process->getOutput();

		// return $o;
	}    
}
