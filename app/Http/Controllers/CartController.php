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
    /*
    *   Checks if cart entry with product exists in users cart.
    *   If it exists, increment Cart Quantity
    *   Products->isAvailable() returns bool and Decrements Product inventory quantity by 1.
    *   Else make a new cart entry.
    */
    public function addToCart($product_id)
    {
        
        $product = Products::find($product_id);
        $user_id = Auth::user()->id;

        // IF product exists
        if($product){

            // IF product is Available, quantity > 0
            if( $product->isAvailable() ){

                // Retrieve User Cart Entry with Product
                $cartExist = DB::table('cart')->where('user_id', $user_id )->where('product_id', $product_id )->first();

                if($cartExist){
                    // Cart entry with product exists, incrementing quantity
                    $cart = Cart::find( $cartExist->id )->increment('quantity');
                }else{
                    // cart entry doesn't exist. Creating entry
                    $cart = new Cart;
                    $cart->user_id = $user_id;
                    $cart->product_id = $product_id;
                    $cart->quantity = 1;
                    $cart->save();//ALWAYS SAVE CHANGES
                }
                return "Successfully Added to Cart.";
            }
            return "Sorry, This Item is Temporarily Unavailable.";
        }
        return "Error, This Product Doesn't Exist.";
    }

    /*
    *   Checks if cart entry with product exists in users cart.
    *   If it exists, decrement cart quantity, increment product inventory quantity.
    *   If Cart quantity is zero, delete table row
    */
    public function removeFromCart($product_id){

        $user_id = Auth::user()->id;
        $cartExist = DB::table('cart')->where('user_id', $user_id )->where('product_id', $product_id )->first();

        if($cartExist){
            $cart = Cart::find( $cartExist->id );

            //If Quantity > 1, decrement
            //Else Delete Cart Table Row
            if( $cart->quantity > 1){
                $cart->decrement('quantity');
            }else{
                $cart->delete();
            }

            //Code to store Products quantity +1

            $product = Products::find($product_id);
            echo "Before: ".$product->quantity;
            $product->increment('quantity');
            echo "After: ".$product->quantity;
            $product->save();
            return "Item Successfully Removed from Cart.";
        }
        return "Item Not In Cart.";
    }
}
