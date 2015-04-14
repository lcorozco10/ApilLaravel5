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
                    'user_name' => $fake->unique()->userName,
                    'password' => \Hash::make('123456'),
                    'email' => $fake->unique()->email,
                    'roll' => 'seller'
                )
            );

            \DB::table('users_profiles')->insert(
                array(
                    'user_id' => $id,
                    'first_name' => $fake->firstName,
                    'last_name' => $fake->lastName,
                    'website' => 'https://www.'.$fake->domainName,
                    'description' => $fake->paragraph(rand(2,5)),
                    'twitter' => 'https://twitter.com/'.$fake->userName,
                    'birth_date' => $fake->dateTimeBetween($startDate = '-45 years', $endDate = '-15 years'),
                    'avatar_url'=>$fake->imageUrl($width = 640, $height = 480),
                    'identification'=>$fake->unique()->numberBetween($min = 10000, $max = 90000)
                )
            );
        }
	}
}