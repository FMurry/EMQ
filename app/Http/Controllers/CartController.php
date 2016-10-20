<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Products; //Import Products to Controller
use App\Cart; //Import Cart to Controller

use App\Payment;
use App\Address;

use Illuminate\Support\Facades\Auth;//Needed to use Auth::
use Illuminate\Support\Facades\DB;//Needed to use DB::

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function getCart()
    {
        $cart = Cart::where('user_id', Auth::user()->id )->get();
        $total = CartController::cartTotal();
        return view('cart2', ['cart' => $cart, 'total_price' => $total['price'], 'total_quantity' => $total['quantity'] ]);
    }


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
                $status = "Successfully Added to Cart.";
                return redirect()->action('CartController@getCart')->with('status', $status);
                //return "Successfully Added to Cart.";
            }
            //return "Sorry, This Item is Temporarily Unavailable.";
            $status = "Sorry, This Item is Temporarily Unavailable.";
            return redirect()->action('CartController@getCart')->with('status', $status);
        }
        //return "Error, This Product Doesn't Exist.";
        $status = "Error, This Product Doesn't Exist.";
        return redirect()->action('CartController@getCart')->with('status', $status);
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

            //Restore Products quantity +1
            $product = Products::find($product_id);
            $product->increment('quantity');
            $product->save();
            //return "Item Successfully Removed from Cart.";
            $status = "Successfully Removed from Cart.";
            return redirect()->action('CartController@getCart')->with('status', $status);
        }
        //return "Item Not In Cart.";
        $status = "Item Not In Cart.";
        return redirect()->action('CartController@getCart')->with('status', $status);
    }

    /* temporarily placed here, will eventually be moved to OrderController */
    public function startProcessOrderForm(){
        $addresses = Address::where('user_id', Auth::user()->id )->get();
        $paymentMethods = Payment::where('user_id', Auth::user()->id )->get();
        return view('process.start', ['paymentMethods' => $paymentMethods, 'addresses' => $addresses]);
    }

    public function cartTotal(){
        $cart = Cart::where('user_id', Auth::user()->id )->get();
        $total_price = 0;
        $total_items = 0;
        foreach ($cart as $item){
            $total_items += $item->quantity;
            $total_price += $item->product->price * $item->quantity;
        }
        if($total_items > 1){
            $total_items = $total_items." items";
        }else{
            $total_items = $total_items." item";
        }
        $total = array("price" => $total_price,"quantity"=> $total_items);
        return $total;
    }
}
