<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Auth;
use Course;

class Checkin extends Model {

	//The database table used by the model.
	protected $table = 'checkins';
	protected $primaryKey='checkin_id';

	protected $fillable = [
		'user_id',
		'course_id',
		'checkin_longitude',
		'checkin_latitude'
	];

	public static function checkinator(){
		//dd(Course_time::getCurrentTimeBlock());
		$currentBlock = Course_time::getCurrentTimeBlock()->course_time_name;
		$currentBlockID = Course_time::getCurrentTimeBlock()->course_time_id;

		echo "We are currently in the " . $currentBlock . " Course block. <br>";

		$enrolled = Auth::user()->course_checkin();;
		echo "You are now able to checkin to course: " . $enrolled->course_name;
		//return var_dump($enrolled->first()->course_name);
}

}
