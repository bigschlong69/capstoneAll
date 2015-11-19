<?php namespace App;

use Illuminate\Database\Eloquent\Model;


class Class_section extends Model {

	protected $fillable = [
		'class_section_name',
		'class_section_days',
		'class_section_start_time',
		'class_section_end_time'
	];

	//each class section has one course
	protected function course(){
		return $this->hasOne('App\Course', 'course_id', 'class_section_id');
	}

}
