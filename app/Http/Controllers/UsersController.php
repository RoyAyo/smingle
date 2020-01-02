<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
	public function __construct(){

	}

    public function index($id){
    	$user = User::find($id);

    	if ($user->id == auth()->user()->id) {
    		$owner = 1;
    	}else{
    		$owner = 0;
    	}

    	return view('user.profile')->with('user',$user)
									->with('owner',$owner);
   }
}
