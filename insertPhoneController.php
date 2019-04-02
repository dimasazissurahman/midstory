<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Validator;
use App\item;
use App\brand;
use App\user;
use File;

class insertPhoneController extends Controller
{
   public function insertPhone(request $request){

   		$validator=Validator::make($request->all(),[
    		'name' => 'required|min:3',
    		'brand' => 'required',
    		'image' => 'required',
    		'description' => 'required',
    		'price' => 'required',
    		'discount' => 'required',
    		'stock' => 'required'
    	],[
            'required' => ':attribute must be filled',
            'min' => ':attribute must be minimal :min character'
    	]);
    	// $file = $request->file->getClientOriginalName();
    	// $request->file->storeAs('public/FotoProfil',$file);
    	if($validator->fails()){
    		return redirect()->back()->withErrors($validator);
    	}


		$image=$request->file('image');
		$images=time().'.'.$image->getClientOriginalName();
		$destination='image';
		$image->move($destination,$images);

		$name=$request->input('name');
		$brand=$request->input('brand');
		$description=$request->input('description');
		$price=$request->input('price');
		$discount=$request->input('discount');
		$afterDiscPrice=$request->input('price')-$request->input('price')*($request->input('discount')/100);
		$stock=$request->input('stock');
 	   	echo DB::insert('insert into item(id,image,name,brand,description,price,discount,afterDiscPrice,stock) values(?,?,?,?,?,?,?,?,?)',[null,$images,$name,$brand,$description,$price,$discount,$afterDiscPrice,$stock]);
 	   	return view('adminPage');
	}
	public function deleteItem($id){
		$query = DB::table('item')->select('*')->where('id',$id)->first();
		$imageLocation='image/'.$query->image;
		if (File::exists($imageLocation)) {
			File::delete($imageLocation);
		}
		DB::table('item')->where('id',$id)->delete();

		return redirect()->back();
	}
	public function deleteMember($id){
		$query = DB::table('user')->select('*')->where('id',$id)->first();
		$imageLocation='file/'.$query->file;
		if(File::exists($imageLocation)){
			File::delete($imageLocation);
		}
		DB::table('user')->where('id',$id)->delete();

		return redirect()->back();
	}
	public function deleteBrand($id){
		$query = DB::table('brand')->select('*')->where('id',$id)->first();
		DB::table('brand')->where('id',$id)->delete();

		return redirect()->back();
	}
	public function index(){
		$brands = brand::all();
		return view('insertPhone', compact('brands'));
	}
	public function manageB(){
		$brands = brand::all();
		return view('manageBrand', compact('brands'));
	}
	public function manage(){
		$items = item::all();
		return view('managePhones', compact('items'));
	}
	public function phonelist(){
		$items = item::all();
		return view('phoneList', compact('items'));
	}
	public function update(){
		$brands = brand::all();
		return view('updatePhone', compact('brands'));	
	}
	public function updateManageBrand(request $request){
		DB::table('brand')->where('id',1)->update([
			'name' => $request->name,
		]);
		return view('adminPage');
	}
	public function manageM(){
		$users = user::all();
		return view('manageMembers', compact('users'));
	}
	public function updateMember(request $request){
		user::where('email',\Auth::user()->email)->first()->update([
            'name' => $request->name,
            'email' => $request->email,
            'file' => $request->file,
            'gender' => $request->gender,
            'birthday' => $request->birthday,
            'address' => $request->address
        ]);
    	return view('adminPage');
	}
	public function updatePhone(request $request){
		DB::table('item')->where('id',1)->update([
            'image' => $request->image,
            'name' => $request->name,
            'brand' => $request->brand,
            'description' => $request->description,
            'price' => $request->price,
            'discount' => $request->discount,
        	'stock' => $request->stock
        ]);
        return view('adminPage');
	}
}
