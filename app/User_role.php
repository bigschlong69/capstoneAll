<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class User_role extends Model {

	//defines the table and primaryKey
	protected $table = 'user_roles';
	protected $primaryKey = 'user_role_id';
}
