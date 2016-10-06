<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Payment; //Import Payment to Controller
use Illuminate\Support\Facades\Auth;//Needed to use Auth::
use Illuminate\Support\Facades\DB;//Needed to use DB::

class PaymentController extends Controller
{
    /*
    * Testing to see if Form can Update Database
    */
    public function addPaymentMethod(Request $request){

    	$nameOnCard = $request['nameOnCard'];
		$cardNumber = $request['cardNumber'];
		$lastFour = substr($cardNumber, -4);
		$cardHash = sha1($cardNumber);
		$expMonth = $request['expMonth'];
		$expYear = $request['expYear'];

        $paymentMethod = new Payment;
        $paymentMethod->user_id = Auth::user()->id;
        $paymentMethod->nameOnCard = $nameOnCard;
        $paymentMethod->cardNumber = $cardHash;
        $paymentMethod->lastFour = $lastFour;
        $paymentMethod->expMonth = $expMonth;
        $paymentMethod->expYear = $expYear;
        $paymentMethod->save();//ALWAYS SAVE CHANGES
	
    	return view('/home');

    }
}
