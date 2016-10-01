<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Products; //Import Products to Controller
use App\Cart; //Import Products to Controller
use Illuminate\Support\Facades\Auth;//Needed to use Auth::
use Illuminate\Support\Facades\DB;//Needed to use DB::

class CartController extends Controller
{
    public function addToCart($product_id)
    {
    	//if exists
    	$product = Products::find($product_id);
    	$user_id = Auth::user()->id;
    	
    	if($product){
    		if( $product->ifAvailable() ){
    			echo "item exists, item decremented<br>";//testing
    			$cartExist = DB::table('cart')->where('user_id', $user_id )->where('products_id', $product_id )->first();

    			echo "cart id: "+$cartExist->id+"<br>";
    			
    			if($cartExist){
    				$cart = Cart::find( $cartExist['id'] );
    				$cart->$incrementCartProductQuantity();
    				echo "cart quantity incremented to:"+ $cartExist->quantity + "<br>";//testing
    			}else{
    				echo "cart entry doesn't exist. Creating entry.<br>";//testing
    				DB::table('cart')->insert([
		    			'user_id' => $user_id,
		    			'products_id' => $product_id,
		    			'quantity' => 1,
		    		]);
    			}
    			echo " END of adding to cart.";
    			return $product->quantity;
    		}
    		return "item exists, item not available";
    	}else{
    		return "product doesn't exist";
    	}
    	//return view('product', ['product' => $product]);
    }
}
