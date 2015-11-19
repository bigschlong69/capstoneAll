<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use DB;

class Course_time extends Model {

    //defines the table and primaryKey
    protected $table = 'course_times';
    protected $primaryKey = 'course_time_id';
    	protected $fillable = [
		'course_time_name'
	];

    public function getTimes(){
        return $this->course_time_name;
    }

    public function start(){
        return $this->course_time_start;
    }

    public function end(){
        return $this->course_time_end;
    }

    public function isToday(){
        //this sets the timezone to chicago time from server time
        $timezone = '- 6 hours';

        //echo "<br>Today is " . $todayPrint = date('l dS \o\f F Y h:i:s A', strtotime($timezone)) . "<br>";

        //get today's day
        $today = date('l', strtotime($timezone));
        $time = date('H:i:s', strtotime($timezone));

        $timeToStart = round(abs(strtotime($time) - strtotime($this->start()))/(60*60),2);
        $timeToEnd = round(abs(strtotime($time) - strtotime($this->end()))/(60*60),2);

        //if today is mon (1), wed (3), fri(5)
        if(($today == 'Monday' || $today == 'Wednesday' || $today == 'Friday') && ($this->course_time_days == "mwf")){
            echo "<br>Class is today: " . $today . " ";
            if($time > $this->end()){
                echo "Class finished " . $timeToEnd . " hours ago";
            } else if($time < $this->start()){
                echo "Class starts in " . $timeToStart . " hours.";
            } else {
                echo "You can check in now.";
            }
        } else if (($today == 'Tuesday' || $today == 'Thursday')&& ($this->course_time_days == "tt")){
            echo "<br>Class is today: " . $today . " ";
            if($time > $this->end()){
                echo "Class finished " . $timeToEnd . " hours ago";
            } else if($time < $this->start()){
                echo "Class starts in " . $timeToStart . " hours.";
            } else {
                echo "You can check in now.";
            }
        } else if (($today == 'Saturday' || $today == 'Sunday')&& ($this->course_time_days == "WEEKEND")){
            echo "<br>Class is today: " . $today . " ";
            if($time > $this->end()){
                echo "Class finished " . $timeToEnd . " hours ago";
            } else if($time < $this->start()){
                echo "Class starts in " . $timeToStart . " hours.";
            } else {
                echo "You can check in now.";
            }
        }else {
            return "" ;
        }
    }



    public static function getCurrentTimeBlock(){
        //this sets the timezone to local time from server time
        $timezone = '- 6 hours';

        //get today's day and time, set the start and end times for the school day
        $today = date('l', strtotime($timezone));
        $time = date('H:i:s', strtotime($timezone));
        $startDay = '08:00:00';
        $endDay = '20:00:00';

        // For testing purposes, we can set these dummy variables here:
        //$time = '12:00:01';
        //$today = 'Monday';

        //if today is mon (1), wed (3), fri(5)
        if(($today == 'Monday' || $today == 'Wednesday' || $today == 'Friday')&&($time > $startDay) && ($time < $endDay)){
            //we are looking for the mwf time block that is currently active
            $checkinDay = 'mwf';

            //Get the course_time id for the current time
            return $checkinTimeBlock = (( DB::table('course_times')->where('course_time_end', '>=', $time)->where('course_time_start', '<=', $time)->where('course_time_days', $checkinDay)->first()));

        } else if (($today == 'Tuesday' || $today == 'Thursday')&&($time > $startDay) && ($time < $endDay)){
            //we are looking for a tt time block
            $checkinDay = 'tt';

            //Get the course_time id for the current time
            return $checkinTimeBlock = (( DB::table('course_times')->where('course_time_end', '>=', $time)->where('course_time_start', '<=', $time)->where('course_time_days', $checkinDay)->first()));

        } else if (($today == 'Saturday' || $today == 'Sunday')){
            //we are looking for a tt time block
            $checkinDay = 'ss';

            //Get the course_time id for the current time
            return $checkinTimeBlock = (( DB::table('course_times')->where('course_time_end', '>=', $time)->where('course_time_start', '<=', $time)->where('course_time_days', $checkinDay)->first()));

        } else {
            return "No classes are scheduled at this time." ;
        }
    }

}