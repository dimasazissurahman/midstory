<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use App\User;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function index(){
    	return view('/register');
    }
    public function store(request $request){

    	$validator=Validator::make($request->all(),[
    		'name' => 'required|min:3',
    		'email' => 'required|unique:user',
            'password' =>'required|min:5|alpha_num|required_with:re-password|same:re-password',
            're-password' => 'required',
            'file' => 'required',
            'gender' => 'required',
            'birthday' => 'required|before: -10 years',
            'address' =>'required|min:10'
    	],[
    		'date.before' => 'Must be older than 10 years',
    		'password.same' => 'Password must be match with re-password',
            'required' => ':attribute must be filled',
            'min' => ':attribute must be minimal :min character'
    	]);
    	// $file = $request->file->getClientOriginalName();
    	// $request->file->storeAs('public/FotoProfil',$file);
    	if($validator->fails()){
    		return redirect()->back()->withErrors($validator);
    	}
    	//print_r($request->input());


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
 	   	return view('/login');
    }
    public function update(request $request){
    	$validator=Validator::make($request->all(),[
    		'name' => 'required|min:3',
    		'email' => 'required|unique:user',
            'file' => 'required',
            'gender' => 'required',
            'birthday' => 'required|before: -10 years',
            'address' =>'required|min:10'
    	],[
    		'date.before' => 'Must be older than 10 years',
            'required' => ':attribute must be filled',
            'min' => ':attribute must be minimal :min character'
    	]);
    	// $file = $request->file->getClientOriginalName();
    	// $request->file->storeAs('public/FotoProfil',$file);
    	if($validator->fails()){
    		return redirect()->back()->withErrors($validator);
    	}
    	user::where('email',\Auth::user()->email)->update([
            'name' => $request->name,
            'email' => $request->email,
            'file' => $request->file,
            'gender' => $request->gender,
            'birthday' => $request->birthday,
            'address' => $request->address
        ]);
 	   	return view('/memberPage');
    }
}