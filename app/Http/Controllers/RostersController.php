<?php

namespace App\Http\Controllers;

use App\Course;
use App\User;
use App\Roster;
use Illuminate\Http\Request;

use Auth;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class RostersController extends Controller
{
    // return a listing of all of the roster objects from the database
    //TODO Determine what we want to show when the user arrives at /rosters
    // Do we want this view to be visible under /courses/rosters or should it be it's own directory?
    public function index()
    {
        // Placeholder text
        echo "You've found the rosters directory.<br>
            <br>
            Development team questions:<br>
            Regarding site structure... should this be only visible under a course directory?<br>
            If so, an admin could edit that roster from a course listing.<br>
            An instructor should be able to view the roster of the classes they instruct.<br>


        ";
    }

    //  Create function creates the view that contains the form that will
    //  add a roster item to the database (using the store method below).
    public function create()
    {
        // We use two arrays to create a roster, an array of users that are students
        // and an array of courses.
        $users = DB::table('users')->where('user_role','3')->lists('user_name','user_id');
        $courses=Course::where('course_id',$id)->get()[0];
        //$courses = Course::lists('course_name','course_id');

        // This is just here for me to see what user I'm logged in as while we create stuff.
        $userName = Auth::user()['user_name'];
        $userID = Auth::user()['user_id'];

        echo "Logged in as: " .$userName . " User ID: " . $userID;

        // return the view in the courses directory that allows us to add to the roster
        // and pass along the list of users and courses we found above.
        return view('courses.rosters')->with('users', $users)->with('courses', $courses);
    }

    // This roster.store function is called whenever you want
    // to store a roster object to the database, usually from
    // a form.
    // In this case, the roster_user_id will come from a list of
    // students, and the roster_class_id will come from a list of courses.
    // That data will come from a form in the courses directory.
    public function store(Request $request)
    {
        //dd($request->all());

        $roster = new Roster();
        $roster->course_id = $request->input('course_id');
        $roster->user_id = $request->input('user_id');

        $roster->save();
        return redirect('courses');
    }

    // The show function will return the roster of students with class_id equal to the
    // id passed into the function
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

        //course is determined by the button pushed in the courses index page
        $course = Course::where('course_id', $id)->lists('course_name', 'course_id');
        //user role must be 3, meaning this retrieves a student list with no admins/instructors
        $users = User::where('user_role', 3)->lists('user_name','user_id');

        return view('courses.rosters')->with('course', $course)->with('users', $users);

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
