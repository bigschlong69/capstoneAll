<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model {

	//defines the table and primaryKey
	protected $table = 'semesters';
	protected $primaryKey = 'semester_id';

	public function course(){
		return $this->belongsTo('App\Course','semester_id');
	}

	public function getSemester(){
		return $this->semester_name;
	}

	public function getID(){
		return $this->semester_id;
	}

	public static function now(){
		$date = date('c');
		$semester = Semester::where('semester_startdate', '<', $date)->where('semester_enddate','>', $date);
		return $semester;
	}
}
