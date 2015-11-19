<?php

namespace App\Http\Controllers;

use App\Course_time;
use DB;
use App\Course;
use App\User;
use App\Roster;
use App\Semester;
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CoursesController extends Controller
{

    // Returns a list of all courses in the db
    // This will be handle what is visible at /courses/
    // Different index views should be presented based on the auth level of the
    // logged in user.
    // Admin will be able to view / create / edit / delete all courses in the db
    // Instructor will be able to view / edit all courses in the db where they are the instructor
    // Students will only be able to view courses they have a roster entry for
    public function index()
    {
        //
        $userName = Auth::user()['user_name'];
        $userRole = Auth::user()['user_role'];
        switch ($userRole)
        {
            case 1:
                $courses = Course::all()->sortBy('semester_id');
                
                // var_dump($courses->first()->times->getTimes());die();
                return view('courses.index')->withCourse($courses);
            case 2:
                $courses = DB::table('rosters')
                   ->leftJoin('courses', 'rosters.course_id', '=', 'courses.course_id')
                    ->where('rosters.user_id',Auth::user()['user_id'])
                    ->get();
                    return view('courses.student_course', array("data"=>$courses) );
            case 3:
                $courses = DB::table('rosters')
                   ->leftJoin('courses', 'rosters.course_id', '=', 'courses.course_id')
                    ->where('rosters.user_id',Auth::user()['user_id'])
                    ->get();

                    return view('courses.student_course', array("data"=>$courses) );
            default:
                return "This is mad";
        }


    }

    // Create a new course. This is a function that is only accessible by logged in admins
    public function create()
    {

        $instructors = DB::table('users')->where('user_role','2')->lists('user_name','user_id');
        $course_times = Course_time::lists('course_time_name','course_time_id');
        $semesters = Semester::lists('semester_name','semester_id');
        return view('courses.create')->with('instructors', $instructors)->with('semesters', $semesters)->with('course_times', $course_times);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());

        $course = new Course();
        $course->course_name = $request->input('course_name');
        $course->course_instructor = $request->input('course_instructor');
        $course->semester_id = $request->input('semester_id');
        $course->course_time_id = $request->input('course_time_id');
        $course->course_location = $request->input('course_location');
        $course->save();
        return redirect('courses');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
