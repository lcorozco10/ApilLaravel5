<?php
use Illuminate\Database\Seeder;
use Faker\Factory as Fake;
/**
* 
*/
class AdminAddTableSeeder extends Seeder
{
	
	public function run($value='')
    {
        \DB::table('usersi')->insert(
            $arrayName = array(
                'user_name' => "admin",
                'password' => \Hash::make('123456'),
                'first_name' => 'Cocomsys',
                'last_name' => 'Test',
                'email' => 'info@cocomsys.com',
                'identification' => '000001',
                'image_uri' => 'http://cocomsys.com/img/logo.png',
                'description' => 'Cocomsys (Core Computer System S.A)',
                'roll' => 'Admin'

            )
        );
    }
}