<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Payment; //Import Payment to Controller
use Illuminate\Support\Facades\Auth;//Needed to use Auth::
use Illuminate\Support\Facades\DB;//Needed to use DB::

class PaymentController extends Controller
{
	    public function getPaymentMethods()
    {
        $paymentMethods = Payment::where('user_id', Auth::user()->id )->get();
        return view('account.payment', ['paymentMethods' => $paymentMethods]);
    }
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
	
		$status = "Successfully Added New Payment Method.";
        return redirect()->action('PaymentController@getPaymentMethods')->with('status', $status);


    }

    public function deletePaymentMethod($id){
    	$paymentMethod = Payment::find( $id );

    	if( $paymentMethod ){

    		$paymentMethod->delete();
    		$status = "Successfully Removed Payment Method.";
            return redirect()->action('PaymentController@getPaymentMethods')->with('status', $status);

    	}else{

    		$status = "Error: Payment Method Does Not Exist.";
            return redirect()->action('PaymentController@getPaymentMethods')->with('status', $status);
    	}
    }
}
