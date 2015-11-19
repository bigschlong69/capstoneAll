<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model {

	//defines the table and primaryKey
	protected $table = 'courses';
	protected $primaryKey = 'course_id';

	protected $fillable = [
		'course_name',
		'course_instructor',
		'course_section_id',
		'course_location'
	];

	public function instructor(){
		return $this->hasOne('App\User','user_id','course_instructor');
	}

	public function semester(){
		return $this->hasOne('App\Semester','semester_id', 'semester_id');
	}

	public function times(){
		return $this->hasOne('App\Course_time','course_time_id','course_time_id');
	}

	public function getName(){
		return $this->course_name;
	}

	public function getID(){
		return $this->course_id;
	}




}
