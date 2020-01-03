<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminsController extends Controller
{
    public function __construct(){
    	$this->middleware('admin');
    }

    public function index(){
    	return "nada";
    }
}
