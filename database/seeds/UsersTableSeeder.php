<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name' => "Ayoola Roy",
        	'username' => "adminroy",
            'email' => "roylayindeay0@gmail.com",
            'password' => Hash::make('roy72779673'),
            'gender' => 1,
            'DOB' => "1998-06-24",
            'about' => "I own this freaking site niggas,I am a goat",
            'cluster' => 1,
            'zodiac' => "Cancer",
            'sub' => 3,
            'twitter'=>'Ay0_roy',
            'instagram'=>'ay0_roy',
            'avatar' => 'images/uploads/royxx.jpg'
        ]);

        App\Profile::create([
        		'user_id' => 1,
				'age' => 2,
                'country' => "Nigeria",
				'State' => "Lagos",
				'r_status' => 1,
				'm_status' => 3,
				'student' => 1,
				'religion' => 1,
				'height' => 2,
				'need' => 1,
                'skin_colour'=>2,
                'model'=>0,
                'body_shape'=>1,
                'school' => 'Unilag',
                'level' => 5,
                'course' => "Chemical Engr",
                'jobs' => '1'
        ]);
        App\Filled::create([
                'user_id' => 1
        ]);
    }
}
