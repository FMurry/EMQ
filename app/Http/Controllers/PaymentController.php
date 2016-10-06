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

    	return $request;
    	/*
    	Auth::user()->name = $newFullName; //Update cached variable


    	DB::table('users')
    		->where('id', Auth::user()->id)
    		->update(['name' => $newFullName]); //Update database entry
	
    	return view('/home');*/

    }
}
