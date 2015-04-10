<?php namespace Myapi;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Eloquence\Database\Traits\CamelCaseModel;


class Useri extends Model {

	//
    use SoftDeletes;
    use CamelCaseModel;
    protected $table = 'usersi';
    protected $dates = ['deleted_at'];

}