<?php namespace Myapi;

use Illuminate\Database\Eloquent\Model;

class userProfile extends Model {

    // Es opcional de declarar el nombre de la tabla, porque
    // el ORM explicitamente utiliza la tabla user_profiles
    // al convertir en nombre de la clase userProfile a underscore

    //protected $table = 'user_profiles';

    public function getAgeAttribute(){
        return \Carbon\Carbon::parse($this->birthDate)->age;
    }

}