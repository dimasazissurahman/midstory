<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use App\brand;

class brandController extends Controller
{
	public function insert(request $request){
		$name=$request->input('name');
    	echo DB::insert('insert into brand(id,name) values(?,?)',[null,$name]);	
    	return view('insertBrand');
	}
    

}
