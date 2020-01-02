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
            'password' => Hash::make('12345678'),
            'gender' => 1,
            'DOB' => "1998-06-24",
            'about' => "I own this freaking site niggas,I am a goat",
            'cluster' => 1,
            'zodiac' => "Cancer"
        ]);

        App\Profile::create([
        		'user_id' => 1,
				'age' => 2,
				'location' => "Lagos,Nigeria",
				'r_status' => 1,
				'm_status' => 1,
				'student' => 1,
				'religion' => 1,
				'height' => 2,
				'need' => 1,
                'school' => 'Unilag',
                'level' => 5,
                'course' => "Chemical Engr"
        ]);
        App\Filled::create([
                'user_id' => 1
        ]);
    }
}
