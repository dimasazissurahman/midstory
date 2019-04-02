<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
	public function Home(){
		return view('home');
	}
    public function Cart(){
    	return view('cart');
    }
    public function Update(){
    	return view('UpdateProfile');
    }
    public function phonelist(){
    	return view('phoneList');
    }
    public function transaction(){
    	return view('transactionHistory');
    }
    public function member(){
    	return view('memberPage');
    }
    public function detail(){
        return view('detailTH');
    }
    public function updateP(){
        return view('updatePhone');
    }
    public function updateB(){
        return view('updateBrand');
    }
    public function updateM(){
        return view('updateMember');
    }
    public function transactionDetail(){
        return view('transactionDetail');
    }
    public function cartPayment(){
        return view('cartPayment');
    }
}
