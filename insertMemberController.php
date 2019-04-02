<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use App\User;
use File;

class insertMemberController extends Controller
{
	public function insertMember(request $request){
		$roles=$request->input('roles');
    	$name=$request->input('name');
 	   	$email=$request->input('email');
 	   	$password=bcrypt($request->input('password'));
		
		$file=$request->file('file');
		$files=time().'.'.$file->getClientOriginalName();
		$destination='file';
		$file->move($destination,$files);

 	   	$gender=$request->input('gender');
 	   	$birthday=$request->input('birthday');
 	   	$address=$request->input('address');
 	   	echo DB::insert('insert into user(id,roles,name,email,password,file,gender,birthday,address) values(?,"member",?,?,?,?,?,?,?)',[null,$name,$email,$password,$files,$gender,$birthday,$address]);
 	   	return view('/insertMember');
	}
	public function phonelist(){
		$items = item::all();
		return view('phoneList', compact('items'));
	}
	// public function updateProfile(){
	// 	$users = user::select('file');
	// 	return view('updateProfile', compact('users'));
	// }
}
