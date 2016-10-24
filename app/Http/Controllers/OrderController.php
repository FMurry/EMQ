<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Cart;
use App\Order; //Import Payment to Controller
use App\OrderPayment; 
use App\OrderAddress; //Import Payment to Controller
use App\Store; //Import Payment to Controller
use App\OrderProducts; //Import Payment to Controller

use Illuminate\Support\Facades\Auth;//Needed to use Auth::
use Illuminate\Support\Facades\DB;//Needed to use DB::

class OrderController extends Controller
{
    public function completeOrder(Request $request){
        $this->validate($request, [
            'address' => 'required|integer|exists:address,id',//Can be hacked, need to validate address belongs to user
            'payment' => 'required|integer|exists:payment,id',//Can be hacked, need to validate payment method belongs to user
            'total' => 'required',
        ]);


    	$order = new Order;
    	$order->user_id = Auth::user()->id;
    	$order->store_id = 1;//Hardwired, implement later

    	$order->save();


        $data = json_encode($request->all());
        return view('process.complete', ['OrderData' => $data]);
    }
}
