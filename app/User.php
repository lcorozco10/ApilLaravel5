<?php namespace Myapi;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\SoftDeletes;
use Eloquence\Database\Traits\CamelCaseModel;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

    /**
     * Use softDelete Attribute and CamelCase Package
     */
    use SoftDeletes, CamelCaseModel;

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['user_name','password', 'email', 'roll'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token','deleted_at'];

    /*
     * Relation with UserProfile
     */
    public function profile()
    {
        return $this->hasOne('\Myapi\userProfile');
    }

    public function getFullNameAttribute(){
        return $this->first_name.' '.$this->last_name;
    }

    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }

}
