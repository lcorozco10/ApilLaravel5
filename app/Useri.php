<?php namespace Myapi;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Eloquence\Database\Traits\CamelCaseModel;


class Useri extends Model {

	//


    use SoftDeletes;
    protected $table = 'usersi';
    protected $dates = ['deleted_at'];
    use CamelCaseModel;

}