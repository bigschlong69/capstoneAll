<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\User_role;
use DB;
use Auth;
use Hash;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    // The index function returns the view that is seen at /users/
    public function index()
    {
        //  check the authority level
        //  this is here for now to prove the concept
        //  the auth check will eventually be in another portion of the
        //  dashboard view
        $userName = Auth::user()['user_name'];
        $userRole = Auth::user()['user_role'];

        //depending on the user role, give a listing of other users of the same auth level
        if($userRole == 1){
            //return a list of all users, all modifiable
            $users = User::where('user_active',1)->get();
            return view('users.index')->withUser($users);
        } else if($userRole == 2) {
            //return an instructor view rather than an admin or student view
            
            return view('users.instructor')->withUsers(Auth::user());
        } else if($userRole == 3) {
            //return a student view rather than an admin or instructor view
            $users = Auth::user();
            return view('users.student',$users);
        } else {
            redirect("login.php");
        }
    }

    // return all of the users in the db that are admins
    // TODO: for now this just returns a view of the users that are admins
    //  this should eventually just return a raw set of data for use elsewhere,
    //  I'm returning a view here just to make sure I'm returning the right data
    public function admins()
    {
        //returns all admin users
        echo "returns all admin users here!<br>";
        $users = User::where('user_role','1')->get();
        return view('users.index')->withUser($users);
    }

    // return all of the users in the db that are instructors
    // TODO: for now this just returns a view of the users that are instructors
    //  this should eventually just return a raw set of data for use elsewhere,
    //  I'm returning a view here just to make sure I'm returning the right data
    public function instructors()
    {
        //returns all instructor users
        echo "returns all instructor users here!<br>";
        $users = User::where('user_role','2')->get();
        return view('users.index')->withUser($users);
    }

    // return all of the users in the db that are students
    // TODO: for now this just returns a view of the users that are students
    //  this should eventually just return a raw set of data for use elsewhere,
    //  I'm returning a view here just to make sure I'm returning the right data
    public function students()
    {
        //returns all admin users
        echo "returns all admin users here!<br>";
        $users = User::where('user_role','3')->get();
        return view('users.index')->withUser($users);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $userRole = Auth::user()['user_role'];

        if ($userRole == 1) {
            $user_roles = User_role::lists('user_role_name', 'user_role_id');
            return view('users.create')->with('user_role', $user_roles);
        } else {
            echo "Restricted.";
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
        $user_name=$request->input('user_name');
        
        if(User::where('user_name',$user_name)->count()!=0)
            return "User already exists";
        $user = new User();
        $user->user_name = $user_name;
        $user->email = $request->input('email');
        $user->user_role = $request->input('user_role');
        $user->password = Hash::make($request->input('password'));
        $user->save();
        return redirect('/dashboard');
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

        $userRole = Auth::user()['user_role'];
        $user_roles = User_role::lists('user_role_name', 'user_role_id');
        $user = User::where('user_id', $id)->get()[0];


        if ($userRole == 1) {
            return view('users.update')->with('user_roles', $user_roles)->with('user',$user);
        } else {
            echo "Restricted.";
        }
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
       
        $currentU=User::where('user_id',$id)->get()[0];
        $user_role=$request->input('user_role');
        $email=$request->input('email');
        // this method is shared by admin and user
        //admin can only change role. User can change email
        // var_dump($user_role);die();
        if(!is_null($user_role))
            $currentU->user_role=$user_role;
        if(!is_null($email))
            $currentU->email=$email;
        
        $currentU->save();
        return redirect('dashboard');
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
        $currentU=User::where('user_id',$id)->get()[0];
        $currentU->user_active=0;
        $currentU->save();
        return redirect('users');
        //
    }
}
