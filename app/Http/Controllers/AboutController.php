<?php

namespace App\Http\Controllers;

use Auth;
use App\Filled;
use App\User;
use App\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }

    public function index(){
    	$user_id = Auth::user()->id;

    	$filled = Filled::all()->where('user_id',$user_id)->first();

    	return view('pages.about')->with('filled',$filled);
    }
}
