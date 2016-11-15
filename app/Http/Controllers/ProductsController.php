<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Products; //Import Products to Controller
use App\Review;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Auth;//Needed to use Auth::
use Illuminate\Support\Facades\DB;//Needed to use DB::

class ProductsController extends Controller
{
	/**
    * Used to Generate Products Page
    * @param $id the id of the product
    * @return view return the product view with product
    */
    public function getProduct($id)
    {
    	$product = Products::find($id);
        $rating = ReviewController::calculateAverage($id);
    	return view('product', ['product' => $product],['rating' => $rating]);
    }

    public function welcomePageIndex(){
        $products = Products::all();
        return view('welcome2', ['products' => $products]);
    }
    public function shopPublicIndex()
    {
        $products = Products::all();
        return view('shop', ['products' => $products]);
    }
    /**
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
