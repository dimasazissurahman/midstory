<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class LoginController extends Controller
{
    public function index(){
    	return view('/login');
    }
    public function userpage(){
    	return view('/memberPage');
    }
    public function adminpage(){
    	return view('/adminPage');
    }

    public function next(Request $request){
    	$this->validate($request,[
    		'email' => 'required',
    		'password' => 'required'
    	]);
    	if(!\Auth::attempt(['email' => $request->email, 'password' => $request->password])){
			return redirect('/login');
    	}
    	if($request->has('remember')){
    		return redirect('home')->cookie('email',$request->email, 60)->cookie('password', $request->password, 60);
    	}
    	else{
    		if(\Auth::user()->roles == "member"){
    			return redirect('/memberPage');
    		}
    		else{
    			return redirect('/adminPage');
    		}
    		
    	}
    }
    public function logout(Request $request){
    	\Auth::logout();
    	$request->Session()->flush();
    	return redirect('/login');
    }
    
    
}
