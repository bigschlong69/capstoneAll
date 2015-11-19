<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Support\Facades\DB;
use Auth;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    //The database table used by the model.
    protected $table = 'users';
    protected $primaryKey='user_id'; 

    //The attributes that are mass assignable.
    protected $fillable = [
        'user_id',
        'user_name',
        'email',
        'password',
        'user_role',
        'user_active'
    ];

    //The attributes excluded from the model's JSON form.
    protected $hidden = ['password', 'remember_token'];

    //Relationships
    public function user_roles(){
        return $this->hasMany('App\User_role','user_role_id', 'user_role');
    }

    public function roster_spots(){
        return $this->hasMany('App\Roster','user_id','user_id');
    }

    public function course_checkin(){
        if(isset(Course_time::getCurrentTimeBlock()->course_time_id)) {
            $timeBlock = Course_time::getCurrentTimeBlock()->course_time_id;
            $enrolled = DB::table('courses')
                ->leftJoin('rosters', 'rosters.course_id', '=', 'courses.course_id')
                ->where('rosters.user_id', '=', Auth::user()->user_id)
                ->where('courses.course_time_id', '=', $timeBlock)->first();

            return $enrolled;
        } else {
            return false;
        }
    }

    public function courses_enrolled(){
            $enrolled = DB::table('courses')
                ->leftJoin('rosters', 'rosters.course_id', '=', 'courses.course_id')
                ->where('rosters.user_id', '=', Auth::user()->user_id);
            return $enrolled;
    }

    public function courses_taught(){
        return $this->hasMany('App\Course','course_instructor', 'user_id')->orderBy('semester_id','ASC');
    }

    public function courses_taught_active(){
        $semester = Semester::now()->first()->getID();
        //echo get_class($semester);
        return $this->hasMany('App\Course','course_instructor', 'user_id')->where('semester_id', $semester);
    }

    public function checkins(){
        return $this->hasMany('App\Checkins', 'checkin_user_id', 'user_id');
    }

    public function getName(){
        return $this->user_name;
    }

    public function getID(){
        return $this->user_id;
    }
}
