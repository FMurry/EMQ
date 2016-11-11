<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Address;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AddressController extends Controller
{
    /**
    * Authenticate User IF not Authenticated
    */
    public function __construct(){
        $this->middleware('auth');
    }

    /**
    * Return the add Address view
    * @return view the add address view
    */
    public function addAddressView(){
        return view('account.add_address');
    }

    /**
    * gets addresses for user
    * @return view returns the address view or add address view
    */
    public function getAddress(){
    	$addresses = Address::where('user_id', Auth::user()->id )->get();

        if(count($addresses) == 0){
            return view('account.add_address');
        }else{
    	   return view('account.address', ['addresses' => $addresses]);
        }
    }

    /**
    * Adds the address from the form
    * @param $request the form request
    * @return view action returns getAddress with statua 
    */
    public function addAddress(Request $request){

        $phone_characters = array("(",")","-");
        if($request['newPhone']){
            $request['newPhone'] = str_replace($phone_characters, "", $request['newPhone']);
        }


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
        $request['newPhone'] = substr_replace( $request['newPhone'], '-', -4, 0);
        $request['newPhone'] = substr_replace( $request['newPhone'], ') ', 3, 0);
        $request['newPhone'] = "(".$request['newPhone'];

    	$newFullName = $request['newFullName'];
    	$newAddress = $request['newAddress'];
    	$newAddress2 = $request['newAddress2'];
    	$newCity = $request['newCity'];
    	$newState = "CA";
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

    /**
    * Removes the address
    * @param $id the address id
    * @return action getAddress with status
    */
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
