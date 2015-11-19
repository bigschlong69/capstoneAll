<?php

namespace App\Http\Controllers;

use App\Checkin;
use Illuminate\Http\Request;

use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CheckinsController extends Controller
{
    // This function returns the view visible when a user hits /checkin/
    public function index()
    {
        //
        return view('checkins.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkin()
    {
        if( Auth::user()->course_checkin() != false) {
            //To check in, we need a user_id and a course_id to start...
            $userID = Auth::user()->user_id;
            $courseID = Auth::user()->course_checkin()->course_id;

            return view('checkins.index')->with('userID', $userID)->with('courseID', $courseID);
        } else {
            return view('checkins.index');
        }
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

        $checkin = new Checkin();
        $checkin->course_id = $request->input('course_id');
        $checkin->user_id = $request->input('user_id');
        $checkin->checkin_longitude = $request->input('checkin_longitude');
        $checkin->checkin_latitude = $request->input('checkin_latitude');

        //dd($checkin);
        $checkin->save();

        redirect('dashboard');
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
