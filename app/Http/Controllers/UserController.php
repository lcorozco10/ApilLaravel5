<?php
/**
 * Created by Luis.
 * User: lcorozco
 * Date: 31/03/2015
 * Time: 11:14 AM
 */

namespace App\Http\Controllers;
use App\User;

class UserController extends Controller {

    public function getOrm(){

        /*$user = User::first();
        dd($user->profile->age);*/

        $user = User:://Select('id','first_name','last_name')
            //->
            with('profile')
            ->where('users.first_name','<>','Luis')
            ->orderBy('users.first_name','ASC')
            ->get(array('users.first_name'));
        dd($user->toArray());
        //return response()->json($user->toArray());

    }

    public function getIndex(){

        $result = \DB::table('users')
            ->Select([
                'users.*',
                'user_profiles.twitter',
                'user_profiles.birthDate',
                'user_profiles.id as profile_id'
            ])
            ->where('users.first_name','<>','Al')
            //->orderBy(\DB::RAW('RAND()')) //Inseta metodos Nativos de l Motor de Sql
            ->orderBy('users.first_name','ASC')
            ->join('user_profiles','users.id','=', 'user_profiles.user_id')
            ->get();
            //->first();

        foreach($result as $row)
        {
            $row->full_name = $row->first_name.' '.$row->last_name;
            $row->age = \Carbon\Carbon::parse($row->birthDate)->age;
        }

        //dd($result);
        dd($result);
        return $result;

    }
}