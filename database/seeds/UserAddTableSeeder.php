<?php
use Illuminate\Database\Seeder;
use Faker\Factory as Fake;
/**
* 
*/
class UserAddTableSeeder extends Seeder
{
	
	public function run($value='')
	{
        $fake = Fake::create();

        for($i = 0;$i<25; $i++) {

            \DB::table('usersi')->insert(
                $arrayName = array(
                    'user_name'=> $fake->unique()->userName,
                    'password' => \Hash::make('123456'),
                    'first_name' => $fake->firstName,
                    'last_name' => $fake->lastName,
                    'email' => $fake->unique()->companyEmail,
                    'identification'=>$fake->unique()->numberBetween($min = 10000, $max = 90000),
                    'image_uri'=>$fake->imageUrl($width = 640, $height = 480),
                    'description'=>$fake->paragraph(rand(2,5)),
                    'roll'=>'seller'

                )
            );
        }

	}
}