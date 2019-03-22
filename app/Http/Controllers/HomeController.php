<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Projects;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $projects = Projects::get();
        return view('home')->with(["projects" => $projects]);
    }

    public function projectUsers($id, Request $request)
    {
        $users = DB::connection('mysql'.$id)->select('select * from users where ?', [1]);
        return view('projectUsers')->with(["users" => $users, "project_id" => $id]);
    }
    public function changePassword(Request $request) {
        if( !($request->input('new-password') === $request->input('new-password_confirmation')) ){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your password confirmation. Please choose a different password.");
        }

        $user = DB::connection('mysql'.$request->input('project_id'))->update('update users set password = "'.bcrypt($request->input('new-password')).'" where id = ?',[$request->input('user_id')]); 

        //Change Password
        return redirect()->back()->with("success","Password changed successfully !");
    }    
}
