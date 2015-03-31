<?php
use Illuminate\Database\Seeder;
use Faker\Factory as Fake;
/**
* 
*/
class AdminTableSeeder extends Seeder
{
	
	public function run($value='')
    {
        $fake = Fake::create();

        for ($i = 0; $i < 30; $i++) {
           $id = \DB::table('users')->insertGetId(
                $arrayName = array(
                    'first_name' => $fake->firstName,
                    'last_name' => $fake->lastName,
                    'email' => $fake->unique()->email,
                    'password' => \Hash::make('123456'),
                    'type' => 'admin'

                )
            );
            \DB::table('user_profile')->insert(
                array(
                    'user_id' => $id,
                    'fscebook' => $fake->userName,
                    'twitter' => $fake->userName
                )
            );
        }
    }
}
