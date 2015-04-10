<?php namespace Myapi;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Useri extends Model {

	//
    use SoftDeletes;
    protected $table = 'usersi';
    protected $dates = ['deleted_at'];

}