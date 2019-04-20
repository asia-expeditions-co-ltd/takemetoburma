<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use \App\User;
use \App\Role;

class UserController extends Controller
{
    //
    public function getLogin(){
    	return view('login.loginForm');
    }

    public function doLogin(Request $req){
    	if (\Auth::attempt(['email'=> $req->email, 'password'=> $req->password], $req->remember))
        {
         	return redirect('admin');
        }else{
        	return back()->with('message','your email and password is not correct. Please try again !');
        }
    }

    // register new users
    public function getUser(){       
    	$users = User::orderBy('fullname', 'ASC')->get();
    	return view('admin.users.userAll', compact('users'));
    }

    public function getUserForm(){
    	return view('admin.users.userForm');        
    }

    public function createUser(Request $req){
        $validate = Validator::make($req->all(), [
            'username' => 'required',
            'fullname' => 'required',
            'password' => 'required|min:6',
            're_password' => 'required|min:6|same:password'
        ]);
        if (!$validate->fails()) {
    	   if (!User::exitEmail($req->email)) {
        		$addu = new User;
    	    	$addu->username = $req->username;
    	    	$addu->fullname = $req->fullname;
    	    	$addu->password = bcrypt($req->password);
    	    	$addu->password_text = $req->password;
    	    	$addu->email = $req->email;
    	    	$addu->phone = $req->phone;
                $addu->role_id = $req->role;
                $addu->save();
                return back()->with(['message' => 'Save Success', 'status' => 1]);
	    	}else{
                return back()->with(['message' => 'Your email already exits', 'status' => 0])->withInput($req->all());   
            }
    	}else{
            return back()->withErrors($validate)->withInput();
    	}
    }

    public function geteditUser($id){
    	$user = User::find($id);
    	return view('admin.users.userEditForm', compact('user'));
    }

    public function updateUser(Request $req){
        $evalidate = Validator::make($req->all(), [
            'username' => 'required',
            'fullname' => 'required',
            'password' => 'required|min:6',
            're_password' => 'required|min:6|same:password'
        ]);
        if (!$evalidate->fails()) {
            $edit = User::find($req->eid);
            $edit->username = $req->username;
            $edit->fullname = $req->fullname;
            $edit->password = bcrypt($req->password);
            $edit->password_text = $req->password;
            $edit->email = $req->email;
            $edit->phone = $req->phone;
            $edit->role_id = $req->role;
            $edit->save();
            return back()->with(['message' => 'Update Success', 'status' => 1]);
        }else{
            return back()->withErrors($evalidate)->withInput();
        }		
    }

    public function signout(){
		\Auth::logout();
		return redirect('/');
    }
}
