<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Payment; //Import Payment to Controller
use Illuminate\Support\Facades\Auth;//Needed to use Auth::
use Illuminate\Support\Facades\DB;//Needed to use DB::

class PaymentController extends Controller
{
    /* Authenticate User IF not Authenticated */
    public function __construct(){
        $this->middleware('auth');
    }
    
	public function addPaymentView(){
		return view('account.add_payment');
	}
	
	public function getPaymentMethods()
    {
        $paymentMethods = Payment::where('user_id', Auth::user()->id )->get();
        if(count($paymentMethods) == 0){
            return view('account.add_payment');
        }else{
            return view('account.payment', ['paymentMethods' => $paymentMethods]);
        }
    }
    /*
    * Testing to see if Form can Update Database
    */
    public function addPaymentMethod(Request $request){



        $this->validate($request, [
            'fullNameOnCard' => 'required|max:255',
            'cardNumber' => 'required|digits:16',
            'expirationMonth' => 'required|digits_between:1,12',
            'expirationYear' => 'required|integer|between:2016,2025',
            //'body' => 'required',
        ]);

        /* Convert Card Number to Hash to Check Uniqueness on database with Validate */
        if($request['cardNumber']){
            $lastFour = substr( $request['cardNumber'] , -4);
            $request['cardNumber'] = sha1($request['cardNumber']);
        }

        $this->validate($request, [
            'cardNumber' => 'unique:payment',
        ]);

    	$nameOnCard = $request['fullNameOnCard'];
		$cardNumber = $request['cardNumber'];
		//$lastFour = substr($cardNumber, -4);
		$cardHash = $cardNumber;//sha1($cardNumber);
		$expMonth = $request['expirationMonth'];
		$expYear = $request['expirationYear'];

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
