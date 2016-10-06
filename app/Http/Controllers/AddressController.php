<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Address;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AddressController extends Controller
{
    
    public function addAddress(Request $request){


    	$newFullName = $request['newFullName'];
    	$newAddress = $request['newAddress'];
    	$newAddress2 = $request['newAddress2'];
    	$newCity = $request['newCity'];
    	$newState = $request['newState'];
    	$newCountry = $request['newCountry'];
    	$newZip = $request['newZip'];
    	$newPhone = $request['newPhone'];
    	$address = new Address;
    	$address->user_id = Auth::user()->id;
    	$address->fullName = $newFullName;
    	$address->address = $newAddress;
    	$address->address2 = $newAddress2;
    	$address->city = $newCity;
    	$address->state = $newState;
    	$address->country = $newCountry;
    	$address->zip = $newZip;
    	$address->phone = $newPhone;
    	$address->save();

    	return view('/home');

    }
}
