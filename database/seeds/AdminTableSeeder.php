<?php
use Illuminate\Database\Seeder;
/**
* 
*/
class AdminTableSeeder extends Seeder
{
	
	public function run($value='') {

        $id = \DB::table('users')->insertGetId(
            array(
                'first_name' => 'Luis',
                'last_name' => 'Orozco',
                'email' => 'lcorozco10@gmail.com',
                'password' => \Hash::make('123456789'),
                'type' => 'Admin'
            )
        );

        \DB::table('user_profiles')->insert(
            array(
                'user_id' => $id,
                'birthDate' => '2015/03/31'
            )
        );
    }
}
