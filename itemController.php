<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Routing\Redirector;
use App\item;
use App\brand;
use App\user;
use File;

class itemController extends Controller
{
    public function addToCart($id){
    	$query = DB::table('item')->select('*')->where('id',$id)->get();
		// DB::table('item')->where('id',$id)->get();

		return view('cartPayment', compact('query'));

    }
    public function addPayment(request $request){
    	$qty = $request->input('qty');
    	$idUser = $request->input('idUser');
    	$idItem = $request->input('idItem');
    	$Comment = $request->input('Comment');
    	echo DB::insert('insert into transaction(id,id_user,id_item,qty,Comment) values(?,?,?,?,?)',[null,$idUser,$idItem,$qty,$Comment]);
    	return view('/memberPage');
    }
}
