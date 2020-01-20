<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Profile;
use App\Filled;
use App\Jobs;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/profile';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'username' => ['required','unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        $z = $this->zod($data['dob']);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'gender' => $data['gender'],
            'instagram' => $data['instagram'],
            'twitter' => $data['twitter'],
            'DOB' => $data['dob'],
            'zodiac' => $z,
        ]);

        $profile = Profile::create([
            'user_id' => $user->id
        ]);

        $filled = Filled::create([
            'user_id' => $user->id
        ]);
        return $user;
    }

    protected function zod($date){
        $date_arr = explode("-", $date);

        $month = intval($date_arr[1]);
        
        $day = intval($date_arr[2]);

        if(($month == 1 && $day >=  20)|| ($month == 2 && $day <= 18 )){
            $zodiac = "Aquarius";
        }
        elseif(($month == 2 && $day >= 19)|| ($month == 3 && $day <= 20 )){
            $zodiac = "Pisces";
        }
        elseif(($month == 3 && $day >= 21)|| ($month == 4 && $day <= 19 )){
            $zodiac = "Aries";
        }
        elseif(($month == 4 && $day >= 20)|| ($month == 5 && $day <= 20 )){
            $zodiac = "Taurus";
        }
        elseif(($month == 5 && $day >= 21)|| ($month == 6 && $day <= 20 )){
            $zodiac = "Ariel";
        }
        elseif(($month == 6 && $day >= 21)|| ($month == 7 && $day <= 22 )){
            $zodiac = "Cancer";
        }
        elseif(($month == 7 && $day >= 23)|| ($month == 8 && $day <= 22 )){
            $zodiac = "Leo;";
        }
        elseif(($month == 8 && $day >= 23)|| ($month == 9 && $day <= 22 )){
            $zodiac = "Virgo";
        }
        elseif(($month == 9 && $day >= 23)|| ($month == 10 && $day <= 22 )){
            $zodiac = "Libra";
        }
        elseif(($month == 10 && $day >= 23)|| ($month == 11 && $day <= 21 )){
            $zodiac = "Scorpio";
        }
        elseif(($month == 11 && $day >= 22)|| ($month == 12 && $day <= 21 )){
            $zodiac = "Saggittarius";
        }
        else{
            $zodiac = "Capricorn";
        }

        return $zodiac;
    }
}
