<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Products; //Import Products to Controller
use App\Cart; //Import Cart to Controller
use Illuminate\Support\Facades\Auth;//Needed to use Auth::
use Illuminate\Support\Facades\DB;//Needed to use DB::

class APIController extends Controller
{

    public function main(Request $request) {
        switch($request->data) {

    		/*
			*	Returns Products in JSON encoded format
			*/
            case "products":
                $products = Products::all();
                return response()->json(['products' => $products]);

			/*
			*	Returns Users Cart in JSON encoded format
			*/
			case "cart":
				if(Auth::guest()){
					return "You must be authenticated.";
				}else{
					$cart = Cart::where('user_id', Auth::user()->id )->get();
					return response()->json(['cart' => $cart]);
				}
				return "Cart Empty.";

			/*
			*	Returns NULL as no data path was referenced
			*/
            default:
                return "no data specified";
        }
    }



}
