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

use Carbon\Carbon;

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
        /* Returns associate array of nearest store with store_id and delivery_time */
        $nearest_store = OrderController::returnStoreAndDeliveryTime( $address_id );

    	$order->user_id = $user_id;
    	$order->store_id = $nearest_store['store_id'];//$store->id;
        $order->delivery_time = $nearest_store['delivery_time'];
        $order->delivered = false;
        $store = Store::find( $nearest_store['store_id'] );
    	// $order->orderaddress = $address_id;
    	// $order->orderpayment = $payment_id;
    	$order->orderpayment_id = $this->createOrderPayment($payment_id);
    	
    	$order->orderaddress_id = $this->createOrderAddress($address_id);
    	
    	$order->cost = $cost;
        $tax = ($cost * ($store->salesTax / 100));
        $order->tax = number_format($tax, 2, '.', '');

        $order->total = $order->cost + $order->tax;
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
        
        $orders = Order::where('user_id', Auth::user()->id )->orderBy('id', 'DESC')->get();
        foreach ($orders as $order) {
            OrderController::updateOrderIfDelivered( $order );
        }

        return view('account.orders', ['orders' => $orders]);
    }

    public function updateOrderIfDelivered( $order ){
        if( $order->delivered == false ){
            $now= Carbon::now(); //current time
            $current_delivery_time = $now->diffInSeconds($order->created_at);
            if( $current_delivery_time > $order->delivery_time ){
                /* then order has already been delivered */
                /* generate delivered_at timestamp */
                $delivered_at = $order->created_at->addSeconds( $order->delivery_time );
                $order->delivered_at = $delivered_at;
                $order->delivered = true;
                $order->save();
            }
        }
    }

    public function returnOrderTracking( $id ){
        //add error checking for non-ids
        $order = Order::find( $id );


        /* if Order belongs to Customer */
        if( $order->user_id == Auth::user()->id ){



            if( $order->delivered == false ){

                $now= Carbon::now(); //current time
                $current_delivery_time = $now->diffInSeconds($order->created_at);

                if( $current_delivery_time < $order->delivery_time){
                    $home = $order->address->address.",".$order->address->city.",".$order->address->state." ".$order->address->zip.",".$order->address->country;
                    $store = $order->store->address.",".$order->store->city.",".$order->store->state." ".$order->store->zip.",".$order->store->country;

                    return view('account.tracking', ['customer_address' => $home, 'store_address' => $store, 'current_delivery_time' => $current_delivery_time, 'order_id' => $order->id]);
                }else{
                    /* had to place OrderController::returnOrderHistory() code directly, kept getting white screen bug */
                    $orders = Order::where('user_id', Auth::user()->id )->orderBy('id', 'DESC')->get();
                    foreach ($orders as $order) {
                        OrderController::updateOrderIfDelivered( $order );
                    }
                    return view('account.orders', ['orders' => $orders]);
                }
            }
            /* had to place OrderController::returnOrderHistory() code directly, kept getting white screen bug */
            $orders = Order::where('user_id', Auth::user()->id )->orderBy('id', 'DESC')->get();
            foreach ($orders as $order) {
                OrderController::updateOrderIfDelivered( $order );
            }
            return view('account.orders', ['orders' => $orders]);
        }
        //add redirect for illegal user attempt
        
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


    public function gmapsStringify( $address ){
        $address=str_replace(" ","+",$address);
        return $address;
    }

    public function return_delivery_time($store, $home){
        $url = 'https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=' .$store. '&destinations='.$home.'&key=AIzaSyCz2mUMKWxhHnmrCZoVYiWjwPwu3PUCPYs&format=json';
        $delivery_json =json_decode(file_get_contents( $url ));
        return $delivery_json->rows[0]->elements[0]->duration->value;
    }

    public function returnStoreAndDeliveryTime( $customer_address_id ){
        /* retrieve customer address object*/
        $customer = Address::find( $customer_address_id );
        /* convert address object to string */
        $customer_address = $customer->address.",".$customer->city.",".$customer->state." ".$customer->zip.",".$customer->country;
        /* stringify customer address for gmaps */
        $customer_address = OrderController::gmapsStringify( $customer_address );

        /* retrieve all stores*/
        $stores = Store::all();

        $fastest_delivery_store = "";
        $fastest_delivery_time = "";
        foreach($stores as $store){
            /* convert store address object to string */
            $store_address = $store->address.",".$store->city.",".$store->state." ".$store->zip.",".$store->country;
            /* stringify store address for gmaps */
            $store_address = OrderController::gmapsStringify( $store_address );

            $delivery_time = OrderController::return_delivery_time($store_address, $customer_address);

            if( $fastest_delivery_time == "" ){ /* initialize fastest to first store */
                $fastest_delivery_store = $store->id;
                $fastest_delivery_time = $delivery_time;
            }elseif( $delivery_time < $fastest_delivery_time){ /* set new store for delivery */
                $fastest_delivery_store = $store->id;
                $fastest_delivery_time = $delivery_time;
            }
        }
        $store = array("store_id" => $fastest_delivery_store,"delivery_time"=> $fastest_delivery_time);
        return $store;
    }
}
