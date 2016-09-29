<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Products; //Import Products to Controller
use Illuminate\Support\Facades\Auth;//Needed to use Auth::
use Illuminate\Support\Facades\DB;//Needed to use DB::

class ProductsController extends Controller
{
	/*
    * Used to Generate Products Page
    */
    public function getProduct($id)
    {
    	$product = Products::find($id);

    	return view('product', ['product' => $product]);
    }


    /*
    * Testing to see if Form can Update Database
    */
    public function changeName(Request $request){


    	$newFullName = $request['newFullName'];
    	Auth::user()->name = $newFullName; //Update cached variable
    	DB::table('users')
    		->where('id', Auth::user()->id)
    		->update(['name' => $newFullName]); //Update database entry

    	return view('/home');

    }
}
