<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Roster extends Model {

	//defines the table and primaryKey
	protected $table = 'rosters';
	protected $primaryKey = 'roster_id';

	protected $fillable = [
		'course_id',
		'user_id'
	];

	public function course(){
		return $this->belongsTo('App\Course','course_id','course_id');
	}

	public function user(){
		return $this->belongsTo('App\User','user_id','user_id');
	}

	public function getCourse(){
		$course = Course::with('course_id',$this->course_id);
		return $course;
	}

	public function getStudent(){
		$student = User::with('user_id', $this->user_id);
		return $student;
	}
}
