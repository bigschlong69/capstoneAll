<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use Hash;
use Illuminate\Http\Request;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest', ['except' => 'getLogout']);
    }
   public function getLogin()
    {
        return view("auth/login");
    }
    public function getLogout()
    {
         Auth::logout();
         return redirect('/');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'user_name' => 'required|email|max:255|unique:users',
    //         'password' => 'required|confirmed|min:6',
    //     ]);
    // }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
    */
    // protected function create(array $data)
    // {
    //     return User::create([
    //         'name' => $data['name'],
    //         'email' => $data['email'],
    //         'password' => bcrypt($data['password']),
    //     ]);
    // }

    
   public function postLogin(Request $request)
    {
        $user_name=$request->input('user_name');
        $password=$request->input('password');
        
        //This line creates a login in credential for you
        //$user=(new user())->create(['user_name'=>$user_name,'password'=>Hash::make($password),"user_role"=>1]);
        
        if (Auth::attempt(['user_name' =>$user_name,'password'=>$password],true)|| Auth::viaRemember())
            return redirect('/dashboard');
             return $this->getLogin();

    }


    public function createLogin(Request $request)
    {
        $user_name=$request->input('user_name');
        $password=$request->input('password');

        //This line creates a login in credential for you
        $user=(new user())->create(['user_name'=>$user_name,'password'=>Hash::make($password),"user_role"=>1]);

        if (Auth::attempt(['user_name' =>$user_name,'password'=>$password],true)|| Auth::viaRemember())
            return redirect('/dashboard');
        return $this->getLogin();

    }
    

}
