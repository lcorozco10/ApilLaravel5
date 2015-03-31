<?php
use Illuminate\Database\Seeder;
use Faker\Factory as Fake;
/**
* 
*/
class UserTableSeeder extends Seeder
{
	
	public function run($value='')
	{
        $fake = Fake::create();

        for($i = 0;$i<30; $i++) {

            \DB::table('users')->insert(
                $arrayName = array(
                    'first_name' => $fake->firstName,
                    'last_name' => $fake->lastName,
                    'email' => $fake->unique()->email,
                    'password' => \Hash::make('123456'),
                    'type' => 'user'

                )
            );
        }
	}
}