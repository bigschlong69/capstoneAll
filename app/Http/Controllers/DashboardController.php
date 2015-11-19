<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\Controllers\Controller;


class DashboardController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function viewControl()
    {
        switch ( Auth::user()['user_role']){
            case 1:
                 return $this->AdminController();
                 break;
            case 2:
                return $this->InstructorController();
                break;
            case 3:
                 return $this->StudentController();
                 break;
            default:
                return "Bad";
        }
                
  
    }
    public function AdminController()
    {
        
        return view('AdminDashboard',[]);
        
    }
     public function StudentController()
    {

         return view('StudentDashboard',[]);
        
    }
     public function InstructorController()
    {
        
        
         return view('InstructorDashboard',[]);
        
    }

    public function TopBarController(){
        //check the authority level
        $userName = Auth::user()['user_name'];
        if(Auth::user()['user_role']=1){
            $userRole = "Admin";
        } elseif (Auth::user()['user_role']=2){
            $userRole = "Instructor";
        } elseif (Auth::user()['user_role']=3){
            $userRole = "Student";
        } else {
            $userRole = "FALSE ACCOUNT, EAT A DICK.";
        }

        echo "You are currently logged in as: " . $userName;
        echo "Logout?";

    }
    
    
    /*
    Admin controller implementation
    */
    
    
    
    
    
    
    
    /*
    Student  controller implementation
    */
    
    
    
    
    
    
    
    /*
    Instructor  controller implementation
    */
}