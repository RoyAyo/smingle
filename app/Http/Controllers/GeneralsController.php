<?php

namespace App\Http\Controllers;

use App\General;
use App\Filled;
use Session;
use Auth;
use Illuminate\Http\Request;

class GeneralsController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }

    public function index(){
    	$user_id = Auth::user()->id;

    	return view('pages.pages.you')->with('id',$user_id);
    }

    public function store(Request $request,$id){
       	$gen1 = isset($request->gen1) ? $request->gen1 : 1;
        $gen2 = isset($request->gen2) ? $request->gen2 : 1;
        $gen3 = isset($request->gen3) ? $request->gen3 : 1;
        $gen4 = isset($request->gen4) ? $request->gen4 : 1;
        $gen5 = isset($request->gen5) ? $request->gen5 : 1;
        $gen6 = isset($request->gen6) ? $request->gen6 : 1;
        $gen7 = isset($request->gen7) ? $request->gen7 : 1;
        $gen8 = isset($request->gen8) ? $request->gen8 : 1;
        $gen9 = isset($request->gen9) ? $request->gen9 : 1;
        $gen10 = isset($request->gen10) ? $request->gen10 : 1;
        $gen11 = isset($request->gen11) ? $request->gen11 : 1;
        $gen12 = isset($request->gen12) ? $request->gen12 : 1;
        $gen13 = isset($request->gen13) ? $request->gen13 : 1;
        $gen14 = isset($request->gen14) ? $request->gen14 : 1;
        $gen15 = isset($request->gen15) ? $request->gen15 : 1;

        
        $req = General::all()->where('user_id',$id)->first();
        if ($req) {
            $req->gen1 = $gen1;
            $req->gen2 = $gen2;
            $req->gen3 = $gen3;
            $req->gen4 = $gen4;
            $req->gen5 = $gen5;
            $req->gen6 = $gen6;
            $req->gen7 = $gen7;
            $req->gen8 = $gen8;
            $req->gen9 = $gen9;
            $req->gen10 = $gen10;
            $req->gen11 = $gen11;
            $req->gen12 = $gen12;
            $req->gen13 = $gen13;
            $req->gen14 = $gen14;
            $req->gen15 = $gen15;
            $req->save();

            Session::flash('aboutFilled','About you has been updated');
            
        }else{
            General::create([
                'user_id' => $id,
                'gen1' => $gen1,
                'gen2' => $gen2,
                'gen3' => $gen3,
                'gen4' => $gen4,
                'gen5' => $gen5,
                'gen6' => $gen6,
                'gen7' => $gen7,
                'gen8' => $gen8,
                'gen9' => $gen9,
                'gen10' => $gen10,
                'gen11' => $gen11,
                'gen12' => $gen12,
                'gen13' => $gen13,
                'gen14' => $gen14,
                'gen15' => $gen15,
            ]);

            $filled = Filled::all()->where('user_id',$id)->first();
            $filled->general = 1;

            $filled->save();

            Session::flash('aboutFilled','Your response is saved, you can now find a match');
        }


        return redirect()->route('home');
    }
}
