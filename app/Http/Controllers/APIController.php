<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Products; //Import Products to Controller

class APIController extends Controller
{
    public function main(Request $request) {
        switch($request->data) {
            case "products":
                $products = Products::all();
                return response()->json(['products' => $products]);
            default:
                return "no data specified";
        }
    }
}
