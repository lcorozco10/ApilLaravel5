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
                'user_name' => 'lcorozco10',
                'password' => \Hash::make('123456'),
                'email' => 'lcorozco10@gmail.com',
                'roll' => 'admin'
            )
        );

        \DB::table('users_profiles')->insert(
            array(
                'user_id' => $id,
                'first_name' => 'Luis',
                'last_name' => 'Orozco',
                'website' => 'https://www.lcorozco.com',
                'description' => 'Web App, Laravel, Boostrap, Jquery, AgularJs, NodeJS, Ajax, RestFul, ReactJs, Rail, Sinatra',
                'twitter' => 'https://twitter.com/lcorozco10',
                'birth_date' => '2015/13/04',
                'avatar_url'=> 'https://www.google.com.ni/images/srpr/logo11w.png',
                'identification'=> '000000001'
            )
        );
    }
}
