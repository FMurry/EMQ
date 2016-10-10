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
			*	Returns NULL as no data path was referenced
			*/
            default:
                return "no data specified";
        }
    }



}
