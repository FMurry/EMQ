<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\OrderProductsController;
use App\Cart;
use App\Address;
use App\Payment;
use App\Order; //Import Payment to Controller
use App\OrderPayment; 
use App\OrderAddress; //Import Payment to Controller
use App\Store; //Import Payment to Controller
use App\OrderProducts; //Import Payment to Controller

use Illuminate\Support\Facades\Auth;//Needed to use Auth::
use Illuminate\Support\Facades\DB;//Needed to use DB::

class OrderController extends Controller
{
    /**
    * User must be authenticated before accessing
    *
    */
	 public function __construct()
    {
        $this->middleware('auth');
    }

    /**
    * Stores the user's order into DB
    * @param Request The request received
    * @return view Returns process.complete view
    */
    public function completeOrder(Request $request){
        $this->validate($request, [
            'address' => 'required|integer|exists:address,id',//Can be hacked, need to validate address belongs to user
            'payment' => 'required|integer|exists:payment,id',//Can be hacked, need to validate payment method belongs to user
            'total' => 'required',
        ]);


    	$order = new Order;
    	$address_id = $request['address'];
    	$payment_id = $request['payment'];
    	$cost = $request['total'];
    	$this->createOrder($order,Auth::user()->id,$payment_id,$address_id,$cost);
        //$data = json_encode($request->all());

        return view('process.complete', ['order' => $order]);
    }

    /**
    * creates the order and saves it into database
    *@param $order The order object
    *@param $user_id Id of the user
    *@param $payment_id Id of the payment
    *@param $address_id Id of the address
    *@param $cost The cost of the order
    *
    */
    public function createOrder($order,$user_id,$payment_id,$address_id,$cost){
    	$order->user_id = $user_id;
    	$order->store_id = 1;
    	// $order->orderaddress = $address_id;
    	// $order->orderpayment = $payment_id;
    	$order->orderpayment_id = $this->createOrderPayment($payment_id);
    	
    	$order->orderaddress_id = $this->createOrderAddress($address_id);
    	
    	$order->cost = $cost;
    	$order->save();
    	$this->migrateCartToOrderHistory($order->id);

    }

    /**
    * Creates the OrderPayment object and saves to database
    * @param $id the id of the payment
    * @return returns the id of the new OrderPayment 
    */
    public function createOrderPayment($id){
    	$orderPayment = new OrderPayment;
    	$userPayment = Payment::find($id);
    	$orderPayment->nameOnCard = $userPayment->nameOnCard;
    	$orderPayment->lastFour = $userPayment->lastFour;
    	$orderPayment->expMonth = $userPayment->expMonth;
    	$orderPayment->expYear = $userPayment->expYear;
    	$orderPayment->save();
    	return $orderPayment->id;
    }

    /**
    * Creates the OrderAddress object and saves to database
    * @param $id the id of the address
    * @return returns the id of the new OrderAddress
    */
    public function createOrderAddress($id){
    	$orderAddress = new orderAddress;
    	$userAddress = Address::find($id);
    	$orderAddress->fullName = $userAddress->fullName;
    	$orderAddress->address = $userAddress->address;
    	$orderAddress->address2 = $userAddress->address2;
    	$orderAddress->city = $userAddress->city;
    	$orderAddress->state = $userAddress->state;
    	$orderAddress->zip = $userAddress->zip;
    	$orderAddress->country = $userAddress->country;
    	$orderAddress->phone = $userAddress->phone;
    	$orderAddress->save();
    	return $orderAddress->id;
    }

    /**
    * Returns all of the orders for user
    * @return view returns account.orders view
    */
    public function returnOrderHistory(){
    	$orders = Order::where('user_id', Auth::user()->id )->get();
    	return view('account.orders', ['orders' => $orders]);
    }


    /**
    * Migrates the items in carts to orderproduct
    * @param $order_id The id of the order
    *
    */
    public function migrateCartToOrderHistory( $order_id ){

        $cart = Cart::where('user_id', Auth::user()->id )->get();

        foreach ($cart as $item){
	    	$order_product = new OrderProducts;
	    	$order_product->order_id = $order_id;
	    	$order_product->product_id = $item->product->id;
	    	$order_product->price = $item->product->price;
	    	$order_product->quantity = $item->quantity;
	    	$order_product->save(); //save item into order history
	    	$item->delete(); //delete item from cart
        }

    }
}
