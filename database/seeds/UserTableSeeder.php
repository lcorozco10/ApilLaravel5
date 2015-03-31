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

            $id = \DB::table('users')->insertGetId(
                $arrayName = array(
                    'first_name' => $fake->firstName,
                    'last_name' => $fake->lastName,
                    'email' => $fake->unique()->email,
                    'password' => \Hash::make('123456'),
                    'type' => 'user'

                )
            );
            \DB::table('user_profiles')->insert(
                array(
                    'user_id' => $id,
                    'bio' => $fake->paragraph(rand(2,5)),
                    'website' => 'https://www.'.$fake->domainName,
                    'twitter' => 'https://twitter.com/'.$fake->userName,
                    'birthDate' => $fake->dateTimeBetween($startDate = '-45 years', $endDate = '-15 years')
                )
            );
        }



	}
}