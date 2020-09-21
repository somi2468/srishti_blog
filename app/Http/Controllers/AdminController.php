<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;

class AdminController extends Controller
{
    public function login(Request $request)
    {
    	 if($request->isMethod('post')){
			$data = $request->all();
			if(Auth::attempt(['email'=>$data['username'],'password'=>$data['password']])){
				return redirect('admin/dashboard');
			}else{
				return redirect('/admin')->with('delete','Invalid email or password');
			}
		}
    	return view('admin/admin_login');
    }

    public function dashboard()
    {
    	return view('admin.dashboard');	
    }

    public function logout(){
        Session::flush();
        return redirect('/admin')->with('message','Logged out successfully!');
    }
}
