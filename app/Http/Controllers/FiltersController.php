<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use App\Filled;
use Session;

use Illuminate\Http\Request;

class FiltersController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }

    public function index(){
    	$user_id = Auth::user()->id;

    	return view('pages.filter')->with('user_id',$user_id);
    }
}
