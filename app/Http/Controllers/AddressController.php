<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Address;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AddressController extends Controller
{
    /* Authenticate User IF not Authenticated */
    public function __construct(){
        $this->middleware('auth');
    }

    public function addAddressView(){
        return view('account.add_address');
    }

    public function getAddress(){
    	$addresses = Address::where('user_id', Auth::user()->id )->get();

        if(count($addresses) == 0){
            return view('account.add_address');
        }else{
    	   return view('account.address', ['addresses' => $addresses]);
        }
    }
    public function addAddress(Request $request){

         $this->validate($request, [
            'newFullName' => 'required|max:255',
            'newAddress' => 'required|max:255',
            'newAddress2' => 'max:255',
            'newCity' => 'required|max:255',
            'newState' => 'required|max:255',
            'newCountry' => 'required|max:255',
            'newZip' => 'required|digits:5',
            'newPhone' => 'required|digits:10',
            //'body' => 'required',
        ]);

        
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

    	$status = "Successfully added Address";
    	return redirect()->action("AddressController@getAddress")->with('status',$status);

    }

    public function removeAddress($id){
    	$address = Address::find($id);
    	if($address){
    		$address->delete();
    		$status = "Successfully removed Address";
    		return redirect()->action("AddressController@getAddress")->with('status',$status);
    	}
    	else{
    		$status = "Error: Address Not removed";
    		return redirec()->action("AddressController@getAddress")->with('status',$status);
    	}
    }

}
