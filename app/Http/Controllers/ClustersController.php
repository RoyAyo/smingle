<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Required;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class ClustersController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }

    public function index(){
    	return view('pages.cluster');
    }

    public function store(Request $request){
    	$user_id = Auth::user()->id;

    	$clusters = [];

    	array_push($clusters, $request->clus1);
    	array_push($clusters, $request->clus2);
    	array_push($clusters, $request->clus3);
    	array_push($clusters, $request->clus4);
    	array_push($clusters, $request->clus5);

    	$c = json_encode($clusters);

    	$process = new Process('python ../public/python/cluster.py '.$c);

    	$process->run();

		if (!$process->isSuccessful()) {
			return new ProcessFailedException($process);
		}

		$cluster_group = $process->getOutput();

		
		$user = User::find($user_id);
		$user->cluster = $cluster_group;

        $user->save();

		return redirect()->route('home');
    }
}
