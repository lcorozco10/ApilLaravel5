<?php namespace Myapi;

use Illuminate\Database\Eloquent\Model;
use Eloquence\Database\Traits\CamelCaseModel;


class userProfile extends Model {

    /**
     *  CamelCase Package
     */
    use CamelCaseModel;

    // Es opcional de declarar el nombre de la tabla, porque
    // el ORM explicitamente utiliza la tabla user_profiles
    // al convertir en nombre de la clase userProfile a underscore

    protected $table = 'users_profiles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['first_name','last_name', 'website', 'description','twitter','birth_date','avatar_url','identification','user_id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['updated_at','created_at','user_id'];

    public function getAgeAttribute(){
        return \Carbon\Carbon::parse($this->birthDate)->age;
    }

}