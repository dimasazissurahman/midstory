<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
	public function insertP(){
		return view('/insertPhone');
	}
	public function manageP(){
		return view('/managePhones');
	}
	public function insertB(){
		return view('/insertBrand');
	}
	public function manageB(){
		return view('/manageBrand');
	}
	public function insertM(){
		return view('/insertMember');
	}
	public function manageM(){
		return view('/manageMembers');
	}
}
